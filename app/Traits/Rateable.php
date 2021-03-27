<?php

namespace App\Traits;

trait Rateable{

    /**
     * Check if the authenticated user has rated the entity
     * @return mixed
     */
    public  function isRated(){

        return $this->ratings()->withPivot('rating')
            ->wherePivot('user_id', auth()->id())->exists();
    }

    /**
     * Check if the entity has been rated
     * @return mixed
     */
    public  function hasRating(){

        return $this->ratings()->withPivot('rating')->exists();

    }

    /**
     * Get the average rating of an entity
     * @return mixed
     */
    public  function averageRating(){

        return $this->ratings()->withPivot('rating')->average('rating');
    }

    /**
     *Get the total rating of an entity
     * @return mixed
     */
    public  function totalVotes(){

        return $this->ratings()->withPivot('rating')->sum('rating');
    }


    /**
     * @return mixed
     */
    public function getIsRatedAttribute(){

        return $this->isRated();

    }

    /**
     * @return mixed
     */
    public function getHasRatingAttribute(){

        return $this->hasRating();

    }

}
