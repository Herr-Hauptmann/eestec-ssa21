@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
            <p>Uredi: {{$trener->ime}} {{$trener->prezime}}</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('treneri.index') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na trenere</a>
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
            <form class="m-5 pl-5" action="/admin/treneri/{{ $trener->id }}" method="POST"  enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="imeTrenera">Ime</label>
                        <input value={{$trener->ime}} name="ime" type="text" class="form-control" id="imeTrenera" placeholder="Ime">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prezimeTrenera">Prezime</label>
                        <input value={{$trener->prezime}} name="prezime" type="text" class="form-control" id="prezimeTrenera" placeholder="Prezime">
                    </div>
                    <div class="custom-file clo-md-12 mt-4">
                        <input type="file" class="custom-file-input" name="slika" id="trenerSlika" placeholder="slika" accept="image/png, image/jpeg, image/jpg">
                        <label class="custom-file-label" for="trenerSlika">Umetni sliku</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-5">Spasi trenera</button>
            </form>
        </div>
    </div>
</div>

@endsection
