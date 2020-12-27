@php
    $obrnutiNizKomponentiDatuma = explode("-", $novost->datum);
    $nizKomponentiDatuma = array_reverse($obrnutiNizKomponentiDatuma);
    $datumZaPrikazati = $nizKomponentiDatuma[0] . "." . $nizKomponentiDatuma[1] . "." . $nizKomponentiDatuma[2];
@endphp

@extends('admin.admin_home')

@section('content')
    <div class="container-fluid pt-5 pl-5 izbornik">
        <div class="row">
            <div class="col-md-3 col-12">
                @include('admin.izbornik')
            </div>
            <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
                <div class="list-group-item naslov-sadrzaja pb-0">
                    <p>Detalji novosti</p>
                </div>
                <div class="row m-2 p-1">
                    <a href="{{ route('novosti.index') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">
                        Nazad na novosti
                    </a>
                </div>
                <div class="container-fluid">
                    <div class="row mb-3 justify-content-center">
                    <div class="card mb-3">
                                <div class="shadow">
                                    <img src="/storage/novosti/img/{{$novost->slika}}" 
                                            class="figure-img img-fluid" alt="Slika uz novost"
                                            style="max-width: 100%; width: 450px; height: 350px; margin: auto;">
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Podaci o novosti</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="id_naslov"><strong>Naslov</strong></label>
                                                    <div id="id_naslov" class="form-control">{{ $novost->naslov }}</div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="id_datum"><strong>Datum</strong></label>
                                                    <div id="id_datum" class="form-control">{{ $datumZaPrikazati }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="id_tekst"><strong>Tekst novosti</strong></label>
                                                    <div id="id_tekst" class="form-control h-auto text-left">{!! $novost->tekst !!}</div>
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

