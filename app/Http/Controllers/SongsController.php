<?php

namespace TTBand\Http\Controllers;

use Illuminate\Http\Request;
use TTBand\ChordPro;
use TTBand\Http\Requests;
use TTBand\Http\Controllers\Controller;
use TTBand\Song;
use TTBand\SongParser;
use yajra\Datatables\Datatables;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return Datatables::of(Song::select('*'))
                ->addColumn('actions', function($song) {
                    return
                        link_to_route('songs.show', 'Chord Sheet', [$song], ['class' => 'btn btn-info']) . ' '
                        . link_to_route('songs.show', 'Song Info', [$song, 'mode' => 'info'], ['class' => 'btn btn-info']);
                })
                ->make(true);
        }
        return view('songs/index');
    }

    public function data(Request $request) {

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'artist' => 'required|min:3',
            'mode' => 'required',
            'body' => 'required'
        ]);

        $song = new Song($request->all());
        $cp = ChordPro::fromText($song->body);
        var_dump($song);
        $song->body = $cp->chordPro();
        var_dump($song);
        $song->save();
        var_dump($song);
//        die;
        return redirect()->route('songs.show', [$song])->with('flash_message', 'Song added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
//        $pp = new SongParser();
//        $body = $pp->parse($song->body);
        $pro = new ChordPro($song->body);
//        $pro = ChordPro::fromText($song->body);
        $pages = $pro->output();
        return view('songs.show')->withSong($song)->withPages($pages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Song $song)
    {
        return view('songs.edit')
            ->withSong($song)
            ->withMode($request->query('mode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        $song->update($request->all());
        return redirect()
            ->route('songs.show', [$song])
            ->with('flash_message', 'Song updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $deleted = $song->delete();
        return redirect('songs')->with('flash_message', 'Song has been deleted');
    }
}
