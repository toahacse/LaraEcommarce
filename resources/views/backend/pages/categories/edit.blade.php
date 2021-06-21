@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
       <div class="card">
           <div class="card-header">
               <h4 class="text-center">Edit Category</h4>
           </div>
           <div class="card-body">
               <form action="{{ route('admin.category.update',$category->id) }}) }}" method="post" enctype="multipart/form-data">
                   {{ csrf_field() }}

                   @include('backend.partials.message')

                   <div class="form-group">
                       <label for="exampleInputEmail1">Name</label>
                       <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{ $category->name }}">
                   </div>
                   <div class="form-group">
                       <label for="exampleInputPassword1">Description(optional)</label>
                       <textarea name="description" rows="8" cols="80" class="form-control">{{ $category->description }}</textarea>
                   </div>

                   <div class="form-group">
                       <label for="exampleInputPassword1">Parent Category(optional)</label>
                       <select class="form-control" name="parent_id">
                           <option value="">Please select a primary category</option>
                           @foreach($main_categories as $cat)
                               <option value="{{$cat->id}}" {{ $cat->id == $category->parent_id ? 'selected' : ''}}>{{ $cat->name }}</option>
                           @endforeach
                       </select>
                   </div>

                   <div class="form-group">
                       <label for="exampleInputEmail1">Category Old Image</label>
                       <img src="{{ asset('images/categories/'.$category->image) }}" width="100"><br>

                       <label for="exampleInputEmail1">Category New Image(optional)</label>
                       <input type="file" class="form-control" name="image" id="exampleInputEmail1">
                   </div>

                   <button type="submit" class="btn btn-primary">Update Category</button>
               </form>
           </div>
       </div>
    </div>
@endsection
