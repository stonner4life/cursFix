<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomTask extends Model
{

    protected $table='room_tasks';
    protected $fillable=[
        'roomname',
        'user_id',
        'description'
    ];

    //RoomTask own by user One to Many
    public function user(){
        return $this->belongsTo('App\User');
    }

}
