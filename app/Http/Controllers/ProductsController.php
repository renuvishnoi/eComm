<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Image;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;


class ProductsController extends Controller
{
    public function addProduct(Request $request){
    	if($request->isMethod('post')){
    		$data=$request->all();
    		//dd($data);
    		$product = new Products();
    		$product->name= $data['product_name'];
    		$product->category_id= $data['category_id'];
    		$product->code= $data['product_code'];
    		$product->color= $data['product_color'];
			if(!empty($data['product_description'])){
				$product->description=$data['product_description'];
			}else{
                $product->description='';
			}
			$product->price= $data['product_price'];
			// upload image
			if($request->hasfile('image')){
				echo $img_temp= $request['image'];
				if($img_temp->isValid()){
				// image path code
				$extension = $img_temp->getClientOriginalExtension();
				$filename= rand(111,9999).'.'.$extension;
				
				$request['image']->move(public_path('uploads/products/'), $filename);
				
				$product->image= $filename;
			}
			}

			$product->save();
			//dd($product);
			return redirect('admin/add-product')->with('flash_message_success','Product has been added successfully!!');
    	}
    	//  categories dropdown menu code
    	$categories= Category::where(['parent_id'=>0])->get();
    	$category_dropdown="<option value='' selected disabled>Select</option>";
    	foreach($categories as $cat){
    		$category_dropdown.="<option value='".$cat->id."'>".$cat->name."</option>";
    		$sub_categories = Category::where(['parent_id'=>$cat->id])->get();
    		foreach($sub_categories as $sub_cat){
    			$category_dropdown.="<option value='".$sub_cat->id."'>&nbsp;--&nbsp".$sub_cat->name."</option>";
    		}
    	}
        return view('admin.product.add_product')->with(compact('category_dropdown'));
    }
    public function viewProducts(){
    	$products= Products::get();
    	 return view('admin.product.view_products')->with(compact('products'));
    }
/** edit product function**/
    public function editProduct(Request $request, $id=null){
    	if($request->isMethod('post')){
    		$data= $request->all();
    			if($request->hasfile('image')){
				echo $img_temp= $request['image'];
				if($img_temp->isValid()){
				// image path code
				$extension = $img_temp->getClientOriginalExtension();
				$filename= rand(111,9999).'.'.$extension;
				
				$request['image']->move(public_path('uploads/products/'), $filename);
				
				
			}
			}else{
				$filename= $data['current_image'];
			}
			if(empty($data['product_description'])){
				$data['product_description']='';
			}
			Products::where(['id'=>$id])->update(['name'=>$data['product_name'],
				'code'=>$data['product_code'],
				'color'=>$data['product_color'],
				'price'=>$data['product_price'],
				'image'=>$filename
			]);
			return redirect()->back()->with('flash_message_success','Product has been Updated successfully');
}
           $productDetails=Products::where(['id'=>$id])->first();
           return view('admin.product.edit_product')->with(compact('productDetails'));
    	
    }
    /**delete product function*/
    public function deleteProduct($id=null){
    	Products::where(['id'=>$id])->delete();
    	Alert::success('deleted successfully', 'Success Message');

    

    	return redirect()->back()->with('flash_message_error','Product deleted');

    }
}
