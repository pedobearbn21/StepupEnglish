<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Checkword extends Model
{

    protected $table = "Checkword";
    protected $fillable = [
        'check_id', 'user_id'
    ];

    function relationuser() {
        return $this->belongsTo(User::class);
    }

}
