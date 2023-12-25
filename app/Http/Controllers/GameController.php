<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Game;
use App\Models\Referee;
use App\Models\Team;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('dashboard', compact('games'));
    }

    public function tournament()
    {
        $teams = Team::all();
        $fields = Field::all();
        $referees = Referee::all();
        $games = Game::with(['teams', 'field', 'referee'])->get();

        return view('tournament', compact('teams', 'fields', 'referees', 'games'));
    }

    public function create()
    {
        $teams = Team::all();
        $fields = Field::all();
        $referees = Referee::all();
        return view('games.create', compact('teams', 'fields', 'referees'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'team1_name' => 'required|string|max:255',
            'team2_name' => 'required|string|max:255',
            'date' => 'required|date',
            'field_name' => 'required|string|max:255',
            'referee_name' => 'required|string|max:255',
        ]);

        $team1 = Team::firstOrCreate(['name' => $request->input('team1_name')]);
        $team2 = Team::firstOrCreate(['name' => $request->input('team2_name')]);
        $field = Field::firstOrCreate(['name' => $request->input('field_name')]);
        $referee = Referee::firstOrCreate(['name' => $request->input('referee_name')]);

        $game = Game::create([
            'date' => $request->input('date'),
            'field_id' => $field->id,
            'referee_id' => $referee->id,
        ]);

        $game->teams()->attach([$team1->id, $team2->id]);

        return redirect()->route('dashboard')->with('success', 'Game scheduled successfully');
    }






    public function edit(Game $game)
    {
        $teams = Team::all();
        $fields = Field::all();
        $referees = Referee::all();
        return view('games.edit', compact('game', 'teams', 'fields', 'referees'));
    }

    public function update(Request $request, Game $game)
    {
        $game->update($request->validate([
            'date' => 'required|date',
            'field_id' => 'required|exists:fields,id',
            'referee_id' => 'required|exists:referees,id',
        ]));

        $game->teams()->sync($request->input('teams'));

        return redirect()->route('games.index')->with('success', 'Game updated successfully');
    }

    public function destroy(Game $game)
    {
        $game->teams()->detach();
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game deleted successfully');
    }

    public function dashboard()
    {
        $teams = Team::all();
        $fields = Field::all();
        $referees = Referee::all();
        $games = Game::with(['teams', 'field', 'referee'])->get();

        return view('dashboard', compact('teams', 'fields', 'referees', 'games'));
    }


    public function storeGame(Request $request)
    {
        Log::info('storeGame Request:', $request->all());

        $validatedData = $request->validate([
            'game_id' => 'required|exists:games,id',
            'scores' => 'required|array',
            'scores.*' => 'required|integer|min:0',
        ]);

        $game = Game::with('teams')->findOrFail($validatedData['game_id']);

        foreach ($validatedData['scores'] as $teamId => $score) {
            if ($game->teams->contains('id', $teamId)) {
                $game->teams()->updateExistingPivot($teamId, ['score' => $score]);
                Log::info("Score updated for team $teamId: $score");
            } else {
                Log::warning("Team $teamId not found in game {$game->id}");
            }
        }
        return redirect()->route('scores')->with('success', 'Scores updated successfully');
    }


    public function testStoreGame(Request $request)
    {
        Log::info('Testing Score Update:', $request->all());

        $gameId = $request->input('game_id');
        $scores = $request->input('scores');

        $game = Game::find($gameId);
        if (!$game) {
            Log::error("Game not found with ID: $gameId");
            return back()->withErrors(['error' => 'Game not found.']);
        }

        foreach ($scores as $teamId => $score) {
            $game->teams()->updateExistingPivot($teamId, ['score' => $score]);
            Log::info("Score for team $teamId in game $gameId updated to $score");
        }

        return redirect()->route('scores')->with('success', 'Scores updated successfully');
    }
}
