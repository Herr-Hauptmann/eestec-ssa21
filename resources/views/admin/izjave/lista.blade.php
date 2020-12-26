@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Izjave</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('admin.izjave.dodavanje') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Dodaj novu izjavu</a>
                <form method="get" action="{{ route('admin.izjave') }}" class="form-inline ml-auto mt-2 mt-lg-0">
                    <input name="pretraga" class="form-control mr-sm-2" type="search" placeholder="Ime i/ili prezime" aria-label="Search"  data-toggle="tooltip" data-placement="left" title="Nakon pretrage, za vraćanje na početnu listu pretražite sa praznim search box-om.">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Traži</button>
                </form>
            </div>
            <br/>
            <table class="table teble-responsive table-hover mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ime</th>
                        <th scope="col">Prezime</th>
                        <th scope="col">Tekst</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ($izjave as $izjava) 
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $izjava->ime }}</td>
                        <td>{{ $izjava->prezime }}</td>
                        <td class="text-truncate"  style="max-width: 540px; display: block;" >{{ $izjava->tekst }}</td>
                        <td > <div style="float:right;">
                            <!-- Umjesto linka a trebat će koristiti button i post metode da bi se informacije proslijedile pogledima-->
                            <a class="btn-kontrole btn btn-outline-info btn-sm item" href="{{ route('admin.izjave.pregled', $izjava->id) }}" >Pregled</a>
                            <a class="btn btn-outline-success btn-sm item" href="{{ route('admin.izjave.uredjivanje', $izjava->id) }}">Uredi</a>
                            <a href="#myModal" data-toggle="modal" class="btn btn-outline-danger btn-sm item" data-href="{{ route('admin.izjave.brisanje', $izjava->id) }}">Obriši</a>
                        </div>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                        <tr>
                            <td colspan="12">
                                <div class="row align-items-center justify-content-center align-middle">
                                    {!! $izjave->links("pagination::bootstrap-4")!!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
            </table>
            @if($izjave->isEmpty())
                <div>Nema izjava za prikaz!</div>
            @endif
        </div>
    </div>
</div>
@include('admin.izjave.brisanje')
<script>
window.onload = () => {
    $('#myModal').on('show.bs.modal', e => {
        const link = $(e.relatedTarget).data('href');
        $('#myModal').attr('action', link);
    });
}
//da bi ovaj tooltip funkcionisao potrebno je dodati popper i tooltip biblioteke
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

@endsection