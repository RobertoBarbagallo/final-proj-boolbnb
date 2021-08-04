@extends('layouts.app')
@section('content')
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
 
        <div class="">
                <div class="pt-3">
                    <h2>{{ $structure->name }}</h2>
                </div>  
                <p class="text-secondary"> {{ $address }}</p>  
        </div>
        <div class="row px-5 my-3">
            <div class="col-md-6 col-sm-12 px-0">
                <div class="details-cover-container">
                    <img src="{{asset('storage/' . $structure->cover_img_path)}}" alt="Structure Photo">
                </div>

            </div>
                <div class="col-md-6 col-sm-12 px-0">   
                <my-maps
                latitude = {{$lat}}
                longitude = {{$lng}}
                typeofshow = {{$typeofshow}}
                tomtomkey = {{env('TOMTOM_API_KEY')}}
                >
                </my-maps>
            </div>
        </div>  
        <div class="row">    
            <div class="col-md-6 col-sm-12 px-5">       
                <p class="text-secondary"><span class="mydetailstitle">Stanze disponibili:</span> {{ $structure->rooms }}</p>
                <p class="text-secondary"><span class="mydetailstitle">Letti disponibili:</span> {{ $structure->beds }}</p>
                <p class="text-secondary"><span class="mydetailstitle">Bagni:</span> {{ $structure->bathrooms }}</p>
                <p class="text-secondary"><span class="mydetailstitle">Metri quadri struttura:</span> {{ $structure->sqm }}</p>
                <p class="text-secondary"><span class="mydetailstitle">Indirizzo Struttura:</span> {{ $address }}</p> 
            </div>

            <div class="col-md-6 col-sm-12 service-col">
                <h3 class="text-center">Cosa troverai</h3>
                @foreach($structure->services as $service)
                <p class="badge mybadge">{{ $service->name }}</p>
                @endforeach
            </div>
        
        </div>
        <hr class="mt-2 mb-3 mx-1">
        <div class="btn-row row d-flex justify-content-center align-items-center">
            <create-messages-button></create-messages-button>
        </div>
        <div class="row">
            <div class="col-12 px-5"> 
                <form method="post" action="{{ route('home.storemessage')}}" class="d-none" id="target" id="postform" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label class="detailslabel" for="sender_email">Email</label>
                        <input class="myinput mydetailsinput @error('email') is-invalid @enderror" type="email" class="form-control" id="sender_email" name="sender_email" placeholder="Inserisci la tua email" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="detailslabel" for="content">Messaggio</label>
                        <textarea class="form-control myinput mydetailstextarea  @error('content') is-invalid @enderror" id="content" name="content" rows="5" placeholder="Inserisci il messaggio" required></textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input name="structure_id" type="hidden" value="{{ $structure->id }}">
                    <div class="btn-row row d-flex justify-content-center align-items-center">
                        <input class="mybtn default mb-2" id='submit' type="submit" value="Invia il messaggio">
                    </div>    
                </form> 
            </div>
        
        </div>
    
</div> 
@endsection    