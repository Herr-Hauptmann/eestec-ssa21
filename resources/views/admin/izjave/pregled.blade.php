@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Pregled detalja izjave</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('admin.izjave') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na izjave</a>
            </div>
            <div class="m-5" style="display:flex; align-items: center; justify-content: center;">
                {{ csrf_field() }}
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach
                <div>
                <h4>{{ $izjava->ime }} {{$izjava->prezime}}</h4> <br/>
                <img style="height:200px; border-radius: 50%; border: 7px solid #00a59c;" src="{{ $izjava->slika }}" /><br/><br/>
                    <p style="word-wrap: break-word; width: 500px;">{{ $izjava->tekst }}</p>
                </div >
            </div>
        </div>
    </div>
</div>

@endsection