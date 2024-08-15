@extends('layouts.layout')

@section('title')
    Doctor
@endsection
@section('content')
    <style>
        .hidden {
            display: none;
        }

        .active {
            border-bottom: 2px solid blue;
            color: blue;
        }

        .patient {
            border: 1px solid #F2ECEC;
            box-shadow: 0px 0px 5px 0px #0000001A;

        }

        .shad {
            box-shadow: 0px 4px 4px 0px #0000001A;

        }
    </style>
    <div class="md:mx-4 mt-12">

        <div class="shadow-dark mt-3  rounded-xl   bg-white p-5">
            <div class="xl:flex flex-column gap-5">

                <div class="xl:w-[250px] w-full xl:h-[100%] h-[300px] overflow-y-auto font-inter">
                    <h1 class="text-2xl font-bold">@lang('lang.Patients')</h1>
                    <p class="font-inter text-sm pb-3">@lang('lang.Date') : {{ $data['date'] }}</p>



                    <div>


                        <div class="text-sm font-medium text-center text-gray-500 ">
                            <ul class="flex justify-between flex-wrap -mb-px">
                                <li class="me-2">
                                    <a href="#" class="inline-block b p-2 active font-semibold" id="queuePatients"
                                        onclick="showTab(event, 'queue')">@lang('lang.In_Queue')</a>
                                </li>
                                <li class="me-2">
                                    <a href="#" class="inline-block b p-2 font-semibold" id="checkedPatients"
                                        onclick="showTab(event, 'checked')">@lang('lang.Checked')</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-3" id="queue">
                            <form action="#" method="get" class="pt-3 relative">
                                <input placeholder="@lang('lang.Patient_Tocken')" type="text" name="search" id="searchPatient"
                                    class="rounded-[5px] w-full bg-[#d9d9d963] border-0 focus:border-0">
                                <svg class="w-6 h-6 absolute right-2 top-5 pt-0.5 text-[#6d6d6d] dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>
                            </form>
                            @foreach ($data['patients'] as $patientGroup)
                                @foreach ($patientGroup as $patient)
                                    <a href="../reception/fetchpatientData/{{ $patient->id }}">
                                        <div
                                            class="patient flex cursor-pointer items-center gap-5 h-[60px] my-5 rounded-[5px] w-full active:bg-primary active:text-white active:duration-75  bg-[#d9d9d963]">
                                            <div class="w-[10%] bg-primary rounded-l-[5px] h-[100%]"></div>
                                            <div>
                                                <h2 class="font-semibold ps-0.5">{{ $patient->name }}</h2>
                                                <h3 class="text-dark patientToken"># {{ $patient->id }}</h3>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @endforeach

                            <div id="error" class="text-center mt-10 hidden">
                                <p>No Data Found</p>
                            </div>
                        </div>
                        <div class="mt-3 hidden" id="checked">
                            <form action="#" method="get" class="pt-3 relative">
                                <input placeholder="@lang('lang.Patient_Tocken')" type="text" name="search" id="searchPatient2"
                                    class="rounded-[5px] w-full bg-[#d9d9d963] border-0 focus:border-0">
                                <svg class="w-6 h-6 absolute right-2 top-5 pt-0.5 text-[#6d6d6d] dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>
                            </form>
                            @foreach ($data['checked'] as $n)
                                @foreach ($n as $checked)
                                    <div
                                        class="patient2 cursor-pointer flex items-center gap-5 h-[60px] my-5 rounded-[5px] w-full bg-[#d9d9d963]">
                                        <div class="w-[10%] bg-primary rounded-l-[5px] h-[100%]">

                                        </div>
                                        <div>
                                            <h2 class="font-semibold ps-0.5">{{ $checked->name }}</h2>
                                            <h3 class="text-dark patientToken2"># {{ $checked->id }}</h3>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                            <div id="error2" class="text-center mt-10 hidden">
                                <p>No Data Found</p>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="w-full xl:mt-0 mt-5">
                    {{-- Pateint Details --}}
                    <div class="h-[100px] w-[100%] bg-white  rounded-[5px] flex items-center justify-between">

                        <div class="flex items-center">
                            <div class="bg-[#f26ecd91] h-[74px] w-[74px] rounded-full ms-3">
                                <img src="{{ asset('images/user.png') }}" class="h-[100%] w-full rounded-full"
                                    alt="">
                            </div>
                            <div class="ps-10">
                                <h2 class="font-semibold capitalize text-2xl ps-0.5 patientName">@lang('lang.Patient_Name')</h2>
                                <h3 class="text-dark patientId">#010203</h3>
                            </div>
                        </div>

                        <div class="flex capitalize">
                            <div class="age">
                                <h2 class="font-semibold text-xl px-10 ps-0.5 patientAge">28</h2>
                            </div>
                            <div class="gender">
                                <h2 class="font-semibold patientGender text-xl px-10 ps-0.5">Female</h2>
                            </div>
                            <div class="Blood">
                                <h2 class="font-semibold patientBloodGroup text-xl px-10 ps-0.5">B+</h2>
                            </div>
                        </div>


                    </div>

                    <div class="xl:flex  xl:flex-row-reverse  gap-5 ">



                        <div class="xl:w-[25%] w-full  min-h-[70vh] mt-3 rounded-md  bg-white p-5">
                            <form action="#" method="get" class="pt-3 relative">
                                <select name="" id=""
                                    class="rounded-[5px] w-full bg-[#6d6d6d] border-0 focus:border-0">
                                    <option value="Search Pharmacy" selected disabled>Select Pharmacy</option>
                                </select>


                            </form>

                            <div>


                                <div class="text-sm font-medium text-center text-dark-500 ">
                                    <ul class="flex justify-between flex-wrap -mb-px">
                                        <li class="me-2">
                                            <a href="#" class="inline-block a p-2 font-semibold active"
                                                id="medicineTab" onclick="showTab2(event, 'medicines')">Medicines</a>
                                        </li>
                                        <li class="me-2">
                                            <a href="#" class="inline-block a p-2 font-semibold" id="testTab"
                                                onclick="showTab2(event, 'tests')">Tests</a>
                                        </li>
                                        <li class="me-2">
                                            <a href="#" class="inline-block a p-2 font-semibold"
                                                id="checkedPatients" onclick="showTab2(event, 'ad')">Ad</a>
                                        </li>
                                    </ul>
                                </div>
                                <form action="#" method="get" class="pt-3 relative">
                                    <input placeholder="@lang('lang.Patient_Tocken')" type="text" name="search"
                                        id="searchMedicine"
                                        class="rounded-[5px] w-full bg-[#d9d9d963] border-0 focus:border-0">
                                    <svg class="w-6 h-6 absolute right-2 top-5 pt-0.5 text-[#6d6d6d] dark:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                    </svg>
                                </form>
                                <div class="mt-3" id="medicines">
                                    @foreach ($data['medicine'] as $item)
                                        <div class="py-2 cursor-pointer border-b medicine"
                                            data-modal-target="addcustomermodal" data-modal-toggle="addcustomermodal">
                                            <h2 class="me dicineName">{{ $item->name }}</h2>
                                        </div>
                                    @endforeach
                                    <div id="error3" class="text-center mt-10  hidden ">
                                        <p>No Data Found</p>
                                    </div>
                                </div>
                                <div class="mt-3 hidden" id="tests">

                                    <div
                                        class="patient flex items-center gap-5 h-[60px] my-5 rounded-[5px] w-full bg-[#d9d9d963]">
                                        <div class="w-[10%] bg-primary rounded-l-[5px] h-[100%]">

                                        </div>
                                        <div>
                                            <h2 class="font-semibold ps-0.5">Maryam</h2>
                                            <h3 class="text-dark">#010203</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 hidden" id="ad">
                                    <div
                                        class="patient flex items-center gap-5 h-[60px] my-5 rounded-[5px] w-full bg-[#d9d9d963]">
                                        <div class="w-[10%] bg-primary rounded-l-[5px] h-[100%]">

                                        </div>
                                        <div>
                                            <h2 class="font-semibold ps-0.5">Maryam</h2>
                                            <h3 class="text-dark">#010203</h3>
                                        </div>
                                    </div>
                                    <div
                                        class="patient flex items-center gap-5 h-[60px] my-5 rounded-[5px] w-full bg-[#d9d9d963]">
                                        <div class="w-[10%] bg-primary rounded-l-[5px] h-[100%]">

                                        </div>
                                        <div>
                                            <h2 class="font-semibold ps-0.5">Maryam</h2>
                                            <h3 class="text-dark">#010203</h3>
                                        </div>
                                    </div>
                                    <div
                                        class="patient flex items-center gap-5 h-[60px] my-5 rounded-[5px] w-full bg-[#d9d9d963]">
                                        <div class="w-[10%] bg-primary rounded-l-[5px] h-[100%]">

                                        </div>
                                        <div>
                                            <h2 class="font-semibold ps-0.5">Maryam</h2>
                                            <h3 class="text-dark">#010203</h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="xl:w-[75%] w-full  min-h-[70vh] mt-3 rounded-md  bg-white">

                            <h1 class="text-xl font-bold p-5">Medicine Prescribed</h1>

                            <div
                                class=" bg-[#d9d9d963] px-5 w-[95%] shad rounded-sm mx-auto grid xl:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-3">

                                <div class="bg-white rounded-md shd my-3 min-h-[70px] w-full text-center">
                                    <h2 class="font-semibold  pt-3">Medicine Name</h2>
                                    <h3 class="text-dark">#010203</h3>
                                </div>
                                <div class="bg-white rounded-md shd my-3 min-h-[70px] w-full text-center">
                                    <h2 class="font-semibold  pt-3">Medicine Name</h2>
                                    <h3 class="text-dark">#010203</h3>
                                </div>
                                <div class="bg-white rounded-md shd my-3 min-h-[70px] w-full text-center">
                                    <h2 class="font-semibold  pt-3">Medicine Name</h2>
                                    <h3 class="text-dark">#010203</h3>
                                </div>
                                <div class="bg-white rounded-md shd my-3 min-h-[70px] w-full text-center">
                                    <h2 class="font-semibold  pt-3">Medicine Name</h2>
                                    <h3 class="text-dark">#010203</h3>
                                </div>

                            </div>
                            <h1 class="text-xl font-bold p-5">Test Prescribed</h1>

                            <div
                                class=" bg-[#d9d9d963] px-5 w-[95%]                                                                                                                       rounded-sm mx-auto grid xl:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-3">

                                <div class="bg-white rounded-md shd my-3 min-h-[70px] w-full text-center">
                                    <h2 class="font-semibold  pt-3">Test Name</h2>
                                    <h3 class="text-dark">#010203</h3>
                                </div>
                                <div class="bg-white rounded-md shd my-3 min-h-[70px] w-full text-center">
                                    <h2 class="font-semibold  pt-3">Test Name</h2>
                                    <h3 class="text-dark">#010203</h3>
                                </div>
                                <div class="bg-white rounded-md shd my-3 min-h-[70px] w-full text-center">
                                    <h2 class="font-semibold  pt-3">Test Name</h2>
                                    <h3 class="text-dark">#010203</h3>
                                </div>
                                <div class="bg-white rounded-md shd my-3 min-h-[70px] w-full text-center">
                                    <h2 class="font-semibold  pt-3">Test Name</h2>
                                    <h3 class="text-dark">#010203</h3>
                                </div>

                            </div>

                            <h1 class="text-xl font-bold p-5">Note</h1>

                            <form action="#" method="post" class="px-5">
                                <textarea name="note" id="note" class="w-full min-h-[10vh] rounded-md focus:border-dark  border-dark"
                                    placeholder="@lang('lang.Type_Here')"></textarea>
                                <div class="grid grid-cols-3 gap-3">
                                    <div>
                                        <input type="text" name="addtitional_rs" id="addtitional_rs"
                                            class=" w-full border-dark focus:border-dark rounded-[5px]"
                                            placeholder="@lang('lang.Additional_Rs').">
                                    </div>
                                    <div>
                                        <input type="text" name="addtitional_rs" id="addtitional_rs"
                                            class=" w-full border-dark focus:border-dark rounded-[5px]"
                                            placeholder="@lang('lang.Discount').">
                                    </div>
                                    <div>
                                        <input type="text" name="addtitional_rs" id="addtitional_rs"
                                            class=" w-full border-dark focus:border-dark rounded-[5px]"
                                            placeholder="@lang('lang.Refrence_(if_any)').">
                                    </div>
                                </div>


                                <h1 class="text-xl font-bold pt-5 pb-2">Follow up:</h1>

                                <div class="grid grid-cols-3 gap-3">
                                    <div>
                                        <input type="date" name="addtitional_rs" id="addtitional_rs"
                                            class=" w-full border-dark focus:border-dark rounded-[5px] text-dark">
                                    </div>
                                    <div>
                                        <button
                                            class="bg-primary w-full h-[100%] text-white rounded-md flex justify-center items-center gap-1">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                                            </svg>

                                            @lang('lang.Save')</button>
                                    </div>
                                    <div>
                                        <button
                                            class="bg-secondary w-full h-[100%] text-white rounded-md flex justify-center items-center gap-1">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                                    d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
                                            </svg>

                                            @lang('lang.Print')</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

    {{--  --}}

    <div id="addcustomermodal" data-modal-backdrop="static"
        class="fixed inset-0 overflow-y-auto flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="fixed inset-0 transition-opacity">
            <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
        </div>
        <div class="relative p-4 w-full   max-w-lg max-h-full ">
            @if (isset($user))
                <form action="../updateUserCar/{{ $user->id }}" method="post" enctype="multipart/form-data">
                @else
                    <form id="staffData" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        @lang('lang.Add_Staff')
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addcustomermodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>


                <div class="px-10 pt-10 pb-5">
                    <div class="flex justify-between text-xl gap-10">
                        <div>
                            <input type="checkbox" name="od"
                                class="h-5 w-5 first text-green-600 rounded border-gray-300 focus:ring-green-500"
                                id="od" value="onetime">
                            <label for="od">OD</label>
                        </div>
                        <div>
                            <input type="checkbox" name="bd"
                                class="h-5 w-5 first text-green-600 rounded border-gray-300 focus:ring-green-500"
                                id="bd" checked value="twotimes">
                            <label for="bd">BD</label>
                        </div>
                        <div>
                            <input type="checkbox" name="tds"
                                class="h-5 w-5 first text-green-600 rounded border-gray-300 focus:ring-green-500"
                                id="tds" value="threetimes">
                            <label for="tds">TDS</label>
                        </div>
                    </div>

                    <div class="mt-5">
                        <label class="text-[14px] font-normal" for="days">@lang('lang.Days')</label>
                        <select name="days" id="days">
                            <option value="monday">@lang('lang.Monday')</option>
                            <option value="tuesday">@lang('lang.Tuesday')</option>
                            <option value="wednesday">@lang('lang.Wednesday')</option>
                            <option value="thursday">@lang('lang.Thursday')</option>
                            <option value="friday">@lang('lang.Friday')</option>
                            <option value="saturday">@lang('lang.Saturday')</option>
                            <option value="sunday">@lang('lang.Sunday')</option>
                        </select>
                    </div>
                    <div class="mt-5">
                        <div class="flex-col">
                            <div class="mt-3 flex justify-between">
                                <div>
                                    <input type="checkbox" name="morning"
                                        class="h-6 w-6  text-green-600 rounded border-gray-300 focus:ring-green-500"
                                        id="morning" checked value="morning">
                                    <label for="morning">@lang('lang.Morning')</label>
                                </div>
                                <div class="flex items-center gap-2 text-md">
                                    <button type="button"
                                        class="bg-red-600 decrement text-white font-bold h-7 w-7 rounded-md">-</button>
                                    <input type="number" value="0" min="0"
                                        class="text-center bg-gray-300 text-gray-900 w-16 font-semibold h-7  quantity rounded"
                                        name="mor_med">
                                    <button type="button"
                                        class="bg-green-600 increment text-white font-bold h-7 w-7 rounded-md">+</button>
                                </div>

                            </div>
                            <div class="mt-3 flex justify-between">
                                <div>
                                    <input type="checkbox" name="afternoon"
                                        class="h-6 w-6  text-green-600 rounded border-gray-300 focus:ring-green-500"
                                        id="afternoon" value="afternoon">
                                    <label for="afternoon">@lang('lang.Afternoon')</label>
                                </div>
                                <div class="flex items-center gap-2 text-md">
                                    <button type="button"
                                        class="bg-red-600 decrement text-white font-bold h-7 w-7 rounded-md">-</button>
                                    <input type="number" value="0" min="0"
                                        class="text-center bg-gray-300 text-gray-900 w-16 font-semibold h-7  quantity rounded"
                                        name="aft_med">
                                    <button type="button"
                                        class="bg-green-600 increment text-white font-bold h-7 w-7 rounded-md">+</button>
                                </div>
                            </div>
                            <div class="mt-3 flex justify-between">
                                <div>
                                    <input type="checkbox" name="night"
                                        class="h-6 w-6  text-green-600 rounded border-gray-300 focus:ring-green-500"
                                        id="night">
                                    <label for="night">@lang('lang.Night')</label>
                                </div>
                                <div class="flex items-center gap-2 text-md">
                                    <button type="button"
                                        class="bg-red-600 decrement text-white font-bold h-7 w-7 rounded-md">-</button>
                                    <input type="number" value="0" min="0"
                                        class="text-center bg-gray-300 text-gray-900 w-16 font-semibold h-7  quantity rounded"
                                        name="night_med">
                                    <button type="button"
                                        class="bg-green-600 increment text-white font-bold h-7 w-7 rounded-md">+</button>
                                </div>
                            </div>

                            <div class="flex-col items-start  mt-5">
                                <label>Note:</label>
                                <textarea class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   min-h-[80px] text-[14px]"
                                    placeholder="Write Here" name="note" placeholder="@lang('lang.Note')"></textarea>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="flex justify-end px-10">
                    <button class="bg-primary text-white py-2 px-6 mb-4 rounded-[4px]   uaddBtn  font-semibold "
                        id="addBtn">
                        <div class=" text-center hidden" id="spinner">
                            <svg aria-hidden="true"
                                class="w-5 h-5 mx-auto text-center text-gray-200 animate-spin fill-primary"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                        </div>
                        <div id="text">
                            @lang('lang.Save')
                        </div>

                    </button>
                </div>

            </div>
        </div>
        </form>
        <div>

        </div>

    </div>
    </div>
