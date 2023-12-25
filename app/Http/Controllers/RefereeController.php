<?php

namespace App\Http\Controllers;

use App\Models\Referee;
use Illuminate\Http\Request;

class RefereeController extends Controller
{
    public function index()
    {
        $referees = Referee::all();
        return view('referees.index', compact('referees'));
    }

    public function create()
    {
        return view('referees.create');
    }

    public function store(Request $request)
    {
        Referee::create($request->validate([
            'name' => 'required|string|max:255',
        ]));

        return redirect()->route('referees.index')->with('success', 'Referee created successfully');
    }

    public function edit(Referee $referee)
    {
        return view('referees.edit', compact('referee'));
    }

    public function update(Request $request, Referee $referee)
    {
        $referee->update($request->validate([
            'name' => 'required|string|max:255',
        ]));

        return redirect()->route('referees.index')->with('success', 'Referee updated successfully');
    }

    public function destroy(Referee $referee)
    {
        $referee->delete();

        return redirect()->route('referees.index')->with('success', 'Referee deleted successfully');
    }
}
