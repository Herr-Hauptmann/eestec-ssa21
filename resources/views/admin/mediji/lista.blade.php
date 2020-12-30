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
                <p>Mediji</p>
            </div>
            <div class="row m-2 p-1">
                <a  
                    href="{{ route('admin.mediji.dodavanje') }}" 
                    class="btn btn-sm  btn-outline-success col-12 col-sm-3 d-inline-flex align-items-center justify-content-center"
                >
                    Dodaj novi medij
                </a>
                <form method="get" action="{{ route('admin.mediji') }}" class="form-inline ml-auto mt-2 mt-lg-0">
                    <input name="search" class="form-control mr-sm-2" type="search" placeholder="Naziv" aria-label="Search"  data-toggle="tooltip" data-placement="left" title="Nakon pretrage, za vraćanje na početnu listu pretražite sa praznim search box-om.">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Traži</button>
                </form>
            </div>
            <br/>
            <table class="table teble-responsive table-hover mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naziv</th>
                        <th scope="col">Link</th>
                        <th scope="col">Slika</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ($mediji as $medij) 
                    <tr>
                        <th scope="row">{{($mediji->currentpage()-1) * $mediji->perpage() + $loop->index + 1 }}</th>
                        <td>{{ $medij->naziv }}</td>
                        <td class="text-truncate"  style="max-width: 540px; display: block;" >
                            <a href="{{ $medij->link }}">{{ $medij->link }}</a></td>
                        <td>
                            <img src="{{ Storage::url('public/img/mediji/' . $medij->slika) }}" class="img-responsive" style="height: 50px;" alt="slika" />
                        </td>
                        <td > <div style="float:right;">
                            <a class="btn-kontrole btn btn-outline-info btn-sm item" href="{{ route('admin.mediji.detalji', $medij->id) }}" >Pregled</a>
                            <a class="btn btn-outline-success btn-sm item" href="{{ route('admin.mediji.uredjivanje', $medij->id) }}">Uredi</a>
                            <a href="#myModal" data-toggle="modal" class="btn btn-outline-danger btn-sm item" data-href="{{ route('admin.mediji.obrisi', $medij->id) }}">Obriši</a>
                        </div>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                        <tr>
                            <td colspan="12">
                                <div class="row align-items-center justify-content-center align-middle">
                                    {!! $mediji->links("pagination::bootstrap-4")!!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
            </table>
            @if($mediji->isEmpty())
                <div>Nema medija za prikaz!</div>
            @endif
        </div>
    </div>
</div>

@include('admin.mediji.brisanje')
<script>
    window.onload = () => {
        $('#myModal').on('show.bs.modal', e => {
            const link = $(e.relatedTarget).data('href');
            $('#myModal').attr('action', link);
        });
    }
</script>
@endsection
