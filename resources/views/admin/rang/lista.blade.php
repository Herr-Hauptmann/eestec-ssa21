@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Rang lista</p>
            </div>
            <div class="row m-2 p-1">

                <form method="get" action="{{ route('admin.rang') }}" class="form-inline ml-auto mt-2 mt-lg-0">
                    <input name="pretraga" class="form-control mr-sm-2" type="search" placeholder="Ime i/ili prezime" aria-label="Search"  data-toggle="tooltip" data-placement="left" title="Nakon pretrage, za vraćanje na početnu listu pretražite sa praznim search box-om.">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Traži</button>
                </form>

            </div>
            <div class="col-12 col-sm-3" aria-controls="dataTable">
                        <select  name = "edicija"  class="edicija-dropdown form-control form-control-sm custom-select custom-select-sm">
                        @foreach ($edicije as $edicija)
                            <option class="edicija-dropdown-item" method="post" action="{{ route('admin.rang') }}" value="{{$edicija->id}}"
                            @if ($edicija->id == $selektovan)
                                selected="selected"
                            @endif
                            > {{$edicija->naziv}}</option>
                        @endforeach  
                        </select>
                    </div>

            <table id="rang-tabela" class="table teble-responsive table-hover mt-5">
                <thead>
                    <tr>
                        <th scope="col">Rang</th>
                        <th scope="col">Ime</th>
                        <th scope="col">Prezime</th>
                        <th scope="col">Zvjezdica</th>
                        <th scope="col">Bodovi</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ($rang as $kandidat)  <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $kandidat->ime }}</td>
                        <td>{{ $kandidat->prezime }}</td>
                        <td>{{ $kandidat->zvjezdica }}</td>
                        <td>{{ $kandidat->ukupniBodovi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection