@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <a class="btn btn-primary mb-4" href="{{ route('user.structures.index') }}">Torna alle Strutture...</a>
</div>

@include("partials.components.errors")
<div class="container mt-5">
    <form method="post" action="{{ route('user.structures.store')}}" id="postform" enctype="multipart/form-data">
        @csrf
<div class="form-row">
        <div class="form-group col-md-6">
            <label for="name" class="text-boolbnb">Nome <i class="fas fa-house-user"></i></label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Inserisci il nome">
            <small id="titleHelp" class="form-text text-muted">Inserisci in questo campo il nome della struttura</small>
        </div>


        <div class="form-group col-md-6">
            <label for="address" class="text-boolbnb">Indirizzo <i class="fas fa-map-marker"></i></label>
            <input type="text" class="form-control" id="address" name="address" rows="5" aria-describedby="addressHelp" placeholder="Inserisci l'indirizzo">
            <small id="addressHelp" class="form-text text-muted">Inserisci in questo campo l'indirizzo della struttura</small>
        </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="rooms" class="text-boolbnb">Camere <i class="fas fa-hotel"></i></label>
                <input type="number" class="form-control" id="rooms" name="rooms" aria-describedby="roomsHelp" placeholder="Inserisci il numero di camere">
                <small id="roomsHelp" class="form-text text-muted">Inserisci in questo campo il numero di stanze della struttura</small>
            </div>

            <div class="form-group col-md-3">
                <label for="beds" class="text-boolbnb">Letti <i class="fas fa-bed"></i></label>
                <input type="number" class="form-control" id="beds" name="beds" aria-describedby="bedsHelp" placeholder="Inserisci il numero di letti">
                <small id="bedsHelp" class="form-text text-muted">Inserisci in questo campo il numero di letti della struttura</small>
            </div>
        
       
            <div class="form-group col-md-3">
                <label for="bathrooms" class="text-boolbnb">Bagni <i class="fas fa-bath"></i></label>
                <input type="number" class="form-control" id="bathrooms" name="bathrooms" aria-describedby="bathroomsHelp" placeholder="Inserisci il numero di bagni">
                <small id="bathroomsHelp" class="form-text text-muted">Inserisci in questo campo il numero di bagni della struttura</small>
            </div>

            <div class="form-group col-md-3">
                <label for="sqm" class="text-boolbnb">Metri quadri <i class="fas fa-ruler"></i></label>
                <input type="number" class="form-control" id="sqm" name="sqm" aria-describedby="sqmHelp" placeholder="Inserisci il numero di metri &#178;">
                <small id="sqmHelp" class="form-text text-muted">Inserisci in questo campo il numero di metri &#178; della struttura</small>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="visible" id="visible" value="0" checked>
                <label class="form-check-label" for="visible">
                    Struttura visibile
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="visible" id="visible" value="1">
                <label class="form-check-label" for="visible">
                    Struttura non visibile
                </label>
            </div>
        </div>

        <div class="form-group">
            <label>Servizi</label><br>
            <div class="form-check row mb-3 form-check-inline">

            @foreach($services as $service)

            
                <label class="form-check-label  col-3 mb-1">
                    <input name="services[]" class="form-check-input" type="checkbox" value="{{ $service->id }}">
                    {{ $service->name }}
                </label>
            
            @endforeach
            </div>
        </div>


        <div class="form-group">
            <label for="content">Aggiungi immagine di copertina</label>
            <input type="file" accept=".jpg, .png, .svg, .jpeg" class="form-control-file" id="cover_img_path" name="cover_img_path" aria-describedby="imgHelp" placeholder="Inserisci il file">
            <small id="imgHelp" class="form-text text-muted">Inserisci in questo campo l'immagine di copertina</small>
        </div>
        <div class="text-center mb-5"> 
        <input class="btn bg-boolbnb text-white" id='submit' type="submit" value="Aggiungi la tua struttura"><br>
        </div>
    </form>



</div>
@endsection
