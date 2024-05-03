<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Travel Package Purchase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .travel-package {
            margin-top: 20px;
        }
        .package-photo {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .modal-footer button {
            width: 100px; /* Standardize button widths in the modal */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('frontend/img/'. $item->image) }}" alt="Travel Package Photo" class="package-photo img-thumbnail">
            </div>
            <div class="col-md-6">
                <h2 class="mb-3">Explore Beautiful Bali!</h2>
                <p class="lead">Join us for an unforgettable adventure in Bali with our comprehensive travel package that includes tours, lodging, and fine dining. Experience the beautiful landscapes and rich culture of this amazing destination.</p>
                <ul>
                    <li><strong>Harga: </strong>{{$item->price}}</li>
                    <li><strong>Jam Buka: </strong>{{$item->open}}</li>
                    <li><strong>Jam Tutup: </strong>{{$item->close}}</li>
                    <li><strong>Penginapan: </strong>{{$item->accommodation}}</li>
                    <li><strong>Transportasi: </strong>{{$item->transportation}}</li>
                    <li><strong>Makanan: </strong>{{$item->food}}</li>
                </ul>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#purchaseModal">Beli Paket Wisata</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Konfirmasi Pembelian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda yakin ingin membeli paket wisata ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="confirmPurchase">Ya</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('confirmPurchase').addEventListener('click', function() {
            window.location.href = '/transaction-create/' + '{{ $item->id }}'; // Ensure the $item variable is correctly passed to the view
        });
    </script>
</body>
</html>
