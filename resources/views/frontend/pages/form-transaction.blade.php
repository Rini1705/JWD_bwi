<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pemesanan Paket Wisata</title>
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
        <h2 class="mb-4">Form Pemesanan Paket Wisata</h2>
        <form action="/transaction-store" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Pemesan:</label>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin:</label>
                <select class="form-control" name="jk">
                    <option value="lk">Laki-laki</option>
                    <option value="pr">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nomer identitas:</label>
                <input type="number" class="form-control" name="nik">
            </div>
            <div class="mb-3">
                <label class="form-label">Durasi Menginap: (jumlah hari):</label>
                <input type="number" class="form-control" id="duration" name="duration_stay" placeholder="">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Pesan:</label>
                <input type="date" class="form-control" id="start_date" name="start_date">
            </div>
            <div class="form-check">
                <input  type="checkbox" id="breakfast">
                <label class="form-check-label" for="breakfast">Termasuk Breakfast:</label>
            </div>
            <div class="checkbox-group">
                <label class="form-label">Type Kamar :</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="standar" value="{{$tourism->accommodation}}" id="standar">
                    <label class="form-check-label" for="standar">Standart Rp. {{$tourism->accommodation}}</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="deluxe" value="{{$tourism->transportation}}" id="deluxe">
                    <label class="form-check-label" for="deluxe">Deluxe Rp. {{$tourism->transportation}}</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="familiy" value="{{$tourism->food}}" id="familiy">
                    <label class="form-check-label" for="familiy">Famili Rp. {{$tourism->food}}</label>
                </div>
            </div>            
            {{-- <div class="mb-3">
                <label class="form-label">Harga Paket Perjalanan:</label>
                <input type="text" class="form-control" id="packagePrice" name="travel_package_price" disabled>
            </div> --}}
            <div class="mb-3">
                <label class="form-label">Total : </label>
                <input type="text" class="form-control" id="totalBill" name="total" disabled>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-success">Review Pesanan</button>
                <div id="saveButton" class="btn btn-primary">Simpan</div>
                <button type="button" onclick="window.history.back();" class="btn btn-danger">Batal</button>
            </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const checkboxes = document.querySelectorAll('.form-check-input');
            const totalBillField = document.getElementById('totalBill');
            const durationInput = document.getElementById('duration');
            const saveButton = document.getElementById('saveButton');
            const chekboxBreak = document.getElementById('breakfast');
            const csrfToken = form.querySelector('input[name="_token"]').value;
            let total = 0;
            var valueBreak = 0;


            function handleCheckbox() {
                if (chekboxBreak.checked) {
                    valueBreak = 80000;
                } else {
                    valueBreak = null;
                }
                calculateTotalBill();
            }

            function calculatePackagePrice() {
                total = 0;
                checkboxes.forEach(box => {
                    if (box.checked) {
                        console.log(box.value);
                        total += parseFloat(box.value);
                    }
                });
                calculateTotalBill();
            }
    
            function calculateTotalBill(a) {
                const duration = parseFloat(durationInput.value) || 0;
                // const participants = parseFloat(participantsInput.value) || 0;

                var totalBill = total !== 0 ? duration * total : 0;
                var tampBill = totalBill;
                if (duration > 3) {
                    tampBill *= 0.90; 
                }
                totalBill = tampBill;
                if(valueBreak != 0){
                    totalBill += valueBreak
                }
                totalBillField.value = 'Rp ' + totalBill.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
    
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', calculatePackagePrice);
            });
    
            durationInput.addEventListener('input', calculateTotalBill);
            // participantsInput.addEventListener('input', calculateTotalBill);
            chekboxBreak.addEventListener('change', handleCheckbox);

            async function sendFormData(form, csrfToken, formData) {
                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    if (response.ok) {
                        const data = await response.json();
                        window.location.href = '/struk/' + data; 
                    } else {
                        console.error('HTTP error', response.status);
                    }
                } catch (error) {
                    console.error('Network error', error);
                }
            }
    
            saveButton.addEventListener('click', function() {
                const formData = new FormData();
                formData.append('name', form.querySelector('input[name="name"]').value);
                formData.append('jk', form.querySelector('select[name="jk"]').value);
                formData.append('nik', form.querySelector('input[name="nik"]').value);
                formData.append('number_day', durationInput.value);
                formData.append('start_date', form.querySelector('input[name="start_date"]').value);
                formData.append('total', totalBillField.value.replace('Rp ', '').replace(',', ''));
    
                checkboxes.forEach(box => {
                    if (box.checked) {
                        formData.append(box.name, box.value);
                    }
                });
                sendFormData(form, csrfToken, formData)

        });
    });
    </script>
    
</body>
</html>
