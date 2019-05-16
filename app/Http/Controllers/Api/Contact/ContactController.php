<?php

namespace App\Http\Controllers\Api\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        if ($request->has("locale"))
        {
            $locale = $request->locale;
            App::setLocale($locale);
        }
        $rules = [

            'phone' => 'required|string',
            'email' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ];
        $this->validate($request, $rules);

        $message = " هذه الرسالة مرسلة اليك من {$request->email}
        {$request->phone} برقم جوال 
        :
        $request->message
         ";

        mail('6544743@gmail.com',$request->subject,$message);
        return response()->json(['data'=>'تم ارسال الرسالة'],200);
//
//        Mail::raw($request->message, function ($message) use($request) {
//            $message->to('6544743@gmail.com')->subject($request->subject);
//        });
    }


}
