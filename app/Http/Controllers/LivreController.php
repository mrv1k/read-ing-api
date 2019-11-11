<?php

namespace App\Http\Controllers;

use App\Http\Resources\LivreResource;
use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return LivreResource::collection(Livre::with('lectures')->paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $livre = Livre::create([
            'title' => $request->title,
            'pages' => $request->pages,
            'user_id' => $request->user()->id,
        ]);

        return new LivreResource($livre);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function show(Livre $livre)
    {
        return new LivreResource($livre);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livre $livre)
    {
        // check if currently authenticated user is the owner of the book
        if ($request->user()->id !== $livre->user_id) {
            return response()->json(['error' => 'You can only edit your own books'], 403);
        }

        $livre->update($request->only(['title', 'pages']));

        return new LivreResource($livre);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livre $livre)
    {
        $livre->delete();

        return response()->json(null, 204);
    }
}
