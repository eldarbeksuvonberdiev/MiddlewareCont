@extends('layouts.main')

@section('title', 'Roles')
@section('pagename', 'Roles')

@section('content')
    <section class="content ml-4">
        <a href="{{ route('role.index') }}" class="btn btn-primary mb-3">Back</a>
        <div class="row">
            <form action="{{ route('role.store') }}" method="post" class="col-12">
                @csrf
                <div class="d-flex align-items-center mb-3">
                    <input type="text" name="name" class="form-control mr-2" placeholder="Role Name">
                    
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
                <div class="row">
                    @foreach ($permissionGroups as $permissionGroup)
                        <div class="col-md-3 mb-3">
                            <h4>{{ $permissionGroup->name }}</h4>
                            @foreach ($permissionGroup->permissions as $permission)
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-check-input">
                                <label>{{ $permission->name }}</label><br>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </section>
@endsection
