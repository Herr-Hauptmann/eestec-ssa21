@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Prijave</p>
            </div>
            <div class="row m-2 p-1">

                <form class="form-inline ml-auto mt-2 mt-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <table class="table teble-responsive table-hover mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ime</th>
                        <th scope="col">Prezime</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 10; $i++) <tr>
                        <th scope="row">1</th>
                        <td>Samra</td>
                        <td>Pušina</td>
                        <td>samra@gmail.com</td>
                        <td>
                            <!-- Umjesto linka a trebat će koristiti button i post metode da bi se informacije proslijedile pogledima-->
                            <a  href="{{ route('admin.prijave.bodovanje') }}" class="btn-kontrole btn btn-outline-info btn-sm item">Boduj</a>

                        </td>
                        </tr>
                        @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('admin.brisanje')
@endsection