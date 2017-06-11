<?php

namespace App\Http\Controllers\API;

use App\Models\menu;
use App\Http\Controllers\AppBaseController;

class MenuApiController extends AppBaseController{

    public function index(){

        $menu  = menu::all();
        return response()->json($menu);
    }

    public function food(){
        $menu_food = menu::where("type","1")->get();;
        return response()->json($menu_food);
    }

    public function drink(){
        $menu_drink = menu::where("type","2")->get();
        return response()->json($menu_drink);
    }

    public function find($id){
        $detail_menu = menu::where("id",$id)->get();
        return response()->json($detail_menu);
    }

}