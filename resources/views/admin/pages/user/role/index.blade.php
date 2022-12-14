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
                    <table class="table mb-0 data-table-comet">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Permissions</th>
                                <th>Created At</th>
                                <th>Users</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->slug }}</td>
                                <td>
                                    <ul class="list-unstyled">
                                       @forelse (json_decode($role->permissions) as $item)
                                           <li><i class="fa fa-angle-right mr-2"></i>{{ $item }}</li>
                                       @empty
                                       <li>No Permission found</li>
                                       @endforelse
                                        
                                    </ul>
                                </td>
                                <td>{{ $role->created_at->diffForHumans() }}</td>
                                <td>
                                    <ul class="list-unstyled">
                                        @forelse (json_decode($role->users) as $role_users)
                                            <li><i class="fa fa-angle-right mr-2"></i>{{ $role_users->name }}</li>
                                        @empty
                                        <li>No Users found</li>
                                        @endforelse
                                         
                                     </ul>
                                </td>
                                <td>
                                    {{-- <a href="" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a> --}}
                                    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <form class="d-inline delete-form" action="{{ route('role.destroy', $role->id) }}" method="POST">
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
                        <label>Permissions</label>
                        @forelse ($permissions as $item)
                        <li>
                            <label for=""><input name="permission[]" value="{{ $item->name }}" type="checkbox">{{ $item->name }}</label>
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
    @if($form_type == 'edit')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Edit Role</h4>
                <a href="{{ route('role.index') }}" class="btn btn-sm btn-info">Back</a>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{ route('role.update', $edit->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" value="{{ $edit->name }}" type="text" class="form-control">
                    </div>

                    <ul class="list-unstyled">
                        <label>Permissions</label>
                        @forelse ($permissions as $item)
                        <li>
                            <label for=""><input name="permission[]" @if(in_array($item->name, json_decode($edit->permissions))) checked @endif value="{{ $item->name }}" type="checkbox">{{ $item->name }}</label>
                        </li>
                        @empty
                        <li>
                            <label for="">No records found.</label>
                        </li>
                        @endforelse
                       </ul>
                    
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection 