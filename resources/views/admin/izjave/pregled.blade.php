@extends('admin.admin_home')

@section('content')
    <div class="container-fluid pt-5 pl-5 izbornik">
        <div class="row">
            <div class="col-md-3 col-12">
                @include('admin.izbornik')
            </div>
            <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
                <div class="list-group-item naslov-sadrzaja pb-0">
                    <p>Pregled izjave</p>
                </div>
                <div class="row m-2 p-1">
                    <a href="{{ route('admin.izjave') }}"
                        class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na izjave</a>
                </div>
                <div class="container-fluid">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4"
                                        src="{{$izjava->slika }}" width="160" height="160">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Podaci o organizatoru</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label for="first_name"><strong>Ime</strong></label>
                                                    <div class="form-control">{{ $izjava->ime }}</div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label
                                                        for="last_name"><strong>Prezime</strong></label>
                                                    <div class="form-control">{{ $izjava->prezime }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="tekst"><strong>Tekst izjave</strong></label>
                                                    <div class="form-control" style="height:auto;">{{ $izjava->tekst }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
