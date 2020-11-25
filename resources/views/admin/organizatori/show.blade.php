@extends('admin.admin_home')

@section('content')
    <div class="container-fluid pt-5 pl-5 izbornik">
        <div class="row">
            <div class="col-md-3 col-12">
                @include('admin.izbornik')
            </div>
            <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
                <div class="list-group-item naslov-sadrzaja pb-0">
                    <p>Pregled organizatora</p>
                </div>
                <div class="row m-2 p-1">
                    <a href="{{ route('organizatori.index') }}"
                        class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na organizatore</a>
                    <a href="organizatori/edit/{{ $organizator->id }}"
                        class="btn btn-sm btn-outline-warning col-12 col-sm-3 ml-auto mt-2 mt-lg-0">Uredi ovog
                        organizatora</a>
                    <form method="POST" action="{{ route('organizatori.destroy', $organizator->id) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn-kontrole btn btn-outline-danger btn-sm item btn-block mr-2 ml-2"
                            title="delete"
                            onclick="return confirm(&quot;Da li si siguran da želiš obrisati ovog organizatora?&quot;)">Obrisi
                            ovog organizatora</button>
                    </form>
                </div>
                <div class="container-fluid">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4"
                                        src="{{ asset('img/rasim.png') }}" width="160" height="160">
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
                                            <div class="form-group"><label for="first_name"><strong>Ime</strong></label><div class="form-control">{{$organizator->ime}}</div></div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group"><label for="last_name"><strong>Prezime</strong></label><div class="form-control">{{$organizator->prezime}}</div></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label
                                                        for="username"><strong>Broj telefona</strong></label><div
                                                class="form-control">{{$organizator->telefon}}</div></div>

                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="email"><strong>Email
                                                adresa</strong></label><div class="form-control">{{$organizator->mail}}</div></div>
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
