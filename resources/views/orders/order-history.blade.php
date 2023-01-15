@extends('layouts.app')

@section('content')

<div class="row bg-teal">
  <div class="col-12">
      <div class="container p-4">
        <h4 class="text-teal">Order History</h4>
      </div>
  </div>
</div>

<div class="row" ng-controller="OrderController">
  <div class="col-12">
    <div class="container mt-2">
      <div class="card border p-3">
        <h4 class="text-center mb-4">Past Orders</h4>

        <table class="table table-stripe">
          <thead class="text-center">
            <tr>
              <th>Delivery On</th>
              <th>Total Price</th>
              <th>Details</th>
              <th>Invoice</th>
            </tr>
          </thead>

          <tbody ng-if="orders" ng-repeat="(key, val) in orders track by $index" ng-init="val.is_open = false; val.order_details = []">
            <tr class="text-center">
              <td ng-bind="val.delivery_date"></td>
              <td ng-bind="'$'+val.price"></td>
              <td>
                <a href="#" class="text-dark text-decoration-none" ng-if="val.is_open == false" ng-click="viewDetails(val.id, key); val.is_open = true;">View Details</a>
                <a href="#" class="text-dark text-decoration-none" ng-if="val.is_open == true" ng-click="val.is_open = false;">Hide Details</a>
              </td>
              <td></td>
            </tr>
            <tr ng-if="val.order_details.meals && val.is_open" class="bg-teal">
              <td colspan="3" class="ps-md-5">
                <b class="font-weight-bold">Build Your Own Meal Plan - Vegan</b>
                {{-- <p ng-bind="val.order_details"></p> --}}
                <div ng-repeat="(k, v) in val.order_details.meals">
                  <b ng-bind="k" class="text-capitalize text-orange"></b>
                  <p ng-repeat="(i, p) in v" class="mb-1">
                    <span ng-bind="p.length + 'x'"></span>
                    <span ng-bind="p[0].title"></span> <i class="bi bi-exclamation-circle-fill"></i>
                  </p>
                </div>
              </td>
              <td class="text-center">
                <b ng-bind="val.order_details.price"></b>
              </td>
            </tr>
          </tbody>

        </table>

        <span class="text-center" ng-if="is_loading">Getting orders...</span>
      </div>
    </div>
  </div>
</div>

@stop

