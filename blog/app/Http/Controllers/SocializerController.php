<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SocializerController extends Controller
{

/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:socializer');
    }

  public function index(){
      return view('socializer');
  }

}
