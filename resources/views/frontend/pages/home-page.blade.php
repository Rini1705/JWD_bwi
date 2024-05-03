@extends('frontend.layout.app')

@section('title', 'Ticket Reservation')

@section('content')
<div>
    <img class="img-fluid w-100 mt-5 h-25" src="{{ asset('frontend/img/img1.jpg') }}" alt="Gambar">
</div>

    <section>
        <h1 class="text-center mt-5">Welcome to Fast Travel</h1>
        <div class="mt-5" style="background-color: rgb(248, 248, 248)">
            <div class="d-flex align-content-between container">
                <div class="content">
                    <p>Fast Travel adalah agen travel terkemuka di Banyuwangi, menawarkan layanan komprehensif untuk
                        perjalanan
                        dan liburan yang tak terlupakan. Dengan pengalaman bertahun-tahun dalam industri, Fast Travel
                        memastikan
                        setiap perjalanan menjadi pengalaman yang lancar dan memuaskan. Mereka menyediakan paket wisata yang
                        menarik, tiket perjalanan, akomodasi, dan layanan transportasi yang handal. Fast Travel berkomitmen
                        untuk memberikan pelayanan terbaik dengan fokus pada kepuasan pelanggan dan pengalaman wisata yang
                        mengesankan.</p>
                </div>
                <div class="image-container">
                    <img width="600" src="{{ asset('frontend/img/travel-agent.jpg') }}"
                        alt="Gambar">
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <h1 class="text-center mt-5">Paket Wisata</h1>
        <div class="container">
            <div class="service-container mt-4">
                @foreach ($tourism as $item)
                    <div class="service-card">
                        <img src="{{ asset('frontend/img/' . $item->image) }}" alt="Paket Wisata Lokal">
                        <h3>{{ $item->name }}</h3>
                        <p><i class="fas fa-tags"></i>Harga : {{$item->price}}</p> 
                        <p><i class="fas fa-clock"></i>Buka : {{$item->open}} - {{$item->close}} WIB</p> 
                        <a class="detail-button" onclick="window.location='{{ url('tourism', $item->id) }}'">Detail Wisata</a>
                    </div>
                @endforeach
                </div>
        </div>
    </section>
@endsection

