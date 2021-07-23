@extends('layouts.app')

@section('content')
    <guest-search
    :name = "{{json_encode($name,TRUE)}}"
    >
    </guest-search>

@endsection    
