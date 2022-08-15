@extends('admin.layouts.app')

@section('main')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Admin Users</h4>
            </div>
            <div class="card-body">
                @include('validate-main')
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Photo</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($all_admin as $admin)
                                @if ($admin->name !== 'Provider')
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->role->name }}</td>
                                    <td>
                                        @if ($admin->photo == 'avatar.png')
                                            <img style="height: 50px; width: 50px; object-fit:cover" src="{{ asset('storage/admins/avatar.png') }}" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $admin->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if ($admin->status)
                                            <span class="badge badge-success">Active User</span>
                                            <a href="{{ route('admin.status.update', $admin->id) }}" class="text-danger"><i class="fa fa-times"></i></a>
                                        @else
                                            <span class="badge badge-danger">Blocked User</span>
                                            <a href="{{ route('admin.status.update', $admin->id) }}" class="text-success"><i class="fa fa-check"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a href="" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a> --}}
                                        <a href="{{ route('permission.edit', $admin->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <form class="d-inline delete-form" action="{{ route('permission.destroy', $admin->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                            @empty
                                <tr>
                                    <td class="text-center" colspan="5">No records found.</td>
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
                <h4 class="card-title">Add new User</h4>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{ route('admin-user.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Cell</label>
                        <input name="cell" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" id="" class="form-control">
                            <option value="">--select--</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
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