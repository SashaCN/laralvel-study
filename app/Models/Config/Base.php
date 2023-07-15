<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Base extends Model
{
    use HasFactory;

    public function __construct()
    {
        return new DB;
    }
}
