<?php

namespace App\Http\Controllers;

use App\Models\Contrats;
use App\Models\Factures;
use App\Http\Requests\StoreFacturesRequest;
use App\Http\Requests\UpdateFacturesRequest;
use Symfony\Component\HttpFoundation\Response;

class FacturesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $factures = Factures::all();
        return response()->json($factures);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\StoreFacturesRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreFacturesRequest $request)
    {
        $validateData = $request->validated();
        $newFacture = new Contrats($validateData);
        $newFacture->save();
        return response()->json($newFacture, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Factures  $facture
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Factures $facture)
    {
        return response()->json($facture, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Http\Requests\UpdateCarsRequest $request
     * @param Factures $facture
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateFacturesRequest $request, Factures $facture)
    {
        $validateData = $request->validated();
        $facture->update($validateData);
        return response()->json($facture, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Adresses  $facture
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Factures $facture)
    {
        $facture->delete();
        return response()->json(Factures::all());
    }
}
