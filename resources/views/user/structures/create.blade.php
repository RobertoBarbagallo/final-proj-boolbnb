@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <a class="btn btn-primary mb-4" href="{{ route('user.structures.index') }}">Torna alle Strutture...</a>
</div>

@include("partials.components.errors")
<div class="container">
    <form action="{{ route('user.structures.store') }}" method="post" id="postform" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Inserisci il nome">
            <small id="titleHelp" class="form-text text-muted">Inserisci in questo campo il nome della struttura</small>
        </div>


        <div class="form-group">
            <label for="address">Indirizzo</label>
            <textarea class="form-control" id="address" name="address" rows="5" aria-describedby="addressHelp" placeholder="Inserisci l'indirizzo"></textarea>
            <small id="addressHelp" class="form-text text-muted">Inserisci in questo campo l'indirizzo della struttura</small>
        </div>

        <div class="form-group">
            <label for="rooms">Camere</label>
            <input type="number" class="form-control" id="rooms" name="rooms" aria-describedby="roomsHelp" placeholder="Inserisci il numero di camere">
            <small id="roomsHelp" class="form-text text-muted">Inserisci in questo campo il numero di stanze della struttura</small>
        </div>

        <div class="form-group">
            <label for="beds">Letti</label>
            <input type="number" class="form-control" id="beds" name="beds" aria-describedby="bedsHelp" placeholder="Inserisci il numero di letti">
            <small id="bedsHelp" class="form-text text-muted">Inserisci in questo campo il numero di letti della struttura</small>
        </div>

        <div class="form-group">
            <label for="bathrooms">Bagni</label>
            <input type="number" class="form-control" id="bathrooms" name="bathrooms" aria-describedby="bathroomsHelp" placeholder="Inserisci il numero di bagni">
            <small id="bathroomsHelp" class="form-text text-muted">Inserisci in questo campo il numero di bagni della struttura</small>
        </div>

        <div class="form-group">
            <label for="sqm">Metri quadri</label>
            <input type="number" class="form-control" id="sqm" name="sqm" aria-describedby="sqmHelp" placeholder="Inserisci il numero di metri &#178;">
            <small id="sqmHelp" class="form-text text-muted">Inserisci in questo campo il numero di metri &#178; della struttura</small>
        </div>

        <div class="form-group">
            <input class="form-control" type="radio" name="visible" id="visible" value="0" checked>
            <label class="form-check-label" for="visible">
                Struttura visibile
            </label>
        </div>
        <div class="form-group">
            <input class="form-control" type="radio" name="visible" id="visible" value="1">
            <label class="form-check-label" for="visible">
               Struttura non visibile
            </label>
        </div>

        <div class="form-group">
            <label>Servizi</label><br>

            @foreach($services as $service)

            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input name="services[]" class="form-check-input" type="checkbox" value="{{ $service->id }}">
                    {{ $service->name }}
                </label>
            </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="content">Aggiungi immagine di copertina</label>
            <input type="file" accept=".jpg, .png, .svg, .jpeg" class="form-control-file" id="cover_img_path" name="cover_img_path" aria-describedby="imgHelp" placeholder="Inserisci il file">
            <small id="imgHelp" class="form-text text-muted">Inserisci in questo campo l'immagine di copertina</small>
        </div>
        <input class="btn btn-primary" type="submit" value="Invia"><br>
    </form>



</div>
@endsection
