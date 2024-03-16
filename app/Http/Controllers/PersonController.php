<?php

namespace App\Http\Controllers;

use App\Models\GeneralInformation;
use App\Models\User;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function store(Request $request)
    {
        $name = $request->input('name');
        $family = $request->input('family');
        $national_code = $request->input('national_code');
        $howzah_code = $request->input('howzah_code');
        $mobile = $request->input('mobile');
        $gender = $request->input('gender');
        if (!$name) {
            return $this->alerts(false, 'nullName', 'نام وارد نشده است');
        }
        if (!$family) {
            return $this->alerts(false, 'nullFamily', 'نام خانوادگی وارد نشده است');
        }
        if (!$national_code) {
            return $this->alerts(false, 'nullNationalCode', 'کد ملی وارد نشده است');
        }
        if (strlen($national_code) != 10) {
            return $this->alerts(false, 'wrongNationalCode', 'کد ملی اشتباه وارد شده است');
        }
        if (!$mobile) {
            return $this->alerts(false, 'nullMobile', 'شماره همراه وارد نشده است');
        }
        if (strlen($mobile) != 11) {
            return $this->alerts(false, 'wrongMobile', 'شماره همراه اشتباه وارد شده است');
        }
        if (!$gender) {
            return $this->alerts(false, 'nullGender', 'جنسیت وارد نشده است');
        }

        $check = GeneralInformation::where('national_code', $national_code)->exists();
        if ($check) {
            return $this->alerts(false, 'dupNationalCode', 'کد ملی تکراری وارد شده است');
        }

        $generalInformation = new GeneralInformation();
        $generalInformation->name = $name;
        $generalInformation->family = $family;
        $generalInformation->national_code = $national_code;
        $generalInformation->howzah_code = $howzah_code;
        $generalInformation->mobile = $mobile;
        $generalInformation->gender = $gender;

        $generalInformation->save();
        $this->logActivity('Person Added =>' . $generalInformation->id, \request()->ip(), \request()->userAgent(), \session('id'));
        return $this->success(true, 'PersonAdded', 'برای نمایش اطلاعات جدید، لطفا صفحه را رفرش نمایید.');
    }

    public function editPerson(Request $request)
    {
        $PersonID = $request->input('personID');
        $name = $request->input('nameForEdit');
        $family = $request->input('familyForEdit');
        $nationalCode = $request->input('national_codeForEdit');
        $howzah_code = $request->input('howzah_codeForEdit');
        $mobile = $request->input('mobileForEdit');
        $gender = $request->input('genderForEdit');
        if (!$name) {
            return $this->alerts(false, 'nullName', 'نام وارد نشده است');
        }
        if (!$family) {
            return $this->alerts(false, 'nullFamily', 'نام خانوادگی وارد نشده است');
        }
        if (!$nationalCode) {
            return $this->alerts(false, 'nullMobile', 'کد ملی وارد نشده است');
        }
        if (!$mobile) {
            return $this->alerts(false, 'nullMobile', 'شماره همراه وارد نشده است');
        }
        if (strlen($mobile) != 11) {
            return $this->alerts(false, 'wrongMobile', 'شماره همراه اشتباه وارد شده است');
        }
        if (!$gender) {
            return $this->alerts(false, 'nullGender', 'جنسیت وارد نشده است');
        }

        $personExists = GeneralInformation::where('national_code', $nationalCode)->where('user_id', '!=', $PersonID)->exists();
        if ($personExists) {
            return $this->alerts(false, 'personExists', 'کد ملی/پاسپورت تکراری وارد شده است.');
        }

        $user = User::firstOrCreate([
            'username' => $nationalCode,
            'password' => bcrypt('ketabesal402')
        ]);
        if ($user) {
            $this->logActivity('User Added =>' . $user->id, \request()->ip(), \request()->userAgent(), \session('id'));
        }
        $Person = GeneralInformation::where('user_id', $user->id)->first();
        $Person->fill([
            'user_id' => $user->id,
            'name' => $name,
            'family' => $family,
            'mobile' => $mobile,
            'national_code' => $nationalCode,
            'howzah_code' => $howzah_code,
            'gender' => $gender,
        ]);
        $Person->save();

        $this->logActivity('Person Edited =>' . $PersonID, \request()->ip(), \request()->userAgent(), \session('id'));
        return $this->success(true, 'personEdited', 'برای نمایش اطلاعات جدید، لطفا صفحه را رفرش نمایید.');
    }

    public function getPersonInfo(Request $request)
    {
        $personID = $request->input('id');
        if ($personID) {
            return GeneralInformation::where('user_id',$personID)->first();
        }
    }

    public function index()
    {
        $personList = GeneralInformation::orderBy('id')->paginate(20);
        return \view('PersonManager', ['personList' => $personList]);
    }
}
