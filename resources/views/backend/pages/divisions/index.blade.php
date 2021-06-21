@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
       <div class="card">
           <div class="card-header">
               <h4 class="text-center">Manage Division</h4>
           </div>
           <div class="card-body">
               @include('backend.partials.message')
              <table class="table table-hover table-striped">
                  <tr>
                      <th>#</th>
                      <th>Division Name</th>
                      <th>Division Priority</th>
                      <th>Action</th>
                  </tr>
                  @foreach($divisions as $division)
                      <tr>
                          <td>#</td>
                          <td>{{ $division->name }}</td>
                          <td>{{ $division->priority }}</td>
                          <td>
                              <a href="{{ route('admin.division.edit',$division->id) }}" class="btn btn-success">Edit</a>
                              <a href="#deleteModel{{ $division->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                              <!-- Delete model -->
                              <div class="modal fade" id="deleteModel{{ $division->id }}" tabindex="1" role="dialog">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title">Are you sure to delete?</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <form action="{{ route('admin.division.delete',$division->id) }}" method="post">
                                                  {{ csrf_field() }}
                                                  <button type="submit" class="btn btn-danger">Permanent Delete</button>
                                              </form>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </td>
                      </tr>
                  @endforeach
              </table>
           </div>
       </div>
    </div>
@endsection
