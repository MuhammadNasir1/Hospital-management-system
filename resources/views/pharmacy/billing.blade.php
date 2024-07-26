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
                    <p>#123456</p>
                </li>
                <li>
                    <strong>@lang('lang.Date'):</strong>
                    <p>10-26-2007</p>
                </li>
                <li>
                    <strong>@lang('lang.Customer'):</strong>
                    <p>M-Arham Waheed</p>
                </li>
                <li>
                    <strong>@lang('lang.Contact'):</strong>
                    <p>03035672559</p>
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
                <tr>
                    <td class="first">Name Here</td>
                    <td>02</td>
                    <td>39.00</td>
                    <td class="last">39.00</td>
                </tr>
                <tr>
                    <td class="first">Name Here</td>
                    <td>02</td>
                    <td>39.00</td>
                    <td class="last">39.00</td>
                </tr>
                <tr>
                    <td class="first">Name Here</td>
                    <td>02</td>
                    <td>39.00</td>
                    <td class="last">39.00</td>
                </tr>
                <tr>
                    <td class="first">Name Here</td>
                    <td>02</td>
                    <td>39.00</td>
                    <td class="last">39.00</td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <ul>
                <li>
                    <strong>@lang('lang.Sub_Total')</strong>
                    <p>0.00</p>
                </li>
                <li>
                    <strong>@lang('lang.Tax')</strong>
                    <p>39.00</p>
                </li>
                <li>
                    <strong>@lang('lang.Discount')</strong>
                    <p>0.00</p>
                </li>
            </ul>
        </div>
        <div class="result">
            <strong>@lang('lang.Total')</strong>
            <p>39.00</p>
        </div>
    </div>
</body>

</html>
