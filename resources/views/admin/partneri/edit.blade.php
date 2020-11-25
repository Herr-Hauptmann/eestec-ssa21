@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
            <p>Uredi: {{$partner->naziv}}</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('partneri.index') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na partnere</a>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="m-5 pl-5" action="/admin/partneri/{{ $partner->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="naziv-medija">Naziv</label>
                    <input value={{$partner->naziv}} type="text" class="form-control" name="naziv" id="naziv-medija" placeholder="Naziv">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="linkPartnera">Link</label>
                        <input value={{$partner->link}} type="text" class="form-control" name="link" id="linkPartnera" placeholder="Link">
                    </div>
                    <div class="form-group col-md-6">
{{-- fali dodavanje slike --}}
                    </div>
                    <div class="custom-file col-md-7 mt-4">
                        <input type="file" class="custom-file-input" id="slikaPartnera" name="logo" placeholder="slika" accept="image/png, image/jpeg, image/jpg">
                        <label class="custom-file-label" for="slikaPartnera">Umetni sliku</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-5">Spasi partnera</button>
            </form>
        </div>
    </div>
</div>

@endsection
