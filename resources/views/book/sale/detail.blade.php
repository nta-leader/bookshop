@extends('templates.book.master')

@section('title')
{{ $objItem->name }}
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
                            <div class="tg-products">
                                <div class="tg-productgrid">
                                    <div class="tg-refinesearch">
                                        <span>{{ getenv('PAGINATE_BOOK') }} cuốn/Trang</span>
                                        <form class="tg-formtheme tg-formsortshoitems">
                                            <fieldset>
                                                
                                                <div class="form-group">
                                                    
                                                    <span class="tg-select">
                                                        <select onchange="location = this.value;">
                                                            <option @if(Session::get('orderby') == 'sp-m') selected @endif value="?orderby=sp-m">Sản phẩm(mới - cũ)</option>
                                                            <option @if(Session::get('orderby') == 'sp-c') selected @endif value="?orderby=sp-c">Sản phẩm(cũ - mới)</option>
                                                            <option @if(Session::get('orderby') == 'g-t') selected @endif value="?orderby=g-t">Giá(thấp - cao)</option>
                                                            <option @if(Session::get('orderby') == 'g-c') selected @endif value="?orderby=g-c">Giá(cao - thấp)</option>
                                                        </select>
                                                    </span>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    @foreach($objItems as $item)
                                    @php
                                        $id_product = $item->id;
                                        $name_product = $item->name;
                                        $url_product = route('book.product.index',['url'=>$item->url]);
                                        $evaluate_product = $item->evaluate;
                                        $picture_product = $item->picture;
                                        $basis_price = number_format($item->basis_price, 0, '.', ',').' đ';
                                        $price = number_format($item->price, 0, '.', ',').' đ';
                                    @endphp
                                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
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
                                {{ $objItems->links() }}
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