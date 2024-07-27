<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Billing</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="billing">
        <div class="top-icon">
            <img src="{{ asset('images/icons/billing.svg') }}" alt="">
            <h1>@lang('lang.Pharmacy_Name')</h1>
            <h2>@lang('lang.lisence_No'). 123456</h2>
            <p>Faislabad, Punjab , Pakistan</p>
            <p><strong>@lang('lang.Phone') #</strong> 03035672559</p>
        </div>

        <div class="invoice-list">
            <ul>
                <li>
                    <strong>@lang('lang.Invoice_No'):</strong>
                    <p># {{ $orderData->id }}</p>
                </li>
                <li>
                    <strong>@lang('lang.Date'):</strong>
                    <p>{{ $orderData->date }}</p>
                </li>
                <li>
                    <strong>@lang('lang.Customer'):</strong>
                    <p>{{ $orderData->customer_name }}</p>
                </li>
                <li>
                    <strong>@lang('lang.Contact'):</strong>
                    <p>{{ $orderData->customer_phone }}</p>
                </li>
            </ul>
        </div>

        <table class="billing-table">
            <thead>

                <th class="first">@lang('lang.Medicine')</th>
                <th>@lang('lang.Qty')</th>
                <th>@lang('lang.U_Price')</th>
                <th class="last">@lang('lang.Subtotal')</th>

            </thead>
            <tbody>
                @foreach ($order_items as $data)
                    <tr>
                        <td class="first">
                            @php
                                $name = DB::table('inventories')
                                    ->where('id', $data->medicine_id)
                                    ->value('name');
                            @endphp
                            {{ $name }}
                        </td>
                        <td>{{ $data->quantity }}</td>
                        <td>
                            @php
                                $price = DB::table('inventories')
                                    ->where('id', $data->medicine_id)
                                    ->value('price');
                            @endphp
                            {{ $price }}
                        </td>
                        <td class="last" id="count">{{ $data->quantity * $price }}</td>
                        <input type="hidden" class="subtotal" value="{{ $data->quantity * $price }}">
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div class="footer">
            <ul>
                <li>
                    <strong>@lang('lang.Sub_Total')</strong>
                    <p>{{ $orderData->total_amount }}</p>
                </li>
                <li>
                    <strong>@lang('lang.Tax')</strong>
                    <p>18%</p>
                </li>
                <li>
                    <strong>@lang('lang.Discount')</strong>
                    <p>{{ $orderData->discount }}</p>
                </li>
            </ul>
        </div>
        <div class="result">
            <strong>@lang('lang.Total')</strong>
            <p id="total"></p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let total = 0;
            document.querySelectorAll('.subtotal').forEach(function(element) {
                total += parseFloat(element.value);
            });
            document.getElementById('total').innerText = 'Total: ' + total.toFixed(2);
        });
    </script>
</body>

</html>
