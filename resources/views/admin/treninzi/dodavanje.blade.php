@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Dodavanje novog treninga</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('admin.treninzi') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na treninge</a>
            </div>
            <form class="m-5" action="{{ route('admin.treninzi.spasavanje') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-12 px-5">
                        <label for="nazivTreninga">Naziv</label>
                        <input type="text" class="form-control" id="nazivTreninga" placeholder="Naziv">
                    </div>
                    <div class="form-group col-md-12 px-5">
                        <label for="pozicijaOpis">Opis</label>
                        <textarea class="form-control" id="pozicijaOpis" rows="3"></textarea>
                    </div>
                    <div class="custom-file col-md-6 mt-4 ml-5">
                        <input type="file" class="custom-file-input" id="slikaTrening">
                        <label class="custom-file-label" for="slikaTrening">Umetni sliku</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-5">Spasi trening</button>
            </form>
        </div>
    </div>
</div>

@endsection