<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class HomeController extends Controller
{
    public function index(){

        return view('index');   
    }
    public function create(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|nullable',
            'phone' => 'required',
            'message' => 'nullable',
        ]);

        $data = new Data;
        $data->name = $request->name;   
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->save();

        // if($this->isOnline()){
        //     $mail_data = [
        //         'recipiant' => 'prajapatiprakash5452@gmail.com',
        //         'fromEmail' => $request->email,
        //         'fromName' => $request->name,
        //         'phone' => $request->phone,
        //         'body' => $request->message,
        //     ];
        //     Mail::send('index', $mail_data, function ($message)use($mail_data){
        //         $message->to($mail_data['recipiant']);
        //         $message->from($mail_data['fromEmail'],$mail_data['fromName']);
        //         $message->subject($mail_data['phone']);
        //     });
            return redirect()->back()->with('message','Send Successfully');
        }
        public function show(){
            $data = Data::all();
            return view('show',compact('data'));   
        }
    }

