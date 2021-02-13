<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;
    protected $table = 'settlements';
    protected $primaryKey = 'key';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'zone_type',
        'settlement_type',
        'zip_code',
    ];
    protected $hidden = [
        'zip_code',
    ];

    public function zipCode(){
        return $this->belongsTo(ZipCode::class);
    }
    public function settlementType(){
        return $this->belongsTo(SettlementType::class,'settlement_type');
    }

}
