<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request)
    {

    }

    public function create()
    {
        return view('create-team');
    }

    public function store(Request $request)
    {

    }
}
