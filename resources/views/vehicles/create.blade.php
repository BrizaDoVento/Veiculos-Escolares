@extends('layouts.app')

@section('title', 'Cadastrar Veículo')

@section('content')
<h1>Cadastrar Veículo</h1>

<form action="{{ route('vehicles.store') }}" method="POST">
    @include('vehicles._form', ['btnText' => 'Cadastrar'])
</form>
@endsection