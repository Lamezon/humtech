@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth

        <form method="post" action="{{ route('report-index') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />  

            <div class="form-group">

            </div>
            <div class="form-group">
                <label for="start_date">Após:</label>
                <input style="text-align: center" class="form-control" type="date" name="start_date" id="start_date"><br>
                <label for="end_date">Antes de:</label>
                <input style="text-align: center" class="form-control" type="date" name="end_date" id="end_date">
            </div>
            <br>
            <div class="form-group" style="text-align: center">
                <label for="payment">Forma de Pagamento</label>

                  <div class="form-check">
                    <input class="form-check-input" value="Dinheiro" type="radio" name="payment" id="payment2">
                    <label class="form-check-label" for="payment2">
                      Dinheiro
                    </label>
                  </div>
                  <hr>
                  <div class="form-check">
                    <input class="form-check-input" value="Cartão" type="radio" name="payment" id="payment3">
                    <label class="form-check-label" for="payment3">
                      Cartão
                    </label>
                  </div>
                  <hr>
                  <div class="form-check">
                    <input class="form-check-input" value="PIX" type="radio" name="payment" id="payment4">
                    <label class="form-check-label" for="payment4">
                      PIX
                    </label>
                  </div>
                  <hr>
            </div>
            <br>


            <button type="submit" class="btn btn-info">Filtrar</button>
        </form>

                
        @endauth
@endsection