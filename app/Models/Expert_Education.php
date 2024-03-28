<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert_Education extends Model
{
    use HasFactory;
    public $table = "expert_education";


    protected $fillable = [
        'name'
    ];
}
