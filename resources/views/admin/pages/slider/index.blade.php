@extends('admin.layouts.app')

@section('main')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">All Sliders</h4>
                {{-- <a href="{{ route('slider.trash') }}" class="btn btn-danger">Trash Users <i class="fa fa-arrow-right"></i> </a> --}}
            </div>
            <div class="card-body">
                @include('validate-main')
                <div class="table-responsive">
                    <table class="table mb-0 data-table-comet">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Photo</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                           @forelse ($sliders as $slider)
                               <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $slider->title }}</td>
                                <td><img style="width: 60px; object-fit:cover" src="{{ url('storage/sliders/'. $slider->photo) }}" alt=""></td>
                                <td>{{ $slider->created_at->diffForHumans() }}</td>
                                <td>
                                    @if ($slider->status)
                                    <span class="badge badge-success">Published</span>
                                    {{-- <a href="{{ route('slider.status.update', $slider->id) }}" class="text-danger"><i class="fa fa-times"></i></a> --}}
                                @else
                                    <span class="badge badge-danger">Unpublished</span>
                                    {{-- <a href="{{ route('slider.status.update', $slider->id) }}" class="text-success"><i class="fa fa-check"></i></a> --}}
                                @endif
                                </td>
                                <td>
                                    <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    {{-- <a href="{{ route('slider.trash.update', $slider->id) }}" class="btn  btn-sm btn-danger"><i class="fa fa-trash"></i></a> --}}
                                    <a href="" class="btn  btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                               </tr>
                           @empty
                               
                           @endforelse 
                           


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if($form_type == 'create')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add new Slide</h4>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input name="title" value="{{ old('title') }}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Sub Title</label>
                        <input name="subtitle" value="{{ old('subtitle') }}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Photo</label> 
                        <br>
                        <img id="slider-photo-preview" style="max-width: 300px;" src="" alt="">
                        <br>
                        <input style="display: none" name="photo" type="file" class="form-control" id="slider-photo">
                        <label for="slider-photo">
                            <img style="width: 60px; cursor: pointer" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Picture_icon_BLACK.svg/1200px-Picture_icon_BLACK.svg.png" alt="">
                        </label>
                    </div>
                    <hr>
                    <div class="form-group slider-btn-opt">

                        
                       <a id="add-new-slider-button" class="btn btn-sm btn-info" href="">Add slider button</a>
                    </div>
                    
                    

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    @if($form_type == 'edit')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Slide</h4>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{ route('slider.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Title</label>
                        <input name="title" value="{{ $item->title }}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Sub Title</label>
                        <input name="subtitle" value="{{ $item->subtitle }}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Photo</label> 
                        <br>
                        <img id="slider-photo-preview" style="max-width: 300px;" src="{{ url('storage/sliders/'.$item->photo) }}" alt="">
                        <br>
                        <input style="display: none" name="photo" type="file" class="form-control" id="slider-photo">
                        <label for="slider-photo">
                            <img style="width: 60px; cursor: pointer" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Picture_icon_BLACK.svg/1200px-Picture_icon_BLACK.svg.png" alt="">
                        </label>
                    </div>
                    <hr>
                    <div class="form-group slider-btn-opt">

                        @foreach (json_decode($item->btns) as $btn)
                        @php
                            $i = 1;
                        @endphp
                        <div class="btn-opt-area">
                            <span>Button #{{ $i }}</span>
                            <span class="badge badge-danger remove-btn" style="margin-left:400px; cursor:pointer">remove</span>
                            <input class="form-control" name="btn_title[]" value="{{ $btn->btn_title }}" type="text" placeholder="Button Title">
                            <input class="form-control" name="btn_link[]" value="{{ $btn->btn_link }}" type="text" placeholder="Button Link">
                           
                            <select class="form-control" name="btn_type[]">
                                <option @if($btn->btn_type == 'btn-light-out'  ) selected @endif  value="btn-light-out"> Default</option>
                                <option @if($btn->btn_type == 'btn-color btn-full'  ) selected @endif  value="btn-color btn-full"> Red</option>
                            </select>
                            <hr>
                        </div>
                        @php
                            $i++;
                        @endphp
                        @endforeach


                       <a id="add-new-slider-button" class="btn btn-sm btn-info" href="">Add slider button</a>
                    </div>
                    
                    

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    {{-- @if($form_type == 'edit')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit User</h4>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{ route('slider-user.update', $edit_data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" value="{{ $edit_data->name }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control" value="{{ $edit_data->email }}">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" value="{{ $edit_data->username }}">
                    </div>
                    <div class="form-group">
                        <label>Cell</label>
                        <input name="cell" type="text" class="form-control" value="{{ $edit_data->cell }}">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role_id" id="" class="form-control">
                            <option value="">--select--</option>
                            @foreach ($roles as $role)
                                <option @if ($edit_data->role->id == $role->id) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                
                            @endforeach
                        </select>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif --}}
    
</div>

@endsection