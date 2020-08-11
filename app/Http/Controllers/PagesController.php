<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    //
    public function root($value='')
    {
        return view('pages.root');
    }
}
