@extends('layouts.app')
@dump($finalArray)
@section('content')
    <guest-search
    {{-- :town = "{{json_encode($town,TRUE)}}" --}}
    :lat ="{{$lat}}"
    :lng ="{{$lng}}"
    {{-- :finalResponse ="{{$finalResponse}}" --}}
    >
    </guest-search>
@endsection  

@section('script')
<script src="{{ asset('js/mapsScript.js') }}" defer></script>
<script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js"></script>

<script>
    {{-- var lat = @JSON($structure['lat']);
    var lng = @JSON($structure['lng']); --}}
    const API_KEY = @JSON(env('TOMTOM_API_KEY'));
</script>

@endsection

