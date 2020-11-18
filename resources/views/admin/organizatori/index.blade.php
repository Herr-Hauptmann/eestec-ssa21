@extends('admin.admin_home')
@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Organizatori</p>
            </div>
            <div class="row m-2 p-1">
            <a href="{{route('organizatori.create')}}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Dodaj novog organizatora</a>
                <form class="form-inline ml-auto mt-2 mt-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mt-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ime</th>
                            <th scope="col">Prezime</th>
                            <th scope="col">Telefon</th>
                            <th scope="col">Mail</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($organizatori as $organizator)
                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                            <td>{{ $organizator->ime }}</td>
                            <td>{{$organizator->prezime}}</td>
                            <td>{{$organizator->telefon}}</td>
                            <td>{{$organizator->mail}}</td>
                            <td>
                                <a class="btn-kontrole btn btn-outline-info btn-sm item"style="display:inline">View</a>
                                <a class="btn btn-outline-success btn-sm item"style="display:inline">Edit</a>
                                <form method="POST" action="{{ route('organizatori.destroy', $organizator->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-outline-danger btn-sm item" title="delete" onclick="return confirm(&quot;Da li si siguran da želiš obrisati organizatora?&quot;)">Delete</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection