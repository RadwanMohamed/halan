<?php

namespace App\Http\Controllers\Api\User;

use App\Car;
use App\Image;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $this->showAll('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'  => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric|unique:users',
            'password' =>'required|string|confirmed',
            'city' => 'required|string',
            'nationalID' => 'required|numeric',
            'role' => 'required|in:'.User::DRIVER.','.User::CLIENT,

        ];
        $this->validate($request,$rules);

        $user = User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'api_token'  => User::generateTokenKey(),
            'password'   => bcrypt($request->password),
            'city'       => $request->city,
            'nationalID' => $request->nationalID,
            'role'       => $request->role,
        ]);
        if ($request->role == User::DRIVER)
        {
            //'model','color','carID'
            $car = new Car();
            $car->model = $request->model;
            $car->color = $request->color;
            $car->carID = $request->carID;
            $car->save();

            $application_photo = new Image();
            $application_photo->name = 'صورة الاستمارة';
            $application_photo->path = $request->application->store('');
            $application_photo->imageable_id = $car->id;
            $application_photo->imageable_type = 'App\Car';
            $application_photo->save();


            $driveid = new Image();
            $driveid->name = 'صورة رخصة السواقة';
            $driveid->path = $request->drive->store('');
            $driveid->imageable_id = $car->id;
            $driveid->imageable_type = 'App\Car';
            $driveid->save();
            if ($request->has('car'))
            {
                foreach ($request->car_images as $k => $image)
                {
                    $carImage = new Image();
                    $carImage->name = "photo {$k}";
                    $carImage->path = $image->store('');
                    $carImage->imageable_id = $car->id;
                    $carImage->imageable_type = 'App\Car';
                    $carImage->save();
                }
            }
            $user->car_id = $car->id;
            $user->save();
        }

        return $this->showOne('user',$user,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $this->showOne('user',$user);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name'  => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric|unique:users,phone,'.$user->id,
            'city' => 'nullable|string',
            'nationalID' => 'nullable|numeric',
            'role' => 'nullable|in:'.User::DRIVER.','.User::CLIENT,
        ];
        $this->validate($request,$rules);

        if ($request->has('email'))
                $user->email = $request->email;
        if ($request->has('name'))
                $user->name = $request->name;
        if ($request->has('phone'))
                $user->phone = $request->phone;
        if ($request->has('city'))
                $user->city = $request->city;
        if ($request->has('nationalID'))
                $user->nationalID  = $request->nationalID;
        if ($request->has('role'))
                $user->role = $request->role;


        if ($user->isClean())
            return $this->errorResponse('sorry, you must specify new data to update the user',422);

        return $this->showOne('user',$user,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->has('car'))
             $user->car->delete();
        $user  = $user->delete();
        return $this->showOne('user',$user,200);
    }

    public function send(Request $request)
    {
        if ($request->has('locale'))
        {
            $locale = $request->locale;
            App::setLocale($locale);
        }

        $user = User::where('email',$request->email)->first();
        if (!$user)
            return $this->errorResponse('please enter valid data',422);

        $verification = User::generateVerificationKey();

        $user->password = bcrypt($verification);

        $user->save();
        $message = "
                تم ارسال هذا البريد بناءا على طلبك لتحديث كلمة السر. كلمة السر الجديدة الخاصة بك :
  {$verification}              
";

        Mail::raw($message,function ($message)use ($request,$user){
            $message->to($user->email)->subject($request->subject);
        });

        return response()->json(["message"=>"تم ارسال رسالة لايميل الخاص بك"],200);

    }

    public function updatePassword(Request $request)
    {
        $user = User::where('api_token',$request->api_token)->first();
        $rules = [
            'oldpassword'   => 'required|string',
            'password'      => 'required|string|confirmed',
        ];
        $this->validate($request, $rules);

        if(!Hash::check($request->oldpassword,$user->password))
            return response()->json(["error"=>"كلمة السر غير صحيحة"],422);

        $user->password = bcrypt($request->password);
        $user->verify = null;
        $user->save();
        return $this->showOne('user',$user);
    }
}
