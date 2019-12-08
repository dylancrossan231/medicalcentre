<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Visit;
use App\Doctor;
use App\Patient;
use Auth;
class VisitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
       $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $patients = Patient::all();
         $doctors = Doctor::all();
         $visits = Visit::all();
         return view('visit.index')->with([
            'visits' => $visits,
            'patients' => $patients,
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
        $doctors= Doctor::all();
        $patients= Patient::all();
        return view('visit.create')->with([
            'doctors' => $doctors,
            'patients' => $patients
        ]);
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
            'cost' => 'required|integer',
            'duration' => 'required|max:191',
            'doctor_id' => 'required|integer',
            'patient_id' => 'required|integer'
        ]);

        
        $visit = new Visit();
        $visit->cost = $request->input('cost');
        $visit->duration = $request->input('duration');
        $visit->doctor_id = $request->input('doctor_id');
        $visit->patient_id = $request->input('patient_id');
        $visit->save();

        $visits = Visit::all();

        return view('visit.index')->with([
            'visits' => $visits
        ]);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visit = Visit::findOrFail($id);

        return view ('visit.show')->with([
            'visit' => $visit
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
        $visits = Visit::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        $user = User::findOrFail(Auth::id());

        return view('visit.edit')->with([
            'patients' => $patients,
            'doctors' => $doctors,
            'visit' => $visits,
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
        $visit = Visit::findOrFail($id);

        $request->validate([
            'cost' => 'required|integer',
            'duration' => 'required|max:191',
            'doctor_id' => 'required|integer',
            'patient_id' => 'required|integer'
        ]);


        $visit->cost = $request->input('cost');
        $visit->duration = $request->input('duration');
        $visit->doctor_id = $request->input('doctor_id');
        $visit->patient_id = $request->input('patient_id');
        $visit->save();

        return redirect()->route('doctorvisit.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visit = Visit::findOrFail($id);
        $visit->delete();
        return redirect()->route('visit.index');
    }
}
