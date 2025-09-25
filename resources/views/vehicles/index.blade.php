@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Veículos Escolares</h1>

    <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Veículo</a>

    <table class="table">
    <thead>
        <tr>
            <th>Modelo</th>
            <th>Placa</th>
            <th>Data de Aquisição</th>
            <th>Acessibilidades</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->modelo }}</td>
                <td>{{ $vehicle->placa }}</td>
                <td>{{ \Carbon\Carbon::parse($vehicle->data_aquisicao)->format('d/m/Y') }}</td>
                <td>
                    {{ $vehicle->accessibilityTypes->pluck('name')->implode(', ') }}
                </td>
                <td>
                    <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Tem certeza que deseja excluir?')">
                            Excluir
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    <div class="d-flex justify-content-center">
        {{ $vehicles->links() }}
    </div>
</div>
@endsection