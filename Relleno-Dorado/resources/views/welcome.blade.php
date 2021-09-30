@extends('layouts.plantilla')

@section('title','Relleno Dorado 2.0')

@section('content')
<div x-data="{ open: false }">
    <button @click="open = !open">Click to List Categories</button>
    <ul x-show="open">
      <li>PHP</li>
      <li>Laravel</li>
      <li>Vue</li>
      <li>React</li>
    </ul>
  </div>
@endsection


@section('js')
    
@endsection
