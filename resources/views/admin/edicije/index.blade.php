@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    @include('admin.flash-messages')
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Edicije</p>
            </div>
            
            <div class="row m-2 p-1">
                <a href="{{ route('admin.edition.create') }}" class="btn btn-sm btn-outline-success col-12 col-sm-3">Dodaj novu ediciju</a>
                <form class="form-inline ml-auto mt-2 mt-lg-0" name="edicijesearch" action="{{ url()->current() }}" method="GET" role="search">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="d-flex flex-fill justify-content-center"> {{ $editions->appends(['search' => Request::get('search')])->links() }} </div>
            <table class="table teble-responsive table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naziv</th>
                        <th scope="col">Datum početka</th>
                        <th scope="col">Akcije</th>
                    </tr>
                </thead>
                {{ $editions }}
                @if (!$editions->isEmpty())
                <tbody>      
                        @foreach ($editions as $edition)
                            <tr>
                                <th scope="row">{{ $loop->iteration + $editions->perPage() * ($editions->currentPage() - 1) }}</th>
                                <td>{{ $edition->naziv }}</td>
                                <td>{{ $edition->datum_pocetka }}</td>
                                <td>   
                                    <!-- Umjesto linka a trebat će koristiti button i post metode da bi se informacije proslijedile pogledima-->
                                    <a class="btn-kontrole btn btn-outline-info btn-sm item" href="{{ route('admin.edition.show', $edition->id) }}">View</a>
                                    <a class="btn btn-outline-success btn-sm item" href="{{ route('admin.edition.edit', $edition->id) }}">Edit</a>
                                    <a href="#myModal" data-toggle="modal" data-route="{{ route('admin.edition.destroy', $edition->id) }}" class="btn btn-outline-danger btn-sm item">Delete</a>
                                </td>
                            </tr>       
                        @endforeach
                  
                </tbody>
                @endif
            </table>
            @if ($editions->isEmpty())   
                <h3>Nema rezultata</h3>
            @endif
        </div>
    </div>
</div>

@include('admin.brisanje')

@endsection