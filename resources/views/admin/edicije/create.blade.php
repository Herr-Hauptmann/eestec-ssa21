@extends('admin.admin_home')

@section('scripts')
    <script src="/js/admin/edition.js"></script>
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
            {{-- Uncomment below if you want to display all errors on top of page
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            <form class="m-5" action="{{ route('admin.edition.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="edicijaInputNaziv">Naziv</label>
                        <input type="text" class="form-control @error('naziv') is-invalid @enderror" id="edicijaInputNaziv" placeholder="Naziv" name="naziv" value="{{ old('naziv') }}">
                        @error('naziv')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <input class="form-check-input" type="checkbox" name="unos_stare" id="unosStare" @if (old('unos_stare')) checked @endif>
                        <label class="form-check-label" for="unosStare">
                            <i>Unos stare edicije</i>
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    {{-- 
                        TIP EDICIJE
                        TIP EDICIJE
                        TIP EDICIJE
                    <div class="form-group col-4">
                        <label for="edicija-vrsta">Vrsta edicije</label>
                        </br>
                        <fieldset id="ssaTip">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ssa_tip" id="edicijeRadios1" value="SSA" @if (old('ssa_tip') === 'SSA' || old('ssa_tip') == null) checked @endif>
                                <label class="form-check-label" for="edicijeRadios1">
                                    SSA
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ssa_tip" id="edicijeRadios2" value="SSA LITE" @if (old('ssa_tip') === 'SSA LITE') checked @endif>
                                <label class="form-check-label" for="edicijeRadios2">
                                    SSA LITE
                                </label>
                            </div>
                        </fieldset>
                    </div> --}}
                    <div class="form-group col-4">
                        <label for="edicijeInputBrojUcesnika">Broj učesnika</label>
                        <input type="number" class="form-control @error('broj_ucesnika') is-invalid @enderror" id="edicijeInputBrojUcesnika" placeholder="30" name="broj_ucesnika" min="0" max="200" value="{{ old('broj_ucesnika') }}">
                        @error('broj_ucesnika')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label for="mjestoOdrzavanja">Mjesto održavanja</label>
                        <input type="text" class="form-control @error('mjesto_odrzavanja') is-invalid @enderror" id="mjestoOdrzavanja" placeholder="Mjesto održavanja" name="mjesto_odrzavanja" value="{{ old('mjesto_odrzavanja') }}">
                        @error('mjesto_odrzavanja')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="datumPocetka">Datum početka</label>
                        <input type="date" class="form-control @error('datum_pocetka') is-invalid @enderror" id="datumPocetka" placeholder="dd.mm.gggg" name="datum_pocetka" value="{{ old('datum_pocetka') }}">
                        @error('datum_pocetka')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="datumKraja">Datum kraja</label>
                        <input type="date" class="form-control @error('datum_kraja') is-invalid @enderror" id="datumKraja" placeholder="dd.mm.gggg" name="datum_kraja" value="{{ old('datum_kraja') }}">
                        @error('datum_kraja')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div id="datumiOtvaranjaIZatvaranjaPrijava" class="form-row @if (old('unos_stare')) d-none @endif">
                    <div class="form-group col-md-6">
                        <label for="datumOtvaranja">Datum otvaranja prijava</label>
                        <input type="date" class="form-control @error('datum_otvaranja_prijava') is-invalid @enderror" id="datumOtvaranja" placeholder="dd.mm.gggg" name="datum_otvaranja_prijava" value="{{ old('datum_otvaranja_prijava') }}">
                        @error('datum_otvaranja_prijava')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="datumZatvaranja">Datum zatvaranja prijava</label>
                        <input type="date" class="form-control @error('datum_zatvaranja_prijava') is-invalid @enderror" id="datumZatvaranja" placeholder="dd.mm.gggg" name="datum_zatvaranja_prijava" value="{{ old('datum_zatvaranja_prijava') }}">
                        @error('datum_zatvaranja_prijava')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                @include('admin.edicije.table', [
                    'col1'                  =>  'Organizator',
                    'col2'                  =>  'Pozicija',
                    'input_name1'           =>  'organizator_id',
                    'array1'                =>  $organizers,
                    'select_option_1_text'  =>  function($organizer) { return $organizer->ime . ' ' . $organizer->prezime; },
                    'input_name2'           =>  'pozicija_id',
                    'array2'                =>  $positions,
                    'select_option_2_text'  =>  function($position) { return $position->naziv; }
                ])
                @include('admin.edicije.table', [
                    'col1'                  =>  'Trener',
                    'col2'                  =>  'Trening',
                    'input_name1'           =>  'trener_id',
                    'array1'                =>  $trainers,
                    'select_option_1_text'  =>  function($trainer) { return $trainer->ime . ' ' . $trainer->prezime; },
                    'input_name2'           =>  'trening_id',
                    'array2'                =>  $trainings,
                    'select_option_2_text'  =>  function($training) { return $training->naziv; }
                ])
                @include('admin.edicije.table', [
                    'col1'                  =>  'Partner',
                    'col2'                  =>  'Kategorija',
                    'input_name1'           =>  'partner_id',
                    'array1'                =>  $partners,
                    'select_option_1_text'  =>  function($partner) { return $partner->naziv; },
                    'input_name2'           =>  'partner_kategorija_id',
                    'array2'                =>  $categories,
                    'select_option_2_text'  =>  function($category) { return $category->naziv; }
                ])
                @include('admin.edicije.table', [
                    'col1'                  =>  'Medij',
                    'col2'                  =>  'Kategorija',
                    'input_name1'           =>  'medij_id',
                    'array1'                =>  $mediums,
                    'select_option_1_text'  =>  function($media) { return $media->naziv; },
                    'input_name2'           =>  'medij_kategorija_id',
                    'array2'                =>  $categories,
                    'select_option_2_text'  =>  function($category) { return $category->naziv; }
                ])
                {{-- <div class="form-row">
                    <table id="edicijeTabelaOrganizatorPozicija" class="table mt-5">
                        <thead>
                            <tr>
                                <td>Organizator</td>
                                <td>Pozicija</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (\is_array(old('organizator_id')) && count(old('organizator_id')) > 0)
                                @foreach (old('organizator_id') as $index => $id)
                                    <tr>
                                        <td>
                                            <select class="form-control @error('organizator_id.' . $index) is-invalid @enderror" name="organizator_id[]">
                                                <option value="0" @error('organizator_id.' . $index) selected @enderror>Izaberi...</option>
                                                @foreach ($organizers as $organizer)
                                                    <option value="{{ $organizer->id }}" @if ($organizer->id == $id) selected @endif >{{ $organizer->ime.' '.$organizer->prezime }}</option>
                                                @endforeach
                                            </select>
                                            @error('organizator_id.' . $index)
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td>
                                            <select class="form-control @error('pozicija_id.' . $index) is-invalid @enderror" name="pozicija_id[]">
                                                <option value="0" @error('pozicija_id.' . $index) selected @enderror>Izaberi...</option>
                                                @foreach ($positions as $position)
                                                    <option value="{{ $position->id }}" @if ($position->id == old('pozicija_id')[$index]) selected @endif >{{ $position->naziv }}</option>
                                                @endforeach
                                            </select>
                                            @error('pozicija_id.' . $index)
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="button" class="btn btn-primary btn-sm" data-addrow id="edicijeAddRowOrganizatori" value="Add Row" />
                                            <input type="button" class="btn btn-danger btn-sm" data-removerow id="edicijeRemoveRowOrganizatori" value="Remove Row" />
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <select class="form-control" name="organizator_id[]">
                                            <option selected>Izaberi...</option>
                                            @foreach ($organizers as $organizer)
                                                <option value="{{ $organizer->id }}">{{ $organizer->ime.' '.$organizer->prezime }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="pozicija_id[]">
                                            <option value="0" selected>Izaberi...</option>
                                            @foreach ($positions as $position)
                                                <option value="{{ $position->id }}">{{ $position->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="button" class="btn btn-primary btn-sm" data-addrow id="edicijeAddRowOrganizatori" value="Add Row" />
                                        <input type="button" class="btn btn-danger btn-sm" data-removerow id="edicijeRemoveRowOrganizatori" value="Remove Row" />
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div> --}}
                {{-- <div class="form-row">
                    <table id="edicijeTabelaTrenerTrening" class="table mt-4">
                        <thead>
                            <tr>
                                <td>Trener</td>
                                <td>Trening</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (\is_array(old('trener_id')) && count(old('trener_id')) > 0)
                                @foreach (old('trener_id') as $index => $id)
                                    <tr>
                                        <td>
                                            <select class="form-control @error('trener_id.' . $index) is-invalid @enderror" name="trener_id[]">
                                                <option value="0" @error('trener_id.' . $index) selected @enderror>Izaberi...</option>
                                                @foreach ($trainers as $trainer)
                                                    <option value="{{ $trainer->id }}" @if ($trainer->id == $id) selected @endif>{{ $trainer->ime.' '.$trainer->prezime }}</option>
                                                @endforeach
                                            </select>
                                            @error('trener_id.' . $index)
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td>
                                            <select class="form-control @error('trening_id.' . $index) is-invalid @enderror" name="trening_id[]">
                                                <option value="0" @error('trening_id.' . $index) selected @enderror>Izaberi...</option>
                                                @foreach ($trainings as $training)
                                                    <option value="{{ $training->id }}" @if ($training->id == old('trening_id')[$index]) selected @endif>{{ $training->naziv }}</option>
                                                @endforeach
                                            </select>
                                            @error('trening_id.' . $index)
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="button" class="btn btn-primary btn-sm" data-addrow id="edicijeAddRowTreneri" value="Add Row" />
                                            <input type="button" class="btn btn-danger btn-sm" data-removerow id="edicijeRemoveRowOrganizatori" value="Remove Row" />
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <select class="form-control"name="trener_id[]">
                                            <option value="0" selected>Izaberi...</option>
                                            @foreach ($trainers as $trainer)
                                                <option value="{{ $trainer->id }}">{{ $trainer->ime.' '.$trainer->prezime }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="trening_id[]">
                                            <option value="0" selected>Izaberi...</option>
                                            @foreach ($trainings as $training)
                                                <option value="{{ $training->id }}">{{ $training->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="button" class="btn btn-primary btn-sm" data-addrow id="edicijeAddRowTreneri" value="Add Row" />
                                        <input type="button" class="btn btn-danger btn-sm" data-removerow id="edicijeRemoveRowOrganizatori" value="Remove Row" />
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div> --}}
                {{-- <div class="form-row">
                    <table id="edicijeTabelaPartnerKategorija" class="table mt-4">
                        <thead>
                            <tr>
                                <td>Partner</td>
                                <td>Kategorija</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (\is_array(old('partner_id')) && count(old('partner_id')) > 0)
                                @foreach (old('partner_id') as $index => $id)
                                    <tr>
                                        <td>
                                            <select class="form-control @error('partner_id.' . $index) is-invalid @enderror" name="partner_id[]">
                                                <option value="0" @error('partner_id.' . $index) selected @enderror>Izaberi...</option>
                                                @foreach ($partners as $partner)
                                                    <option value="{{ $partner->id }}" @if ($partner->id == $id) selected @endif>{{ $partner->naziv }}</option>
                                                @endforeach
                                            </select>
                                            @error('partner_id.' . $index)
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td>
                                            <select class="form-control @error('partner_kategorija_id.' . $index) is-invalid @enderror" name="partner_kategorija_id[]">
                                                <option value="0" @error('partner_kategorija_id.' . $index) selected @enderror>Izaberi...</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if ($category->id == old('partner_kategorija_id')[$index]) selected @endif>{{ $category->naziv }}</option>
                                                @endforeach
                                            </select>
                                            @error('partner_kategorija_id.' . $index)
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="button" class="btn btn-primary btn-sm" data-addrow id="edicijeAddRowPartneri" value="Add Row" />
                                            <input type="button" class="btn btn-danger btn-sm" data-removerow id="edicijeRemoveRowOrganizatori" value="Remove Row" />
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <select class="form-control"  name="partner_id[]">
                                            <option value="0" selected>Izaberi...</option>
                                            @foreach ($partners as $partner)
                                                <option value="{{ $partner->id }}">{{ $partner->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="partner_kategorija_id[]">
                                            <option value="0" selected>Izaberi...</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="button" class="btn btn-primary btn-sm" data-addrow id="edicijeAddRowPartneri" value="Add Row" />
                                        <input type="button" class="btn btn-danger btn-sm" data-removerow id="edicijeRemoveRowOrganizatori" value="Remove Row" />
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>     --}}
                {{-- <div class="form-row">
                    <table id="edicijeTabelaMedijiKategorija" class="table mt-4">
                        <thead>
                            <tr>
                                <td>Medij</td>
                                <td>Kategorija</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (\is_array(old('medij_id')) && count(old('medij_id')) > 0)
                                @foreach (old('medij_id') as $index => $id)
                                    <tr>
                                        <td>
                                            <select class="form-control @error('medij_id.' . $index) is-invalid @enderror" name="medij_id[]">
                                                <option value="0" @error('medij_id.' . $index) selected @enderror>Izaberi...</option>
                                                @foreach ($mediums as $medium)
                                                    <option value="{{ $medium->id }}" @if ($medium->id == $id) selected @endif>{{ $medium->naziv }}</option>
                                                @endforeach
                                            </select>
                                            @error('medij_id.' . $index)
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td>
                                            <select class="form-control @error('medij_kategorija_id.' . $index) is-invalid @enderror" name="medij_kategorija_id[]">
                                                <option value="0" @error('medij_kategorija_id.' . $index) selected @enderror>Izaberi...</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if ($category->id == old('medij_kategorija_id')[$index]) selected @endif>{{ $category->naziv }}</option>
                                                @endforeach
                                            </select>
                                            @error('medij_kategorija_id.' . $index)
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="button" class="btn btn-primary btn-sm" data-addrow id="edicijeAddRowMediji" value="Add Row" />
                                            <input type="button" class="btn btn-danger btn-sm" data-removerow id="edicijeRemoveRowOrganizatori" value="Remove Row" />
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <select class="form-control" name="medij_id[]">
                                            <option value="0">Izaberi...</option>
                                            @foreach ($mediums as $medium)
                                                <option value="{{ $medium->id }}">{{ $medium->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="medij_kategorija_id[]">
                                            <option value="0">Izaberi...</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="button" class="btn btn-primary btn-sm" data-addrow id="edicijeAddRowMediji" value="Add Row" />
                                        <input type="button" class="btn btn-danger btn-sm" data-removerow id="edicijeRemoveRowOrganizatori" value="Remove Row" />
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div> --}}

                {{-- 
                    SLIKE SLIKE SLIKE SLIKE
                    SLIKE SLIKE SLIKE SLIKE
                    SLIKE SLIKE SLIKE SLIKE
                <div class="form-row">
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
                                    <input type="button" class="btn btn-danger btn-sm" data-removerow id="edicijeRemoveRowOrganizatori" value="Remove Row" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> --}}
                <button type="submit" class="btn btn-primary mt-5">Spasi ediciju</button>
            </form>
        </div>
    </div>
</div>

@endsection