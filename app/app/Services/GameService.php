<?php

namespace App\Services;

class GameService {
    const RESULT_WIN = 'Win';
    const RESULT_LOOSE = 'Loose';

    public static function getPrize (int $number) {
        switch(true) {
            case $number > 900:
                return $number * 70 /100;
            case $number > 600:
                return $number * 50 /100;
            case $number > 300:
                return $number * 30 /100;
            default:
                return $number * 10 /100;
        }
    }

    public static function getResult (int $number) {
        return (($number % 2) == 0) ? self::RESULT_WIN : self::RESULT_LOOSE;
    }

    public static function rollTheDice()
    {
        return rand(1, 1000);
    }
}
