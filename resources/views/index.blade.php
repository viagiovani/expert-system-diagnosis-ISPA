@extends('inc/main')

@section('container')
<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <img class="card-img-top" src="https://d1bpj0tv6vfxyp.cloudfront.net/bagaimanacaramendiagnosisispapadaorangdewasahalodoc.jpg" alt="Card image cap" style="width: 1110px; height:250px">
                <div class="card-body">
                    <h5 class="card-title">Selamat Datang di Web Diagnosa ISPA!</h5>
                    <p class="card-text">Infeksi Saluran Pernapasan Akut (ISPA) adalah penyakit saluran pernapasan atas atau bawah, biasanya menular, yang dapat menimbulkan berbagai spektrum penyakit yang berkisar dari penyakit tanpa gejala atau infeksi ringan sampai penyakit yang parah dan mematikan, tergantung pada patogen penyebabnya, faktor lingkungan, dan faktor pejamu. ISPA adalah penyebab utama morbiditas dan mortalitas penyakit menular di dunia. Hampir empat juta orang meninggal akibat ISPA setiap tahun, 98%-nya disebabkan oleh infeksi saluran pernapasan bawah. Tingkat mortalitas sangat tinggi pada bayi, anak-anak, dan orang lanjut usia, terutama di negara-negara dengan pendapatan per kapita rendah dan menengah.</p>
                    <a href="{{url('/question')}}" class="btn btn-primary btn-lg btn-block">Mulai Diagnosa</a>
                </div>
            </div>
            
            
        </div>
    </div>
</div>
@endsection