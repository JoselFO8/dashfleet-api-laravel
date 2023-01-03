<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
     /**
     * Ver todos los pedidos
     */
    public function index() {
        // $users = User::all();

        // return response()->json([
        //     "result" => $users
        // ]);

        return response()->json([
            "result" => "desde index user"
        ]);
    }

    public function store(Request $request) {

        // $user = new User;

        // $user->title = $request->title;
        // // $test = json_decode($request->title, false);
        // $datas = $request->title->getClientOriginalName();
        // // dd($request);
        // var_dump($datas);
        // $user->save();

        // return response()->json(['result'=>$user, 'prueba'=>$request->request]);
        return response()->json([
            "result" => 'Desde store user'
        ]);
    }

    public function update(Request $request, $id) {

    }

    public function destroy($id) {

    }
}
