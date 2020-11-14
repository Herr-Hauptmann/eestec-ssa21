@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Dodavanje novosti</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('admin.novosti') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na novosti</a>
            </div>
            <form class="m-5" action="{{ route('admin.novosti.spasavanje') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="naslovNovosti">Naslov</label>
                        <input type="text" class="form-control" id="naslovNovosti" placeholder="Naslov">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="datumNovosti">Datum</label>
                        <input type="text" class="form-control" id="datumNovosti" placeholder="dd.MM.gggg">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="tekstNovosti">Tekst</label>
                        <textarea class="form-control" id="tekstNovosti" rows="3"></textarea>
                    </div>
                    <div class="custom-file clo-md-12 mt-4">
                        <input type="file" class="custom-file-input" id="slikaNovosti">
                        <label class="custom-file-label" for="slikaNovosti">Umetni sliku</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-5">Spasi novost</button>
            </form>
        </div>
    </div>
</div>

@endsection