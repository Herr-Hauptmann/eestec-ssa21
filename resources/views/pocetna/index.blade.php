@extends('pocetna.home')

@section('head')

<link rel="stylesheet" href="{{ asset('css/pocetna/pocetna.css') }}">
<link rel="stylesheet" href="{{ asset('css/pocetna/o_ssa.css') }}">
<link rel="stylesheet" href="{{ asset('css/pocetna/o_organizaciji.css') }}">
<link rel="stylesheet" href="{{ asset('css/pocetna/novosti.css') }}">
<link rel="stylesheet" href="{{ asset('css/pocetna/treneri.css') }}">
<link rel="stylesheet" href="{{ asset('css/pocetna/partneri_i_mediji.css') }}">
<link rel="stylesheet" href="{{ asset('css/pocetna/organizatori.css') }}">
<link rel="stylesheet" href="{{ asset('css/pocetna/drugi_o_nama.css') }}">
<link rel="stylesheet" href="{{ asset('css/pocetna/kontakt.css') }}">
<link rel="stylesheet" href="{{ asset('css/pocetna/postignuca.css') }}">
<link rel="stylesheet" href="{{ asset('css/pocetna/treninzi.css') }}">

@endsection

@section('content')

@include('pocetna.menu')
@include('pocetna.pocetna')
@include('pocetna.o_ssa')
@include('pocetna.o_organizaciji')
@include('pocetna.novosti')
@include('pocetna.treninzi')
@include('pocetna.treneri')
@include('pocetna.partneri_i_mediji')
@include('pocetna.organizatori')
@include('pocetna.drugi_o_nama')
@include('pocetna.kontakt')
@include('pocetna.postignuca')

@endsection