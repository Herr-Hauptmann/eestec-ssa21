@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Dodavanje nove pozicije</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('pozicije.index') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na pozicije</a>
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

            <form class="m-5 pl-5" action="/admin/pozicije/{{ $pozicija->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="pozicijaNaziv">Naziv</label>
                    <input type="text" value={{$pozicija->naziv}} class="form-control" id="pozicijaNaziv" name="naziv" placeholder="Naziv">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="pozicijaOpis">Opis</label>
                        <textarea class="form-control" id="pozicijaOpis" rows="3" name="opis">{{$pozicija->opis}}</textarea>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary mt-5">Spasi poziciju</button>
            </form>
        </div>
    </div>
</div>

@endsection
