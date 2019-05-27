<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const ASSIGNED   = "assigned";
    const UNASSIGNED = "unassigned";
    const REJECTED   = "rejected";
    const APPROVED   = "approved";

    protected $fillable = ['name','description','from','to','kilos','cost','client_id'];

    public function drivers()
    {
        return $this->belongsToMany("App\User","order_users","order_id","user_id");
    }
    public  function client()
    {
        return $this->hasOne("App\User","client_id");
    }
}
