@extends('admin.admin_home')

@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Treneri</p>
            </div>
        <div class="row m-2 p-1">
                <a href="{{ route('admin.treninzi') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na treninge</a>
            </div>
            <h1>{{ $trening->naziv }}</h1>
            <p>{{ $trening->opis }}</p>
            <img src="{{ $trening->slika }}" />
        </div>
    </div>
</div>
@include('admin.brisanje')
@endsection
