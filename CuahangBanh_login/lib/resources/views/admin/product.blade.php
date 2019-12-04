@extends('admin.master')
@section('title', 'Sản Phẩm')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Sản phẩm</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			
			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách sản phẩm</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">

							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproduct" data-whatever="@getbootstrap">Add Products</button>

							<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="addproductLabel">Add Products</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form method="post" action="{{ route('addproduct') }}" enctype="multipart/form-data">
												<div class="row" style="margin-bottom:40px">
													<div class="col-xs-12">
														<div class="form-group" >
															<label>Name product</label>
															<input required type="text" name="name" class="form-control">
														</div>
														<div class="form-group" >
															<label>Unit price</label>
															<input required type="number" name="price" class="form-control" value="0">
														</div>
														<div class="form-group" >
															<label>Promotion price	</label>
															<input required type="number" name="price_km" class="form-control" value="0">
														</div>
														<div class="form-group" >
															<label>Product iamges</label>
															<input required id="img" type="file" name="img" class="form-control" onchange="changeImg(this)">
														</div>
														<div class="form-group" >
															<label>Product Unit</label>
															<input required type="text" name="unit" class="form-control">
														</div>
														<div class="form-group">
															<label>Products desctiption</label>
															<textarea class="ckeditor" required name="description"></textarea>
															<script type="text/javascript">
																var editor = CKEDITOR.replace('description',{
																	language:'vi',
																	filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
																	filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
																	filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
																	filebrowserFlashUploadUrl: 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
																});
															</script>
														</div>
														<div class="form-group" >
															<label>product portfolio</label>
															<select required name="cate" class="form-control">
																@foreach($catelist as $cate)
																<option value="{{$cate->id}}">{{$cate->name}}</option>
																@endforeach
															</select>
														</div>
														<div class="form-group" >
															<label>Products News</label>
															<select required name="new" class="form-control">
																<option value="1">Yes</option>
																<option value="0">No</option>
															</select>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Add products</button>
												</div>
												{{csrf_field()}}
											</form>
										</div>
									</div>
								</div>
							</div>

							@include('errors.note')
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th>Tên Sản phẩm</th>
										<th>Giá sản phẩm</th>
										<th>Giá khuyến mãi</th>
										<th>Ảnh đại diện sản phẩm</th>
										<th>Danh mục</th>
										<th>Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									@foreach($prodlist as $prod)
									<tr>
										<td>{{$prod->id}}</td>
										<td>{{$prod->name}}</td>
										<td>{{number_format($prod->unit_price)}} đ</td>
										<td>{{number_format($prod->promotion_price)}} đ</td>
										<td>
											<img src="{{asset('source/image/product/'.$prod->image)}}" style="width: 250px;">
										</td>
										<td>@foreach($catelist as $cate)
											@if($prod->id_type==$cate->id)
											{{$cate->name}}
											@endif
											@endforeach
										</td>
										<td>
											{{-- <a href="{{asset('admin/product/edit/'.$prod->prod_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a> --}}
											<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editproduct-{{$prod->id}}" data-whatever="@mdo"><span class="glyphicon glyphicon-edit"></span> Edit</button>
											<a href="{{asset('admin/product/delete/'.$prod->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
										</td>
									</tr>
									@endforeach


									@foreach($prodlist as $prod)
									
									<div class="modal fade" id="editproduct-{{$prod->id}}" tabindex="-1" role="dialog" aria-labelledby="editproductLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="editproductlLabel">New message</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form method="post" action="{{ route('editproduct',['id'=>$prod->id]) }}" enctype="multipart/form-data">
														<div class="row" style="margin-bottom:40px">
															<div class="col-xs-12">
																<div class="form-group" >
																	<label>Name product</label>
																	<input required type="text" value="{{$prod->name}}" name="name" class="form-control">
																</div>
																<div class="form-group" >
																	<label>Unit price</label>
																	<input required type="number" value="{{$prod->unit_price}}" name="price" class="form-control">
																</div>
																<div class="form-group" >
																	<label>Promotion price	</label>
																	<input required type="number" name="price_km" class="form-control" value="{{$prod->promotion_price}}">
																</div>
																<div class="form-group" >
																	<label>Product iamges</label>
																	<input required id="img" type="file" name="img" class="form-control" onchange="changeImg(this)">
																</div>
																<div class="form-group" >
																	<label>Product Unit</label>
																	<input required type="text" value="{{$prod->unit}}" name="unit" class="form-control">
																</div>
																<div class="form-group">
																	<label>Products desctiption</label>
																	<textarea class="ckeditor" required name="desctiption-{{$prod->id}}">{{$prod->description}}</textarea>
																	<script type="text/javascript">
																		var editor = CKEDITOR.replace('desctiption-{{$prod->id}}',{
																			language:'vi',
																			filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
																			filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
																			filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
																			filebrowserFlashUploadUrl: 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
																		});
																	</script>
																</div>
																<div class="form-group" >
																	<label>product portfolio</label>
																	<select required name="cate" class="form-control">
																		@foreach($catelist as $cate)
																		<option value="{{$cate->id}}" @if($prod->id_type == $cate->id) selected @endif>{{$cate->name}}</option>
																		@endforeach
																	</select>
																</div>
																<div class="form-group" >
																	<label>Products News</label>
																	<select required name="new" class="form-control">
																		<option value="1" @if($prod->new == 1) checked @endif>Yes</option>
																		<option value="0" @if($prod->new == 0) checked @endif>No</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary">Send message</button>
														</div>
														{{csrf_field()}}
													</form>
												</div>

											</div>
										</div>
									</div>
									@endforeach
								</tbody>
							</table>							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->
@stop