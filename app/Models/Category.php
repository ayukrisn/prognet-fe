<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Category extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['nama','deskripsi'];

    public function events(){
        return $this->hasMany(Event::class);
    }
}
