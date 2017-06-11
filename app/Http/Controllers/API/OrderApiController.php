<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

class OrderApiController extends AppBaseController{

    public function newOrder(Request $request){

        $order = new Order;
        $order->meja = $request->meja;
        $order->save();
        foreach ($request->menu as $i => $menu){
            $detail = new  DetailOrder;
            $detail->id_menu = $menu['menu'];
            $detail->qty = $menu['qty'];
            $detail->id_order= $order->id;
            $detail->save();
        }
        return response()->json($order->id);

    }

}