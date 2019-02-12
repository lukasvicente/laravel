<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'role';

    protected $fillable = ['name', 'description', 'service_provider_id'];

    public $timestamps = true;

    public $rules = [
        'name' => 'required|min:3|max:50'
    ];
}
