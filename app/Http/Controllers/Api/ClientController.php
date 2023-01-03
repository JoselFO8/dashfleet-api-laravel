<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    /**
    * Obtener data de todos los clientes
    */
    public function index() {
        $clients = Client::all();

        if(!$clients) {
            return response()->json([
                "status"=> 403,
                "error" => true,
                "msg" => "No se hallaron resultados",
                "data" => null
            ]);
        }
        else {
            return response()->json([
                "status"=> 200,
                "error" => false,
                "msg" => "Solicitud exitosa",
                "data" => $clients
            ]);
        }
    }

    /**
     * Almacenar nuevo registro de cliente
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'documentType' => 'required',
            'documentNumber' => 'required'
        ]);

        $client = new Client;

        $client->name = $request->name;
        $client->documentType = $request->documentType;
        $client->documentNumber = $request->documentNumber;
        $client->save();

        if(!$client) {
            return response()->json([
                "status"=> 400,
                "error" => true,
                "msg" => "No fue posible crear el cliente",
                "data" => null
            ]);
        }
        else {
            return response()->json([
                "status"=> 200,
                "error" => false,
                "msg" => "Solicitud exitosa",
                "data" => $client
            ]);
        }
    }

    /**
     * Actualizar cliente segun su id
     */
    public function update(Request $request, $id) {
        return response()->json([
            "msg" => "Desde client - update"
        ]);
    }

    /**
     * Actualizar cliente segun su id
     */
    public function destroy($id) {
        return response()->json([
            "msg" => "Desde client - destroy"
        ]);
    }
}
