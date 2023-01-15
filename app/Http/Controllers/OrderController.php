<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\Order;
use App\Repositories\Order\OrderRepository as OrderRepository;

class OrderController extends Controller
{
    protected $user;
    protected $order;

    //
    public function __construct(OrderRepository $orderRepository)
    {
        $this->order = $orderRepository;
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function getUserOrders(Request $request){

        $orders = $this->order->getUserOrders($this->user);
 
        return response()->json($this->response(true, "FETCHED_ORDERS", $orders));

    }

    public function getOrderDetails(Request $request) {

        $order_items = $this->order->getOrderItems($request->id); 

        $data = [
            'meals' => [],
            'price' => 0 
        ];

        $total_price = 0;

        foreach($order_items as $key => $value) {

            if (!isset($data['meals'][ $value->meal_type ][ $value->product_id ])) {
                $data['meals'][ $value->meal_type ][ $value->product_id ] = [];
            }

            array_push( $data['meals'][ $value->meal_type ][ $value->product_id ] , $value);
            
            $total_price += (float)$value->price;

        }

        $data['price'] = "$".$total_price;

        return response()->json($this->response(true, "FETCHED_ORDERS", $data));

    }

}
