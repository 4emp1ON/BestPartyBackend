<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $table = 'parts';
    protected $fillable = ['name', 'description', 'unit'];

    public function recipes() {
        return $this->belongsToMany(Recipe::class, 'recipes_has_parts');
    }
}
