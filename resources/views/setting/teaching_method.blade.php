@extends('Layouts.main')
@section('title', 'Teaching Method')
@section('setting_parent', 'mm-active')
@section('is_active_teaching_method', 'nav_bar_active')
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card vue_app">
                <div class="card-body">
                    <div class="row text-right">
                        <div class="col-6">
                            <h5 class="card-title font-weight-bold">Teaching Method List</h5>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal"
                                data-target=".bd-example-modal-lg">Add Teaching Method</button>
                        </div>
                    </div>
                    <table class="mb-0 table table-bordered">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th class="text-center">S.No</th>
                                <th class="text-center">Teaching Method</th>
                                <th class="text-center">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teaching_methods as $key => $teaching_method)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $teaching_method->name }}</td>
                                    <td class="text-center">{{ $teaching_method->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('modal')
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Extra Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('teaching-method.store') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="position-relative form-group">
                            <label for="name" class="font-weight-bold">Extra Class
                                Name</label> <span class="font-weight-bold text-danger">*</span>
                            <input name="name" id="name" placeholder="Class Name" type="text"
                                class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="description" class="font-weight-bold">Description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('Are you sure you want to submit ?');">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
