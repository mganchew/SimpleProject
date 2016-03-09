<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id'
    ];

    protected $dates = ['published_at'];

    public function scopePublished($query)
    {

        $query->where('published_at', '<=', Carbon::now());

    }

    public function setPublishedAtAttribute($date)
    {

        $this->attributes['published_at'] = Carbon::createFromFormat('m-d-Y', $date);

    }

    public function getPublishedAtAttribute($date)
    {
        return new Carbon($date);
    }

    public function user()
    {

        return $this->belongsTo('App\User');

    }

    public function tags()
    {

        return $this->belongsToMany('App\Tag')->withTimestamps();

    }

    public function getTagListAttribute()
    {

        return $this->tags()->lists('id');

    }

}