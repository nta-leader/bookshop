<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getItem($url){
        return $this->where('url', $url)->first();
    }
    public function getItems(){
        return $this->orderBy('id', 'DESC')->where('active',1)->paginate(getenv('PAGINATE_BOOK'));
    }
}
