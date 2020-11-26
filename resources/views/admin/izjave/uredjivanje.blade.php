@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Dodavanje nove izjave</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('admin.izjave') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na izjave</a>
            </div>
            <form class="m-5" action="{{ route('admin.izjave.azuriranje', $izjava->id) }}" method="POST">
                {{ csrf_field() }}
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach
                <div class="form-row">
                <div class="container-fluid">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4"
                                        src="{{$izjava->slika }}" width="160" height="160">
                                    <!--   <button class="btn btn-primary mt-4">Promijeni sliku</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="form-group col-md-6">
                        <label for="ime-participanta">Ime</label>
                        <input type="text" class="form-control" id="imeParticipanta" name="imeParticipanta"  value="{{$izjava->ime}}" placeholder="Ime participanta">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prezime-participanta">Prezime</label>
                        <input type="text" class="form-control" id="prezimeParticipanta" name="prezimeParticipanta" value="{{$izjava->prezime}}" placeholder="Prezime participanta">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="pozicija-opis">Izjava</label>
                        <textarea class="form-control" id="izjavaParticipanta" name="izjavaParticipanta" rows="3">{{$izjava->tekst}}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-5">Spasi izmjene</button>
            </form>
        </div>
    </div>
</div>

@endsection