<?php
# @Date:   2019-11-04T15:22:18+00:00
# @Last modified time: 2019-11-12T13:51:27+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        $user = $request->user();
        $home = 'user.home';

        if ($user->hasRole('admin')) {
          $home = 'admin.home';
          return view($home)->with([
            'user' => $user
          ]);

        }
        else if($user->hasRole('doctor')){
          $home = 'doctoruser.home';
        }
        else $home = 'patientuser.profile';
        

        return redirect()->route($home);
    }
}
