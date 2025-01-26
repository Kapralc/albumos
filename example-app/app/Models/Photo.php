<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    /**
     * Povolené atributy pro hromadné přiřazení.
     */
    protected $fillable = ['title', 'path'];
}