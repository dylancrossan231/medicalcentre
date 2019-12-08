<?php
# @Date:   2019-11-04T19:17:34+00:00
# @Last modified time: 2019-11-13T17:27:31+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
     $this->middleware('role:admin');
  }


    public function index(){
      return view('admin.home');
    }
}
