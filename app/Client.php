<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    public function scopeAdults($query)
    {   
        $fromYear = $this->getYear();
        return $query->where('date_of_birth', '<=', $fromYear);
    }

    public function scopeGender($query, $gender)
    {
        return $query->whereGender($gender);
    }

    public function getYear()
    {
        $date = new Carbon();
        $past = $date->subYears(18);
        
        return date_format($past, 'Y-m-d');

    }
}
