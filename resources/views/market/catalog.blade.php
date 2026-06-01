@extends('layouts.market.index')
@section('title', 'Каталог')

@section('main')
    @foreach($products as $product)
        {{ $product }}
    @endforeach
@endsection
