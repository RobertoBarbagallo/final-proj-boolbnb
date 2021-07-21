@extends('layouts.app')

@section('content')
<div class="container">

     <div class="text-right">

        <button type="button" class="btn btn-primary"><a href="{{ route('user.structures.index') }}" class="text-light">Torna alla home</a></button>

    </div>

    <div class="text-right">
    </div>
    <div class="container ">

        <div class="border row">
            <div class="col">
                <h4 class="text-secondary">ID: {{ $structure->id }}</h4>

                <div class="text-left">
                    <h5 class="text-primary">Nome Struttura: {{ $structure->name }}</h5>
                    <h5 class="text-secondary">Stanze disponibili : {{ $structure->rooms }}</h5>
                    <h5 class="text-secondary">Letti disponibili: {{ $structure->beds }}</h5>
                    <h5 class="text-secondary">Bagni : {{ $structure->bathrooms }}</h5>
                    <h5 class="text-secondary">Metri quadri struttura: {{ $structure->sqm }}</h5>
                    <div>
                            <img src="{{ $structure->cover_image_url ? asset('storage/' . $structure->cover_img_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png'}}" alt="">
                            </div>

                    <h2>Servizi disponibili in struttura</h2>
                    @foreach($structure->services as $service)
                    <p class="badge badge-primary ">{{ $service->name }}</p>
                    @endforeach
                </div>

            </div>

        </div>
        
        <div class="btn-row row d-flex justify-content-around align-items-center">
            @if ((Auth::user()->id)==$structure->user->id)
            <div>
                <button type="button" class="btn btn-primary"><a class="text-light" href="{{ route('user.structures.edit', $structure->id) }}"><i class="fa fa-pencil-square text-secondary" aria-hidden="true"> Modifica</i></a></button>
            </div>
            @endif
        </div>

        <button id="viewMessage">Visualizza messaggi</button>
        @foreach($structure->messages as $message)
        <div id="target" class="hidden">
             <p >{{ $message->sender_email }}</p>
             <p >{{ $message->content }}</p>
        </div>
        @endforeach
        
    </div>


</div>
@endsection
