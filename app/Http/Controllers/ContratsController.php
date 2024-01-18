<?php

namespace App\Http\Controllers;


use App\Models\Contrats;
use App\Http\Requests\StoreContratsRequest;
use App\Http\Requests\UpdateContratsRequest;
use Symfony\Component\HttpFoundation\Response;

class ContratsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $contrats = Contrats::all();
        return response()->json($contrats);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\StoreContratsRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreContratsRequest $request)
    {
        $validateData = $request->validated();
        $newContrat = new Contrats($validateData);
        $newContrat->save();
        return response()->json($newContrat, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Contrats  $contrat
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Contrats $contrat)
    {
        return response()->json($contrat, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Http\Requests\UpdateContratsRequest $request
     * @param Contrats $contrat
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateContratsRequest $request, Contrats $contrat)
    {
        $validateData = $request->validated();
        $contrat->update($validateData);
        return response()->json($contrat, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Contrats  $contrat
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Contrats $contrat)
    {
        $contrat->delete();
        return response()->json($contrat::all());
    }
}
