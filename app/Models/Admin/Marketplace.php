<?php

namespace App\Models\admin;

use App\Models\Config\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Marketplace extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_marketplace';
    protected $fillable = [
        'country_code',
        'country',
        'currency',
    ];

    public function saveMarketplace($data){
        DB::table('marketplaces')->insert($data);
    }

    public function updateMarketplace($id, $data){
        DB::table('marketplaces')
            ->where('id_marketplace', $id)
            ->update($data);
    }

    public function deleteMarketplace($id)
    {
        DB::table('marketplaces')->delete($id);
    }
}
