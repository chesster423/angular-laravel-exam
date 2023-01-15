<?php

namespace App\Repositories\Order;

interface OrderInterface {

    public function getUserOrders($user);

    public function getOrderItems($id);

    public function find($id);

}