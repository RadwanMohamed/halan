<?php

namespace App\Traits;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

 /**
  * displys the json response message
  *
*/
trait ApiResponser
{
    private function successResponse($data,$code)
    {
        return response()->json($data,$code);
    }
    protected  function errorResponse($message,$code)
    {
        return response()->json(['error'=>$message,'code'=>$code],$code);
    }

    protected function showAll($key,Collection $collection , $code =200)
    {
        return $this->successResponse(["$key"=>$collection],$code);
    }
    protected function showOne($key,Model $model , $code =200)
    {
        return $this->successResponse(["$key"=>$model],$code);
    }
    protected function showMessage($message , $code =200)
    {
        return $this->successResponse(['data'=>$message],$code);
    }
}
