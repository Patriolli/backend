<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Messages;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Messages::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageRequest $request)
    {
        $validated = $request->validated();
        
        $messages = Messages::create($validated);

        return $messages;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $messages = Messages::findorFail($id);
 
        $messages->delete();

        return $messages;
    }
}
