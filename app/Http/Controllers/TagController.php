<?php

namespace App\Http\Controllers;

use App\Link;
use App\MachineTag;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    public function index($machinetag)
    {
        $links = Link::withSearchString($machinetag)->get();
        return view('links.index', compact('links'));
    }
    public function list()
    {
        $machinetags = MachineTag::orderBy('namespace')->withCount('links')->get();
        
        return view('tagged.index', compact('machinetags'));
    }
}