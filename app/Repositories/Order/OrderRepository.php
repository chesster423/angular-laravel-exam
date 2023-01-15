<?php

namespace App\Repositories\Order;

use App\Repositories\Order\OrderInterface as OrderInterface;
use App\Models\Order;

class OrderRepository implements OrderInterface
{

    public $order;

    function __construct(Order $order) {

		$this->order = $order;

    }

    public function getUserOrders($user){

        return $user->orders()->get();
    }

    public function getOrderItems($id) {

    	$order = $this->order::find($id);

        $order_items = $order->order_items()->get();

        foreach($order_items as $key => $value) {
            $order_items[$key]->selection = $value->subscription_cycle()->first()->selections()->first();
            $order_items[$key]->meal = $value->subscription_cycle()->first()->selections()->first()->meal()->first();
        }

    	return $order_items;

    }

    public function find($id){

        return $this->order->findOrder($id);

    }


}