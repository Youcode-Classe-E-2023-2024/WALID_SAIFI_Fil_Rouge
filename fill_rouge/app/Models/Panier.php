<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

