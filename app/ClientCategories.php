<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientCategories extends Model
{
    protected $guarded=[];
    protected $table = "client_categories";
    protected $primaryKey = 'client_category_id';
}
