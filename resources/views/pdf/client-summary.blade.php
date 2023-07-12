<html>
    <head>
        <title>Client Summary</title>

    </head>
    <style>
        *{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 13pt;
        }

        h1{
            font-size: 22pt;

        }

        table{
            border-collapse: collapse;

        }
        table th, table td{
            padding:2px;
            border: 1px solid #333;
        }

    </style>

    <body>
        <div style="text-align:center; padding-bottom:12pt; border-bottom: 1px solid #333">
            {{-- <strong>MDC Bank, Inc.</strong> <br> --}}
            <img src="{{public_path('images/mdc-logo.jpg')}}" style="height: 100px; justify-center" alt="MDC Bank, Inc."><br>
            #456 Telecommunicating Ave., Instagram Block <br>
            Tel. No.: 456-123-900, 145-234-890
        </div>

        <h1 style="padding-bottom: 10pt; border-bottom: 1px solid #333">Client Summary</h1>

        <table>
            <tr>
                <th>Name</th>
                <td>{{$client->last_name}}, {{$client->first_name}} {{$client->middle_name}}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{$client->address}}</td>
            </tr>

            <tr>
                <th>Phone</th>
                <td>{{$client->phone_number}}</td>
            </tr>

        </table>

        <hr>

        <table style=" width: 100%">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Deposit</th>
                    <th>Withdrawal</th>
                    <th>Balance</th>
                </tr>
            </thead>

            <tbody>

                <td colspan="3">Beginning Balance</td>
                <td style="text-align:right">
                {{number_format($client->initial_deposit,2)}}
                <?php $bal = $client->initial_deposit; ?>
                 @foreach ($client->transactions as $txn )
                <tr>
                    <td>
                        {{$txn->date}}
                    </td>
                    <td style="text-align: right">
                        {{$txn->deposit ? number_format($txn->amount, 2) : ''}}
                    </td>
                    <td style="text-align: right">
                        {{!$txn->deposit ? number_format($txn->amount, 2) : ''}}
                    </td>
                    <td style="text-align: right">
                        {{$bal += $txn->deposit ? $txn->amount : (0-$txn->amount)}}
                    </td>
                </tr>

            @endforeach
            </td>
            </tbody>
        </table>
    </body>
</html>
