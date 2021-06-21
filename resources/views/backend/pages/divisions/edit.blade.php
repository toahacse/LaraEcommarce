@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
       <div class="card">
           <div class="card-header">
               <h4 class="text-center">Edit Division</h4>
           </div>
           <div class="card-body">
               <form action="{{ route('admin.division.update',$division->id) }}) }}" method="post" enctype="multipart/form-data">
                   {{ csrf_field() }}

                   @include('backend.partials.message')

                   <div class="form-group">
                       <label for="exampleInputEmail1">Name</label>
                       <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{ $division->name }}">
                   </div>
                   <div class="form-group">
                       <label for="exampleInputEmail1">Priority</label>
                       <input type="text" class="form-control" name="priority" id="exampleInputEmail1" value="{{ $division->priority }}">
                   </div>


                   <button type="submit" class="btn btn-primary">Update Division</button>
               </form>
           </div>
       </div>
    </div>
@endsection
