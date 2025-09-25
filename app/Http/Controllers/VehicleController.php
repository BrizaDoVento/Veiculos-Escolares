<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use App\Models\AccessibilityType;

class VehicleController extends Controller
{
    // Aqui dentro ficam todos os métodos do CRUD

    public function index()
    {
        $vehicles = Vehicle::with('accessibilityTypes')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $types = AccessibilityType::all();
        $vehicle = null; // garante que a variável exista na view
        return view('vehicles.create', compact('types', 'vehicle'));
    }

    public function store(VehicleRequest $request)
    {
        $data = $request->validated();
        $vehicle = Vehicle::create($data);

        $vehicle->accessibilityTypes()->sync($request->accessibility_types ?? []);

        return redirect()->route('vehicles.index')
            ->with('success', 'Veículo cadastrado com sucesso.');
    }

    public function edit(Vehicle $vehicle)
    {
        $types = AccessibilityType::all();
        return view('vehicles.edit', compact('vehicle', 'types'));
    }

    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $data = $request->validated();
        $vehicle->update($data);

        $vehicle->accessibilityTypes()->sync($request->accessibility_types ?? []);

        return redirect()->route('vehicles.index')
            ->with('success', 'Veículo atualizado com sucesso.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')
            ->with('success', 'Veículo excluído com sucesso.');
    }
}