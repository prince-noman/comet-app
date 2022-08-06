@extends('admin.layouts.app')

@section('main')

@extends('admin.layouts.app')

@section('main')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Roles</h4>
            </div>
            <div class="card-body">
                @include('validate-main')
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Permissions</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->slug }}</td>
                                <td>{{ $role->permissions }}</td>
                                <td>{{ $role->created_at->diffForHumans() }}</td>
                                <td>
                                    {{-- <a href="" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a> --}}
                                    <a href="{{ route('permission.edit', $role->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <form class="d-inline" action="{{ route('permission.destroy', $role->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">No records found.</td>
                                </tr>
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
                <h4 class="card-title">Add new role</h4>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                       <ul style="list-style: none; padding-left: 0px;">
                        @forelse ($permissions as $item)
                        <li>
                            <label for=""><input type="checkbox">{{ $item->name }}</label>
                        </li>
                        @empty
                        <li>
                            <label for="">No records found.</label>
                        </li>
                        @endforelse
                       </ul>
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
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Edit permission</h4>
                <a href="{{ route('permission.index') }}" class="btn btn-sm btn-info">Back</a>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{ route('permission.update', $edit->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" value="{{ $edit->name }}" type="text" class="form-control">
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

@endsection