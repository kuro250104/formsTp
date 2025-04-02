<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model; // ✅ Nouveau namespace

class Form extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'forms';

    protected $fillable = ['title', 'description', 'questions'];
}
