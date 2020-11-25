@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>{{$partner->naziv}}</p>
            </div>
            <div class="row m-2 p-1">
                <div class="col-12 col-md-4" allign-left>
                    <p class="text-left font-weight-bold">
                        Naziv partnera:
                    </p>
                </div>
                <div class="col-12 col-md-8">
                    <p class="text-left">
                        {{$partner->naziv}}
                    </p>
                </div>
                <div class="col-12 col-md-4">
                    <p class="text-left font-weight-bold">
                        Kategorija:
                    </p>
                </div>
                <div class="col-12 col-md-8">
                    <p class="text-left" >
                        {{$partner->kategorija->naziv}}
                    </p>
                </div>
                <div class="col-12 col-md-4">
                    <p class="text-left font-weight-bold">
                        Edicija:
                    </p>
                </div>
                <div class="col-12 col-md-8">
                    <p class="text-left">
                        to be implemented
                    </p>
                </div>
                <div class="col-12 col-md-4">
                    <p class="text-left font-weight-bold">
                        Link:
                    </p>
                </div>
                <div class="col-12 col-md-8"  style="overflow: hidden">
                    <p class="text-left">
                        <a href="{{$partner->link}}">{{$partner->link}}</a>
                    </p>
                </div>
                <div class="col-12">
                    <p>
                        <img src={{$partner->slika}} class="img-responsive" style="width:50%"  alt="slika" />
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.brisanje')
@endsection
