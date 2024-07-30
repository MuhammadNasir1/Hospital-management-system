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
            <h1>@lang('lang.Pharmacy_Name')</h1>
            <h2>@lang('lang.lisence_No'). 123456</h2>
            <p>Faislabad, Punjab , Pakistan</p>
            <p><strong>@lang('lang.Phone') #</strong> 03035672559</p>
            <h2><strong>@lang('lang.Reg') #</strong> {{ $printData->id }}</h2>
        </div>
        <div class="patient-detail">
            <ul>
                <li>
                    <strong>@lang('lang.Reg')#</strong>
                    <p>{{ $printData->id }}</p>
                </li>
                <li>
                    <strong>@lang('lang.Name'):</strong>
                    <p>{{ $printData->name }}</p>
                </li>
                <li>
                    <strong>@lang('lang.Relation_To_Applicant'):</strong>
                    <p>{{ $printData->relation }}</p>
                </li>
                <li>
                    <strong>@lang('lang.Gender'):</strong>
                    <p>{{ $printData->gender }}</p>
                </li>
                <li>
                    <strong>@lang('lang.Age'):</strong>
                    <p>{{ $printData->age }}</p>
                </li>
                <li>
                    <strong>@lang('lang.Patient_Type'):</strong>
                    <p>{{ $printData->disease }}</p>
                </li>
                <li>
                    <strong>@lang('lang.Material_Status'):</strong>
                    <p>{{ $printData->material_status }}</p>
                </li>
                <li>
                    <strong>@lang('lang.Father_Husband_Name'):</strong>
                    <p>{{ $printData->father_husband_name }}</p>
                </li>
                <li>
                    <strong>@lang('lang.Phone'):</strong>
                    <p>{{ $printData->phone }}</p>
                </li>
                <li>
                    <strong>@lang('lang.CNIC'):</strong>
                    <p>{{ $printData->cnic }}</p>
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
