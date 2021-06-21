@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
       <div class="card">
           <div class="card-header">
               <h4 class="text-center">Add Division</h4>
           </div>
           <div class="card-body">
               <form action="{{ route('admin.division.store') }}" method="post" enctype="multipart/form-data">
                   {{ csrf_field() }}

                   @include('backend.partials.message')

                   <div class="form-group">
                       <label for="exampleInputEmail1">Name</label>
                       <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                   </div>

                   <div class="form-group">
                       <label for="exampleInputEmail1">Priority</label>
                       <input type="text" class="form-control" name="priority" id="exampleInputEmail1" aria-describedby="emailHelp">
                   </div>


                   <button type="submit" class="btn btn-primary">Add Division</button>
               </form>
           </div>
       </div>
    </div>
@endsection
