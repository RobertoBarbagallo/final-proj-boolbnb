
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



