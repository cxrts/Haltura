<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $fillable=["time", "description", "number", "status", "user_id", "respond_id"];
}
