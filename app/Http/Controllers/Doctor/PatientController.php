<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Role;
use App\User;
use App\Visit;
use App\Doctor;
use App\Patient;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
    
        return view('doctorpatient.index')->with([
            'patients' => $patients
        ]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctorpatient.create');
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
            'policy_number' => 'required|integer'

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

        $user->roles()->attach(Role::where('name', 'patient')->first());
        
        $patient = new Patient();
        $patient->policy_number = $request->input('policy_number');
        $patient->user_id = $user->id;
        $patient->save();
        return redirect()->route('doctorpatient.index', $user->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);

        return view ('doctorpatient.show')->with([
            'patient' => $patient
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

        return view('doctorpatient.edit')->with([
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
            'policy_number' => 'required|integer'

        ]);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->address_1 = $request->input('address_1');
        $user->address_2 = $request->input('address_2');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->patient->policy_number = $request->input('policy_number');
        $user->patient->save();
        $user->save();
        return redirect()->route('doctorpatient.index', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->route('doctorpatient.index');
    }
}
