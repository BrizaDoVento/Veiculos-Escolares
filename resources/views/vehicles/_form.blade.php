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
    <label for="accessibility_type">Tipo de acessibilidade (opcional)</label>
    <select name="accessibility_type" id="accessibility_type" class="form-control @error('accessibility_type') is-invalid @enderror">
        <option value="none" {{ old('accessibility_type', $vehicle->accessibility_type ?? 'none') === 'none' ? 'selected' : '' }}>Nenhuma</option>
        <option value="wheelchair_ramp" {{ old('accessibility_type', $vehicle->accessibility_type ?? '') === 'wheelchair_ramp' ? 'selected' : '' }}>Rampa para cadeiras de rodas</option>
        <option value="lift" {{ old('accessibility_type', $vehicle->accessibility_type ?? '') === 'lift' ? 'selected' : '' }}>Elevador / Lift</option>
        <option value="low_floor" {{ old('accessibility_type', $vehicle->accessibility_type ?? '') === 'low_floor' ? 'selected' : '' }}>Piso baixo</option>
    </select>
    @error('accessibility_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $btnText ?? 'Salvar' }}</button>
<a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Cancelar</a>