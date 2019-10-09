<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkword extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'check_id', 'user_id'
    ];

    function relationuser() {
        return $this->belongsTo(User::class);
    }

}
