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
    <label for="accessibility_type_id">Tipo de acessibilidade</label>
    <select name="accessibility_type_id" id="accessibility_type_id" class="form-control">
        <option value="">Nenhuma</option>
        @foreach($types as $type)
            <option value="{{ $type->id }}"
                {{ old('accessibility_type_id', $vehicle->accessibility_type_id ?? '') == $type->id ? 'selected' : '' }}>
                {{ $type->name }}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-primary">{{ $btnText ?? 'Salvar' }}</button>
<a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Cancelar</a>