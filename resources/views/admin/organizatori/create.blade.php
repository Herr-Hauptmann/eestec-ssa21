@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Dodavanje novog organizatora</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('admin.organizatori') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na organizatore</a>
            </div>
            <form class="m-5" action="{{ route('admin.organizatori.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="ime">Ime</label>
                        <input type="text" class="form-control" id="ime" placeholder="Ime">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prezime">Prezime</label>
                        <input type="text" class="form-control" id="prezime" placeholder="Prezime">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telefon">Telefon</label>
                        <input type="text" class="form-control" id="telefon" placeholder="Telefon">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mail">Mail</label>
                        <input type="text" class="form-control" id="mail" placeholder="Mail">
                    </div>
                    <div class="custom-file col-md-6 mt-4">
                        <input type="file" class="custom-file-input" id="slika">
                        <label class="custom-file-label" for="slika">Umetni sliku</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-5">Spasi organizatora</button>
            </form>
        </div>
    </div>
</div>
@endsection