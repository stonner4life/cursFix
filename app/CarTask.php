<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarTask extends Model
{
    protected $table='cars';
    protected $fillable=[
        'description',
        'purpose',
        'user_id',
        'place',
        'contactNumber',
        'passenger',
        'vehicle',
        'driver',
        'status',
        'finish_at',
        'start_at',
    ];
    //RoomTask own by user One to Many
    public function user(){
        return $this->belongsTo('App\User');
    }
}
