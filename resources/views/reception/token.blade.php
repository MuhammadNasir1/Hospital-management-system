<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Patient Detail</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="billing">
        <div class="top-icon">
            <img src="{{ asset('images/icons/billing.svg') }}" alt="">
            <h1>{{ $all['company']->name }}</h1>
            <p>{{ $all['company']->address }}</p>
            <p><strong>@lang('lang.Phone') #</strong> {{ $all['company']->phone }}</p>
            <h2><strong>@lang('lang.Reg') #</strong> {{ $all['printData']->id }}</h2>
        </div>
        <div class="patient-detail">
            <ul>
                <li>
                    <strong>@lang('lang.Fee_Status')#</strong>
                    <p>@lang('lang.Paid')</p>
                </li>
                <li>
                    <strong>@lang('lang.Date'):</strong>
                    <p>{{ $all['time'] }}</p>
                </li>
                <li>
                    <strong>@lang('lang.Customer'):</strong>
                    <p>{{ $all['printData']->name }}</p>
                </li>
                <li>
                    <strong>@lang('lang.Contact'):</strong>
                    <p>{{ $all['printData']->phone }}</p>
                </li>
            </ul>
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

        window.print();
    </script>
</body>

</html>
