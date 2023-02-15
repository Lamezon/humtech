@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
       
        <span class="page-title">Processo #1</span><br>
        <hr>
        <h1 style="font-weight: bold; font-size: 20px"><a href="exemplo2">Inicial</h1></a>
        <button class="btn btn-block btn-success"><i class="fa-solid fa-plus"></i>Adicionar Fotos</button>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('image/1.png') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('image/1.png') }}" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
        <br>
        <hr>
        <h1 style="font-weight: bold; font-size: 20px">CheckList/Entrada do Veículo</h1>
        <button class="btn btn-block btn-success"><i class="fa-solid fa-plus"></i>Adicionar Fotos</button>
        <div id="carousel2ExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('image/1.png') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('image/1.png') }}" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel2ExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel2ExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
        <br>
        <hr>
        <h2>Vistoria Complementar</h2>
        <button class="btn btn-block btn-success"><i class="fa-solid fa-plus"></i>Adicionar Fotos</button>
        <br>
        <hr>
        <h2>Lataria</h2>
        <button class="btn btn-block btn-success"><i class="fa-solid fa-plus"></i>Adicionar Fotos</button>
        
        <br>
        <hr>
        <h2>Pintura</h2>
        <button class="btn btn-block btn-success"><i class="fa-solid fa-plus"></i>Adicionar Fotos</button>
        
        <br>
        <hr>
        <h2>Mecânica</h2>
        <button class="btn btn-block btn-success"><i class="fa-solid fa-plus"></i>Adicionar Fotos</button>
        
        <br>
        <hr>
        <h2>Entrega do Veículo</h2>
        <button class="btn btn-block btn-success"><i class="fa-solid fa-plus"></i>Adicionar Fotos</button>
        
        <br>
        @endauth
@endsection