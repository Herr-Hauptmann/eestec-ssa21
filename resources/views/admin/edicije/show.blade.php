@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Pregled Edicije</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-success col-12 col-sm-3">Nazad</a>
            </div>            
            <div class="row m-2 p-1">
                <table class="table teble-responsive table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Naziv</th>
                            <td>{{ $edition->naziv }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Datum početka</th>
                            <td>{{ $edition->datum_pocetka }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Datum kraja</th>
                            <td>{{ $edition->datum_kraja }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Mjesto održavanja</th>
                            <td>{{ $edition->mjesto_odrzavanja }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Datum otvaranja prijava</th>
                            <td>{{ $edition->datum_otvaranja_prijava }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Datum zatvaranja prijava</th>
                            <td>{{ $edition->datum_zatvaranja_prijava }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Broj učesnika</th>
                            <td>{{ $edition->broj_ucesnika }}</td>
                        </tr>
                        <tr>
                            <th class="align-middle" scope="col">Organizatori:</th>
                            <td>
                                @foreach ($edition->organizatori as $organizator)
                                    <a href="{{ route('organizatori.show', $organizator->id) }}">
                                        {{ $organizator->ime . ' ' . $organizator->prezime }}
                                    </a>
                                    &nbsp;(<b><a href="{{ route('pozicije.show', $organizator->pozicija_id) }}" class="text-primary">{{ $organizator->naziv_pozicije }}</a></b>)
                                    @if (!$loop->last) <br> @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th class="align-middle" scope="col">Treneri:</th>
                            <td>
                                @foreach ($edition->treneri as $trener)
                                    <a href="{{ route('treneri.show', $trener->id) }}">
                                        {{ $trener->ime . ' ' . $trener->prezime }}
                                    </a>
                                    &nbsp;(<b><a href="{{ route('admin.treninzi.detalji', $trener->trening_id) }}" class="text-primary">{{ $trener->naziv_treninga }}</a></b>)
                                    @if (!$loop->last) <br> @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th class="align-middle" scope="col">Partneri:</th>
                            <td>
                                @foreach ($edition->partneri as $partner)
                                    <a href="{{ route('partneri.show', $partner->id) }}">
                                        {{ $partner->naziv }}
                                    </a>
                                    &nbsp;(<b><a href="#" class="text-primary">{{ $partner->naziv_kategorije }}</a></b>)
                                    @if (!$loop->last) <br> @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th class="align-middle" scope="col">Mediji:</th>
                            <td>
                                @foreach ($edition->mediji as $medij)
                                    <a href="{{ route('admin.mediji.detalji', $medij->id) }}">
                                        {{ $medij->naziv }}
                                    </a>
                                    &nbsp;(<b><a href="#" class="text-primary">{{ $medij->naziv_kategorije }}</a></b>)
                                    @if (!$loop->last) <br> @endif
                                @endforeach
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection