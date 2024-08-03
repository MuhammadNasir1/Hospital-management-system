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
                    <p class="font-inter text-sm">@lang('lang.Date') : {{ $data['date'] }}</p>

                    <form action="#" method="get" class="pt-3 relative">
                        <input placeholder="@lang('lang.Patient_Tocken')" type="text" name="search" id="search"
                            class="rounded-[5px] w-full bg-[#d9d9d963] border-0 focus:border-0">
                        <svg class="w-6 h-6 absolute right-2 top-5 pt-0.5 text-[#6d6d6d] dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>

                    </form>

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
                            @foreach ($data['patients'] as $patientGroup)
                                @foreach ($patientGroup as $patient)
                                    <div
                                        class="patient flex items-center gap-5 h-[60px] my-5 rounded-[5px] w-full bg-[#d9d9d963]">
                                        <div class="w-[10%] bg-primary rounded-l-[5px] h-[100%]">

                                        </div>
                                        <div>
                                            <h2 class="font-semibold ps-0.5">{{ $patient->name }}</h2>
                                            <h3 class="text-dark"># {{ $patient->id }}</h3>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                        <div class="mt-3 hidden" id="checked">
                            @foreach ($data['checked'] as $n)
                                @foreach ($n as $checked)
                                    <div
                                        class="patient flex items-center gap-5 h-[60px] my-5 rounded-[5px] w-full bg-[#d9d9d963]">
                                        <div class="w-[10%] bg-primary rounded-l-[5px] h-[100%]">

                                        </div>
                                        <div>
                                            <h2 class="font-semibold ps-0.5">{{ $checked->name }}</h2>
                                            <h3 class="text-dark"># {{ $checked->id }}</h3>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach


                        </div>

                    </div>
                </div>
                <div class="w-full xl:mt-0 mt-5">
                    {{-- Pateint Details --}}
                    <div class="h-[100px] w-[100%] bg-[#F0F6FF] shad rounded-[5px] flex items-center justify-between">

                        <div class="flex items-center">
                            <div class="bg-[#f26ecd91] h-[74px] w-[74px] rounded-full ms-3">
                                <img src="{{ asset('images/user.png') }}" class="h-[100%] w-full rounded-full"
                                    alt="">
                            </div>
                            <div class="ps-10">
                                <h2 class="font-semibold text-2xl ps-0.5">Maryam</h2>
                                <h3 class="text-dark">#010203</h3>
                            </div>
                        </div>

                        <div class="flex ">
                            <div class="age">
                                <h2 class="font-semibold text-xl px-10 ps-0.5">28</h2>
                            </div>
                            <div class="gender">
                                <h2 class="font-semibold text-xl px-10 ps-0.5">Female</h2>
                            </div>
                            <div class="Blood">
                                <h2 class="font-semibold text-xl px-10 ps-0.5">B+</h2>
                            </div>
                        </div>
                        <div class="xl:w-[20%] xl:bg-red-300 bg-blue-700">

                        </div>

                    </div>

                    <div class="xl:flex  xl:flex-row-reverse  gap-5 ">



                        <div class="xl:w-[25%] w-full  min-h-[70vh] mt-3 rounded-md shad bg-white p-5">
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
                                            <a href="#" class="inline-block a p-2 font-semibold" id="checkedPatients"
                                                onclick="showTab2(event, 'ad')">Ad</a>
                                        </li>
                                    </ul>
                                </div>
                                <form action="#" method="get" class="pt-3 relative">
                                    <input placeholder="@lang('lang.Search_Patient_Tocken')" type="text" name="search" id="search"
                                        class="rounded-[5px] w-full bg-[#d9d9d963] border-0 focus:border-0">
                                    <svg class="w-6 h-6 absolute right-2 top-5 pt-0.5 text-dark dark:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                    </svg>

                                </form>
                                <div class="mt-3" id="medicines">
                                    @foreach ($data['medicine'] as $item)
                                        <div class="py-2 border-b">
                                            <h2 class="">{{ $item->name }}</h2>
                                        </div>
                                    @endforeach
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
                        <div class="xl:w-[75%] w-full  min-h-[70vh] mt-3 rounded-md shad bg-white">

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
                                class=" bg-[#d9d9d963] px-5 w-[95%] shad rounded-sm mx-auto grid xl:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-3">

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
    </script>
@endsection
