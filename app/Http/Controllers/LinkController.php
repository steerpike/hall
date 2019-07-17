<?php

namespace App\Http\Controllers;

use App\Link;
use App\MachineTag;

use Storage;
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
        $machinetags = MachineTag::orderBy('namespace')->get();
        return view('links.create', compact('machinetags'));
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
        $tags = $request->get('tags');
        $link->save();
        $link->syncMachineTags($tags);
        if($tag) {
            $link->attachMachineTag($tag)->save();
        }
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
        $machinetags = MachineTag::orderBy('namespace')->get();
        $checkeds = $link->machineTags->pluck('id')->toArray();
        $ids = $machinetags->pluck('id')->toArray();
        return view('links.edit', compact('link', 'machinetags', 'checkeds', 'ids'));
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
        $tags = $request->get('machinetags');
        $link->syncMachineTags($tags);
        $tag = $request->get('machinetag');
        if($tag) {
            $link->attachMachineTag($tag);
        }
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
    public function import() {
        $json = Storage::disk('local')->get('links.json');
        $json = json_decode($json, true);
        foreach($json as $link) {
            $added = $link['dateAddedLocal'];
            $added = str_replace('/', '-', $added);
            $date = strtotime($added);
            $save_date = date('Y-m-d H:i:s', $date);

            $item = new Link([
                'title' => $link['title'],
                'url' => $link['url'],
                'description' => $link['Description'],
                'notes' => $link['Notes'],
                'created_at'=>$save_date
            ]);
            $item->save();
            $tags = $link['Tags'];
            $tag_collection = explode(',', $tags);
            if(is_array($tag_collection)) {
                foreach($tag_collection as $tag) {
                    $item->attachMachineTag(trim($tag));
                }
            } else {
                $item->attachMachineTag(trim($tags));
            }
            
            $item->save();
        }
    }
}
