@extends('layouts.layout')
@section('title')
    Patient Registration
@endsection
@section('content')
    <div class="md:mx-4 mt-12">

        <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
            <div>
                <div class="flex justify-end sm:justify-between  items-center px-[20px] mb-3">
                    <h3 class="text-[20px] text-black hidden sm:block">@lang('lang.Patient_Registration')</h3>
                    <div>

                        <button data-modal-target="addcustomermodal" data-modal-toggle="addcustomermodal"
                            class="bg-primary cursor-pointer text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                            @lang('lang.Add_Patient')</button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table id="datatable">
                        <thead class="py-1 bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap ">@lang('lang.STN')</th>
                                <th class="whitespace-nowrap ">@lang('lang.Token')</th>
                                <th class="whitespace-nowrap ">@lang('lang.Name')</th>
                                <th class="whitespace-nowrap ">@lang('lang.Phone_No')</th>
                                <th class="whitespace-nowrap ">@lang('lang.Email')</th>
                                <th class="whitespace-nowrap ">@lang('lang.Age')</th>
                                <th class="whitespace-nowrap ">@lang('lang.Disease')</th>
                                <th class="flex  justify-center">@lang('lang.Action')</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($patients as $data)
                                <tr class="capitalize">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->id }}</td>
                                    <td> {{ $data->name }} </td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->age }}</td>
                                    <td>{{ $data->disease }}</td>
                                    <td>
                                        <div class="flex gap-5 items-center justify-center">


                                            <div data-modal-target="assignDoctor" data-modal-toggle="assignDoctor"
                                                class="bg-primary size-9 rounded-full cursor-pointer  flex justify-center items-center text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                    class="size-5 fill-white">
                                                    <path
                                                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1l0 50.8c27.6 7.1 48 32.2 48 62l0 40c0 8.8-7.2 16-16 16l-16 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l0-24c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 24c8.8 0 16 7.2 16 16s-7.2 16-16 16l-16 0c-8.8 0-16-7.2-16-16l0-40c0-29.8 20.4-54.9 48-62l0-57.1c-6-.6-12.1-.9-18.3-.9l-91.4 0c-6.2 0-12.3 .3-18.3 .9l0 65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7l0-59.1zM144 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                                                </svg>
                                            </div>

                                            <a href="{{ route('printPatient', $data->id) }}" target="_Blank">
                                                <div class="bg-secondary w-9 rounded-full p-1.5 text-white">
                                                    <svg class="w-6 h-6 a-gray-800 dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                            d="M8 3a2 2 0 0 0-2 2v3h12V5a2 2 0 0 0-2-2H8Zm-3 7a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h1v-4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v4h1a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2H5Zm4 11a1 1 0 0 1-1-1v-4h8v4a1 1 0 0 1-1 1H9Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </a>

                                            <a href="">
                                                <button data-modal-target="Updateproductmodal"
                                                    data-modal-toggle="Updateproductmodal"
                                                    class=" updateBtn cursor-pointer  w-[42px]"
                                                    updateId="{{ $data->id }}"><img width="38px"
                                                        src="{{ asset('images/icons/edit.svg') }}" alt="update"></button>
                                            </a>
                                            <a href="{{ route('delPatient', $data->id) }}">
                                                <button data-modal-target="deleteData" data-modal-toggle="deleteData"
                                                    class="delButton" delId="{{ $data->id }}">
                                                    <img width="38px" src="{{ asset('images/icons/delete.svg') }}"
                                                        alt="delete" class="cursor-pointer">
                                                </button>
                                            </a>


                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>




    {{-- ============ add  customer modal  =========== --}}
    <div id="addcustomermodal" data-modal-backdrop="static"
        class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="fixed inset-0 transition-opacity">
            <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
        </div>
        <div class="relative p-4 w-full   max-w-6xl max-h-full ">
            @if (isset($user))
                <form action="../updateUserCar/{{ $user->id }}" method="post" enctype="multipart/form-data">
                @else
                    <form id="patientData" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        @lang('lang.Add_Patient')
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addcustomermodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <div class="grid md:grid-cols-3 gap-6 mx-6 my-6">
                    <div>
                        <label class="text-[14px] font-normal" for="name">@lang('lang.Full_Name')</label>
                        <input type="text" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="name" id="name" value="{{ $user->name ?? '' }}"
                            placeholder=" @lang('lang.Full_Name_Here')">
                    </div>
                    <div>
                        <label class="text-[14px] font-normal" for="father_husband_name">@lang('lang.Father_Husband_Name')</label>
                        <input type="text" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="father_husband_name" id="father_husband_name" value="{{ $user->name ?? '' }}"
                            placeholder=" @lang('lang.Name_Here')">
                    </div>
                    <div>
                        <label class="text-[14px] font-normal" for="disease">@lang('lang.Disease')</label>
                        <input type="text" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="disease" id="disease" value="{{ $user->name ?? '' }}"
                            placeholder="@lang('lang.Disease_Here')">
                    </div>
                    <div>
                        <label class="text-[14px] font-normal" for="phone">@lang('lang.Phone_No')</label>
                        <input type="number" min="0" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="phone" id="phone" value="{{ $user->name ?? '' }}"
                            placeholder=" @lang('lang.Phone_No_Here')">
                    </div>
                    <div>
                        <label class="text-[14px] font-normal" for="user_email">@lang('lang.Email_Address')</label>
                        <input type="email" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="email" id="user_email" placeholder=" @lang('lang.Email_Address_Here')"
                            value="{{ $user->email ?? '' }}">
                    </div>
                    <div>
                        <label class="text-[14px] font-normal" for="dob">@lang('lang.Date_Of_Birth')</label>
                        <input type="date" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="dob" id="dob" value="{{ $user->name ?? '' }}">
                    </div>
                    <div>
                        <label class="text-[14px] font-normal" for="cnic">@lang('lang.CNIC')</label>
                        <input type="number" min="0" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="cnic" id="cnic" value="{{ $user->name ?? '' }}"
                            placeholder=" @lang('lang.CNIC_Here')">
                    </div>
                    <div>
                        <label class="text-[14px] font-normal" for="age">@lang('lang.Age')</label>
                        <input type="number" min="0" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="age" id="age" value="{{ $user->name ?? '' }}"
                            placeholder=" @lang('lang.Age_Here')">
                    </div>
                    <div>
                        <label class="text-[14px] font-normal" for="gender">@lang('lang.Gender')</label>
                        <select name="gender" id="gender">
                            <option value="male">@lang('lang.Male')</option>
                            <option value="female">@lang('lang.Female')</option>
                            <option value="others">@lang('lang.Others')</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-[14px] font-normal" for="material_status">@lang('lang.Martial_Status')</label>
                        <select name="material_status" id="material_status">
                            <option value="married">@lang('lang.Married')</option>
                            <option value="single">@lang('lang.Single')</option>
                            <option value="others">@lang('lang.Others')</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-[14px] font-normal" for="relation">@lang('lang.Relation')</label>
                        <select name="relation" id="relation">
                            <option value="male">@lang('lang.Married')</option>
                            <option value="female">@lang('lang.Single')</option>
                            <option value="others">@lang('lang.Others')</option>
                        </select>
                    </div>


                    <div>
                        <label class="text-[14px] font-normal" for="city">@lang('lang.City')</label>
                        <input type="text" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="city" id="city" placeholder=" @lang('lang.City_Here')"
                            value="{{ $user->email ?? '' }}">
                    </div>



                    <div class="col-span-3">
                        <label class="text-[14px] font-normal" for="address">@lang('lang.Address')</label>
                        <textarea class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   min-h-[80px] text-[14px]" name="address"
                            id="address" placeholder="@lang('lang.Address_Here')"></textarea>
                    </div>




                </div>



                <div class="flex justify-end ">

                    <button class="bg-primary text-white py-2 px-6 my-4 rounded-[4px]  mx-6 uaddBtn  font-semibold "
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
                            @lang('lang.Save&Print')
                        </div>

                    </button>

                </div>
            </div>
            </form>
            <div>

            </div>

        </div>
    </div>
    {{-- ============ Assign Doctor modal  =========== --}}
    <div id="assignDoctor" data-modal-backdrop="static"
        class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="fixed inset-0 transition-opacity">
            <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
        </div>
        <div class="relative p-4 w-full   max-w-6xl max-h-full ">
            @if (isset($user))
                <form action="../updateUserCar/{{ $user->id }}" method="post" enctype="multipart/form-data">
                @else
                    <form id="patientData" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        @lang('lang.Get_Appointment')
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="assignDoctor">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>


                <div class="p-10">
                    <div class="grid grid-cols-2">
                        <div>
                            <label class="text-[14px] font-normal" for="doctor">@lang('lang.Doctor')</label>
                            <select name="doctor" id="doctor">
                                <option disabled selected>@lang('lang.Select_Doctor')</option>
                                @foreach ($doctors as $data)
                                    <option value="{{ $data->id }}"> {{ $data->name }}
                                        ({{ $data->specialization }})
                                    </option>
                                @endforeach
                            </select>
                            <div>

                                <button
                                    class="bg-primary text-white py-2 px-6 my-4 rounded-[4px]  mx-auto uaddBtn  font-semibold "
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
                                        @lang('lang.Get_Appointment')
                                    </div>

                                </button>
                            </div>
                        </div>
                        <div class="px-5">
                            <table class="w-full">
                                <thead class="bg-primary text-white">
                                    <th class="py-2">@lang('lang.OPD')</th>
                                    <th class="py-2">@lang('lang.Doctor')</th>
                                    <th class="py-2">@lang('lang.Price')</th>
                                    <th class="py-2">@lang('lang.Action')</th>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-dark">
                                        <td>hsag</td>
                                        <td>M-Arham Waheed</td>
                                        <td>85000</td>
                                        <td>Delete</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="flex justify-end ">

                    <button class="bg-primary text-white py-2 px-6 my-4 rounded-[4px]  mx-6 uaddBtn  font-semibold "
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
                            @lang('lang.Save&Print')
                        </div>

                    </button>

                </div>
            </div>
            </form>
            <div>

            </div>

        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.delButton').click(function() {
                var id = $(this).attr('delId');
                $('#delLink').attr('href', '../patient/delete-patient/' + id);
            });
            // insert data
            $("#patientData").submit(function(event) {
                var url = "../reception/patient";
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#spinner').removeClass('hidden');
                        $('#text').addClass('hidden');
                        $('#addBtn').attr('disabled', true);
                    },
                    success: function(response) {
                        let patientId = response.patientId;
                        window.location.href = '../reception/patient/print-detail/' + patientId;


                    },
                    error: function(jqXHR) {
                        let response = JSON.parse(jqXHR.responseText);
                        console.log("error");
                        Swal.fire(
                            'Warning!',
                            response.message,
                            'warning'
                        );

                        $('#text').removeClass('hidden');
                        $('#spinner').addClass('hidden');
                        $('#addBtn').attr('disabled', false);
                    }
                });
            });





        });
    </script>
@endsection
