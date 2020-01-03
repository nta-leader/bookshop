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
					<h1>Tin tức</h1>
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
							<div class="tg-newsgrid">
								<div class="tg-sectionhead">
									<h2><span>Hôm nay có gì mới không nào !</span></h2>
								</div>
								<div class="row">
									@foreach($objItems as $objItem)
									@php
										$id = $objItem->id;
										$name = $objItem->name;
										$url = route('book.news.detail',['url'=>$objItem->url]);
										$picture = $objItem->picture;
									@endphp
									<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
										<article class="tg-post">
											<figure><a href="{{ $url }}" title="{{ $name }}">
												<img src="/storage/app/files/news/{{ $picture }}" alt="{{ $name }}">
											</a></figure>
											<div class="tg-postcontent">
												<div class="tg-posttitle">
													<h3><a href="{{ $url }}" title="{{ $name }}">{{ $name }}</a></h3>
												</div>
											</div>
										</article>
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