<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CarMake;
use App\Car;


class CarModel extends Model
{

    protected $table = 'model';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    protected $primaryKey = 'make_id';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        //'make_id',
    ];
    public $timestamps = false;

    public function modelMake(){
    $make = new CarMake();
    return $this->hasOne($make, 'id', 'make_id');
    }

    public function car()
    {
        $car = new Car();
        return $this->belongsTo($car, 'model_id', 'id');
    }



    //protected $guarded = array('id', '', 'model_id');
}
