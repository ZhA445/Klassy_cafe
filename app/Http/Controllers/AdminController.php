<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }
    public function show_users(){
        $users = User::orderBy('user_type', 'desc')->get();

        return view('admin.show_users',compact('users'));
    }

    public function delete_user($id){
        $user = User::find($id);

        $user->delete();

        return redirect()->back()->with('message', 'User Deleted!');
    }

    public function show_foods(){
        $foods = Food::all();
        return view('admin.show_foods',compact('foods'));
    }


    public function add_food()
    {
        return view('admin.add_food');
    }

    public function upload_food(Request $request){
        $food = new Food;

        $food->title = $request->title;
        $food->description = $request->description;
        $food->price = $request->price;

        $image = $request->image;

        $imagename = time(). '.' .$image->getClientOriginalExtension();

        $image->move('foods', $imagename);

        $food->image = $imagename;

        $food->save();

        return redirect()->back()->with('message', 'Product Added Successfully');

    }

    public function delete_food($id)
    {
        $food = Food::find($id);

        $food->delete();

        return redirect()->back()->with('message', 'Product Deleted Successfully.');
    }

    public function update_food($id){
        $food = Food::find($id);

        return view('admin.update_food', compact('food'));
    }

    public function reupload_food($id,Request $request)
    {
        $validator = Validator(request()->all(),[
            'title' => 'required|max:60',
            'description' => 'required|max:100',
            'price' => 'required',
            'date' => 'required',
            'time'=> 'required',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $food = Food::find($id);
        $food->title = $request->title;
        $food->description = $request->description;
        $food->price = $request->price;
        $image = $request->image;
        if($image){

            $imagename = time(). '.' .$image->getClientOriginalExtension();

            $image->move('foods', $imagename);

            $food->image = $imagename;

        }
        $food->save();

        return redirect('/food')->with('message', 'Product Updated Successfully');
    }

    public function show_reservation()
    {
        $reservations = Reservation::orderBy('reservation', 'desc')->get();
        return view('admin.show_reservation',compact('reservations'));
    }

    public function confirm_reservation($id)
    {
        $reservation = Reservation::find($id);

        $reservation->reservation = "1";

        $reservation->save();

        return redirect()->back()->with('message', 'Confirmed Reservation.');
    }

    public function delete_reservation($id)
    {
        $reservation = Reservation::find($id);

        $reservation->delete();

        return redirect()->back()->with('message', 'Reservation Deleted!');
    }


    public function show_chefs()
    {
        $chefs = Chef::all();

        return view('admin.show_chefs', compact('chefs'));
    }

    public function add_chef()
    {
        return view('admin.add_chef');
    }

    public function upload_chef(Request $request)
    {
        $chef = new Chef;

        $chef->name = $request->name;
        $chef->speciality = $request->speciality;

        $image = $request->image;

        $imagename = time(). '.' .$image->getClientOriginalExtension();

        $image->move('chefs', $imagename);

        $chef->image = $imagename;

        $chef->save();

        return redirect()->back()->with('message', 'Chef Added Successfully');
    }

    public function delete_chef($id)
    {
        $chef = Chef::find($id);

        $chef->delete();

        return redirect()->back()->with('message', 'Chef Deleted Successfully');
    }

    public function update_chef($id)
    {
        $chef = Chef::find($id);

        return view('admin.update_chef', compact('chef'));

    }

    public function reupload_chef($id, Request $request)
    {
        $validator = Validator(request()->all(),[
            'name' => 'required|max:60',
            'speciality' => 'required|max:60',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $chef = Chef::find($id);
        $chef->name = $request->name;
        $chef->speciality = $request->speciality;
        $image = $request->image;
        if($image){

            $imagename = time(). '.' .$image->getClientOriginalExtension();

            $image->move('chefs', $imagename);

            $chef->image = $imagename;

        }


        $chef->save();

        return redirect('/chef')->with('message', 'Chef Updated Successfully');

    }
}
