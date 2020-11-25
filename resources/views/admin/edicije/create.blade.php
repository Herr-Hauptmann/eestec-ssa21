@extends('admin.admin_home')

@section('scripts')
    <script src="/js/admin/addRowDynamic.js"></script>
@endsection

@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Dodavanje nove edicije</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('admin.editions') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na edicije</a>
            </div>
            <form class="m-5" action="{{ route('admin.edition.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="edicijaInputNaziv">Naziv</label>
                        <input type="text" class="form-control" id="edicijaInputNaziv" placeholder="Naziv" name="naziv">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="edicija-vrsta">Vrsta edicije</label>
                        </br>
                        <fieldset id="ssaTip">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ssaTip" id="edicijeRadios1" value="SSA" checked>
                                <label class="form-check-label" for="edicijeRadios1">
                                    SSA
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ssaTip" id="edicijeRadios2" value="SSA LITE">
                                <label class="form-check-label" for="edicijeRadios2">
                                    SSA LITE
                                </label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="edicijeInputBrojUcesnika">Broj učesnika</label>
                        <input type="number" class="form-control" id="edicijeInputBrojUcesnika" placeholder="30" name="broj_ucesnika" min="0" max="200">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="datumPocetka">Datum početka</label>
                        <input type="date" class="form-control" id="datumPocetka" placeholder="dd.mm.gggg" name="datum_pocetka">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="datumKraja">Datum kraja</label>
                        <input type="date" class="form-control" id="datumKraja" placeholder="dd.mm.gggg" name="datum_kraja">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mjestoOdrzavanja">Mjesto održavanja</label>
                        <input type="text" class="form-control" id="mjestoOdrzavanja" placeholder="Mjesto održavanja" name="mjesto_odrzavanja">
                    </div>
                    <div class="row col-12">
                        <div class="form-group col-md-6">
                            <label for="datumOtvaranja">Datum otvaranja prijava</label>
                            <input type="date" class="form-control" id="datumOtvaranja" placeholder="dd.mm.gggg" name="datum_otvaranja_prijava">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="datumZatvaranja">Datum zatvaranja prijava</label>
                            <input type="date" class="form-control" id="datumZatvaranja" placeholder="dd.mm.gggg" name="datum_zatvaranja_prijava">
                        </div>
                    </div>
                    

                    <table id="edicijeTabelaOrganizatorPozicija" class="table teble-responsive mt-5">
                        <thead>
                            <tr>
                                <td>Organizator</td>
                                <td>Pozicija</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select id="edicijeInputOrganizatori" class="form-control" name="organizator_id[]">
                                        <option value="NULL" selected>Izaberi...</option>
                                        @foreach ($organizers as $organizer)
                                            <option value="{{ $organizer->id }}">{{ $organizer->ime.' '.$organizer->prezime }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select id="edicijeInputPozicije" class="form-control" name="pozicija_id[]">
                                        <option value="NULL" selected>Izaberi...</option>
                                        @foreach ($positions as $position)
                                            <option value="{{ $position->id }}">{{ $position->naziv }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-primary btn-sm" data-addrow id="edicijeAddRowOrganizatori" value="Add Row" />
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table id="edicijeTabelaTrenerTrening" class="table teble-responsive mt-4">
                        <thead>
                            <tr>
                                <td>Trener</td>
                                <td>Trening</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select id="edicijeInputTreneri" class="form-control"name="trener_id[]">
                                        <option value="NULL" selected>Izaberi...</option>
                                        @foreach ($trainers as $trainer)
                                            <option value="{{ $trainer->id }}">{{ $trainer->ime.' '.$trainer->prezime }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select id="edicijeInputTreninzi" class="form-control" name="trening_id[]">
                                        <option value="NULL" selected>Izaberi...</option>
                                        @foreach ($trainings as $training)
                                            <option value="{{ $training->id }}">{{ $training->naziv }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-primary btn-sm" data-addrow id="edicijeAddRowTreneri" value="Add Row" />
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table id="edicijeTabelaPartnerKategorija" class="table teble-responsive mt-4">
                        <thead>
                            <tr>
                                <td>Partner</td>
                                <td>Kategorija</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select id="edicjeInputPartneri" class="form-control"  name="partner_id[]">
                                        <option value="NULL" selected>Izaberi...</option>
                                        @foreach ($partners as $partner)
                                            <option value="{{ $partner->id }}">{{ $partner->naziv }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select id="edicijeInputKategorijePartner" class="form-control" name="partner_kategorija_id[]">
                                        <option value="NULL" selected>Izaberi...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->naziv }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-primary btn-sm" data-addrow id="edicijeAddRowPartneri" value="Add Row" />
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table id="edicijeTabelaMedijiKategorija" class="table teble-responsive mt-4">
                        <thead>
                            <tr>
                                <td>Medij</td>
                                <td>Kategorija</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select id="edicijeInputMediji" class="form-control" name="medij_id[]">
                                        <option value="NULL" selected>Izaberi...</option>
                                        @foreach ($mediums as $medium)
                                            <option value="{{ $medium->id }}">{{ $medium->naziv }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select id="edicijeInputKategorijeMediji" class="form-control" name="medij_kategorija_id[]">
                                        <option value="NULL" selected>Izaberi...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->naziv }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-primary btn-sm" data-addrow id="edicijeAddRowMediji" value="Add Row" />
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table id="edicijeTabelaSlike" class="table teble-responsive mt-4">
                        <thead>
                            <tr>
                                <td>Slike</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="edicijeSlika" name="slike_edicije[]">
                                        <label class="custom-file-label" for="edicijeSlika">Dodaj sliku</label>
                                    </div>
                                </td>
                                <td class="pr-4">
                                    <input type="button" class="btn btn-primary btn-sm" data-addrow id="edicijeAddRowSlika" value="Add Row" />
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <button type="submit" class="btn btn-primary mt-5">Spasi ediciju</button>
            </form>
        </div>
    </div>
</div>

@endsection