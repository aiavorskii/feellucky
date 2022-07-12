<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\GameService;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHistory(Request $request, User $user)
    {
        $lastEntries = Game::where('user_id', $user->id)
            ->orderBy('created_at', 'DESC')
            ->limit(3)
            ->get();

        $lastEntriesFormatted = $lastEntries->map(function($item) {
            $result = GameService::getResult($item->result);
            return [
                'win_loose' => $result,
                'result' => $item->result,
                'prize' => $result == GameService::RESULT_WIN ? GameService::getPrize($item->result) : 0,
            ];
        })->toArray();

        return response(view('history_table', [
            'gameEntries' => $lastEntriesFormatted
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGameRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function feelLucky(StoreGameRequest $request, User $user)
    {
        $number = GameService::rollTheDice();

        Game::create([
            'user_id' => $user->id,
            'result' => $number,
        ]);

        $result = GameService::getResult($number);

        return response()->json([
            'number' => $number,
            'result' => $result,
            'prize' => $result == GameService::RESULT_WIN ? GameService::getPrize($number) : 0,
        ]);
    }

}
