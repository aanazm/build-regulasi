<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegMenu extends Model
{
    use HasFactory;
    protected $table='reg_menu';
    protected $fillable = [
        'name',
    ];
}
