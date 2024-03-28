<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDocs extends Model
{
    use HasFactory;
    protected $table='item_doc';
    protected $fillable = [
        'tgl_tetap',
        'masa_berlaku',
        'tgl_pengesahan',
        'file_doc',
        'list_id',
        'unit_id',
        
    ];

    

    public function Units()
    {
        return $this->belongsTo('App\Models\Units');
    }
    
}
