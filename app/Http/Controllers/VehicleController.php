<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\AccessibilityType;
use Illuminate\Http\Request;
use App\Http\Requests\VehicleRequest;

class VehicleController extends Controller
{
    // Listagem de veículos
    public function index()
    {
        $vehicles = Vehicle::with('accessibilityTypes')
                           ->orderBy('created_at', 'desc')
                           ->paginate(10);

        return view('vehicles.index', compact('vehicles'));
    }

    // Formulário de criação
    public function create()
    {
        $types = AccessibilityType::all();
        return view('vehicles.create', compact('types'));
    }

    // Salvar novo veículo
    public function store(VehicleRequest $request)
    {
        $data = $request->validated();

        // Cria veículo
        $vehicle = Vehicle::create($data);

        // Sincroniza os tipos de acessibilidade selecionados
        $vehicle->accessibilityTypes()->sync($request->input('accessibility_types', []));

        return redirect()->route('vehicles.index')
                         ->with('success', 'Veículo cadastrado com sucesso.');
    }

    // Mostrar detalhes do veículo
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    // Formulário de edição
    public function edit(Vehicle $vehicle)
    {
        $types = AccessibilityType::all();
        return view('vehicles.edit', compact('vehicle', 'types'));
    }

    // Atualizar veículo
    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $data = $request->validated();

        $vehicle->update($data);

        // Sincroniza os tipos de acessibilidade selecionados
        $vehicle->accessibilityTypes()->sync($request->input('accessibility_types', []));

        return redirect()->route('vehicles.index')
                         ->with('success', 'Veículo atualizado com sucesso.');
    }

    // Excluir veículo
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicles.index')
                         ->with('success', 'Veículo excluído com sucesso.');
    }
}