<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Integer;

class Product extends Model
{
     protected $fillable = [
        'name', 'description', 'price', 
        'stock_quantity', 'image', 'is_active'
    ];
    //verfier si le produit est en stock
     public function inStock()
    {
        return $this->stock_quantity > 0;
    }   
    
    // dimminuer la quantité en stock après une commande
    public function reduceStock(float $quantity)
    {
        $this->stock_quantity -= $quantity;
        $this->save();
    }

}
