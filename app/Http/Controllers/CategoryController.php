<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
class CategoryController extends Controller
{
    public function addCategory(Request $request){
    	if($request->isMethod('post')){
    		$data=$request->all();
    		$category= new Category();
            $category->name= $data['category_name'];
            $category->parent_id= $data['parent_id'];
            $category->url= $data['url'];
            $category->description= $data['category_description'];
            $category->save();
            return redirect('/admin/add-category')->with('flash_message_success','category added successfully');


    	}
    	$levels=Category::where(['parent_id'=>0])->get();
    	return view('admin.category.add_category')->with(compact('levels'));
    }
}
