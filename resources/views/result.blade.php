@extends('inc/main')

@section('container')

<div class="container">
    <div class="row">
        <div class="col-6">
            <h5 class ="mt-5" >Berikut adalah hasil diagnosa dari jawaban yang anda berikan...</h5>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Penyakit</th>
                        <th scope="col">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                
                @foreach($resValue as $res => $val)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$res}}</td>
                        <td>{{$val}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <p>Dari hasil perhitungan jawaban yang anda berikan dengan menggunakan algoritma naive bayes terhadap kemungkinan penyakit ISPA,
            kemungkinan anda mengidap penyakit <b>{{$finalResult}}</></p>
        </div>
    </div>
</div>

@endsection