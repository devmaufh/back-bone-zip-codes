<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettlementType extends Model
{
    use HasFactory;

    protected $table = 'settlement_types';
    protected $primaryKey = 'key';
    public $timestamps = false;
    protected $fillable = ['name'];

    public function settlements(){
        return $this->hasMany(Settlement::class);
    }
}
