<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	public function images()
    {
        return $this->hasMany(EventImage::class, 'event_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}