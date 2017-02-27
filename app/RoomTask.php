<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomTask extends Model
{

    protected $table='room_tasks';
    protected $fillable=[
        'user_id',
        'room_id',
        'description',
        'topic',
        'capacity',
        'start_at',
        'finish_at',
    ];

    //RoomTask own by user One to Many
    public function user(){
        return $this->belongsTo('App\User');
    }

}
