
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="text-right">
        <button type="button" class="btn btn-primary"><a href="{{ route('user.structures.index') }}" class="text-light">Torna alla home</a></button>
    </div>
    <div class="d-flex">
    <div class="col-6">
            <h4 class="text-secondary">ID: {{ $structure->id }}</h4>

            <div class="text-left">
                <h5 class="text-primary">Nome Struttura: {{ $structure->name }}</h5>
                <h5 class="text-secondary">Stanze disponibili : {{ $structure->rooms }}</h5>
                <h5 class="text-secondary">Letti disponibili: {{ $structure->beds }}</h5>
                <h5 class="text-secondary">Bagni : {{ $structure->bathrooms }}</h5>
                <h5 class="text-secondary">Metri quadri struttura: {{ $structure->sqm }}</h5>
                <h5 class="text-secondary">Indirizzo Struttura: {{ $address }}</h5>
                <div>
                    <img src="{{asset('storage/' . $structure->cover_img_path)}}" alt="">
                </div>

                <h2>Servizi disponibili in struttura</h2>
                @foreach($structure->services as $service)
                <p class="badge badge-primary ">{{ $service->name }}</p>
                @endforeach
                <h5 class="text-secondary">Numero Totale Visite: {{ $viewsLastDay }}</h5>
                <h5 class="text-secondary">Numero Totale Visite Ultimo Giorno: {{ $viewsLastDay }}</h5>
                <h5 class="text-secondary">Numero Totale Visite Ultima Settimana: {{ $viewsLastWeek }}</h5>
                <h5 class="text-secondary">Numero Totale Visite Ultimo Mese: {{ $viewsLastMonth }}</h5>
                <h5 class="text-secondary">Numero Totale Visitatori {{ $viewsUnique }}</h5>
            </div>
        </div>
        <div class="col-6">   
            <my-maps
            latitude = {{$lat}}
            longitude = {{$lng}}
            typeofshow = {{$typeofshow}}
            tomtomkey = {{env('TOMTOM_API_KEY')}}
            >
            </my-maps>
        </div>
    
    </div>
        
</div>


<div class="row d-flex justify-content-around">
    @if(count($structure->messages) >0) 
    <div>
        <show-messages-button :structuremessages="{{$messages}}">
        </show-messages-button>
    @endif    
    </div>
    <div>
        <form action="{{ route('user.structures.destroy', $structure->id) }}" method="post" class="delete_form text-center" >
            @csrf
            @method('DELETE')
            <delete-button></delete-button>
        </form>
    </div>
</div>



	
@endsection


