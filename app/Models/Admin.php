<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admin';
    public $fillable = [
        'id',
        'name',
        'email',
        'avatar',
        'phone_number',
        'password',
        'permission_id',
    ];
    public $timestamps = false;

    public function get_admin(){
        $array = DB::select("select * from $this->table where email = ? or name = ?",
        [$this->email, $this->name]);
        return $array;
    }
}

