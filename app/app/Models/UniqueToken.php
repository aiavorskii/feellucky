<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniqueToken extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'token';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isActive () {
        return $this->is_active;
    }

    public static function isTokenValid($token) {
        $token = self::where('token', $token)->where('is_active', true)->first();

        return $token ? $token->is_active : false ;
    }
}
