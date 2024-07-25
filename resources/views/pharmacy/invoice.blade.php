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
            <form action="../updateSettings" method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-8">

                    <div class="grid grid-cols-3 mt-3 gap-5">
                        <div class=" w-full">
                            <label class="text-[16px] font-semibold block  text-[#452C88]"
                                for="name">@lang('lang.Customer_Name')</label>
                            <input type="text"
                                class="w-full   border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                                name="name" id="name" placeholder="@lang('lang.Customer_Name')"
                                value="{{ $user['name'] ?? '' }}">
                        </div>

                        <div class=" w-full">
                            <label class="text-[16px] font-semibold block  text-[#452C88]"
                                for="phone">@lang('lang.Invoice_No')</label>
                            <input type="number" min="0"
                                class="w-full   border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                                name="phone" id="phone" placeholder="@lang('lang.Invoice_No')"
                                value="{{ $user['phone'] ?? '' }}">
                        </div>
                        <div class=" w-full">
                            <label class="text-[16px] font-semibold block  text-[#452C88]"
                                for="city">@lang('lang.Contact_No')</label>
                            <input type="number" min="0"
                                class="w-full   border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                                name="address" id="address" placeholder="@lang('lang.Contact_No')"
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
                        <table class="w-full mt-10 text-center">
                            <thead class="py-1 bg-primary text-white">
                                <tr class="">
                                    <th class="whitespace-nowrap rounded-l-md py-3">@lang('lang.STN')</th>
                                    <th class="whitespace-nowrap">@lang('lang.Med._Name')</th>
                                    <th class="whitespace-nowrap">@lang('lang.Batch_ID')</th>
                                    <th class="whitespace-nowrap">@lang('lang.Expiry_Date')</th>
                                    <th class="whitespace-nowrap">@lang('lang.Quantity')</th>
                                    <th class="whitespace-nowrap">@lang('lang.Price')</th>
                                    <th class="whitespace-nowrap">@lang('lang.Discount')</th>
                                    <th class="whitespace-nowrap">@lang('lang.Total')</th>
                                    <th class="whitespace-nowrap rounded-e-md">@lang('lang.Action')</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="border border-[#DEE2E6]"></td>
                                    <td class="border border-[#DEE2E6]">
                                        <div>
                                            {{-- <select name="payment_type" class="border-0" id="payment_type">
                                                <option value="cash" selected>@lang('lang.Cash_Payment')</option>
                                            </select> --}}
                                            Select Medicine
                                        </div>
                                    </td>
                                    <td class="border border-[#DEE2E6]">
                                        <div>
                                            <input type="text"
                                                class="w-full   border-0 text-center rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                                                name="batch" id="batch" value="{{ $user['address'] ?? '' }}"
                                                placeholder="@lang('lang.Batch_ID')" readonly>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection

@section('js')
@endsection
