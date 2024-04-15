<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'prix', 'id_categorie', 'images','description'
    ];


    // Relation "appartient à" avec la catégorie
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categorie');
    }

}
