@extends('layouts.app')
@section('content')

<div class="container">

{{-- @foreach($structures as $structure)
        <div class="card mycard my-4">
            
            @if($structure->cover_img_path)
            <img class="card-img-top myimg" src="{{ asset('storage/' . $structure->cover_img_path) }}" alt="Cover of structure">
            @endif
            <div class="card-body">
                <h5 class="mt-0">{{$structure->name}}</h5>
                @if($structure->services)
                @foreach($structure->services as $service)
                <span class="badge badge-pill badge-info">{{$service->name}}</span>
                @endforeach
                @endif
            </div> --}}

    <div class="border row">
        <div class="col">
            <h4 class="text-secondary">ID: {{ $structure->id }}</h4>

            <div class="text-left">
                <h5 class="text-primary">Nome Struttura: {{ $structure->name }}</h5>
                <div>
                    <img src="{{ $structure->cover_image_url ? asset('storage/' . $structure->cover_img_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png'}}" alt="">
                </div>
            </div>
        </div>
    </div>

             <form method="post" action="{{ route('user.structures.payment', $structure->id) }}" id="postform" enctype="multipart/form-data">
                @csrf
                @method('POST')
                    
                 @foreach($sponsorships as $sponsorship)
                <label for="{{$sponsorship->id}}">{{$sponsorship->duration}} ORE <br>{{$sponsorship->price}} PREZZO </label>
                <input type="radio" name="sponsorship" id="{{$sponsorship->id}}" value="{{$sponsorship->id}}">
                
 
                @endforeach
                <button type="submit" class="btn btn-outline-primary my-1"  role="button">Sponsorizza</button>
            </form>

        </div>

        {{-- @endforeach --}}
</div>
@endsection