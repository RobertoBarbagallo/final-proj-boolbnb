
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
                <h5 class="text-secondary">Numero Visite: {{ $views }}</h5>
            </div>

          

        </div>
        <my-maps
         latitude = {{$lat}}
         longitude = {{$lng}}
         typeofshow = {{$typeofshow}}
         tomtomkey = {{env('TOMTOM_API_KEY')}}
        >
        </my-maps>
    </div>


<div class="row d-flex justify-content-around">
    @if(count($structure->messages) >0) 
    <div>
        <show-messages-button :structuremessages="{{$messages}}">
        </show-messages-button>
    @endif    
    </div>
    <div>
        <form action="{{ route('user.structures.destroy', $structure->id) }}" method="post" class="delete_form text-center" >
            @csrf
            @method('DELETE')
            <delete-button></delete-button>
        </form>
    </div>
</div>

<div>
  <canvas id="myChart" width="400" height="400"></canvas>
</div>

	
@endsection


<script>
var ctx = document.querySelector('#myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
