<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegList extends Model
{
    use HasFactory;
    protected $table='reg_list';
    protected $fillable = [
        'kd',
        'name',
        'menu_id',
    ];

    public function ItemDocs()
    {
        return $this->hasMany(ItemDocs::class, 'list_id', 'id');
    }
    public function RegMenu()
    {
        return $this->belongsTo('App\Models\RegMenu');
    }
    
}