@endsection



@section('js')
    {{-- <script>
    $('.updateBtn').click(function() {
        console.log("ghgh");
        var updateId = $(this).attr('updateId');
        var url = "/fetchdataphramacy/" + updateId;
        console.log(updateId)
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(response) {
                var phamacy = response.phamacy;
                $('#update_id').val(phamacy.id);
                $('#name').val(phamacy.name);
                $('#phone').val(phamacy.phone);
                $('#telephone').val(phamacy.telephone);
                $('#email').val(phamacy.email);
                $('#address').val(phamacy.address);
                $('#fname').val(phamacy.fname);
                $('#l_name').val(phamacy.l_name);
                $('#datebirth').val(phamacy.datebirth);
                $('#phoneno').val(phamacy.phoneno);
                $('#email').val(phamacy.email);
                $('#city').val(phamacy.city);
                $('#Addresses').val(phamacy.addresses);
                $('#license').val(phamacy.license);
                $('#work').val(phamacy.work);
                $('.update_phramcey').attr('action', '/phramacyupdate/' + phamacy.id);
            },
        });
    });

    function showAlert() {
        var myText = "Are You sure delete this data";
        alert(myText);


    }
</script> --}}

    <script>
        $(document).ready(function() {
            // Increment quantity
            $('.increment').on('click', function() {
                var $input = $(this).closest('div').find('input.quantity');
                var value = parseInt($input.val());
                $input.val(value + 1);
            });

            // Decrement quantity
            $('.decrement').on('click', function() {
                var $input = $(this).closest('div').find('input.quantity');
                var value = parseInt($input.val());
                if (value > 0) {
                    $input.val(value - 1);
                }
            });
        });



        $('.first').on('change', function() {
            $('.first').not(this).prop('checked', false);
        });
        $('.second').on('change', function() {
            $('.second').not(this).prop('checked', false);
        });
        $(document).ready(function() {
            function searchFunction(searchInputId, itemClass, tokenClass, errorId) {
                $(searchInputId).on('input', function() {
                    var searchValue = $(this).val().toLowerCase();
                    var searchChars = searchValue.split('');
                    var matchFound = false;

                    if (searchValue != '') {
                        $(itemClass).each(function() {
                            var tokenText = $(this).find(tokenClass).text().toLowerCase();
                            var match = false;

                            for (var i = 0; i < searchChars.length; i++) {
                                if (tokenText.includes(searchChars[i])) {
                                    match = true;
                                    break;
                                }
                            }

                            if (match) {
                                $(this).show();
                                matchFound = true;
                            } else {
                                $(this).hide();
                            }
                        });

                        if (matchFound) {
                            $(errorId).hide();
                        } else {
                            $(errorId).show();
                        }
                    } else {
                        $(itemClass).each(function() {
                            $(this).show();
                        });
                        $(errorId).hide();
                    }
                });
            }

            // Applying the searchFunction to each input
            searchFunction('#searchPatient', '.patient', '.patientToken', '#error');
            searchFunction('#searchPatient2', '.patient2', '.patientToken2', '#error2');
            searchFunction('#searchMedicine', '.medicine', '.medicineName', '#error3');
        });


        function showTab(event, tabId) {
            event.preventDefault();
            document.getElementById('queue').classList.add('hidden');
            document.getElementById('checked').classList.add('hidden');
            // Hide all tab contents

            document.getElementById(tabId).classList.remove('hidden');

            var tabs = document.querySelectorAll('.b');
            tabs.forEach(function(tab) {
                tab.classList.remove('active');
            });

            event.currentTarget.classList.add('active');
        }

        function showTab2(event, tabId) {
            event.preventDefault();
            document.getElementById('medicines').classList.add('hidden');
            document.getElementById('tests').classList.add('hidden');
            document.getElementById('ad').classList.add('hidden');

            // Show the selected tab content
            document.getElementById(tabId).classList.remove('hidden');

            var tabs = document.querySelectorAll('.a');
            tabs.forEach(function(tab) {
                tab.classList.remove('active');
            });

            event.currentTarget.classList.add('active');
        }



        $(document).ready(function() {
            $('.patient').on('click', function(e) {
                e.preventDefault(); // Prevent the default anchor tag behavior

                var patientId = $(this).closest('a').attr('href').split('/')
                    .pop(); // Extract patient ID from the href

                // AJAX request to fetch patient details
                $.ajax({
                    url: '/reception/fetchpatientData/' + patientId,
                    type: 'GET',
                    success: function(response) {
                        if (response.patient) {
                            // Update the details section with the fetched data
                            $('.patientName').text(response.patient.name);
                            $('.patientId').text('#' + response.patient.id);
                            $('.patientAge').text(response.patient.age);
                            $('.patientGender').text(response.patient.gender);
                            $('.patientBloodGroup').text(response.patient.blood_group);
                        } else {
                            alert('Patient data not found');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching patient data:', error);
                    }
                });
            });
        });
    </script>
@endsection
