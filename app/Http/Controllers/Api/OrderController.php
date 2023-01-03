<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    /**
     * Obtener DATA de todos los pedidos
     */
    public function index() {
        $orders = Order::all();

        if(!$orders) {
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
                "data" => $orders
            ]);
        }
    }

    /**
     * Insertar DATA de pedidos
     */
    public function store(Request $request) {
        $request->validate([
            'clientId' => 'required',
            'deliveryAddress' => 'required',
            'products' => 'required',
            'deliveryStatus' => 'required',
            'deliverDate' => 'required',
        ]);

        $order = new Order;

        // $order->orderCode = $request->orderCode;
        $order->clientId = $request->clientId;
        $order->deliveryAddress = $request->deliveryAddress;
        $order->products = $request->products;
        $order->deliveryStatus = $request->deliveryStatus;
        $order->deliverDate = $request->deliverDate;
        $order->save();

        if(!$order) {
            return response()->json([
                "status"=> 400,
                "error" => true,
                "msg" => "No fue posible crear el pedido",
                "data" => null
            ]);
        }
        else {
            return response()->json([
                "status"=> 200,
                "error" => false,
                "msg" => "Solicitud exitosa",
                "data" => $order
            ]);
        }
        
    }

    /**
     * Actualizar orden segun su id
     */
    public function update(Request $request, $id) {
        return response()->json([
            "msg" => "Desde order - update"
        ]);
    }

    /**
     * Eliminar orden segun su id
     */
    public function destroy($id) {
        return response()->json([
            "msg" => "Desde order - destroy"
        ]);
    }

    /**
     * Obtener un pedido con informacion de usuario
     * Pasar por body el codigo de pedido
     */
    public function orderUser(Request $request, $orderCode) {

        $data = Order::raw(function($collection) {
            return $collection->aggregate(
                [[
                    '$lookup' => [
                        'from'=>'clients',
                        'localField'=>'clientId',
                        'foreignField'=>'_id',
                        'as'=>'info'
                    ]
                ]]
            );
        }); 

        if(!$data) {
            return response()->json([
                "status"=> 403,
                "error" => true,
                "msg" => "No se encontraron resultados",
                "data" => null
            ]);
        }
        else {
            return response()->json([
                "error" => false,
                "msg" => "Solicitud exitosa",
                "data" => $data
            ]);
        }

    }
}
