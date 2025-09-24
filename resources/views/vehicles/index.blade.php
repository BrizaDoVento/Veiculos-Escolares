@extends('layouts.app')

@section('title', 'Lista de Veículos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Veículos</h1>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Cadastrar Veículo</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Modelo</th>
            <th>Placa</th>
            <th>Data de aquisição</th>
            <th>Acessibilidade</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    @forelse($vehicles as $vehicle)
        <tr>
            <td>{{ $vehicle->id }}</td>
            <td>{{ $vehicle->model }}</td>
            <td>{{ $vehicle->plate }}</td>
            <td>{{ $vehicle->acquisition_date->format('d/m/Y') }}</td>
            <td>
                @forelse($vehicle->accessibilityTypes as $type)
                <span class="badge badge-info">{{ $type->name }}</span>
                @empty
                Nenhuma
                @endforelse
            </td>
            <td>
                <a href="{{ route('vehicles.show', $vehicle) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirma exclusão deste veículo?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">Nenhum veículo cadastrado.</td>
        </tr>
    @endforelse
    </tbody>
</table>

{{ $vehicles->links() }}
@endsection