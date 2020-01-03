@extends('templates.book.master')

@section('title')
The gioi sach
@endsection

@section('content')
<!--************************************
        Inner Banner Start
*************************************-->
<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ $urlTemplateBook }}/images/parallax/bgparallax-07.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-innerbannercontent">
                    <h1>{{ $objItem->name }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!--************************************
        Inner Banner End
*************************************-->
<!--************************************
        Main Start
*************************************-->
<main id="tg-main" class="tg-main tg-haslayout">
    <!--************************************
            News Grid Start
    *************************************-->
    <div class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div id="tg-twocolumns" class="tg-twocolumns">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                        <div id="tg-content" class="tg-content">
                            @php
                                $id = $objItem->id;
                                $name = $objItem->name;
                                $evaluate = $objItem->evaluate;
                                $picture = $objItem->picture;
                                $link_document = $objItem->link_document;
                                $priview = $objItem->preview;
                                $content = $objItem->content;
                                $basis_price = $objItem->basis_price;
                                $price = $objItem->price;
                            @endphp
                            <div class="tg-productdetail">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="tg-postbook">
                                            <figure class="tg-featureimg"><img src="/storage/app/files/product/{{ $picture }}" alt="image description"></figure>
                                            <div class="tg-postbookcontent">
                                                <span class="tg-bookprice">
                                                    <ins id="price">{{ number_format($price, 0, '.', ',') }} đ</ins>
                                                    @if($price != $basis_price)
                                                    <del id="basis_price">{{ number_format($basis_price, 0, '.', ',') }} đ</del>
                                                    @endif
                                                </span>
                                                <div class="tg-quantityholder">
                                                    <em class="minus">-</em>
                                                    <input type="text" class="result" value="1" id="quantity" name="quantity">
                                                    <em class="plus">+</em>
                                                </div>
                                                <a id="add-product" data-id_product="{{ $id }}" class="tg-btn tg-active tg-btn-lg" href="javascript:void(0);">Thêm vảo giỏ hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                        <div class="tg-productcontent">
                                            <ul class="tg-bookscategories">
                                                @foreach($objItem->category as $item)
                                                <li><a href="{{ route('book.category.index',['url'=>$item->url]) }}">{{ $item->name }}</a></li>
                                                @endforeach
                                            </ul>                                           
                                            @if($price != $basis_price)
                                            <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                                            @endif                                            
                                            <div class="tg-booktitle">
                                                <h2>{{ $name }}</h2>
                                            </div>
                                            <div class="tg-booktitle">
                                                <a href="{{ $link_document }}" target="_blank">Đọc thử sách</a>
                                            </div>
                                            <span class="tg-stars-e">
                                            @for($i=1;$i<=5;$i++)
                                                @if($i<=$evaluate)
                                                <span class='fa fa-star'></span>
                                                @else
                                                <span class='fa fa-star-o'></span>
                                                @endif
                                            @endfor
                                            </span>
                                           
                                            <div class="tg-sectionhead">
                                                <h3>Giới thiệu</h3>
                                            </div>
                                            <div class="tg-description">
                                                {!! $priview !!}
                                            </div>`
                                        </div>
                                    </div>
                                    
                                    <div class="tg-productdescription">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="tg-sectionhead">
                                                <h2>Chi tiết sản phẩm</h2>
                                            </div>
                                            <ul class="tg-themetabs" role="tablist">
                                                <li role="presentation" class="active">
                                                    <a href="#description" data-toggle="tab">Chi tiết</a>
                                                </li>                                              
                                            </ul>
                                            <div class="tg-tab-content tab-content">
                                                <div role="tabpanel" class="tg-tab-pane tab-pane active" id="description">
                                                    <div class="tg-description">
                                                        {!! $content !!}
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tg-relatedproducts">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="tg-sectionhead">
                                                <h2><span>Sách ngẫu nhiên</span>Cùng danh mục</h2>
                                                <a class="tg-btn" href="javascript:void(0);">Xem thêm</a>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div id="tg-relatedproductslider" class="tg-relatedproductslider tg-relatedbooks owl-carousel">
                                            @foreach($products as $item)
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
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
                        <aside id="tg-sidebar" class="tg-sidebar">
                            
                            <div class="tg-widget tg-catagories">
                                <div class="tg-widgettitle">
                                    <h3>Danh mục</h3>
                                </div>
                                <div class="tg-widgetcontent">
                                    <ul>
                                        @foreach($category as $item)
                                        <li><a href="{{ route('book.category.index',['url'=>$item->url]) }}">{{ $item->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--************************************
            News Grid End
    *************************************-->
</main>
<!--************************************
        Main End
*************************************-->
@endsection