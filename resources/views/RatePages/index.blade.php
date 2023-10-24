@php
    $me=session('id');
    use App\Models\Catalogs\ScientificGroup;
    use App\Models\Person;
@endphp
@extends('layouts.PanelMaster')
@section('content')
    <main class="flex-1 bg-cu-light py-6 px-8">
        <form id="SummaryAssessmentSet">
            <input type="hidden" name="rateInfoID" value="{{ $summaryRate->id }}">
            <input type="hidden" name="rateType" value="
                @if($summaryRate->s1g1rater===$me)
                s1g1
                @elseif($summaryRate->s2g1rater===$me)
                s2g1
                @elseif($summaryRate->s3g1rater===$me)
                s3g1
                @elseif($summaryRate->s1g2rater===$me)
                s1g2
                @elseif($summaryRate->s2g2rater===$me)
                s2g2
                @elseif($summaryRate->s3g2rater===$me)
                s3g2
                @endif
            ">
            <div class="mx-auto lg:mr-72 mb-6">
                <h1 class="text-2xl font-bold mb-4">ثبت ارزیابی اجمالی</h1>
                <div class="bg-white rounded shadow p-6">
                    <table class="w-full border-collapse rounded-lg overflow-hidden text-center">
                        <thead>
                        <tr class="bg-gradient-to-r from-blue-400 to-purple-500 items-center text-center text-white">
                            <th class=" px-6 py-1 font-bold ">عنوان اثر</th>
                            <th class=" px-3 py-1 font-bold ">پدید آورنده</th>
                            <th class=" px-3 py-1 font-bold ">گروه اول</th>
                            <th class=" px-3 py-1 font-bold ">گروه دوم</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300">
                        <tr class="bg-white">
                            <td class="px-6 py-4">{{ $summaryRate->postInfo->title  }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $personInfo=Person::find($summaryRate->postInfo->person_id)
                                @endphp
                                {{ $personInfo->name . ' ' . $personInfo->family  }}
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $group1Info=ScientificGroup::find($summaryRate->postInfo->scientific_group_v1)
                                @endphp
                                {{ $group1Info->name }}
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $group2Info=ScientificGroup::find($summaryRate->postInfo->scientific_group_v2)
                                @endphp
                                {{ @$group2Info->name }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <p class="font-bold">
                        یادآوری:
                    </p>
                    <p class="mt-2">
                        - با کلیک بر روی نام اثر، در صورت وجود فایل میتوانید اثر را مشاهده کنید.
                    </p>
                    <p>
                        - ارزیاب محترم؛ نظر خود را به صورت عدد
                        <span class="font-bold underline">
                    4 برای عالی،
                    </span>
                        <span class="font-bold underline">
                    3 برای خوب،
                    </span>
                        <span class="font-bold underline">
                    2 برای متوسط،
                    </span>
                        <span class="font-bold underline">
                    1 برای ضعیف
                    </span>
                        ارائه فرمایید.
                    </p>
                    @if($summaryRate->s1g1rater===$me or $summaryRate->s2g1rater===$me or $summaryRate->s3g1rater===$me)
                            @php
                                $rater1=\App\Models\User::find($summaryRate->s1g1rater);
                                $rater2=\App\Models\User::find($summaryRate->s2g1rater);
                                $rater3=\App\Models\User::find($summaryRate->s3g1rater);
                            @endphp
                        @switch($summaryRate->sg1_form_type)
                            @case('پایان نامه')
                            @include('RatePages.Forms.Summary.payanname')
                        @endswitch
                    @endif
                </div>
            </div>
        </form>
    </main>
@endsection
