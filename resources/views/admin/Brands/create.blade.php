@extends('layouts.admin')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-11">
                    <div class="login-wrap p-4 p-lg-5">
                        <div class="d-flex">
                            <div class="w-100">

                                <h3 class="mb-4">Brand Details</h3>
                            </div>
                        </div>
                        {{-- @if ($brand->exists)
                            <form action="/update-brand" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                            @else --}}
                                <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                        {{-- @endif --}}
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="title">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea name="description" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Display Order</label>
                            <input type="number" class="form-control" name="display_order" placeholder="Display Order">
                        </div>
                        <div class="form-group mb-3">
                            <input type="file" name="logo">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
