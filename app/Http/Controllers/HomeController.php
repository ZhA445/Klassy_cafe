<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
        $this->middleware('verified')->except('index');
    }
    public function index()
    {
        $foods = Food::all();
        $chefs = Chef::all();

        return view('home.home', compact('foods', 'chefs'));
    }

    public function redirect()
    {
        $user_type = Auth::user()->user_type;

        if ($user_type == '1') {

            $foods = Food::all()->count();
            $total_reservation = Reservation::where('reservation', 0)->count();
            $confirmed = Reservation::where('reservation',1)->count();
            $total_users = User::where('user_type',0)->count();

            return view('admin.home',compact('foods','total_reservation','confirmed','total_users'));
        } else {
            $foods = Food::all();
            $chefs = Chef::all();

            return view('home.home', compact('foods', 'chefs'));
        }
    }
    public function reservation(Request $request)
    {
        $validator = Validator(request()->all(), [
            'name' => 'required|max:120',
            'email' => 'email',
            'phone' => 'required|digits:11',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $id = Auth::user()->id;
        $data = new Reservation;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->user_id = $id;

        $data->save();

        Alert::success('Reservation Successfully.', 'Thank for your Reservation...');

        return redirect()->back();
    }


}
