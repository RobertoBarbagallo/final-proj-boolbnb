@extends('layouts.app')
@section('content')
    <div id="app" class="flex-center position-ref full-height">
        <div class="jumbotron">   
            <form method="post" action="{{ route('home.search')}}" id="postform" enctype="multipart/form-data">
            @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="search" id="search" aria-describedby="searchHelp" placeholder="Inserisci la città">
                    <div class="input-group-append">
                        <button class="btn px-3" id="submit" type="submit">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <small id="searchHelp" class="form-text">Dove vuoi andare?</small>
            </form>   
        </div>
        <structures-sponsored></structures-sponsored>
        {{-- @if($structures)
        <div class="card-deck">
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
                <div class="card-footer text-center">
                    <a class="btn btn-outline-primary my-1" href="{{route("home.details",  ["slug" => $structure->slug, "contactedStructure" => false])}}" role="button">Dettagli...</a><br>
                </div>
            </div>
            @endforeach
        </div>
        @endif --}}
    </div>
@endsection
<script>
function prev(){
		document.getElementById('slider-container').scrollLeft -= 270;
}

function next()
{
		document.getElementById('slider-container').scrollLeft += 270;
}


$(".mycard-img-container img").on("click" , function(){
    console.log("ciao")
	$(this).toggleClass('zoomed');
	$(".overlay").toggleClass('active');
})
</script>