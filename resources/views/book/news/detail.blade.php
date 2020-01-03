@extends('templates.book.master')
@section('title')

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
							<div class="tg-newsdetail">
								<div class="tg-posttitle">
									<h3><a href="javascript:void(0);">{{ $objItem->name }}</a></h3>
								</div>
								<div class="tg-description">
									{!! $objItem->content !!}
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