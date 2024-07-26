@extends('layouts.layout')

@section('title')
    Create Invoice
@endsection


@section('content')
    <div class="lg:mx-4 mt-12">
        <div>
            <h1 class=" font-semibold   text-2xl ">@lang('lang.Create_New_Invoice')</h1>
        </div>

        <div id="reloadDiv" class="shadow-dark mt-3  rounded-xl  bg-white">
            {{-- <form action="../pharmacyOrders" method="post" enctype="multipart/form-data"> --}}
            <form id="orderForm" method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-8">

                    <div class="grid grid-cols-3 mt-3 gap-5">
                        <div class=" w-full">
                            <label class="text-[16px] font-semibold block  text-[#452C88]"
                                for="name">@lang('lang.Customer_Name')</label>
                            <input type="text"
                                class="w-full   border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                                name="customer_name" id="name" placeholder="@lang('lang.Customer_Name')"
                                value="{{ $user['name'] ?? '' }}">
                        </div>
                        <div class=" w-full">
                            <label class="text-[16px] font-semibold block  text-[#452C88]"
                                for="city">@lang('lang.Contact_No')</label>
                            <input type="number" min="0"
                                class="w-full   border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                                name="customer_phone" id="customer_phone" placeholder="@lang('lang.Contact_No')"
                                value="{{ $user['address'] ?? '' }}">
                        </div>
                        <div>
                            <label class="text-[16px] mb-1 mt-1 font-semibold block  text-[#452C88]"
                                for="payment_type">@lang('lang.Payment_Type')</label>
                            <select name="payment_type" id="payment_type">
                                <option value="cash" selected>@lang('lang.Cash_Payment')</option>
                            </select>
                        </div>
                        <div class="">
                            <label class="text-[16px] font-semibold block  text-[#452C88]"
                                for="date">@lang('lang.Date')</label>
                            <input type="date"
                                class="w-full   border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                                name="date" id="date" value="{{ $user['address'] ?? '' }}">

                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full mt-10 text-center" id="medicineTable">
                            <thead class="py-1 bg-primary text-white">
                                <tr class="">
                                    <th class="whitespace-nowrap py-3 px-3">@lang('lang.STN')</th>
                                    <th class="whitespace-nowrap px-3">@lang('lang.Med._Name')</th>
                                    <th class="whitespace-nowrap px-3">@lang('lang.Batch_ID')</th>
                                    <th class="whitespace-nowrap px-3">@lang('lang.Expiry_Date')</th>
                                    <th class="whitespace-nowrap px-3">@lang('lang.Quantity')</th>
                                    <th class="whitespace-nowrap px-3">@lang('lang.Price')</th>
                                    <th class="whitespace-nowrap px-3">@lang('lang.Discount')</th>
                                    <th class="whitespace-nowrap px-3">@lang('lang.Total')</th>
                                    <th class="whitespace-nowrap px-3">@lang('lang.Action')</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="border border-[#DEE2E6] whitespace-nowrap px-3"></td>
                                    <td class="border border-[#DEE2E6] whitespace-nowrap px-3">
                                        <div>Select Medicine</div>
                                        <input type="text"
                                            class="w-full border-0 text-center rounded-[6px] focus:border-primary h-[46px] text-[14px]"
                                            name="medicine_id[]" id="batch" value="" placeholder="Batch ID">
                                    </td>
                                    <td class="border border-[#DEE2E6] whitespace-nowrap px-3">
                                        <div>
                                            <input type="text"
                                                class="w-full border-0 text-center rounded-[6px] focus:border-primary h-[46px] text-[14px]"
                                                name="batch" id="batch" value="" placeholder="Batch ID"
                                                readonly>
                                        </div>
                                    </td>
                                    <td class="border border-[#DEE2E6] whitespace-nowrap px-3">
                                        <div>
                                            <input type="text"
                                                class="w-full border-0 text-center rounded-[6px] focus:border-primary h-[46px] text-[14px]"
                                                name="exp" id="exp" value="" placeholder="Expiry Date"
                                                readonly>
                                        </div>
                                    </td>
                                    <td class="border border-[#DEE2E6] whitespace-nowrap px-3">
                                        <div>
                                            <input type="number" min="0"
                                                class="w-full border-0 text-center rounded-[6px] focus:border-primary h-[46px] text-[14px]"
                                                name="quantity[]" id="quantity" value="" placeholder="Quantity">
                                        </div>
                                    </td>
                                    <td class="border border-[#DEE2E6] whitespace-nowrap px-3">
                                        <div>
                                            <input type="text"
                                                class="w-full border-0 text-center rounded-[6px] focus:border-primary h-[46px] text-[14px]"
                                                name="price" id="price" value="" placeholder="Price" readonly>
                                        </div>
                                    </td>
                                    <td class="border border-[#DEE2E6] whitespace-nowrap px-3">
                                        <div>
                                            <input type="number" min="0"
                                                class="w-full border-0 text-center rounded-[6px] focus:border-primary h-[46px] text-[14px]"
                                                name="discount" id="discount" value="" placeholder="Discount">
                                        </div>
                                    </td>
                                    <td class="border border-[#DEE2E6] whitespace-nowrap px-3">
                                        <div>
                                            <input type="number" min="0"
                                                class="w-full border-0 text-center rounded-[6px] focus:border-primary h-[46px] text-[14px]"
                                                name="total" id="total" value="" placeholder="Total"
                                                readonly>
                                        </div>
                                    </td>
                                    <td class="border border-[#DEE2E6] whitespace-nowrap px-3 flex gap-3 py-1 border-t-0">
                                        <button type="button"
                                            class="bg-primary py-2 px-4 rounded-md text-white font-extrabold add-row">+</button>
                                        <button type="button"
                                            class="bg-secondary py-2 px-4 rounded-md text-white font-extrabold delete-row">-</button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="grid grid-cols-4 mt-10 gap-5">
                            <div></div>
                            <div class=" w-full">
                                <label class="text-[16px] font-semibold block  text-[#452C88]"
                                    for="total_amount">@lang('lang.Total_Amount')</label>
                                <input type="number" min="0"
                                    class="w-full   border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                                    name="total_amount" id="total_amount" placeholder="@lang('lang.Total_Amount')"
                                    value="{{ $user['name'] ?? '' }}">
                            </div>

                            <div class=" w-full">
                                <label class="text-[16px] font-semibold block  text-[#452C88]"
                                    for="total_discount">@lang('lang.Total_Discount')</label>
                                <input type="number" min="0"
                                    class="w-full   border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                                    name="discount" id="total_discount" placeholder="@lang('lang.Total_Discount')"
                                    value="{{ $user['phone'] ?? '' }}">
                            </div>
                            <div class=" w-full">
                                <label class="text-[16px] font-semibold block  text-[#452C88]"
                                    for="net_total">@lang('lang.Grand_total').</label>
                                <input type="number" min="0"
                                    class="w-full   border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                                    name="grand_total" id="net_total" placeholder="@lang('lang.Net_Total')."
                                    value="{{ $user['address'] ?? '' }}">
                            </div>

                        </div>
                        <div class="grid grid-cols-4 mt-4 gap-5">
                            <button
                                class="bg-primary text-white font-bold rounded-lg mt-5 flex justify-center items-center gap-1">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                                </svg>

                                @lang('lang.Save')
                            </button>

                            <button
                                class="bg-secondary text-white font-bold rounded-lg mt-5 flex justify-center items-center gap-1 ">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                        d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
                                </svg>

                                @lang('lang.Print')
                            </button>

                            <div class=" w-full">
                                <label class="text-[16px] font-semibold block  text-[#452C88]"
                                    for="paid_amount">@lang('lang.Paid_Amount')</label>
                                <input type="number" min="0"
                                    class="w-full   border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                                    name="paid_amount" id="paid_amount" placeholder="@lang('lang.Paid_Amount')"
                                    value="{{ $user['phone'] ?? '' }}">
                            </div>
                            <div class=" w-full">
                                <label class="text-[16px] font-semibold block  text-[#452C88]"
                                    for="change">@lang('lang.Change')</label>
                                <input type="number" min="0"
                                    class="w-full   border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                                    name="change" id="change" placeholder="@lang('lang.Change')"
                                    value="{{ $user['address'] ?? '' }}">
                            </div>

                        </div>

                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.add-row').forEach(function(button) {
                button.addEventListener('click', addRow);
            });

            document.querySelectorAll('.delete-row').forEach(function(button) {
                button.addEventListener('click', deleteRow);
            });
        });

        function addRow(event) {
            event.preventDefault();
            const row = event.target.closest('tr');
            const newRow = row.cloneNode(true);

            newRow.querySelectorAll('input').forEach(function(input) {
                input.value = '';
            });

            newRow.querySelectorAll('.add-row').forEach(function(button) {
                button.addEventListener('click', addRow);
            });

            newRow.querySelectorAll('.delete-row').forEach(function(button) {
                button.addEventListener('click', deleteRow);
            });

            row.parentNode.appendChild(newRow);
        }

        function deleteRow(event) {
            event.preventDefault();
            const row = event.target.closest('tr');
            if (document.querySelectorAll('#medicineTable tbody tr').length > 1) {
                row.remove();
            }
        }


        $(document).ready(function() {
            $("#orderForm").submit(function(event) {
                var url = "../pharmacyOrders";
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
                        window.location.href = '../pharmacy/billing';


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
