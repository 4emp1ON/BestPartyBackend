<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipes';
    protected $fillable = ['name', 'category_id', 'difficult', 'cook_time', 'standard_portion', 'glass', 'alcohol_amount', 'description', 'how_to'];


    public function parts() {
        return $this->belongsToMany(Part::class, 'recipes_has_parts')->withPivot('part_amount');
    }
}
