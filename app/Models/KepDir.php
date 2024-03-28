<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepDir extends Model
{
    use HasFactory;
    protected $table='kep_dir';
    protected $fillable = [
        'numb',
        'name',
        'unit_id'
    ];

    public function KepDirItem()
    {
        return $this->hasMany(KepDirItem::class, 'list_id', 'id');
    }
    public function Units()
    {
        return $this->belongsTo('App\Models\Units');
    }
}
