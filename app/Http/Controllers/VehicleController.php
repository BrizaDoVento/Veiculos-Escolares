<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::orderBy('created_at', 'desc')->paginate(10);
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        // se quiser enviar opções de accessibility:
        $accessibilityOptions = [
            'wheelchair_ramp' => 'Rampa para cadeiras de rodas',
            'lift' => 'Elevador / Lift',
            'low_floor' => 'Piso baixo',
            'none' => 'Nenhuma',
        ];
        return view('vehicles.create', compact('accessibilityOptions'));
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
        $accessibilityOptions = [
            'wheelchair_ramp' => 'Rampa para cadeiras de rodas',
            'lift' => 'Elevador / Lift',
            'low_floor' => 'Piso baixo',
            'none' => 'Nenhuma',
        ];
        return view('vehicles.edit', compact('vehicle', 'accessibilityOptions'));
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