<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdmEdu extends Model
{
    use HasFactory;
    protected $fillable = ['sdm_id','edu_id','name'];

    public function Education(){
        return $this->belongsTo(Expert_Education::class, 'edu_id', 'id');
    }
}
