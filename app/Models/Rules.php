<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    use HasFactory;
    protected $table = 'rules';
    protected $fillable = [
        'symptom_id',
        'drug_id',
        'probability',
    ];

    public function symptoms()
    {
        return $this->belongsTo(Symptoms::class,'symptom_id');
    }

    public function drugs()
    {
        return $this->belongsTo(Drugs::class,'drug_id');
    }
}
