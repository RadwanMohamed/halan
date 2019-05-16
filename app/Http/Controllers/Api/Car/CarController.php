<?php

namespace App\Http\Controllers\Api\Car;

use App\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CarController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return $this->showAll('cars',$cars);
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return $this->showOne('user',$car);
    }




}
