<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
// use Laravel\Sanctum\HasApiTokens;


class ApiUserController extends Controller
{
    // use HasApiTokens, HasFactory, Notifiable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  User::get();
        return response($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users,email,id',
            'name' => 'required',
            'password' => 'required',
        ]);

        // return response($validated);
        $user = new User( $validated );
        $user->password = bcrypt( $request->password );
        $user->save();

        if ( $user->id )
        {
            return response(['ok' =>  true], 200);
        }

        return response(['ok' => false], 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user )
    {
        // $user = User::find($id);
        return response( $user );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find( $id );
        if ( !$user )
        {
            return response(['ok' => false]);
        }

        try {
            $validated = $request->validate([
                'name' => 'required',
                'password' => 'required',
            ]);

            $user->update( $validated );
            return ['ok' => true, $user ];
        } catch (\Throwable $th) {
            return ['ok' => false ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $user = User::find();
        return $user;
        $user->delete();
        return ['ok' => true, $user ];
    }
}
