<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Http\Requests\StoreRolesRequest;
use App\Http\Requests\UpdateRolesRequest;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $roles = Roles::all();
        return response()->json($roles);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRolesRequest $request)
    {
        $validateData = $request->validated();
        $newRole = new Roles($validateData);
        $newRole->save();
        return response()->json($newRole, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource
     * @param  \App\Models\Factures  $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Roles $role)
    {
        return response()->json($role, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Http\Requests\UpdateCarsRequest $request
     * @param Roles $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRolesRequest $request, Roles $role)
    {
        $validateData = $request->validated();
        $role->update($validateData);
        return response()->json($role, Response::HTTP_ACCEPTED);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Adresses  $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Roles $role)
    {
        $role->delete();
        return response()->json(Roles::all(), [Response::HTTP_OK,'message'=>"success"]);
    }

}
