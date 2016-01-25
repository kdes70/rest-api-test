<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CarMake extends Model
{

    protected $table = 'make';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        //'make_id',
    ];

    public $timestamps = false;


    //protected $guarded = array('id', '', 'model_id');
}
