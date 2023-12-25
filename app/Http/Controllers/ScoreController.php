<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Team;


class ScoreController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve the game ID from the URL or form input
        $gameId = $request->input('game_id');
        $teams = Team::all();
        return view('scores', compact('gameId', 'teams'));
    }


    public function create($gameId)
    {
        $game = Game::findOrFail($gameId);
        $teams = $game->teams;
        return view('scores', compact('game', 'teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'scores.*' => 'required|integer|min:0',
        ]);

        $gameId = $request->input('game_id');
        $scores = $request->input('scores');

        $game = Game::findOrFail($gameId);

        foreach ($request->input('scores') as $teamId => $score) {
            // Assuming you have a Game ID; replace it with your logic to get the correct ID
            $gameId = $request->input('game_id');

            // Find or create a record in the game_team table for the specific game and team
            $gameTeam = Game::firstOrNew(['game_id' => $gameId, 'team_id' => $teamId]);

            // Update the score for the team in the specific game
            $gameTeam->score = $score;

            // Save the record
            $gameTeam->save();
        }

        return redirect()->route('scores')->with('success', 'Scores updated successfully');
    }
}
