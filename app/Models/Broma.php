<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broma extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'autor_id',
        'broma',
        'fecha'
    ];

    public function user()
    {
        return $this->belongsTo(Autor::class);
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'broma_categorias');
    }
}
