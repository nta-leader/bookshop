@extends('templates.book.master')
@section('title')
Thế giới sách
@endsection

@section('content')
<!--************************************
        Home Slider Start
*************************************-->
<div class="container">
    <div id="tg-homeslider" class="tg-homeslider tg-homeslidervtwo tg-haslayout owl-carousel">
        @foreach($slides as $slide)
        <div class="item">
            <a href="{{ route('book.sale.detail',['url'=>$slide->url]) }}"><img src="/storage/app/files/sale/{{ $slide->picture }}" alt="{{ $slide->name }}"></a>
        </div>
        @endforeach
    </div>
</div>
<!--************************************
        Home Slider End
*************************************-->

<!--************************************
        Main Start
*************************************-->
<main id="tg-main" class="tg-main tg-haslayout">
    <!--************************************
            Best Selling Start
    *************************************-->
    <section class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-sectionhead">
                        <h2><span>Sách ngẫu nhiên</span>Sách sale</h2>
                        <a class="tg-btn" href="{{ route('book.sale.index') }}">Xem thêm</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="tg-bestsellingbooksslider" class="slider-product-home tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
                        @foreach($sale as $item)
                        @php
                            $id_product = $item->id;
                            $name_product = $item->name;
                            $url_product = route('book.product.index',['url'=>$item->url]);
                            $evaluate_product = $item->evaluate;
                            $picture_product = $item->picture;
                            $basis_price = number_format($item->basis_price, 0, '.', ',').' đ';
                            $price = number_format($item->price, 0, '.', ',').' đ';
                        @endphp
                        <div class="item">
                            <div class="">
                                <a href="{{ $url_product }}" title="{{ $name_product }}">
                                    <figure class="tg-featureimg">
                                        <div class="tg-bookimg">
                                            <div class="tg-frontcover"><img src="/storage/app/files/product/{{ $picture_product }}" alt="image description"></div>
                                        </div>
                                    </figure>
                                </a>
                                <div class="tg-postbookcontent">
                                    <div class="tg-booktitle">
                                        <h3><a href="{{ $url_product }}" title="{{ $name_product }}">{{ $name_product }}</a></h3>
                                    </div>
                                    <span class="tg-stars-e">
                                        @for($i=1;$i<=5;$i++)
                                            @if($i<=$evaluate_product)
                                            <span class='fa fa-star'></span>
                                            @else
                                            <span class='fa fa-star-o'></span>
                                            @endif
                                        @endfor
                                    </span>
                                    <span class="tg-bookprice">
                                        <ins>{{ $price }}</ins>
                                        @if($basis_price != $price)
                                        <del>{{ $basis_price }}</del>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @foreach($categorys as $category)
    @php
        $name_category = $category->name;
        $url = route('book.category.index',['url'=>$category->url]);
    @endphp
    @if(count($category->product) > 0)
    <section class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-sectionhead">
                        <h2><span>Sách mới</span>{{ $name_category }}</h2>
                        <a class="tg-btn" href="{{ $url }}">Xem thêm</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="tg-bestsellingbooksslider" class="slider-product-home tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
                        @foreach($category->product as $item)
                        @php
                            $id_product = $item->id;
                            $name_product = $item->name;
                            $url_product = route('book.product.index',['url'=>$item->url]);
                            $evaluate_product = $item->evaluate;
                            $picture_product = $item->picture;
                            $basis_price = number_format($item->basis_price, 0, '.', ',').' đ';
                            $price = number_format($item->price, 0, '.', ',').' đ';
                        @endphp
                        <div class="item">
                            <div class="">
                                <a href="{{ $url_product }}" title="{{ $name_product }}">
                                    <figure class="tg-featureimg">
                                        <div class="tg-bookimg">
                                            <div class="tg-frontcover"><img src="/storage/app/files/product/{{ $picture_product }}" alt="image description"></div>
                                        </div>
                                    </figure>
                                </a>
                                <div class="tg-postbookcontent">
                                    <div class="tg-booktitle">
                                        <h3><a href="{{ $url_product }}" title="{{ $name_product }}">{{ $name_product }}</a></h3>
                                    </div>
                                    <span class="tg-stars-e">
                                        @for($i=1;$i<=5;$i++)
                                            @if($i<=$evaluate_product)
                                            <span class='fa fa-star'></span>
                                            @else
                                            <span class='fa fa-star-o'></span>
                                            @endif
                                        @endfor
                                    </span>
                                    <span class="tg-bookprice">
                                        <ins>{{ $price }}</ins>
                                        @if($basis_price != $price)
                                        <del>{{ $basis_price }}</del>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @endforeach
    <!--************************************
            Latest News Start
    *************************************-->
    <section class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-sectionhead">
                        <h2><span>Tin tức mới</span>20 tin mới nhất</h2>
                        <a class="tg-btn" href="javascript:void(0);">Xem thêm</a>
                    </div>
                </div>
                <div id="tg-postslider" class="tg-postslider tg-blogpost owl-carousel">
                    @foreach($news as $objItem)
                    @php
                        $url = route('book.news.detail',['url'=>$objItem->url]);
                        $name = $objItem->name;
                        $picture = $objItem->picture;
                    @endphp
                    <article class="item tg-post">
                        <figure><a href="{{ $url }}"><img src="/storage/app/files/news/{{ $picture }}" alt="{{ $name }}"></a></figure>
                        <div class="tg-postcontent">
                            <div class="tg-posttitle">
                                <h3><a href="{{ $url }}">{{ $name }}</a></h3>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--************************************
            Latest News End
    *************************************-->
</main>
<!--************************************
        Main End
*************************************-->
@endsection