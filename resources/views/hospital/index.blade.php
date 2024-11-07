@extends('layouts.main')

@section('title', 'Student')
@section('pagename', 'Student')

@section('content')
    <section class="content">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
            Create
        </button>
        <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Category Creation</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('student.create') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="fname"
                                    placeholder="Jahon yangiliklari...">
                            </div>
                            <div class="mb-3">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="lname"
                                    placeholder="Jahon yangiliklari...">
                            </div>
                            <div class="mb-3">
                                <label for="birth" class="form-label">Birth date</label>
                                <input type="date" class="form-control" name="birth_date" id="birth"
                                    placeholder="Jahon yangiliklari...">
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <input type="text" class="form-control" name="gender" id="gender"
                                    placeholder="Jahon yangiliklari...">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Jahon yangiliklari...">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" class="form-control" name="phone" id="phone"
                                    placeholder="Jahon yangiliklari...">
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
                        <h3 class="card-title">Students</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Birth date</th>
                                    <th>email</th>
                                    <th>Show</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{ $model->id }}</td>
                                        <td>{{ $model->first_name }} {{ $model->last_name }}</td>
                                        <td>{{ $model->birth_date }}</td>
                                        <td>{{ $model->email }}</td>
                                        <td><a href="{{ route('student.show',$model->id) }}" class="btn btn-info">Show</a></td>
                                        <td>
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
                                                            <form action="{{ route('student.update',$model->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="fname" class="form-label">First Name</label>
                                                                    <input type="text" class="form-control" name="first_name" id="fname"
                                                                        value="{{ $model->first_name }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="lname" class="form-label">Last Name</label>
                                                                    <input type="text" class="form-control" name="last_name" id="lname"
                                                                        value="{{ $model->last_name }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="birth" class="form-label">Birth date</label>
                                                                    <input type="date" class="form-control" name="birth_date" id="birth"
                                                                        value="{{ $model->birth_date }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="gender" class="form-label">Gender</label>
                                                                    <input type="text" class="form-control" name="gender" id="gender"
                                                                        value="{{ $model->gender }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <input type="email" class="form-control" name="email" id="email"
                                                                        value="{{ $model->email }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="phone" class="form-label">Phone</label>
                                                                    <input type="number" class="form-control" name="phone" id="phone"
                                                                        value="{{ $model->phone }}">
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
                                                <form action="{{ route('student.delete',$model->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
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
