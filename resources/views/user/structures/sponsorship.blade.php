@extends('layouts.app')
@section('content')

<div class="container">

@foreach($structures as $structure)
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
            </div>

             <form method="post" action="{{ route('user.structures.payment', $structure->id) }}" id="postform" enctype="multipart/form-data">
                @csrf
                @method('post')
                    
                 @foreach($sponsorships as $sponsorship)
                <label for="{{$sponsorship->id}}">{{$sponsorship->duration}} ORE <br>{{$sponsorship->price}} PREZZO </label>
                <input type="radio" name="sponsorship" id="{{$sponsorship->id}}" value="{{$sponsorship->id}}">
                
 
                @endforeach
                <input type="hidden"  id="{{$structure->id}}" name="id">
                <button type="submit" class="btn btn-outline-primary my-1"  role="button">Sponsorizza</button>
            </form>

        </div>

        @endforeach
</div>
@endsection