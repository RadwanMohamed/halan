<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function Sodium\compare;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::select('*');
        foreach (array_except($request->all(),'page') as $key => $value)
        {
            if ($key == '')
                continue;
            if ($key == 'name')
                $users = $users->where($key,'like','%'.$value.'%');
            $users = $users->where($key,'=',$value);
        }
        $users = $users->paginate(50);

        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => ['required','string','max:250'],
            'email'    => ['required','email','max:250'],
            'password' => ['required','string','min:9','confirmed'],
            'phone'    => ['required','numeric','unique:users'],
            'city'  =>    ['required','alpha_dash'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => bcrypt($request->password),
            'api_token'=> null,
            'role'     => $request->role,
            'status'   => User::ON,
            'address'  => $request->address,
            'city'     => $request->city,
            'verify'   => User::generateVerificationKey(),
        ]);
        return redirect('users.show',compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $use)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
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
        $rules  = [
            'name' => 'nullable|string|max:190',
            'email' => 'nullable|email',
            'city' => 'nullable|string'
        ];
        $this->validate($request,$rules);

        if ($request->has('name'))
            $user->name = $request->name;
        if ($request->has('email'))
            $user->email = $request->email;

        if ($request->has('address'))
            $user->address = $request->address;


        if ($request->has('city'))
            $user->city = $request->city;
//        dd($request->all());
        if ($user->isClean())
            return redirect()->back()->with('status','عفوا يجب ادخال قيم جديدة لاتمام عملية التحديث');

        $user->save();
        return redirect('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $user->delete();
        return redirect(route('users.index'))->with('تم حذف هذا المستخدم بنجاح');
    }

    /**
     * block specific user based on ID
     */
    public function block(User $user)
    {
        if ($user->status == User::OFF)
                return redirect()->back()->with('status','هذا العضو موقوف بالفعل');
        $user->status = User::OFF;
        $user->save();
        return redirect(route('users.index'))->with('تم ايقاف هذا المستخدم بنجاح');
    }
    /**
     * activate specific user based on ID
     */
    public function activate(User $user)
    {
        if ($user->status == User::ON)
                return redirect()->back()->with('status','هذا العضو مفعل بالفعل');
        $user->status = User::ON;
        $user->save();
        return redirect(route('users.index'))->with('تم ايقاف هذا المستخدم بنجاح');
    }
}
