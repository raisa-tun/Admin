<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;
    
    protected $fillable = ['ip','server_name'];

    public function site(){
        return $this->hasMany(Site::class,'id');
    }
}
