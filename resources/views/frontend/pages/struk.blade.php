<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation Summary</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .summary-container {
            max-width: 650px;
            margin: 50px auto;
            padding: 20px;
            background: #FFFAF0;
            border: 1px solid #FFA07A;
            border-radius: 15px;
        }

        .summary-header {
            background-color: #FFA07A;
            color: white;
            padding: 10px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .btn-yes {
            background-color: #FF8C00;
            border-color: #FF8C00;
            width: 100px;
        }

        .btn-no {
            background-color: #FF4500;
            border-color: #FF4500;
            width: 100px;
        }

        .container-custom {
            background-color: #FFDAB9;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        .btn-yes {
            background-color: #90EE90;
            border: none;
        }

        .btn-no {
            background-color: #FF6347;
            border: none;
        }
    </style>
</head>

<body>
    <div class="container summary-container">
        <div class="summary-header text-center">
            <h4>RANGKUMAN BOOKING KAMAR HOTEL</h4>
        </div>
        <p><strong>Nama</strong> : {{ $transaction->name }}</p>
        <p><strong>Jenis Kelamin</strong> : {{ $transaction->jk === 'lk' ? 'Laki-laki' : 'Perempuan' }}</p>
        <p><strong>NIK</strong> : {{ $transaction->nik }}</p>
        <p><strong>start date</strong> : {{ $transaction->start_date }}</p>
        <p><strong>duration stay</strong> : {{ $transaction->duration_stay }}</p>
        <p><strong>Layanan Paket</strong> :
            @if ($transaction->accommodation)
                Standart
            @endif
            @if ($transaction->transportation)
                Deluxe
            @endif
            @if ($transaction->food)
                Family
            @endif
        </p>

        <p><strong>Jumlah Tagihan</strong> : Rp. {{ $transaction->total }}</p>
    </div>

    <div class="container-custom">
        <div class="text-center">
            <h4>Pesan Lagi ?</h4>
        </div>
        <div class="d-flex justify-content-around mt-4">
            <button type="button" onclick="window.location.href='/transaction-create/{{ $transaction->id }}';"
                class="btn btn-yes">Ya</button>
            <button type="button" onclick="window.location.href='/';" class="btn btn-no">Tidak</button>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
