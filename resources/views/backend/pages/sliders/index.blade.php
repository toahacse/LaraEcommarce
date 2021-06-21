@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
       <div class="card">
           <div class="card-header">
               <h4 class="text-center">Manage Sliders</h4>
           </div>
           <div class="card-body">
               @include('backend.partials.message')
               <a href="#addSliderModel" data-toggle="modal" class="btn btn-info float-right mb-2" >
                   <i aria-hidden="true" class="fa fa-pluse"></i>Add new Slider
               </a>
               <div class="clerfix"></div>

               <!-- Add Slide model -->
               <div class="modal fade" id="addSliderModel" tabindex="1" role="dialog">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title">Add new Slider</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                           </div>
                           <div class="modal-body">
                               <form action="{{ route('admin.sliders.store') }}" method="post" enctype="multipart/form-data">
                                   {{ csrf_field() }}

                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Slider Title</label>
                                       <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
                                   </div>

                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Slider Image</label>
                                       <input type="file" class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp">
                                   </div>

                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Slider Button Text</label>
                                       <input type="text" class="form-control" name="button_text" id="exampleInputEmail1" aria-describedby="emailHelp">
                                   </div>

                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Slider Button Link</label>
                                       <input type="url" class="form-control" name="button_link" id="exampleInputEmail1" aria-describedby="emailHelp">
                                   </div>

                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Slider Button Priority</label>
                                       <input type="number" class="form-control" name="priority" id="exampleInputEmail1" aria-describedby="emailHelp">
                                   </div>


                                   <button type="submit" class="btn btn-success">Add new</button>
                               </form>
                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                           </div>
                       </div>
                   </div>
               </div>

              <table class="table table-hover table-striped">
                  <tr>
                      <th>#</th>
                      <th>Slider Title</th>
                      <th>Slider Image</th>
                      <th>Slider Priority</th>
                      <th>Action</th>
                  </tr>
                  @foreach($sliders as $slider)
                      <tr>
                          <td>#</td>
                          <td>{{ $slider->title }}</td>
                          <td><img src="{{ asset('images/sliders/'.$slider->image) }}" width="40"></td>
                          <td>{{ $slider->priority }}</td>
                          <td>
                              <a href="#editModel{{ $slider->id }}"  data-toggle="modal" class="btn btn-success">Edit</a>
                              <a href="#deleteModel{{ $slider->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                              <!-- Delete model -->
                              <div class="modal fade" id="deleteModel{{ $slider->id }}" tabindex="1" role="dialog">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title">Are you sure to delete?</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <form action="{{ route('admin.sliders.delete',$slider->id) }}" method="post">
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

                      <!-- Update Slide model -->
                      <div class="modal fade" id="editModel{{ $slider->id }}" tabindex="1" role="dialog">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title">Update Slider</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="{{ route('admin.sliders.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                                          {{ csrf_field() }}

                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Slider Title</label>
                                              <input type="text" class="form-control" name="title" value="{{$slider->title}}">
                                  </div>

                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Slider Image</label>
                                              <input type="file" class="form-control" name="image">
                                          </div>

                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Slider Button Text</label>
                                              <input type="text" class="form-control" name="button_text" value="{{$slider->button_text}}">
                                          </div>

                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Slider Button Link</label>
                                              <input type="url" class="form-control" name="button_link" value="{{$slider->button_link}}">
                                          </div>

                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Slider Button Priority</label>
                                              <input type="number" class="form-control" name="priority" value="{{$slider->priority}}">
                                          </div>


                                          <button type="submit" class="btn btn-success">Update</button>
                                      </form>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  </div>
                              </div>
                          </div>
                      </div>

                  @endforeach
              </table>
           </div>
       </div>
    </div>





@endsection
