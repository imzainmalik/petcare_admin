<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pet extends Model
{
    use HasFactory;

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
 
}
