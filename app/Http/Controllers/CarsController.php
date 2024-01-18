<?php

namespace App\Http\Controllers;


use App\Models\Cars;
use App\Http\Requests\StoreCarsRequest;
use App\Http\Requests\UpdateCarsRequest;
use Symfony\Component\HttpFoundation\Response;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $cars = Cars::all();
        return response()->json($cars);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\StoreCarsRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCarsRequest $request)
    {
        $validateData = $request->validated();
        $newCar = new Cars($validateData);
        $newCar->save();
        return response()->json($newCar, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Cars  $car
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Cars $car)
    {
        return response()->json($car, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Http\Requests\UpdateCarsRequest $request
     * @param Cars $car
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCarsRequest $request, Cars $car)
    {
        $validateData = $request->validated();
        $car->update($validateData);
        return response()->json($car, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     * * @param  \App\Models\Cars $car
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Cars $car)
    {
        $car->delete();
        return response()->json($car::all());
    }
}
