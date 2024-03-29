@extends('layouts.PanelMaster')

@section('content')
    <main class="flex-1 bg-gray-100 py-6 md:px-8 px-2">
        <div class="mx-auto lg:mr-72">
            <h1 class="text-2xl font-bold mb-4">تغییر رمز عبور</h1>
            <form id="change-password" method="post" action="{{ route('ChangePasswordInc') }}">
                @csrf
                <div class="bg-white rounded shadow p-6 md:w-1/2 mx-auto">
                    <div class="mb-4">
                        <label for="oldPass" class="text-center block">رمز عبور فعلی</label>
                        <input
                            class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500 w-full mt-2"
                            id="oldPass" name="oldPass" type="password" placeholder="رمز عبور فعلی را وارد کنید"
                            autocomplete="new-password">
                    </div>
                    <div class="mb-4">
                        <label for="newPass" class="text-center block">رمز عبور جدید</label>
                        <input
                            class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500 w-full mt-2"
                            id="newPass" name="newPass" type="password" placeholder="رمز عبور جدید را وارد کنید">
                    </div>
                    <div class="mb-4">
                        <label for="repeatNewPass" class="text-center block">تکرار رمز عبور جدید</label>
                        <input
                            class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500 w-full mt-2"
                            id="repeatNewPass" name="repeatNewPass" type="password" placeholder="تکرار رمز عبور جدید را وارد کنید">
                    </div>
                    <div class="text-center">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full md:w-auto"
                            type="submit">تغییر رمز عبور
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </main>
@endsection
