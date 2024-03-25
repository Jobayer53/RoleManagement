@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Add Student</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" >
                        </div>
                        <div class="mb-3">
                           <button class="btn btn-info btn-sm ">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <table class="table table-dashed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            @if (Auth::user()->can('student.edit'))

                            <a href="" class="btn btn-primary btn-sm">Edit</a>
                            @endif
                            <a href="" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @empty
                       <tr>
                            <td> NO DATA TO SHOW!</td>
                       </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
