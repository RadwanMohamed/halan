<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends User
{

    function orders()
    {
        return $this->hasMany('App\Order');
    }
}
