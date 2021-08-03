
@extends('layouts.app')
@section('content')
    <my-maps
    latitude = {{$lat}}
    longitude = {{$lng}}
    :finalarray =  '@json($finalArray)'
    typeofshow = {{$typeofshow}}
    tomtomkey = {{env('TOMTOM_API_KEY')}}
     >
    </my-maps>
    <guest-search
    :finalarray =  '@json($finalArray)'
    oldtown = {{$oldtown}}
    oldradius = {{$radius}}
    latitude = {{$lat}}
    longitude = {{$lng}}
    fromwelcomepage = {{false}}
    >
    </guest-search>
   

@endsection  

<script>
function prev(){
		document.getElementById('slider-container').scrollLeft -= 270;
}

function next()
{
		document.getElementById('slider-container').scrollLeft += 270;
}


$(".slide img").on("click" , function(){
	$(this).toggleClass('zoomed');
	$(".overlay").toggleClass('active');
})
</script>

