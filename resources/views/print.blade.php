<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
    <style>
        /* Add styles for the invoice here */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }

        .payment-method {
            margin-top: 20px;
        }

        .bank-details {
            margin-top: 20px;
        }
    </style>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.4;
            padding: 20px;
            direction: rtl;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
        }

        h2 {
            font-size: 20px;
            margin-top: 0;
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: right;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .total td {
            border-top: 2px solid #333;
            font-weight: bold;
        }

        .invoice-details {
            margin-top: 20px;
        }

        .invoice-details p {
            margin: 0;
            text-align: right;
        }

        .invoice-details .address {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: right;
        }

        @media print {
            body {
                padding: 0;
            }

            .container {
                border: none;
            }

            h1 {
                margin-top: 0;
            }

            table {
                margin-top: 10px;
            }

            .invoice-details {
                margin-top: 20px;
            }

            .invoice-details .address {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>فاتورة</h1>
        <table>
            <tr>
                <th>غرض</th>
                <th>سعر</th>
                <th>كمية</th>
                <th>المجموع الفرعي</th>
            </tr>
            <tr>
                <td>جزئي</td>
                <td>AED 50.00</td>
                <td>1</td>
                <td>AED 50.00</td>
            </tr>
            <tr>
                <td>المجموع الكلي </td>
                <td>AED 100.00</td>
                <td>1</td>
                <td>AED 100.00</td>
            </tr>
            <tr class="total">
                <td></td>
                <td></td>
                <td>المجموع:</td>
                <td>AED 150.00</td>
            </tr>
        </table>
        <div class="payment-method">
            <h2>طريقة الدفع او السداد</h2>
            <p>Credit Card</p>
        </div>
        <div class="bank-details">
            <h2>معلومات الحساب المصرفي
            </h2>
            <p>رقم الحساب: 28170386</p>
            <p>رقم الآيبان: AE290500000000028170386</p>
        </div>
    </div>



    <script>
        window.print();
    </script>
</body>

</html>




{{-- 


<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
    <style>
        /* Add styles for the invoice here */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }

        .payment-method {
            margin-top: 20px;
        }

        .bank-details {
            margin-top: 20px;
        }
    </style>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.4;
            padding: 20px;
            direction: rtl;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
        }

        h2 {
            font-size: 20px;
            margin-top: 0;
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: right;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .total td {
            border-top: 2px solid #333;
            font-weight: bold;
        }

        .invoice-details {
            margin-top: 20px;
        }

        .invoice-details p {
            margin: 0;
            text-align: right;
        }

        .invoice-details .address {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: right;
        }

        @media print {
            body {
                padding: 0;
            }

            .container {
                border: none;
            }

            h1 {
                margin-top: 0;
            }

            table {
                margin-top: 10px;
            }

            .invoice-details {
                margin-top: 20px;
            }

            .invoice-details .address {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>فاتورة</h1>
        <table>
            <tr>
                <th>غرض</th>
                <th>سعر</th>
                <th>كمية</th>
                <th>المجموع الفرعي</th>
            </tr>
            <tr>
                <td>جزئي</td>
                <td>AED 50.00</td>
                <td>1</td>
                <td>AED 50.00</td>
            </tr>
            <tr>
                <td>المجموع الكلي </td>
                <td>AED {{$var1}}</td>
                <td>1</td>
                <td>AED {{$var1}}</td>
            </tr>
            <tr class="total">
                <td></td>
                <td></td>
                <td>المجموع:</td>
                <td>AED {{$var1+$var2}}</td>
            </tr>
        </table>
        <div class="payment-method">
            <h2>طريقة الدفع او السداد</h2>
            <p>{{$var2}}/p>
        </div>
        <div class="bank-details">
            <h2>معلومات الحساب المصرفي للتحويل عليه
            </h2>
            <p>رقم الحساب: 28170386</p>
            <p>رقم الآيبان: AE290500000000028170386</p>
        </div>
    </div>



    <script>
        window.print();
    </script>
</body>

</html> --}}
