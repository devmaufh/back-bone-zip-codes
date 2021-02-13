<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory;
    protected $table = 'zip_codes';
    protected $primaryKey = 'key';
    public $timestamps = false;
    protected $fillable = ['locality','zip_code','municipality','federal_entity'];

    protected $hidden = [
        'key',
    ];

    public function getZipCodeAttribute($value){
        return "".$value;
    }

    public function municipality(){
        return $this->belongsTo(Municipality::class, 'municipality');
    }

    public function settlements(){
        return $this->hasMany(Settlement::class,'zip_code');
    }


    public function federalEntity(){
        return $this->belongsTo(FederalEntity::class, 'federal_entity');

    }
}
