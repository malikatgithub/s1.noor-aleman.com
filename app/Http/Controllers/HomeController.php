<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolInfo as AppSchoolInfo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $school_infos = AppSchoolInfo::all();

        foreach ($school_infos as $info) {
            $name = $info->name_arabic;
            $logo = $info->logo;
        }
        return view('home')->with('name', $name)->with('logo', $logo);

    }
}
