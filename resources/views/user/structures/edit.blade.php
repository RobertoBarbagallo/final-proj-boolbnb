@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <a class="btn btn-primary mb-4" href="{{ route('user.structures.index') }}">Torna alle Strutture...</a>
</div>

@include("partials.components.errors")
<div class="container mt-5 ">
    <form action="{{ route('user.structures.update', $structure->id) }}" method="post" id="postform" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name" class="text-boolbnb">Nome <i class="fas fa-house-user"></i></label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Inserisci il nome" value="{{ $structure->name}}">
                <small id="nameHelp" class="form-text text-muted">Inserisci in questo campo il nome della struttura</small>
            </div>


            <div class="form-group col-md-6">
                <label for="address" class="text-boolbnb">Indirizzo <i class="fas fa-map-marker"></i></label>
                <input type="text" class="form-control " id="address" name="address" rows="5" aria-describedby="addressHelp" value="{{ old('address', $address) }}" required readonly>
                <small id="addressHelp" class="form-text text-muted">Inserisci in questo campo l'indirizzo della struttura</small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="rooms" class="text-boolbnb">Camere <i class="fas fa-hotel"></i></label>
                <input type="number" class="form-control" id="rooms" name="rooms" aria-describedby="roomsHelp" placeholder="Inserisci il numero di camere" value="{{ $structure->rooms}}">
                <small id="roomsHelp" class="form-text text-muted">Inserisci in questo campo il numero di stanze della struttura</small>
            </div>

            <div class="form-group col-md-3">
                <label for="beds" class="text-boolbnb">Letti <i class="fas fa-bed"></i></label>
                <input type="number" class="form-control" id="beds" name="beds" aria-describedby="bedsHelp" placeholder="Inserisci il numero di letti" value="{{ $structure->beds}}">
                <small id="bedsHelp" class="form-text text-muted">Inserisci in questo campo il numero di letti della struttura</small>
            </div>

            <div class="form-group col-md-3">
                <label for="bathrooms" class="text-boolbnb">Bagni <i class="fas fa-bath"></i></label>
                <input type="number" class="form-control" id="bathrooms" name="bathrooms" aria-describedby="bathroomsHelp" placeholder="Inserisci il numero di bagni" value="{{ $structure->bathrooms}}">
                <small id="bathroomsHelp" class="form-text text-muted">Inserisci in questo campo il numero di bagni della struttura</small>
            </div>

            <div class="form-group col-md-3">
                <label for="sqm" class="text-boolbnb">Metri quadri <i class="fas fa-ruler"></i></label>
                <input type="number" class="form-control" id="sqm" name="sqm" aria-describedby="sqmHelp" placeholder="Inserisci il numero di metri &#178;" value="{{ $structure->sqm}}">
                <small id="sqmHelp" class="form-text text-muted">Inserisci in questo campo il numero di metri &#178; della struttura</small>
            </div>
        </div>
        <div class="form-group">

            <div class="form-check">
                <input class="form-check-input" type="radio" name="visible" id="visible" value="1" checked>
                <label class="form-check-label" for="visible">
                    Struttura visibile
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="visible" id="visible" value="0">
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
                    <input name="services[]" class="form-check-input" type="checkbox" value="{{ $service->id }}" {{ $structure->services->contains($service) ? 'checked' : '' }}>
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
            <input class="btn  bg-boolbnb text-white" id='submit' type="submit" value="Modifica la tua struttura"><br>
        </div>
    </form>



</div>
@endsection
