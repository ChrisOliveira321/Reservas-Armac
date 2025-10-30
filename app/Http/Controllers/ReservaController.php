<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Models\Colaborador;
use App\Models\Hotel;
use App\Models\Cidade;


class ReservaController extends Controller {
    
    public function index(Request $request) {
        $reservas = Reserva::all(); // pega todas as reservas do banco
        $query = Reserva::query();

        if ($request->filled('colaborador')) {
            $query->where('colaborador', 'like', '%' . $request->colaborador . '%');
        }

        if ($request->filled('cidade')) {
            $query->where('cidade', 'like', '%' . $request->cidade . '%');
        }

        if ($request->filled('hotel')) {
            $query->where('hotel', 'like', '%' . $request->hotel . '%');
        }

        if ($request->filled('checkin')) {
            $query->whereDate('checkin', '>=', $request->checkin);
        }

        if ($request->filled('checkout')) {
            $query->whereDate('checkout', '<=', $request->checkout);
        }

        $reservas = $query->orderBy('id', 'asc')->get();

        return view('reservas.index', compact('reservas'));
    }

    public function create() {    
        $colaboradores = Colaborador::all();
        $hoteis = Hotel::all();
        $cidades = Cidade::all();

        return view('reservas.create', compact('colaboradores', 'hoteis', 'cidades'));
    }
    
    public function store(Request $request) {
        $request->validate([
            'colaborador' => 'required|string|max:100',
            'hotel' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'checkin' => 'required|date',
            'checkout' => 'required|date|after_or_equal:checkin',
        ]);

        $colaborador = Colaborador::firstOrCreate(['nome' => $request->colaborador]);
        $cidade = Cidade::firstOrCreate(['nome' => $request->cidade]);
        $hotel = Hotel::firstOrCreate(['nome' => $request->hotel]);

        Reserva::create([
            'colaborador' => $request->colaborador,
            'hotel' => $request->hotel,
            'cidade' => $request->cidade,
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
        ]);

        return back()->with('success', 'Reserva cadastrada com sucesso!');
    }

    public function show(Reserva $reserva) {
        //
    }

    public function edit(Reserva $reserva) {
        
        $colaboradores = Colaborador::all();
        $hoteis = Hotel::all();
        $cidades = Cidade::all();
        return view('reservas.edit', compact('reserva', 'colaboradores', 'hoteis', 'cidades'));
    }

    public function update(Request $request, Reserva $reserva) {
        $request->validate([
            'colaborador' => 'required|string|max:100',
            'hotel' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'checkin' => 'required|date',
            'checkout' => 'required|date|after_or_equal:checkin',
        ]);

        $colaborador = Colaborador::firstOrCreate(['nome' => $request->colaborador]);
        $cidade = Cidade::firstOrCreate(['nome' => $request->cidade]);
        $hotel = Hotel::firstOrCreate(['nome' => $request->hotel]);

        $reserva->update([
            'colaborador' => $colaborador->nome,
            'hotel' => $hotel->nome,
            'cidade' => $cidade->nome,
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
        ]);

        return redirect()->route('reservas.index')
                      ->with('success', 'Reserva atualizada com sucesso!');
    }


    public function destroy(Reserva $reserva) {
        $reserva->delete();

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva excluída com sucesso!');
    }
}
