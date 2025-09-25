<form action="{{ isset($vehicle) ? route('vehicles.update', $vehicle->id) : route('vehicles.store') }}" method="POST">
    @csrf
    @if(isset($vehicle)) @method('PUT') @endif

    <div class="form-group">
        <label for="modelo">Modelo</label>
        <input type="text" name="modelo" id="modelo" class="form-control"
               value="{{ old('modelo', $vehicle?->modelo ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="placa">Placa</label>
        <input type="text" name="placa" id="placa" class="form-control"
               value="{{ old('placa', $vehicle?->placa ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="data_aquisicao">Data de Aquisição</label>
        <input type="date" name="data_aquisicao" id="data_aquisicao" class="form-control"
               value="{{ old('data_aquisicao', $vehicle?->data_aquisicao?->format('Y-m-d') ?? '') }}" required>
    </div>

    <div class="form-group">
        <label>Tipos de Acessibilidade:</label><br>
        @php
            $selected = old('accessibility_types', $vehicle?->accessibilityTypes->pluck('id')->toArray() ?? []);
        @endphp

        @foreach($types as $type)
            <label>
                <input type="checkbox" name="accessibility_types[]" value="{{ $type->id }}"
                    {{ in_array($type->id, $selected) ? 'checked' : '' }}>
                {{ $type->name }}
            </label><br>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($vehicle) ? 'Atualizar Veículo' : 'Cadastrar Veículo' }}
    </button>
</form>