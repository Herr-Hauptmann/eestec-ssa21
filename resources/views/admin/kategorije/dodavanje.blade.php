@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Dodavanje nove kategorije</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('admin.kategorije') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na kategorije</a>
            </div>
            <form class="mt-5 px-5" action="{{ route('admin.kategorije.spasavanje') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-12 px-5">
                        <label for="nazivKategorije">Naziv kategorije</label>
                        <input type="text" class="form-control" id="nazivKategorije" placeholder="Naziv">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-5">Spasi kategoriju</button>
            </form>
        </div>
    </div>
</div>

@endsection