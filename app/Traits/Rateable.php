<?php

namespace App\Traits;

trait Rateable{

    public  function isRated(){

        return $this->ratings()->withPivot('rating')
            ->wherePivot('user_id', auth()->id())->exists();
    }

    public  function hasRating(){

        return $this->ratings()->withPivot('rating')->exists();

    }

    public  function averageRating(){

        return $this->ratings()->withPivot('rating')->average('rating');
    }

    public  function totalVotes(){

        return $this->ratings()->withPivot('rating')->sum('rating');
    }


    public function getIsRatedAttribute(){

        return $this->isRated();

    }

    public function getHasRatingAttribute(){

        return $this->hasRating();

    }

}
