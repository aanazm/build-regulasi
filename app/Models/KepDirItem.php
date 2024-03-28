<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepDirItem extends Model
{
    use HasFactory;
    protected $table='kep_dir_items';
    protected $fillable = [
        'tgl_tetap',
        'masa_berlaku',
        'tgl_pengesahan',
        'file',
        'list_id',        
    ];
}
