<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Log extends Model {

    protected $table = 'users_logs';

    protected $fillable = [
        'user_id',
        'data_old',
        'data_new',
    ];

}