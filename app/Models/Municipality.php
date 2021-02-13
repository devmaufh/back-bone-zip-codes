<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;
    protected $table = 'municipalities';
    protected $primaryKey = 'key';
    public $timestamps = false;
    protected $fillable = ['name','federal_entity'];

    public function federalEntity(){
        return $this->belongsTo(FederalEntity::class, 'federal_entity');
    }
    public function zipCodes(){
        return $this->hasMany(ZipCode::class,'key');
    }
}
