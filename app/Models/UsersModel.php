<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table="users";
    protected $primarKey="id";
    public $timestamps=false;

    public function doiMatKhau($arrItem){
        return $this->where('username', $arrItem['username'])->update($arrItem);
    }
}
