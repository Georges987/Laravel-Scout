<?php

namespace App\Models;
use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nexus extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name',
        'description'
    ];

    public function searchableAs()
    {
        return 'nexus_index';
    }
}
