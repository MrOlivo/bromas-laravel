<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
    
    public $timestamps = FALSE;

    protected $fillable = [
        'nombre',
        'email',
    ];

    public function broma()
    {
        return $this->hasMany(Broma::class);
    }
}
