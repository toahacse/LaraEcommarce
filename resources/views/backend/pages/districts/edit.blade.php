@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
       <div class="card">
           <div class="card-header">
               <h4 class="text-center">Edit District</h4>
           </div>
           <div class="card-body">
               <form action="{{ route('admin.district.update',$district->id) }}) }}" method="post" enctype="multipart/form-data">
                   {{ csrf_field() }}

                   @include('backend.partials.message')

                   <div class="form-group">
                       <label for="exampleInputEmail1">Name</label>
                       <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{ $district->name }}">
                   </div>

                   <div class="form-group">
                       <label for="exampleInputEmail1">Select Division</label>
                       <select class="form-control" name="division_id">
                           <option value="">Please select a Division fot the District</option>
                           @foreach($divisions as $division)
                               <option value="{{ $division->id }}" {{ $district->division->id == $division->id ? 'selected': '' }}>{{ $division->name }}</option>
                           @endforeach
                       </select>
                   </div>

                   <button type="submit" class="btn btn-primary">Update District</button>
               </form>
           </div>
       </div>
    </div>
@endsection
