@extends('layouts.admin')

@section('content')
    <div class="card p-3">
        <div class="card-header">
            <h4>Brand Page</h4>
        </div>
        <div class="new-category">
            <a href="brand/create" class="btn btn-success">
                Add New Brand
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>

                        <th>Title</th>
                        <th>logo</th>
                        <th>Description</th>
                        <th>Display Order</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand->title }}</td>
                            <td>{{ $brand->logo }}</td>
                            <td>{{ $brand->description }}</td>
                            <td>{{ $brand->display_order }}</td>
                            <td>
                                <a href="brand/{{ $brand->id }}/edit" class="btn btn-info">Edit</a>
                                <form action="brand/{{ $brand->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
