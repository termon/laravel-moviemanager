<?php

namespace App\Enums;

enum Genre: int {
    case Action = 1;
    case Thriller = 2;
    case Comedy = 3;
    case Children = 4;
    case SciFi = 5;
    case Western = 6;
    case Animation = 7;
    case Supernatural = 8;

    public static function name($val): string {
        $e = Genre::tryFrom($val);
        if (is_null($e)) {
            return "UNKNOWN";
        } else {
            return $e->name;
        }
    }
}
