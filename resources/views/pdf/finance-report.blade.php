<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Finance Report</title>

    <style>
        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:12px;
        }

        h1{
            text-align:center;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        table th,
        table td{
            border:1px solid #ddd;
            padding:8px;
        }

        .summary{
            margin-top:20px;
        }
    </style>
</head>
<body>

<h1>FINANCE REPORT</h1>

<h3>{{ $company }}</h3>

<div class="summary">
    <p>Income : Rp {{ number_format($income,0,',','.') }}</p>
    <p>Expense : Rp {{ number_format($expense,0,',','.') }}</p>
    <p>Profit : Rp {{ number_format($profit,0,',','.') }}</p>
</div>

<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Nominal</th>
        </tr>
    </thead>

    <tbody>
        @foreach($transactions as $trx)
            <tr>
                <td>{{ $trx->transaction_date }}</td>
                <td>{{ $trx->description }}</td>
                <td>
                    Rp {{ number_format($trx->amount,0,',','.') }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>