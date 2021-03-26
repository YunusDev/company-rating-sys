<?php

namespace App\Traits;

trait Rateable{

    public  function isRated(){

        return $this->ratings()->withPivot('rating')
            ->wherePivot('user_id', auth()->id())->exists();
    }

    public  function averageRating(){

        return $this->ratings()->withPivot('rating')->average('rating');
    }


    public function getIsRatedAttribute(){

        return $this->isRated();

    }

    public function getAverageRatingAttribute()
    {
        return $this->averageRating();

    }

}
