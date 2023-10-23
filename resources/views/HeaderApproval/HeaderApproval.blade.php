@extends('layouts.PanelMaster')

@section('content')
    <main class="flex-1 bg-gray-100 py-6 px-8 ">
        <div class=" mx-auto lg:mr-72">
            <h1 class="text-2xl font-bold mb-4">تاییدیه مدیر گروه برای فرم ارزیابی اجمالی</h1>
            @if($approvals->isEmpty())
                <div class="bg-white rounded shadow p-6 flex flex-col font-extrabold items-center">
                    اثری برای تایید وجود ندارد.
                </div>
            @else
                <div class="bg-white rounded shadow p-6 flex flex-col items-center">
{{--                    <div class=" mb-4 flex w-full">--}}
{{--                        <div>--}}
{{--                            <label for="search-Name-Classification" class="block mt-3 text-sm font-bold text-gray-700">جستجو--}}
{{--                                در--}}
{{--                                نام اثر:</label>--}}
{{--                            <input id="search-title-Classification" autocomplete="off"--}}
{{--                                   placeholder="لطفا نام اثر را وارد نمایید."--}}
{{--                                   type="text" name="search-Name-Classification"--}}
{{--                                   class="ml-4 mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"/>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <label for="search-SG1-Classification"--}}
{{--                                   class="block mt-3 text-sm font-bold text-gray-700 ">جستجو در گروه علمی اول:</label>--}}
{{--                            <select id="search-SG1-Classification" class="border rounded-md py-2 px-4 "--}}
{{--                                    name="search-SG1-Classification">--}}
{{--                                <option value="">بدون فیلتر</option>--}}
{{--                                @php $SG=\App\Models\Catalogs\ScientificGroup::orderBy('name','asc')->get() @endphp--}}
{{--                                @foreach($SG as $scientific_groups)--}}
{{--                                    <option--}}
{{--                                        value="{{ $scientific_groups->id }}">{{ $scientific_groups->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="mr-3">--}}
{{--                            <label for="search-SG2-Classification"--}}
{{--                                   class="block text-gray-700 text-sm font-bold mt-3 ">جستجو در گروه علمی دوم:</label>--}}
{{--                            <select id="search-SG2-Classification" class="border rounded-md py-2 px-4 "--}}
{{--                                    name="search-SG2-Classification">--}}
{{--                                <option value="">بدون فیلتر</option>--}}
{{--                                @php $SG=\App\Models\Catalogs\ScientificGroup::orderBy('name','asc')->get() @endphp--}}
{{--                                @foreach($SG as $scientific_groups)--}}
{{--                                    <option--}}
{{--                                        value="{{ $scientific_groups->id }}">{{ $scientific_groups->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="max-w-full overflow-x-auto">
                        <table class="w-full border-collapse rounded-lg overflow-hidden text-center">
                            <thead>
                            <tr class="bg-gradient-to-r from-blue-400 to-purple-500 items-center text-center text-white">
                                <th class=" px-6 py-3  font-bold ">ردیف</th>
                                <th class=" px-6 py-3  font-bold ">جشنواره</th>
                                <th class=" px-6 py-3  font-bold ">نام اثر</th>
                                <th class=" px-3 py-3  font-bold ">قالب اثر</th>
                                <th class=" px-3 py-3  font-bold ">گروه علمی اول</th>
                                <th class=" px-3 py-3  font-bold ">گروه علمی دوم</th>
                                <th class=" px-3 py-3  font-bold ">فرم گروه علمی اول</th>
                                <th class=" px-3 py-3  font-bold ">فرم گروه علمی دوم</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300">
                            @foreach ($approvals as $post)
                                <tr class="bg-white">
                                    <td class="px-6 py-4">{{ $loop->iteration  }}</td>
                                    <td class="px-6 py-4">
                                        @php
                                            $festivalInfo=\App\Models\Catalogs\Festival::find($post->postInfo->festival_id)
                                        @endphp
                                        {{ $festivalInfo->name }}
                                    </td>
                                    <td class="px-6 py-4">{{ $post->postInfo->title  }}</td>
                                    <td class="px-6 py-4">{{$post->postInfo->post_format  }}</td>
                                    <td class="px-3 py-4">
                                        @php
                                            $sg1Info =\App\Models\Catalogs\ScientificGroup::find($post->postInfo->scientific_group_v1)
                                        @endphp
                                        {{ $sg1Info->name }}
                                    </td>
                                    <td class="px-3 py-4">
                                        @php
                                            $sg2Info =\App\Models\Catalogs\ScientificGroup::find($post->postInfo->scientific_group_v2)
                                        @endphp
                                        @if($sg2Info)
                                            {{ $sg2Info->name }}
                                        @endif
                                    </td>
                                    <td class="px-3 py-4">
                                        <select data-postid="{{ $post->id }}"
                                                class="border rounded-md w-full px-3 py-2 fsg1"
                                                name="fsg1">
                                            <option value="" selected disabled>انتخاب کنید</option>
                                            <option value="علمی پژوهشی">علمی پژوهشی</option>
                                            <option value="علمی ترویجی">علمی ترویجی</option>
                                            <option value="فرهنگی تبلیغی">فرهنگی تبلیغی</option>
                                            <option value="تقریر">تقریر</option>
                                        </select>
                                    </td>
                                    <td class="px-3 py-4">
                                        @if($post->postInfo->scientific_group_v2)
                                            <select data-postid="{{ $post->id }}"
                                                    class="border rounded-md w-full px-3 py-2 fsg2"
                                                    name="fsg2">
                                                <option value="" selected disabled>انتخاب کنید</option>
                                                <option value="علمی پژوهشی">علمی پژوهشی</option>
                                                <option value="علمی ترویجی">علمی ترویجی</option>
                                                <option value="فرهنگی تبلیغی">فرهنگی تبلیغی</option>
                                                <option value="تقریر">تقریر</option>
                                            </select>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </main>
@endsection
