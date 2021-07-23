@extends('layouts.app')

@dump($name)
@section('content')
    <guest-search name = "{{$name}}"></guest-search>

@endsection    
