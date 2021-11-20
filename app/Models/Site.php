<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['server_id','name','username','password','db_link','db_name','db_user_name','db_password','note','status'];

    public function server(){
        return $this->belongsTo(Server::class,'id');
    }
}
