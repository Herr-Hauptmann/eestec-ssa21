@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Pozicije</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('pozicije.create') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Dodaj novu poziciju</a>
                <form class="form-inline ml-auto mt-2 mt-lg-0" type="GET" action="{{ url('/pozicije/search')}}">
                    <input class="form-control mr-sm-2" type="search" name="pozicija_search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

            </div>
            <table class="table teble-responsive table-hover mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naziv pozicije</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $brojac = 1;
                    @endphp

                    @foreach ($pozicije as $pozicija)
                        <tr>
                            <td scope="row">{{$brojac}}</td>
                            <td>{{$pozicija->naziv}}</td>
                            <td>
                                <a href="pozicije/{{$pozicija->id}}" class="btn-kontrole btn btn-info btn-sm item">View</a>
                                <a href="pozicije/{{$pozicija->id}}/edit" class="btn btn-success btn-sm item">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('pozicije.destroy', $pozicija) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" onclick="return confirm('Da li si siguran da zelis izbrisati poziciju: {{$pozicija->naziv}}?')" class="btn btn-danger btn-sm item">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @php
                        $brojac= $brojac + 1;
                    @endphp
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@include('admin.brisanje')
@endsection
