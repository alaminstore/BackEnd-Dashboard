<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NEWS extends Model
{
    protected $guarded=[];
    protected $table = "news";
    protected $primaryKey = 'news_id';
}
