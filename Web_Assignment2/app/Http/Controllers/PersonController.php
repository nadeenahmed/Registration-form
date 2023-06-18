<?php

namespace App\Http\Controllers;
use App\Mail\NewUserRegistered;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PersonController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'username'  =>  'unique:people',
            //'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $person = new Person;
        $person->fullName = $request->fullName;
        $person->username = $request->username;
        $person->birthDate = $request->birthDate;
        $person->phone = $request->phone;
        $person->address = $request->address;
        $person->password = $request->password;
        $person->confirmPassword = $request->confirmPassword;
        $person->image = $request->image;
        $person->email = $request->email;
        

        $person->save();
        Mail::to('toka343357@gmail.com ')->send(new NewUserRegistered($person));
        return redirect('/')->with('success', 'User has been added successfully!');
    }

    public function checkUsername($username)
    {
        $exists = Person::where('username', $username)->exists();
        return response()->json(['exists' => $exists]);
    }

}
