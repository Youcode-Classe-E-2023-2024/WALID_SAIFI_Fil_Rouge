<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Panier extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'quantite', 'prix_total'];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }



}
