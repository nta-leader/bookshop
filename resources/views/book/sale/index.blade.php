@extends('templates.book.master')
@section('title')
Các sự kiện sale
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
                    <h1>Các sự kiện sale</h1>
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
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right">
                        <div id="tg-content" class="tg-content">
                            <div class="tg-products">
                                <div class="tg-productgrid">
                                    @foreach($objItems as $item)
                                    @php
                                        $id_sale = $item->id;
                                        $name_sale = $item->name;
                                        $url_sale = route('book.sale.detail',['url'=>$item->url]);
                                        $picture_sale = $item->picture;
                                    @endphp
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <div class="">
                                            <a href="{{ $url_sale }}" title="{{ $name_sale }}">
                                                <figure class="tg-featureimg">
                                                    <div class="tg-bookimg">
                                                        <div class="tg-frontcover"><img src="/storage/app/files/sale/{{ $picture_sale }}" alt="image description"></div>
                                                    </div>
                                                </figure>
                                            </a>
                                            <div class="tg-postbookcontent">
                                                <div class="tg-booktitle">
                                                    <h3><a href="{{ $url_sale }}" title="{{ $name_sale }}">{{ $name_sale }}</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                {{ $objItems->links() }}
                            </div>
                        </div>
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