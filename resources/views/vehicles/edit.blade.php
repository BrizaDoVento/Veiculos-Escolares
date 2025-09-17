@extends('layouts.app')

@section('title', 'Editar Veículo')

@section('content')
<h1>Editar Veículo #{{ $vehicle->id }}</h1>

<form action="{{ route('vehicles.update', $vehicle) }}" method="POST">
    @method('PUT')
    @include('vehicles._form', ['btnText' => 'Atualizar'])
</form>
@endsection