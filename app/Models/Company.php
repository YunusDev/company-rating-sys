<?php

namespace App\Models;

use App\Traits\Rateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory, Rateable;

    public $appends = ['is_rated', 'formatted_date'];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'website',
        'avg_rating',
    ];

    public function ratings(){

        return $this->morphToMany(User::class, 'rating')->withTimestamps();

    }

    public function getFormattedDateAttribute(){

        return $this->created_at->format('F dS, Y');

    }

}
