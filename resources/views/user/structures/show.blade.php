
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
    </div>

    <div class="btn-row row d-flex justify-content-center align-items-center">
    <show-buttons 
    edit-link = "{{ route('user.structures.edit', $structure->id) }}"
    :structure-messages ="{{$messages}}"
    >
    </show-buttons>
    </div>
    <div id="map-div"></div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/mapsScript.js') }}" defer></script>
<script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js"></script>

<script>

    var lat = @JSON($structure['lat']);
    var lng = @JSON($structure['lng']);
    const API_KEY = @JSON(env('TOMTOM_API_KEY'));
</script>

@endsection
