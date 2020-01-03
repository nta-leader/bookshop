<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;

class OrderFormModel extends Model
{
    protected $table = 'order_form';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function add($objItem){
        return $this->insert($objItem);
    }
    public function getItem($phone){
        return $this->where('phone', $phone)->orderBy('date','DESC')->get();
    }
    public function getItems(){
        return $this->orderBy('id', 'DESC')->where('active',1)->paginate(getenv('PAGINATE_BOOK'));
    }
}
