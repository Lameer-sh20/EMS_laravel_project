<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'duration',
        'description',
        'n_tickets',
        'price',
        'organizer',
        'city_id',
        'category_id',
        'image',
        ];
}
