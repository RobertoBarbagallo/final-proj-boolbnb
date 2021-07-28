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
                <div id="dropin-container"></div>
                <button id="submit-button" class="button button--small button--green">Purchase</button> 
            </form>
                
        </div>

        

        

        {{-- @endforeach --}}
</div>
<div>
<script>
var button = document.querySelector('#submit-button');

braintree.dropin.create({
  authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
  selector: '#dropin-container'
}, function (err, instance) {
  button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
      
    });
  })
});
</script>
</div>
@endsection
@section('script')
<script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.js"></script>
     <script src="https://js.braintreegateway.com/web/3.79.1/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.79.1/js/hosted-fields.min.js"></script>
    @endsection
<style>
.button {
  cursor: pointer;
  font-weight: 500;
  left: 3px;
  line-height: inherit;
  position: relative;
  text-decoration: none;
  text-align: center;
  border-style: solid;
  border-width: 1px;
  border-radius: 3px;
  -webkit-appearance: none;
  -moz-appearance: none;
  display: inline-block;
}

.button--small {
  padding: 10px 20px;
  font-size: 0.875rem;
}

.button--green {
  outline: none;
  background-color: #64d18a;
  border-color: #64d18a;
  color: white;
  transition: all 200ms ease;
}

.button--green:hover {
  background-color: #8bdda8;
  color: white;
}
</style>