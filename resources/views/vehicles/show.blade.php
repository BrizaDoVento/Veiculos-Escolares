@extends('layouts.app')

@section('title', 'Detalhes do Veículo')

@section('content')
<h1>Veículo #{{ $vehicle->id }}</h1>

<table class="table table-bordered">
    <tr><th>Modelo</th><td>{{ $vehicle->model }}</td></tr>
    <tr><th>Placa</th><td>{{ $vehicle->plate }}</td></tr>
    <tr><th>Data de aquisição</th><td>{{ $vehicle->acquisition_date->format('d/m/Y') }}</td></tr>
    <tr><th>Acessibilidade</th><td>{{ $vehicle->accessibilityType->name ?? '-' }}</td></tr>
</table>

<a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-warning">Editar</a>
<a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Voltar</a>
@endsection