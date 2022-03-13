<?php

namespace App\Models;

use App\Models\Ingredient;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = ['title'];
    //protected $garded = [];

    //C est pour montrer q une recette appartient a un utilisateur

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients(): BelongsToMany
    {

        return $this->belongsToMany(Ingredient::class)
            ->withPivot(['amount', 'unit']);
    }
}
