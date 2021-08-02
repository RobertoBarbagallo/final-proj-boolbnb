@extends('layouts.app')
@section('content')
@dump($requestIp)
@if($contactedStructure)
<created-message-pop-up
contactedstructure = {{$contactedStructure}}
>
</created-message-pop-up>

@endif

<div class="container">
    <div class="text-right">
        <button type="button" class="btn btn-primary"><a href="{{ route('home.index') }}" class="text-light">Torna alla home</a></button>
    </div>
    <div class="border row">
        <div class="col">
            <h4 class="text-secondary">ID: {{ $structure->id }}</h4>

            <div class="text-left">
                <h5 class="text-primary">Nome Struttura: {{ $structure->name }}</h5>
                <h5 class="text-secondary">Stanze disponibili : {{ $structure->rooms }}</h5>
                <h5 class="text-secondary">Letti disponibili: {{ $structure->beds }}</h5>
                <h5 class="text-secondary">Bagni : {{ $structure->bathrooms }}</h5>
                <h5 class="text-secondary">Metri quadri struttura: {{ $structure->sqm }}</h5>
                <h5 class="text-secondary">Indirizzo Struttura: {{ $address }}</h5>
                <div>
                    <img src="{{ $structure->cover_image_url ? asset('storage/' . $structure->cover_img_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png'}}" alt="">
                </div>

                <h2>Servizi disponibili in struttura</h2>
                @foreach($structure->services as $service)
                <p class="badge badge-primary ">{{ $service->name }}</p>
                @endforeach
            </div>

          

        </div>
        <my-maps
        latitude = {{$lat}}
        longitude = {{$lng}}
        typeofshow = {{$typeofshow}}
        tomtomkey = {{env('TOMTOM_API_KEY')}}
        >
        </my-maps>
    </div>
    <div class="btn-row row d-flex justify-content-center align-items-center">
    <create-messages-button></create-messages-button>
    </div>
    <div>
       <form method="post" action="{{ route('home.storemessage')}}" class="hidden" id="target" id="postform" enctype="multipart/form-data">
       @csrf
        <div class="form-group">
        <label for="sender_email">Email</label>
        <input type="email" class="form-control" id="sender_email" name="sender_email" placeholder="Inserisci la tua email">
        </div>
        <div class="form-group">
        <label for="content">Messaggio</label>
        <textarea class="form-control" id="content" name="content" rows="5" placeholder="Inserisci il messaggio"></textarea>
        </div>
        <input name="structure_id" type="hidden" value="{{ $structure->id }}">
        <div class="btn-row row d-flex justify-content-center align-items-center">
            <input class="btn btn-primary" id='submit' type="submit" value="Invia il messaggio">
        </div>    
    </form>
    </div>
</div> 
@endsection    