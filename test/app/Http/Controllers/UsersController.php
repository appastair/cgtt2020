<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Event;
use App\Models\User;
use App\Events\UserEvent;

class UsersController extends Controller
{
    /**
     * Add a user.
     * @param  Request  $request
     * @return Response
     */
    public function addUser(Request $request)
    {
        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        Event::dispatch(new UserEvent($request->path(),$user));

        return response()->json($user, 201);
    }

    /**
     * Get a user.
     *
     * @param  Request  $request
     * @param  integer  $id
     * @return Response
     */
    public function getUser(Request $request, $id)
    {
        $user = User::find($id);
        if(!$user){
            $status = 404;
        }else{
            $status = 200;
        }

        return response()->json($user, $status);
    }

    /**
     * Get all users.
     *
     * @param  Request  $request
     * @return Response
     */
    public function getAllUsers(Request $request)
    {
         $users = User::all();

         return response()->json($users, 200);
    }

    /**
     * Delete a user.
     *
     * @param  Request  $request
     * @param  integer  $id
     * @return Response
     */
    public function deleteUser(Request $request, $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json([], 404);
        }

        $user->delete();

        Event::dispatch(new UserEvent($request->path(),$user));

        return response()->json([], 410);
    }

    /**
     * Update a user.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json([], 404);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        Event::dispatch(new UserEvent($request->path(),$user));

        return response()->json([], 200);
    }

}
