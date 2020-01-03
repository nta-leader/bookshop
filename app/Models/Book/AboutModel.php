<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{
    protected $table = 'about';
    protected $primarKey = 'id';
    public $timestamps = false;

    public function getAboutUs(){
        return $this->select('about')->first();
    }
    public function getShoppingGuide(){
        return $this->select('shopping_guide as about')->first();
    }
    public function getGuarantee(){
        return $this->select('guarantee as about')->first();
    }
}
