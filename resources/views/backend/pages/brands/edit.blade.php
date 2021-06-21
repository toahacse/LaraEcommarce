@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
       <div class="card">
           <div class="card-header">
               <h4 class="text-center">Edit Brand</h4>
           </div>
           <div class="card-body">
               <form action="{{ route('admin.brand.update',$brand->id) }}) }}" method="post" enctype="multipart/form-data">
                   {{ csrf_field() }}

                   @include('backend.partials.message')

                   <div class="form-group">
                       <label for="exampleInputEmail1">Name</label>
                       <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{ $brand->name }}">
                   </div>
                   <div class="form-group">
                       <label for="exampleInputPassword1">Description(optional)</label>
                       <textarea name="description" rows="8" cols="80" class="form-control">{{ $brand->description }}</textarea>
                   </div>

                   <div class="form-group">
                       <label for="exampleInputEmail1">Brand Old Image</label>
                       <img src="{{ asset('images/brands/'.$brand->image) }}" width="100"><br>

                       <label for="exampleInputEmail1">Brand New Image(optional)</label>
                       <input type="file" class="form-control" name="image" id="exampleInputEmail1">
                   </div>

                   <button type="submit" class="btn btn-primary">Update Brand</button>
               </form>
           </div>
       </div>
    </div>
@endsection
