<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{

    protected $table = 'car';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price',
    ];

    public $timestamps = false;


    // get model of this car
    public function model()
    {
        $model = new CarModel();
        return $this->hasOne($model, 'id', 'model_id');
    }

    // get make of this car
    public function make()
    {
        $model = new CarMake();
        return $this->hasOne($model, 'id', 'make_id');
    }


    public static function items() {

      return  DB::table('car')
                ->join('make', 'make.id', '=', 'car.make_id')
                ->join('model', 'model.id', '=', 'car.model_id')
                ->select('car.id', 'car.price', 'model.name as model', 'make.name as make', 'make.id as make_id')
                ->get();
    }

    public static function createCar($data)
    {
        if ($data)
        {
            $res = DB::transaction(function () use ($data) {

                $id_make = DB::table('make')
                    ->insertGetId(
                        ['name' => $data['make']['name']]
                    );
                $id_model = DB::table('model')
                    ->insertGetId(
                        [
                            'name'    => $data['model']['name'],
                            'make_id' => $id_make,
                        ]
                    );
                return $id_car = DB::table('car')
                    ->insertGetId(
                        [
                            'price'    => $data['price'],
                            'model_id' => $id_model,
                            'make_id'  => $id_make

                        ]
                    );
            });
            return $res;
        }
    }

    public static function updateCar($request, $id){

        if($id && $request)
        {
             DB::transaction(function () use ($request, $id) {

                 $Car = Car::find($id);
                 $Car->price = $request->input('price');
                 $Car->save();

                 $CarModel = CarModel::find($Car->model_id);
                 $CarModel->name = $request->input('model.name');
                 $CarModel->save();

                 $CarMake = CarMake::find($Car->make_id);
                 $CarMake->name = $request->input('make.name');
                 $CarMake->save();
            });
            return TRUE;
        }else{
            return FALSE;
        }
    }

}
