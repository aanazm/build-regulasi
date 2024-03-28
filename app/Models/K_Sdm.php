<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class K_Sdm extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    protected $table = 'k_sdm';

    public function SdmEdu()
    {
        return $this->hasMany(SdmEdu::class, 'sdm_id', 'id');
    }
}
