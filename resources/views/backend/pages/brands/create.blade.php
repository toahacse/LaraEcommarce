@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
       <div class="card">
           <div class="card-header">
               <h4 class="text-center">Add Brand</h4>
           </div>
           <div class="card-body">
               <form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
                   {{ csrf_field() }}

                   @include('backend.partials.message')

                   <div class="form-group">
                       <label for="exampleInputEmail1">Name</label>
                       <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                   </div>
                   <div class="form-group">
                       <label for="exampleInputPassword1">Description(optional)</label>
                       <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
                   </div>

                   <div class="form-group">
                       <label for="exampleInputEmail1">Brand Image(optional)</label>
                       <input type="file" class="form-control" name="image" id="exampleInputEmail1">
                   </div>

                   <button type="submit" class="btn btn-primary">Add Brand</button>
               </form>
           </div>
       </div>
    </div>
@endsection
