<?php

namespace App\Http\Controllers;


use App\Link;
use Steerpike\MachineTags\MachineTag;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        $links = Link::all();
        $machinetags = MachineTag::orderBy('namespace')->get();
        return view('dashboard', compact('links','machinetags'));
    }
}