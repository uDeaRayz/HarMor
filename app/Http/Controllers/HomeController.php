<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docter;
use App\Herb;
use App\Spa;

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
    public function index()
{
    if(auth()->user()->isAdmin()) {
        return view('admin/dashboard');
    } else {
        $docter = Docter::inRandomOrder()->get();
        $herb = Herb::inRandomOrder()->get();
        $spa = Spa::inRandomOrder()->get();
            foreach ($spa as $value) {
            $images = $value->image;
                if ($images === "") {
                } else {
                    $spaImgArray = explode('|', $images);
                }
            }
        return view('welcome',compact('docter','herb','spa','spaImgArray'));
    }
}
}
