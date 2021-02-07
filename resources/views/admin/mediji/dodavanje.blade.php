@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Dodavanje novog medija</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('admin.mediji') }}"
                    class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na medije</a>
            </div>
            <form class="m-5" action="{{ route('admin.mediji.spasavanje') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="naziv">Naziv</label>
                        <input type="text" class="form-control" id="naziv" placeholder="Naziv" name="naziv"
                            value="{{ old('naziv') }}">
                        @if ($errors->first('naziv'))
                            <div class="alert alert-danger">
                                {{ $errors->first('naziv') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="link">Link</label>
                        <input type="text" class="form-control" id="link" placeholder="Link" name="link"
                            value="{{ old('link') }}">
                        @if ($errors->first('link'))
                            <div class="alert alert-danger">
                                {{ $errors->first('link') }}
                            </div>
                        @endif
                    </div>
                    <div class="custom-file col-md-6 mt-4">
                        <input type="file" class="custom-file-input" id="slika" name="slika">
                        <label class="custom-file-label" for="slika" name="slika">Umetni sliku</label>
                        @if ($errors->first('slika'))
                            <div class="alert alert-danger">
                                {{ $errors->first('slika') }}
                            </div>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-5">Spasi medij</button>
            </form>
        </div>
    </div>
</div>
@endsection
