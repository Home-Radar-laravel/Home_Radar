<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['role_name'];
    public function clients(){
        return $this->hasMany(Client::class);
    }
    public function renters(){
        return $this->hasMany(Renter::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }  

    public function role(){
        return $this->belongsTo(Role::class);
    }
    


}
