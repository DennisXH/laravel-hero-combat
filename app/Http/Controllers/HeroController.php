<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index(Request $request)
    {

    }

    public function create()
    {
        return view('create-hero');
    }

    public function store(Request $request)
    {

    }
}
