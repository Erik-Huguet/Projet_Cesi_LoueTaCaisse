<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Models\Users;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('log')->only('index');
//        $this->middleware('subscribed')->except('store');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $users = Users::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Http\Requests\StoreUsersRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUsersRequest $request): \Illuminate\Http\JsonResponse
    {
        $validateData = $request->validated();
        $newUser = new Users($validateData);
        $newUser->save();
        return response()->json($newUser, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource
     * @param \App\Models\Users $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Users $user): \Illuminate\Http\JsonResponse
    {
        return response()->json($user, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Http\Requests\UpdateUsersRequest $request
     * @param Users $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUsersRequest $request, Users $user): \Illuminate\Http\JsonResponse
    {
        $validateData = $request->validated();
        $user->update($validateData);
        return response()->json($user, Response::HTTP_ACCEPTED);
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Models\Users $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Users $user): \Illuminate\Http\JsonResponse
    {
        $user->delete();
        return response()->json(Users::all(), [Response::HTTP_OK, 'message' => "success"]);
    }
}
