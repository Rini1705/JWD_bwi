<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pemesanan Paket Wisata</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
            margin-top: 20px;
        }

        .checkbox-group {
            margin-bottom: 20px;
        }

        .form-label {
            min-width: 180px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="container border rounded-3 p-4">
        <h2 class="mb-4">Detail Pemesanan Paket Wisata</h2>
        <div class="mb-3">
            <label class="form-label">Nama Pemesan:</label>
            <span class="form-control">{{ $transaction->name }}</span>
        </div>
        <div class="mb-3">
            <label class="form-label">NIK</label>
            <span class="form-control">{{ $transaction->nik }}</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Waktu Pelaksanaan Perjalanan (jumlah hari):</label>
            <span class="form-control">{{ $transaction->number_day }} hari</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah Pengunjung:</label>
            <span class="form-control">{{ $transaction->number_people }} orang</span>
        </div>
        <div class="checkbox-group">
            <label class="form-label">Pelayanan Paket Kamar Hotel:</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ $transaction->accommodation ? 'checked' : '' }}
                    disabled id="accommodation">
                <label class="form-check-label" for="accommodation">Penginapan:
                    {{ $transaction->accommodation ?: 'Tidak tersedia' }}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ $transaction->transportation ? 'checked' : '' }}
                    disabled id="transportation">
                <label class="form-check-label" for="transportation">Transportasi:
                    {{ $transaction->transportation ?: 'Tidak tersedia' }}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ $transaction->food ? 'checked' : '' }} disabled
                    id="food">
                <label class="form-check-label" for="food">Makanan:
                    {{ $transaction->food ?: 'Tidak tersedia' }}</label>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Paket Kamar Hotel:</label>
            <span
                class="form-control">{{ 'Rp ' . number_format($transaction->travel_package_price, 2, ',', '.') }}</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah Tagihan:</label>
            <span class="form-control">{{ 'Rp ' . number_format($transaction->total, 2, ',', '.') }}</span>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
