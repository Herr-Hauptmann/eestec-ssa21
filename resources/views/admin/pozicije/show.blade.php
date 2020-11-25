@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">

            <div class="row m-2 p-1">
                <div class="col-12 col-md-4" allign-left>
                    <p class="text-left font-weight-bold">
                        Naziv pozicije:
                    </p>
                </div>
                <div class="col-12 col-md-8">
                    <p class="text-left">
                        {{$pozicija->naziv}}
                    </p>
                </div>
                <div class="col-12 col-md-4">
                    <p class="text-left font-weight-bold">
                        Opis pozicije:
                    </p>
                </div>
                <div class="col-12 col-md-8"  style="overflow: hidden">
                    <p class="text-left">
                        {{$pozicija->opis}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.brisanje')
@endsection
