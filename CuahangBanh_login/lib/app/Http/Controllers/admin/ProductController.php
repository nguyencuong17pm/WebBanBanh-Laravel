<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\productType;
// use App\Models\Users;
use App\Http\Requests\AddProdRequest;

class ProductController extends Controller
{
    public function getProd()
    {
    	$data['prodlist'] = Product::all();
        $datacate['catelist'] = productType::all();
    	return view('admin.product',$data,$datacate);
    }


    public function postProdAdd(AddProdRequest $request)
    {
        $filename = $request->img->getClientOriginalName();
    	$product = new Product;
    	$product->name = $request->name;
        $product->unit_price = $request->price;
        $product->promotion_price = $request->price_km;
        $product->image = $filename;
    	$product->description = $request->description;
    	$product->new = $request->new;
    	$product->id_type = $request->cate;
    	$product->save();
        $request->img->storeAs('product', $filename);
    	return back()->with('error_thanhcong', 'Thêm Sản Phẩm Thành Công');;
    }
    public function postProdEdit(Request $request,$id)
    {
       
        $filename = $request->img->getClientOriginalName();
        $product = Product::find($id);
       $product->name = $request->name;
        $product->unit_price = $request->price;
        $product->promotion_price = $request->price_km;
        $product->image = $filename;
        $product->description = $request->description;
        $product->new = $request->new;
        $product->id_type = $request->cate;
        $product->save();
        $request->img->storeAs('avatar', $filename);
        return back()->with('error_thanhcong', 'Sửa Sản Phẩm Thành Công');;

    }
    public function getProdDelete($id)
    {
    	Product::destroy($id);
    	return back();
    }
}
