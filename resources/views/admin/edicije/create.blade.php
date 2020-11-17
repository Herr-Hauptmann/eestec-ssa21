@extends('admin.admin_home')


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
                <a href="{{ route('admin.edicije') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na edicije</a>
            </div>
            <form class="m-5" action="{{ route('admin.edicije.spasavanje') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="edicijaInputNaziv">Naziv</label>
                        <input type="text" class="form-control" id="edicijaInputNaziv" placeholder="Naziv">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="edicija-vrsta">Vrsta edicije</label>
                        </br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="edicijeRadios1" id="edicijeRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                SSA
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="edicijeRadios2" id="edicijeRadios2" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                SSA LITE
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="edicijeInputBrojUcesnika">Broj učesnika</label>
                        <select id="edicijeInputBrojUcesnika" class="form-control">
                            <option selected>20</option>
                            <option>30</option>
                            <option>40</option>
                            <option>50</option>
                            <option>60</option>
                            <option>70</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="datumOdrzavanja">Datum održavanja</label>
                        <input type="text" class="form-control" id="datumOdrzavanja" placeholder="dd.mm.gggg">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mjestoOdrzavanja">Mjesto održavanja</label>
                        <input type="text" class="form-control" id="mjestoOdrzavanja" placeholder="Mjesto održavanja">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="datumOtvaranja">Datum otvaranja prijava</label>
                        <input type="text" class="form-control" id="datumOtvaranja" placeholder="dd.mm.gggg">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="datumZatvaranja">Datum zatvaranja prijava</label>
                        <input type="text" class="form-control" id="datumZatvaranja" placeholder="dd.mm.gggg">
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
                                    <select id="edicijeInputOrganizatori" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </td>
                                <td>
                                    <select id="edicijeInputPozicije" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-primary btn-sm" id="edicijeAddRowOrganizatori" value="Add Row" />
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
                                    <select id="edicijeInputTreneri" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </td>
                                <td>
                                    <select id="edicijeInputTreninzi" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-primary btn-sm" id="edicijeAddRowTreneri" value="Add Row" />
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
                                    <select id="edicjeInputPartneri" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </td>
                                <td>
                                    <select id="edicijeInputKategorije" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-primary btn-sm" id="edicijeAddRowPartneri" value="Add Row" />
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
                                    <select id="edicijeInputMediji" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </td>
                                <td>
                                    <select id="edicijeInputKategorije" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-primary btn-sm" id="edicijeAddRowMediji" value="Add Row" />
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
                                        <input type="file" class="custom-file-input" id="edicijeSlika">
                                        <label class="custom-file-label" for="edicijeSlika">Umetni sliku</label>
                                    </div>
                                </td>
                                <td class="pr-4">
                                    <input type="button" class="btn btn-primary btn-sm" id="edicijeAddRowSlika" value="Add Row" />
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