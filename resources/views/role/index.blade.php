@extends('layouts.main')

@section('title', 'Roles')
@section('pagename', 'Roles')

@section('content')
    <section class="content">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
            Create
        </button>
        <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Role Creation</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('role.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="fname" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="fname"
                                    placeholder="nimadir...">
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                  <label>Multiple (.select2-purple)</label>
                                  <div class="select2-purple">
                                    <select class="select2" multiple="multiple" name="permissions[]" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                      @foreach ($permissions as $permission)
                                      <option value="{{ $permission->key }}">{{ $permission->name }}</option>
                                          
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <!-- /.form-group -->
                              </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Roles</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    {{-- <th>Edit</th>
                                    <th>Delete</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{ $model->id }}</td>
                                        <td>{{ $model->name }}</td>
                                        {{-- <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $model->id }}">
                                                Edit
                                            </button>
                                            <div class="modal fade" id="edit{{ $model->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Category
                                                                Creation</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('role.update',$model->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="fname" class="form-label">Full Name</label>
                                                                    <input type="text" class="form-control" name="full_name" id="fname" value="{{ $model->full_name }}">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <form action="{{ route('role.destroy',$model->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $models->links() }}
            </div>
        </div>
    </section>
@endsection
