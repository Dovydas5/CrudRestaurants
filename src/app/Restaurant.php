<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function getMenu()
    {
        return $this->belongsTo('App\Menu', 'menu_id', 'id');
    }
}
