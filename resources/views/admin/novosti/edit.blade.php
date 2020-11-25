@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Uređivanje novosti</p>
            </div>
            <div class="row m-2 p-1">
            <a href="{{ route('novosti.index') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na novosti</a>
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
            <form class="m-5" action="{{ route('novosti.update', $novost->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="naslov">Naslov</label>
                        <input type="text" class="form-control" id="naslov" placeholder="Naslov" name="naslov" value="{{ $novost->naslov }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="datum">Datum</label>
                        <input type="text" class="form-control" id="datum" placeholder="YYYY-MM-DD" name="datum" value="{{ $novost->datum }}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="tekst">Tekst</label>
                        <textarea class="form-control" id="tekst" rows="3" name="tekst">{{ $novost->tekst }}</textarea>
                    </div>
                    <div class="custom-file clo-md-12 mt-4">
                        <input type="file" class="custom-file-input" id="slika" name="slika" value="{{ $novost->slika }}">
                        <label class="custom-file-label" for="slika">Umetni sliku</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-5">Spasi novost</button>
            </form>
        </div>
    </div>
</div>
@endsection