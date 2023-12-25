<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Event extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'user_id',
        'category_id',
        'location',
        'description',
        'date_start',
        'date_end',
        'time_start',
        'time_end',
        'event_photo_path',
        'price',
        'foto'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
