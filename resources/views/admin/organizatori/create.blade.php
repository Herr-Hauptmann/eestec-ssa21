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
                    <a href="{{ route('organizatori.index') }}"
                        class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na organizatore</a>
                </div>
                <form class="m-5" action="{{ route('organizatori.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ime">Ime</label>
                            <input type="text" class="form-control" id="ime" placeholder="Ime" name="ime"
                                value="{{ old('ime') }}">
                            @if ($errors->first('ime'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('ime') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="prezime">Prezime</label>
                            <input type="text" class="form-control" id="prezime" placeholder="Prezime" name="prezime"
                                value="{{ old('prezime') }}">
                            @if ($errors->first('prezime'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('prezime') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefon">Telefon</label>
                            <input type="text" class="form-control" id="telefon" placeholder="Telefon" name="telefon"
                                value="{{ old('telefon') }}">
                            @if ($errors->first('telefon'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('telefon') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mail">Mail</label>
                            <input type="text" class="form-control" id="mail" placeholder="Mail" name="mail"
                                value="{{ old('mail') }}">
                            @if ($errors->first('mail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('mail') }}
                                </div>
                            @endif
                        </div>
                        <div class="custom-file col-md-6 mt-4">
                            <input type="file" class="custom-file-input" id="slika">
                            <label class="custom-file-label" for="slika" name="slika">Umetni sliku</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Spasi organizatora</button>
                </form>
            </div>
        </div>
    </div>
@endsection
