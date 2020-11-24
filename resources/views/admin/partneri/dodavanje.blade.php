@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Dodavanje novog partnera</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('partneri.index') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na partnere</a>
            </div>
            <form class="m-5 pl-5" action="{{ route('partneri.create') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="naziv-medija">Naziv</label>
                        <input type="text" class="form-control" id="naziv-medija" placeholder="Naziv">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="partneriInputKategorije">Kategorija</label>
                        <select id="partneriInputKategorije" class="form-control">
                            <option selected>Kategorija 1</option>
                            <option>Kategorija 2</option>
                            <option>Kategorija 3</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="linkPartnera">Link</label>
                        <input type="text" class="form-control" id="linkPartnera" placeholder="Link">
                    </div>
                    <div class="form-group col-md-6">

                    </div>
                    <div class="custom-file col-md-7 mt-4">
                        <input type="file" class="custom-file-input" id="slikaPartnera" placeholder="slika">
                        <label class="custom-file-label" for="slikaPartnera">Umetni sliku</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-5">Spasi partnera</button>
            </form>
        </div>
    </div>
</div>

@endsection
