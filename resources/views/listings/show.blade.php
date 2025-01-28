@extends('layout')

@section('content') 

  {{-- use the listing component --}}
<x-listing-card :listing="$listing"/>



@endsection