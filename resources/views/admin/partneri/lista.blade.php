@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Partneri</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('partneri.create') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Dodaj novog partnera</a>
                <form class="form-inline ml-auto mt-2 mt-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <table class="table teble-responsive table-hover mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naziv</th>
                        <th scope="col">Kategorija</th>
                        <th scope="col">Edicija</th>
                        <th scope="col">Slika</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $brojac = 1;
                    @endphp
                    @foreach ($partneri as $partner)
                    <tr>
                        <th scope="row">{{$brojac}}</th>
                        <td>{{$partner->naziv}}</td>
                        <td>{{$partner->kategorija->naziv}}</td>
                        <td>{{$partner->edicija->naziv}}</td>
                        <td>
                            <img src={{$partner->slika}} class="img-responsive" style="height: 50px;" alt="slika" />
                        </td>
                        <td>
                            <!-- Umjesto linka a trebat će koristiti button i post metode da bi se informacije proslijedile pogledima-->
                            <a href="partneri/{{$partner->id}}" class="btn-kontrole btn btn-info btn-sm item">View</a>
                            <a href="partneri/{{$partner->id}}/edit" class="btn btn-success btn-sm item">Edit</a>
                            <form action="{{ route('partneri.destroy', $partner) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm item">Delete</button>
                            </form>
                        </td>
                        </tr>
                        @php
                            $brojac= $brojac +1;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('admin.brisanje')
@endsection
