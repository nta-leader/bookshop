<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{
    protected $table = 'about';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getAbout(){
        return $this->first();
    }
    public function edit($arrItem){
        return $this->where('id',1)->update($arrItem);
    }
}
