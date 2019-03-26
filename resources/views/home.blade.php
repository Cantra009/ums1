@extends('adminlte::page')

@section('content')
<h1> Welcome</h1><strong>{{Auth::user()->name}}</strong>
@endsection