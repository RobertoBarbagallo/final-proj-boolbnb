@extends('layouts.app')
@section('content')
<div class="container pt-5">
    <div class="title-show">
        <h2 class="text-secondary text-center">{{ $structure->name }} </h2>
    </div>
    <div class=" d-flex flex-row-reverse button-show">
        <div><button type="button" class="btn "><a href="{{ route('user.structures.edit', $structure->id) }}" class="text-secondary"><i class="fas fa-edit "></i> Modifica</a></button>
        </div>
        <div>
            <form action="{{ route('user.structures.destroy', $structure->id) }}" method="post" class="delete_form">
                @csrf
                @method('DELETE')
                <delete-button></delete-button>
            </form>
        </div>
    </div>


    <div class="row px-5 my-3">

        <div class="col-md-6 p-2">
            <div class="details-cover-container">
                <img src="{{asset('storage/' . $structure->cover_img_path)}}" alt="">
            </div>
        </div>
        <div class="col-md-6 p-2">
            <p class="text-secondary">Dettagli della struttura</p>
            <p><i class="fas fa-map-marker mydetailstitle"></i> <span>{{ $address }} </span></p>
            <p><span class="mydetailstitle ">ID Struttura:</span> <span>{{ $structure->id }} </span></p>
            <p><span class="mydetailstitle ">Stanze disponibili:</span> <span>{{ $structure->rooms }} </span></p>
            <p> <span class="mydetailstitle ">Letti disponibili:</span> <span>{{ $structure->beds }} </span></p>
            <p> <span class="mydetailstitle ">Bagni:</span> <span>{{ $structure->bathrooms }} </span></p>
            <p> <span class="mydetailstitle ">Metri quadri:</span> {{ $structure->sqm }}<span></p>

            <h3 class="text-center mt-5">Quali servizi offri nella struttura</h3>
            @foreach($structure->services as $service)
            <p class="badge mybadge">{{ $service->name }}</p>
            @endforeach

        </div>
    </div>



</div>
<div class="container">
    <div class="row">
        
            <my-maps latitude={{$lat}} longitude={{$lng}} typeofshow={{$typeofshow}} tomtomkey={{env('TOMTOM_API_KEY')}} class="col-md-12">
            </my-maps>
        
    </div>
</div>

<div class="container pt-5">
    <div class="row">
        <div class=" p-1 col-md-3 ">
            <div class="text-center count-views flex-column">
                <h3 class="mydetailstitle ">{{ $viewsLastDay }}</h3>
                <p class="mydetailstitle ">Numero Visite Ultimo Giorno</p>
            </div>
        </div>
        <div class=" p-1 col-md-3 ">
            <div class="text-center count-views flex-column">
                <h3 class="mydetailstitle ">{{ $viewsLastWeek }}</h3>
                <p class="mydetailstitle ">Numero Visite Ultima Settimana</p>
            </div>
        </div>
        <div class=" p-1 col-md-3 ">
            <div class="text-center count-views flex-column">
                <h3 class="mydetailstitle ">{{ $viewsLastMonth }}</h3>
                <p class="mydetailstitle ">Numero Visite Ultimo Mese</p>
            </div>
        </div>
        <div class=" p-1 col-md-3 ">
            <div class="text-center count-views flex-column">
                <h3 class="mydetailstitle ">{{ $viewsTotal }}</h3>
                <p class="mydetailstitle "> &nbsp;&nbsp; &nbsp;&nbsp; Numero Visite Totali &nbsp; &nbsp; &nbsp; &nbsp;</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class=" p-1 col-md-12 ">
            <div class=" text-center count-views flex-column">
                <h3 class="mydetailstitle ">{{ $viewsUnique }}</h3>
                <p class="mydetailstitle ">Numero Totale Visitatori</p>
            </div>
        </div>
    </div>
</div>

<div class="row d-flex justify-content-around text-center p-5">
    @if(count($structure->messages) >0)
    <div>
        <show-messages-button :structuremessages="{{$messages}}">
        </show-messages-button>
        @endif
    </div>

</div>




@endsection
