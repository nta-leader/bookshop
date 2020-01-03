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
					<h1>Kiểm tra đơn hàng</h1>
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
<style>
.tg-newsgrid input {
    width: 80%;
    max-width: 500px;
}

.tg-newsgrid button {
    background: #6ba036;
    color: wheat;
    padding: 9px 15px;
    border-radius: 3px;
}
</style>
<style>
	tr:hover {
		cursor: pointer;
		background: #eee;
	}
	h4.box-title {
		background: #e8f0fe;
		padding: 15px;
	}
	h2.msg {
		color: red;
	}
	@media(max-width:768px){
		h2.msg {
			font-size:15px;
		}
	}
	</style>
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
								<form action="" method="get" style="margin: 20px auto;">
									{{ csrf_field() }}
									<input type="text" name="phone" placeholder="Nhập sô điện thoại...">
									<button>Tìm</button>
								</form>
								@foreach($objItems as $stt => $objItem)
								@php
									$id = $objItem->id;

									$date = $objItem->date;
									$date = strtotime($date);
									$date = date('H:i:s d/m/Y',$date);

									$phone = $objItem->phone;
									$name = $objItem->name;
									$address = $objItem->address;
									$waybill_code = $objItem->waybill_code;
									$product = json_decode($objItem->product);
									$active = $objItem->active;
								@endphp
								<div class="panel box box-success">
									<div class="box-header with-border">
										<h4 class="box-title">
											<a class="title" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $id }}">
												# {{ $stt+1 }}<br>
												<span style="color:red;">{{ $date }}</span><br>
												SDT: <span style="color:red;">{{ $phone }}</span> |
												Tên: <span style="color:red;">{{ $name }}</span> |
												Địa chỉ: <span style="color:red;">{{ $address }}</span>
											</a>
										</h4>
									</div>
									<div id="collapse{{ $id }}" class="panel-collapse collapse @if($stt == 0) in @endif">
										<div class="box-body">
											<div class="box-body table-responsive no-padding">
												<table class="table table-bordered">
													<tbody>
														<tr>
															<th style="width: 10px;">#</th>
															<th>Tên sách</th>
															<th>Hình ảnh</th>
															<th>Đơn giá</th>
															<th>Số lượng</th>
															<th>Tổng</th>
														</tr>
														@php $sum = 0; @endphp
														@foreach($product as $key => $item)
														@php
															$name = $item->name;
															$picture = $item->picture;
															$quantity = $item->quantity;
															$price = $item->price;
															$sum_row = $price*$quantity;
															$sum += $sum_row;
														@endphp
														<tr>
															<td>{{ $key + 1 }}</td>
															<td>{{ $name }}</td>
															<td><img src="/storage/app/files/product/{{ $picture }}" alt="" style="width:80px;"></td>
															<td>{{ number_format($price,0,'.',',') }} đ</td>
															<td>{{ $quantity }}</td>
															<td>{{ number_format($sum_row,0,'.',',') }} đ</td>
														</tr>
														@endforeach

														<tr>
															<td colspan="5" style="text-align:right;">
																@if($waybill_code != null)
																Mã vận đơn: {{ $waybill_code }}
																<a href="http://www.vnpost.vn/en-us/dinh-vi/buu-pham?key={{ $waybill_code }}" class="btn btn-warning">Xem tình trạng đơn</a>
																@endif
															
																@if($active==-1)
																	<a href="#" class="btn btn-danger">Đã hủy</a>
																@elseif($active==0)
																	<a href="#" class="btn btn-warning">Chờ nhân viên xác nhận</a>
																@elseif($active==1)
																	<a href="#" class="btn btn-primary">Chờ nhân viên xác nhận</a>
																@elseif($active==2)
																	<a href="#" class="btn btn-success">Đẫ đóng gói gửi đi</a>
																@endif
															</td>
															<td>{{ number_format($sum,0,'.',',') }} đ</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								@endforeach
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