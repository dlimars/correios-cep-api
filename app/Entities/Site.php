<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $connection = 'system';
    protected $table = 'site';
}
