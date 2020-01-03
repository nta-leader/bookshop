<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class OrderFormModel extends Model
{
    protected $table = 'order_form';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function edit($id, $objItem){
        return $this->where('id', $id)->update($objItem);
    }
    public function getItem($id){
        return $this->where('id', $id)->first();
    }
    
}

