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
                <form class="form-inline ml-auto mt-2 mt-lg-0" method="GET" action="{{ url()->current() }}" role="search">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search...." value="{{ request('search') }}"aria-label="Search">
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
                    <tbody class='tbody'>
                        @foreach($organizatori as $organizator)
                        <tr>
                        <th scope="row"class="align-middle">{{$loop->iteration+($organizatori->currentPage()-1)*$poStranici}}</th>
                            <td class="align-middle">{{ $organizator->ime }}</td>
                            <td class="align-middle">{{$organizator->prezime}}</td>
                            <td class="align-middle">{{$organizator->telefon}}</td>
                            <td class="align-middle">{{$organizator->mail}}</td>
                            <td class="align-middle">
                                <div class="row">
                                <a class="btn-kontrole btn btn-outline-info btn-sm item btn-block mr-1" href="organizatori/{{$organizator->id}}">View</a>
                                </div>
                                <div class="row">
                                    <a class="btn btn-outline-success btn-sm item btn-block mr-1" href="organizatori/{{$organizator->id}}/edit">Edit</a>
                                </div>
                                <div class="row">
                                    <form method="POST" action="{{ route('organizatori.destroy', $organizator->id) }}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn-kontrole btn btn-outline-danger btn-sm item btn-block mr-2" title="delete" onclick="return confirm(&quot;Da li si siguran da želiš obrisati organizatora?&quot;)">Delete</button>
                                    </form>
                                </div>
                            </td> 
                        @endforeach 
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">
                                <div class="row align-items-center justify-content-center align-middle">
                                    {!! $organizatori->appends(['search' => Request::get('search')])->render() !!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection