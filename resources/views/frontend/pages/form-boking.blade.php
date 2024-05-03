<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Travel</title>
    <link rel="stylesheet" href="style.css">
</head>

<link rel="stylesheet" href="../../assets/css/pemesanan.style.css">

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column">
                <h2>Form Pemesanan</h2>
                <img src="asset/weowruu.png" alt="storyset-forms/cuate">
                <a href="../../index.html" class="btn btn-secondary">Kembali</a>
            </div>
            <div class="column">

                <form class="form-pemesanan" action="../controller/proccess_form.php" method="POST">
                    <h3>Informasi Data Diri</h3>
                    <label for="name">Nama Lengkap *</label>
                    <input type="text" id="name" name="name" required>
                    <label for="nik">Nomor Induk Kependudukan (NIK) *</label>
                    <input type="text" id="nik" name="nik" required>
                    <label for="no_telepon">Nomor yang bisa dihubungi *</label>
                    <input type="text" id="no_telepon" name="no_telepon" required>

                    <h3>Informasi lainnya</h3>
                    <label for="keterangan">Keterangan</label>
                    <input type="text" id="keterangan" name="keterangan">

                    <input type="checkbox" name="checkbox_penginapan" id="checkbox_penginapan">
                    <label class="checkbox" for="checkbox_penginapan"> Tambah Penginapan (50.000/orang)</label>

                    <h4 style="margin-top: 16px;">Total</h4>
                    <h1 style="margin-bottom: 16px;">Rp. <span id="total">500.000</span></h1>
                    <div class="button-center">
                        <button type="submit" class="btn btn-submit">Buat Pesanan <iconify-icon
                                icon="tabler:pencil-plus"></iconify-icon< /button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const checkboxPenginapan = document.getElementById('checkbox_penginapan');
        const totalElement = document.getElementById('total');

        checkboxPenginapan.addEventListener('change', function () {
            if (checkboxPenginapan.checked) {
                const currentTotal = parseFloat(totalElement.innerText.replace('Rp. ', '').replace('.', ''));
                const newTotal = currentTotal + 250000; // 5 orang * 50000
                totalElement.innerText = Rp.${ formatRupiah(newTotal) };
            } else {
                totalElement.innerText = 'Rp. 500.000';
            }
        });

        function formatRupiah(angka) {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah;
        }
    </script>

    <!-- Icon -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://kit.fontawesome.com/7a57481531.js" crossorigin="anonymous"></script>

</body>