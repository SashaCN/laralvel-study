<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Seller extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_seller';
    protected $fillable = [
        'id_marketplace',
        'name',
        'surname',
        'email',
        'phone',
    ];

    public function store($data)
    {
        $id = DB::table('sellers')->insertGetId($data);

        return $id;
        // $this->storePassword([$id, $data['password']]);
    }

    public function storePassword($data)
    {
        DB::table('seller_passwords')->insert($data);
    }
}
