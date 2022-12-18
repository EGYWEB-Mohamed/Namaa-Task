<?php
/*
 * Made With ♥ By Mohamed Said (c) 2022
 * - Github : https://github.com/EGYWEB-Mohamed
 * - Whatsapp : https://wa.me/+201141173045
 * - Website : https://msaied.com
 */

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function front()
    {

    }
}
