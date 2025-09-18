<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\AccessibilityType;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::orderBy('created_at', 'desc')->paginate(10);
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $types = AccessibilityType::all();
        return view('vehicles.create', compact('types'));
    }

    public function store(VehicleRequest $request)
    {
        $data = $request->validated();
        if (isset($data['accessibility_type']) && $data['accessibility_type'] === 'none') {
            $data['accessibility_type'] = null;
        }
        Vehicle::create($data);
        return redirect()->route('vehicles.index')
                         ->with('success', 'Veículo cadastrado com sucesso.');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
{
    $types = AccessibilityType::all();
    return view('vehicles.edit', compact('vehicle', 'types'));
}

    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $data = $request->validated();
        if (isset($data['accessibility_type']) && $data['accessibility_type'] === 'none') {
            $data['accessibility_type'] = null;
        }
        $vehicle->update($data);
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