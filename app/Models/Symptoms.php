<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptoms extends Model
{
    use HasFactory;

    protected $table = 'symptoms';
    protected $fillable = [
        'symptom',
        'code'
    ];

    public function rules()
    {
        return $this->hasMany(Rules::class,'id');
    }
}
