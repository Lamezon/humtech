@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
       
        <span class="page-title">Processo #1</span><br>
        <hr>
        <h1 style="font-weight: bold; font-size: 20px">Inicial</h1>
        <div class="container">
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02">
                <label class="btn-success input-group-text" for="inputGroupFile02">Upload</label>
            </div>
        </div>
        <section class="">
            <section class="">
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                    <img src="{{ asset('image/1.png') }}" class="w-100"/>
                    <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal1">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                    </a>
                </div>
                </div>  
                <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                    <img src="{{ asset('image/1.png') }}" class="w-100"/>
                        <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal2">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                        </a>
                </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                    <img src="{{ asset('image/1.png') }}" class="w-100"/>
                        <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal3">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        @endauth
@endsection