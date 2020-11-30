<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model {

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'document_number',
        'phone_number',
        'country'
    ];

    use SoftDeletes;

    public function userLogs() {
        return $this->hasMany('App\Models\Log');
    }

}