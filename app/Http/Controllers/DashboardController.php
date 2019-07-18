<?php

namespace App\Http\Controllers;


use App\Link;
use App\MachineTag;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        $links = Link::orderBy('created_at','desc')
                ->with('machinetags')    
                ->take(15)
                ->get();
        $machinetags = MachineTag::orderBy('namespace')->withCount('links')->get();
        return view('dashboard', compact('links','machinetags'));
    }
    public function list($machinetag)
    {
        $machinetags = MachineTag::orderBy('namespace')->withCount('links')->get();
        $links = Link::withSearchString($machinetag)
                ->with('machinetags') 
                ->orderBy('created_at','desc') 
                ->get();
        return view('dashboard', compact('links','machinetags'));
    }
}