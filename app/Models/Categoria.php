<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    public $timestamps = FALSE;

    protected $fillable = [
        'id',
        'categoria',
    ];

    public function bromas()
    {
        return $this->belongsToMany(Broma::class);
    }
}
