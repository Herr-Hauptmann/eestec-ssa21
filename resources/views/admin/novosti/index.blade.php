@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Novosti</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('novosti.create') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Dodaj novost</a>
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
                            <th scope="col">Naslov</th>
                            <th scope="col">Datum</th>
                            <th scope="col">Tekst</th>
                            <th scope="col">Slika</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class='tbody'>
                        @foreach($novosti as $novost)
                            <tr>
                                <th scope="row"class="align-middle">{{$loop->iteration+($novosti->currentPage()-1)*$poStranici}}</th>
                                <td class="align-middle">{{ $novost->naslov }}</td>
                                <td class="align-middle">{{ $novost->datum }}</td>
                                @if (strlen($novost->tekst) > 10)
                                    <td class="align-middle">{{ substr($novost->tekst, 0, 10) }}...</td>
                                @else
                                    <td class="align-middle">{{ $novost->tekst }}</td>
                                @endif
                                <td class="align-middle">{{ $novost->slika }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('novosti.show', $novost->id) }}" class="btn-kontrole btn btn-outline-info btn-sm item">View</a>
                                    <a href="{{ route('novosti.edit', $novost->id) }}" class="btn btn-outline-success btn-sm item">Edit</a>
                                    <form method="POST" action="{{ route('novosti.destroy', $novost->id) }}" style="display: inline-block;">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn-kontrole btn btn-outline-danger btn-sm item" title="delete" onclick="return confirm(&quot;Da li si siguran da želiš obrisati novost?&quot;)">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">
                                <div class="row align-items-center justify-content-center align-middle">
                                    {!! $novosti->appends(['search' => Request::get('search')])->render() !!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@include('admin.brisanje')
@endsection