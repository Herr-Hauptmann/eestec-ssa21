@extends('admin.admin_home')

@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Detalji novosti</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('novosti.index') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na novosti</a>
            </div>
            <img src="https://media.studomat.ba/2020/03/IMG_0087.jpg" style="max-width: 200px; max-height: 200px;"/>
            <h1>{{ $novost->naslov }}</h1>
            <h5>Datum: {{ $novost->datum }}</h5>
            <p>{{ $novost->tekst }}</p>
        </div>
    </div>
</div>
@endsection