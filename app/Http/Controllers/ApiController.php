<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarMake as Make;
use App\CarModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(){
        $Books = Car::items();
        return response()->json($Books);
    }

    public function getCar($id){

        $car = Car::find($id);
        $car->model;
        $car->make;
        if(!empty($car))
        {
            return response()->json($car);
        }

        return response()->json(array("status" => "error", "code" => "get"), 404);
    }

    public function createCar(Request $request){

      //  var_dump($request->input());

        $car = new Car();
        $car->model_id = $request->input('model_id');
        $car->make_id = $request->input('make_id');
        $car->price = $request->input('price');

            if($car->save())
            {
                return response()->json(array("status" => "success", "code" => "create"), 200);
            }

        //$res = Car::createCar($request->all());



        return response()->json(array("status" => "error", "code" => "create"), 404);

    }

    public function deleteCar($id){
        $Car  = Car::find($id);
        $Car->delete();

        return response()->json(array("success" => "error", "code" =>"deleted"));
    }

    public function updateCar(Request $request,$id){

            if($id)
            {
                Car::where('id', $id)->update([
                    'model_id' => $request->input('model_id'),
                    'make_id' => $request->input('make_id'),
                    'price' => $request->input('price')
                ]);

                    return response()->json(array("status" => "success", "code" => "update"), 200);
            }
        return response()->json(array("status" => "error", "code" => "update"), 404);

    }


    /* MAKE */


    public function make(){
        $Books = Make::all();
        return response()->json($Books);
    }

    /* MODEL */

    public function modelCar(){

        $Books = CarModel::all();
        $model = [];
        foreach($Books as $key =>  $item)
        {
            $model[$key] = $item;
            $model[$key]['make'] = $item->modelMake;
        }

        return response()->json($model);
    }

//    public function getModelCar($id){
//
//        $Model = CarModel::find($id);
//        $Model->modelMake;
//
//        return response()->json($Model);
//    }

    public function getModelCar($id)
    {
        $make = CarModel::where('make_id', '=',$id)->get();
        return response()->json($make);

    }

}
