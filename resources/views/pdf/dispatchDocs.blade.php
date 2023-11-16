<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Admin Panel" />
    <meta name="author" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="header">
        <div class="row">
            <div class="col-md-6" style="text-align:left;">
                <div class="image">
                    <h2>Logo</h2>
                    <img src="" alt="" width="25%">
                </div>
            </div>
            <div class="col-md-6" style="text-align: right;">
                <h2>Dispatch #<span>0001</span></h2>
                <p>{{ $date_of_disp }}</p>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="text-align: left;">
                <h3>Dispatch To:<br> {{ $client }} </h3>
                <p>{{ $client_address }}</p>
                <br>
                <br>
                <p>Dear Sir/Madam,</p>
                <p>
                    Please receive the following documents and sign below for acknowledgement.

                    At your service,
                    Mars Financial Consultants.</p>
            </div>
            <div class="col-md-6" style="float: left;">

            </div>
        </div>
        <div class="row">
            <table style="border: none;">
                <thead>
                    <tr>
                        <th><strong>Date Receive</strong></th>
                        <th><strong>Note</strong></th>
                        <th><strong>Quantity</strong></th>
                        <th><strong>Checkout</strong></th>
                        <th><strong>Narration</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($date_doc_receive as $index => $dateReceive)
                        <tr>
                            <td>{{ $dateReceive }}</td>
                            <td>{{ $disp_doc_desc[$index] }}</td>
                            <td>{{ $disp_doc_qty[$index] }}</td>
                            <td>{{ $disp_doc_chckout[$index] }}</td>
                            <td>{{ $disp_doc_narration[$index] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer" style="position: fixed;left: 0;bottom: 0;">
            <div class="row">
                <table>
                    <tr>
                        <th>
                            <div class="col-md-2"
                                style="border-bottom: 1px solid black;padding: 0 2px 2px 2px;margin-left:10px;margin-right:10px;">
                            </div>
                        </th>
                        <th>
                            <div class="col-md-2"
                                style="border-bottom: 1px solid black;padding: 0 2px 2px 2px;margin-left:10px;margin-right:10px;">
                            </div>
                        </th>
                        <th>
                            <div class="col-md-2"
                                style="border-bottom: 1px solid black;padding: 0 2px 2px 2px;margin-left:10px;margin-right:10px;">
                            </div>
                        </th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>
                            <p style="margin-left:10px;margin-right:10px;"><strong>Receiver Name</strong></p>
                        </td>
                        <td>
                            <p style="margin-left:10px;margin-right:10px;"><strong>Receive Signature</strong></p>
                        </td>
                        <td>
                            <p style="margin-left:10px;margin-right:10px;"><strong>Date Receive</strong></p>
                        </td>
                        <td></td>
                    </tr>
                </table>

            </div>
        </div>

    </div>
    </div>
    </div>
</body>

</html>
