@extends('admin.layouts.master')
@section('title','Edit Product')
@section('content')
<!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Product</h1>
                  <small>Edit Product</small>
               </div>
            </section>

     
@if(session()->has('flash_message_success'))
    <div class="alert alert-success">
        {{ session()->get('flash_message_success') }}
    </div>
@endif
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{ url('admin/edit-product')}}"> 
                              <i class="fa fa-eye"></i>View  Product  </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/edit-product/'.$productDetails->id)}}" method="POST">
                              @csrf
                              <div class="form-group">
                                 <label>Product Name</label>
                                 <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $productDetails->name}}" required>
                              </div>
                              <div class="form-group">
                                 <label>Product Code</label>
                                 <input type="text" name="product_code" id="product_code" class="form-control" value="{{ $productDetails->code}}" required>
                              </div>
                              <div class="form-group">
                                 <label>Product Color</label>
                                 <input type="text" name="product_color" id="product_color" class="form-control" value="{{ $productDetails->color}}" required>
                              </div>
                              <div class="form-group">
                                 <label>Product Description</label>
                                 <textarea name="product_description" class="form-control" id="product_description" cols="30" rows="10">{{ $productDetails->description}}</textarea>
                              </div>
                              
                              <div class="form-group">
                                 <label>Product Price</label>
                                 <input type="text" class="form-control" value="{{ $productDetails->price}}" name="product_price" id="product_price" required>
                              </div>
                              <div class="form-group">
                                 <label>Picture upload</label>
                                 <input type="file" name="image">
                                 <input type="hidden" name="current_image" value="{{ $productDetails->image}}">
                                 @if(!empty($productDetails->image))
                                 <img  src="{{ asset('/uploads/products/'.$productDetails->image)}}"  alt="User Image"style="width: 100px;margin-top: 10px"> </td>
                                 @endif
                                 
                              </div>
                              
                              <div class="reset-button">
                                <input type="submit" name="" class="btn btn-success" value="Edit Product">
                                 <a href="#" class="btn btn-success">Save</a>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>

@endsection