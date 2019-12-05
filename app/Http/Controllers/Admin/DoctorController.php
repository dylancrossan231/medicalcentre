<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $doctors = Doctor::all();
    
            return view('doctor.index')->with([
                'doctors' => $doctors
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('doctor.create');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'address_1' => 'required|max:191',
            'address_2' => 'required|max:191',
            'phone_number' => 'required|integer',
            'email' => 'required|max:191',
            'password' => 'required|min:8',
            'date_started' => 'required|max:191',
            'expertise' => 'required|max:191'

        ]);

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->address_1 = $request->input('address_1');
        $user->address_2 = $request->input('address_2');
        $user->phone_number = $request->input('phone_number');
        $user->password =  Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->save();

        $user->roles()->attach(Role::where('name', 'doctor')->first());
        
        $doctor = new Doctor();
        $doctor->date_started = $request->input('date_started');
        $doctor->expertise = $request->input('expertise');
        $doctor->user_id = $user->id;
        $doctor->save();
        return redirect()->route('doctor.index', $user->id);

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);

        return view ('doctor.show')->with([
            'doctor' => $doctor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('doctor.edit')->with([
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'address_1' => 'required|max:191',
            'address_2' => 'required|max:191',
            'email' => 'required|email|unique:users,email,'.$id.'|max:191',
            'password' => 'min:8',
            'phone_number' => 'required|integer',
            'expertise' => 'required|max:255|string',
            'date_started' => 'required|max:191'
        ]);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->address_1 = $request->input('address_1');
        $user->address_2 = $request->input('address_2');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->doctor->expertise = $request->input('expertise');
        $user->doctor->date_started = $request->input('date_started');
        $user->doctor->save();

        $user->save();
        return redirect()->route('doctor.index', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->route('doctor.index');
    }
}
