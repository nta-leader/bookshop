<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{
    protected $table = 'about';
    protected $primarKey = 'id';
    public $timestamps = false;

    public function getItem(){
        return $this->first();
    }
}
