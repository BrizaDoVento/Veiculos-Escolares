@csrf

<div class="form-group">
    <label for="model">Modelo</label>
    <input type="text" name="model" id="model" class="form-control @error('model') is-invalid @enderror" value="{{ old('model', $vehicle->model ?? '') }}" required>
    @error('model') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label for="plate">Placa</label>
    <input type="text" name="plate" id="plate" class="form-control @error('plate') is-invalid @enderror" value="{{ old('plate', $vehicle->plate ?? '') }}" required>
    @error('plate') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label for="acquisition_date">Data de aquisição</label>
    <input type="date" name="acquisition_date" id="acquisition_date" class="form-control @error('acquisition_date') is-invalid @enderror" value="{{ old('acquisition_date', isset($vehicle) ? $vehicle->acquisition_date->toDateString() : '') }}" required>
    @error('acquisition_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Tipos de Acessibilidade:</label><br>
    @php
        $selected = old('accessibility_types', isset($vehicle) ? $vehicle->accessibilityTypes->pluck('id')->toArray() : []);
    @endphp

    @foreach($types as $type)
        <label>
            <input type="checkbox" 
                   name="accessibility_types[]" 
                   value="{{ $type->id }}"
                   {{ in_array($type->id, $selected) ? 'checked' : '' }}>
            {{ $type->name }}
        </label><br>
    @endforeach
</div>
        
        <button type="submit" class="btn btn-primary">{{ $btnText ?? 'Salvar' }}</button>
        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Cancelar</a>