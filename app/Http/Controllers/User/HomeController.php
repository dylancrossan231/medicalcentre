<?php
# @Date:   2019-11-04T19:17:42+00:00
# @Last modified time: 2019-11-13T17:27:05+00:00




namespace App\Http\Controllers\User;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      // $this->middleware('role::user');
  }


  public function index(){
    return view('user.home');
  }
}
