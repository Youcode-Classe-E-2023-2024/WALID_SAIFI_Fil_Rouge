<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    /**
     * Les attributs qui sont autorisés à être remplis lors de l'assignation de masse.
     *
     * @var array
     */
    protected $fillable = ['name'];

    // Relation "un à plusieurs" avec les produits
    public function products()
    {
        return $this->hasMany(Product::class, 'id_categorie');
    }


    
}
