<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RefereeController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ScoreController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [GameController::class, 'dashboard'])->name('dashboard');
Route::post('/games/store', [GameController::class, 'store'])->name('games.store');
Route::post('/games', [GameController::class, 'store'])->name('games.store');
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/tournament', [GameController::class, 'tournament'])->name('tournament');
Route::post('/scores', [GameController::class, 'storeGame'])->name('storeGame');





Route::get('/scores', [ScoreController::class, 'index'])->name('scores.index');
Route::get('/scores/create/{gameId}', [ScoreController::class, 'create'])->name('scores.create');
Route::post('/scores/store', [ScoreController::class, 'store'])->name('scores.store');



//teams
Route::get('/teams', [TeamController::class, 'index']);
Route::get('/teams/create', [TeamController::class, 'create']);
Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
Route::get('/teams/{team}', [TeamController::class, 'edit'])->name('teams.edit');
Route::put('/teams/{team}', [TeamController::class, 'update']);
Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');


//Player
Route::get('/players', [PlayerController::class, 'index']);
Route::get('/players/create', [PlayerController::class, 'create']);
Route::post('/players', [PlayerController::class, 'store']);
Route::get('/players/{player}', [PlayerController::class, 'edit']);
Route::put('/players/{player}', [PlayerController::class, 'update']);
Route::delete('/players/{player}', [PlayerController::class, 'destroy']);

//Referee
Route::get('/referees', [RefereeController::class, 'index']);
Route::get('/referees/create', [RefereeController::class, 'create']);
Route::post('/referees', [RefereeController::class, 'store']);
Route::get('/referees/{referee}', [RefereeController::class, 'edit']);
Route::put('/referees/{referee}', [RefereeController::class, 'update']);
Route::delete('/referees/{referee}', [RefereeController::class, 'destroy']);

//Field
Route::get('/fields', [FieldController::class, 'index']);
Route::get('/fields/create', [FieldController::class, 'create']);
Route::post('/fields', [FieldController::class, 'store']);
Route::get('/fields/{field}', [FieldController::class, 'edit']);
Route::put('/fields/{field}', [FieldController::class, 'update']);
Route::delete('/fields/{field}', [FieldController::class, 'destroy']);

//Game
Route::get('/games', [GameController::class, 'index']);
Route::get('/games/create', [GameController::class, 'create']);
Route::get('/games/{game}', [GameController::class, 'edit']);
Route::put('/games/{game}', [GameController::class, 'update']);
Route::delete('/games/{game}', [GameController::class, 'destroy']);
