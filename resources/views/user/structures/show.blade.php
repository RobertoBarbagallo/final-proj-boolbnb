@extends('layouts.app')

@section('content')
<div class="container">

    <div class="text-right">
        <button type="button" class="btn btn-primary"><a href="{{ route('user.structures.index') }}" class="text-light">Torna alla home</a></button>
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
                <div>
                    <img src="{{ $structure->cover_image_url ? asset('storage/' . $structure->cover_img_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png'}}" alt="">
                </div>

                <h2>Servizi disponibili in struttura</h2>
                @foreach($structure->services as $service)
                <p class="badge badge-primary ">{{ $service->name }}</p>
                @endforeach
            </div>



        </div>


        <div id="map-div"></div>
    </div>
    <div>

        <div class="btn-row row d-flex justify-content-center align-items-center">
            <show-buttons edit-link="{{ route('user.structures.edit', $structure->id) }}" :structure-messages="{{$messages}}">
            </show-buttons>
            <div>
                <form action="{{ route('user.structures.destroy', $structure->id) }}" method="post" class="delete_form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" value="Cancella" class="btn btn-secondary "><a href="#"><i class="fa fa-trash text-secondary" aria-hidden="true"> Cancella</i></a></button>

                </form>
            </div>
        </div>
    </div>

    @endsection
