@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Dodavanje novi medij</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('admin.mediji') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na medije</a>
            </div>
            <form class="mt-5 px-5" action="{{ route('admin.mediji.spasavanje') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nazivMedija">Naziv</label>
                        <input type="text" class="form-control" id="nazivMedija" placeholder="Naziv" name="naziv">
                    </div>
                    <div class="form-group col-md-6 mt-3">
                        <label for="linkMedija">Link</label>
                        <input type="text" class="form-control" id="linkMedija" placeholder="Link" name="link">
                    </div>

                    <div class="custom-file col-md-7 mt-5">
                        <input type="file" class="custom-file-input" id="slikaMedija" placeholder="slika" name="slika">
                        <label class="custom-file-label" for="slikaMedija">Umetni sliku</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-5">Spasi medij</button>
            </form>
        </div>
    </div>
</div>

@endsection
