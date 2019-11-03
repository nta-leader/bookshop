<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id';

    public function getItems(){
        return $this->get();
    }
}
