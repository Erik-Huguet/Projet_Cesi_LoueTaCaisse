<?php

namespace App\Http\Controllers;

use App\Models\Adresses;
use App\Http\Requests\StoreAdresseRequest;
use App\Http\Requests\UpdateAdresseRequest;
use Symfony\Component\HttpFoundation\Response;

class AdresseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()

    {
        $adresses = Adresses::all();
        return response()->json($adresses);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\StoreAdresseRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreAdresseRequest $request)
    {
        $validateData = $request->validated();
        $newAdresse = new Adresses($validateData);
        $newAdresse->save();
        return response()->json($newAdresse, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *  @param  \App\Models\Adresses  $adresse
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Adresses $adresse)
    {
        return response()->json($adresse, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Http\Requests\UpdateAdresseRequest $request
     * @param Adresses $adresse
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateAdresseRequest $request, Adresses $adresse)
    {
        $validateData = $request->validated();
        $adresse->update($validateData);
        return response()->json($adresse, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Adresses  $adresse
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Adresses $adresse)
    {
        $adresse->delete();
        return response()->json($adresse::all());
    }
}
