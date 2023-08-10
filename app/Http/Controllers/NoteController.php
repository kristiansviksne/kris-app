<?php

namespace App\Http\Controllers;

use App\Events\NoteCreated;
use App\Jobs\LongTask;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function __construct()
    { 
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'text' => 'required'
        ]);
        auth()->user()->notes()->create($data);
        NoteCreated::dispatch();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createnote() {
        LongTask::dispatch();
        return view('createnote');
    }
}
