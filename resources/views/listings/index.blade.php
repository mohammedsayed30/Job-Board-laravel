@extends('layout')

@section('content')
@include('partials/_hero')
@include('partials/_search')
<x-card>
    {{-- everything between card will mapping to {{$slot}}  in the card component--}}
<x-listings-card :listings="$listings"/>
</x-card>
<x-footer/>
@endsection




