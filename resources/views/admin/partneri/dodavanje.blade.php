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
            {{-- <form class="m-5 pl-5" action="{{ route('partneri.store') }}" method="POST"> --}}
            <form class="m-5 pl-5" action="{{ route('partneri.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="naziv-medija">Naziv</label>
                        <input type="text" class="form-control" name="naziv" id="naziv-medija" placeholder="Naziv" value="{{ old('naziv') }}">
                        @if ($errors->first('naziv'))
                            <div class="alert alert-danger">
                                {{ $errors->first('naziv') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="linkPartnera">Link</label>
                        <input type="text" class="form-control" name="link" id="linkPartnera" placeholder="Link" value="{{ old('link') }}">
                        @if ($errors->first('link'))
                            <div class="alert alert-danger">
                                {{ $errors->first('link') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
{{-- fali dodavanje slike --}}
                    </div>
                    <div class="custom-file col-md-7 mt-4">
                        <input type="file" class="custom-file-input" name="logo" id="slikaPartnera" placeholder="slika" accept="image/png, image/jpeg, image/jpg" value="{{ old('logo') }}">
                        @if ($errors->first('logo'))
                            <div class="alert alert-danger">
                                {{ $errors->first('logo') }}
                            </div>
                        @endif
                        <label class="custom-file-label" for="slikaPartnera">Umetni sliku</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-5">Spasi partnera</button>
            </form>
        </div>
    </div>
</div>

@endsection
