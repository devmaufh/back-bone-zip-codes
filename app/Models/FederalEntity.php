<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FederalEntity extends Model
{
    use HasFactory;
    protected $table = 'federal_entities';
    protected $primaryKey = 'key';
    public $timestamps = false;
    protected $fillable = ['name','code'];

    public function municipalities(){
        return $this->hasMany(Municipality::class,'key');
    }
}
