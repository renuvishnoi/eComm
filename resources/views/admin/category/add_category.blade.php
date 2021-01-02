@extends('admin.layouts.master')
@section('title','Add Category')
@section('content')
<!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-Category-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Add Category</h1>
                  <small>Category list</small>
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
                              <a class="btn btn-add " href="{{ url('admin/view-categories')}}"> 
                              <i class="fa fa-eye"></i>View  Categories  </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6"  action="{{url('/admin/add-category')}}" method="POST">
                              @csrf
                              <div class="form-group">
                                 <label>Category Name</label>
                                 <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Enter Category Name" required>
                              </div>
                              <div class="form-group">
                                 <label>Parent Category </label>
                                 <select name="parent_id" id="parent_id" class="form-control">

                                    <option value="0">parent category</option>
                                    @foreach($levels as $val)
                                    <option value="{{ $val->id}}">{{ $val->name}}</option>

                                    @endforeach
                                 </select>

                              </div>
                              <div class="form-group">
                                 <label>Url</label>
                                 <input type="text" name="url" id="url" class="form-control" placeholder="Enter Url" required>
                              </div>
                              <div class="form-group">
                                 <label>Category Description</label>
                                 <textarea name="category_description" class="form-control" id="category_description" cols="30" rows="10"></textarea>
                              </div>
                              
                                                            
                              <div class="reset-button">
                                <input type="submit" name="" class="btn btn-success" value="Add Category">
                                 
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