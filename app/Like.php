<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded=[
        'id','created_at','update_at'
    ];

    public function chusqers(){
        return $this->belongsTo(Chusqer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
