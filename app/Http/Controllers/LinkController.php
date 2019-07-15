<?php

namespace App\Http\Controllers;

use App\Link;
use Steerpike\MachineTags\MachineTag;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::with('machinetags')->get();
        return view('links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'url'=>'required'
        ]);
        $link = new Link([
            'title' => $request->get('title'),
            'url' => $request->get('url'),
            'description' => $request->get('description'),
            'notes' => $request->get('notes')
        ]);
        $tag = $request->get('machinetag');
        //$MachineTag = MachineTag::findOrCreate($tag);
        $link->save();
        $link->attachMachineTag($tag)->save();
        return redirect('/links')->with('success', 'Link saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
        return view('links.show', compact('link'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $link->title = $request->get('title');
        $link->url = $request->get('url');
        $link->description = $request->get('description');
        $link->notes = $request->get('notes');
        $tag = $request->get('machinetag');
        $link->attachMachineTag($tag);
        $link->save();
        return redirect('/links')->with('success', 'Link edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
    }
}
