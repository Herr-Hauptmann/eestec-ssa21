@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
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
            <table class="table teble-responsive table-hover mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naziv</th>
                        <th scope="col">Datum</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @if (!$editions->isEmpty())
                <tbody>      
                        @for ($i = 0; $i < 10; $i++) 
                            <tr>
                                <th scope="row">1</th>
                                <td>SSA LITE</td>
                                <td>22.12.2020</td>
                                <td>   
                                    <!-- Umjesto linka a trebat će koristiti button i post metode da bi se informacije proslijedile pogledima-->
                                    <a class="btn-kontrole btn btn-outline-info btn-sm item" href="{{ route('admin.edition.show', $i) }}">View</a>
                                    <a class="btn btn-outline-success btn-sm item" href="{{ route('admin.edition.edit', $i) }}">Edit</a>
                                    <a href="#myModal" data-toggle="modal" data-route="{{ route('admin.edition.destroy', $i) }}" class="btn btn-outline-danger btn-sm item">Delete</a>
                                </td>
                            </tr>                  
                        @endfor                    
                </tbody>
                @endif
            </table>
            @if ($editions->isEmpty())   
                <h3>Nema rezultata</h3>
            @endif
            {{-- <div class="pagination-wrapper"> {!! $editions->appends(['search' => Request::get('search')])->render() !!} </div> --}}
        </div>
    </div>
</div>

@include('admin.brisanje')

@endsection