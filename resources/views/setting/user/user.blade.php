@extends('Layouts.main')
@section('title', 'USER')
@section('setting_parent', 'mm-active')
@section('is_active_create_user', 'nav_bar_active')
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card vue_app">
                <div class="card-body">
                    <div class="row text-right">
                        <div class="col-6">
                            <h5 class="card-title font-weight-bold">USER List</h5>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal"
                                data-target=".bd-example-modal-lg">Add User</button>
                        </div>
                    </div>
                    <table class="mb-0 table table-bordered">
                        <thead class="text-center">
                            <tr class="bg-primary text-white">
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>School Name</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->School->name }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@section('scripts')
@endsection
@endsection
@section('modal')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('setting.user.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="position-relative form-group">
                                <label for="name" class="font-weight-bold">User
                                    Name</label> <span class="font-weight-bold text-danger">*</span>
                                <input name="name" id="name" placeholder="User Name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <p class="text-danger mt-1" style="font-size: 0.9rem">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="position-relative form-group">
                                <label for="email" class="font-weight-bold">Email</label> <span
                                    class="font-weight-bold text-danger">*</span>
                                <input name="email" id="email" placeholder="Email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')
                                    <p class="text-danger mt-1" style="font-size: 0.9rem">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="position-relative form-group">
                                <label for="name" class="font-weight-bold">School
                                    Name</label> <span class="font-weight-bold text-danger">*</span>
                                <select name="school_id" id="school_id" class="form-control" required>
                                    <option value="">--SELECT--</option>
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                    <p class="text-danger mt-1" style="font-size: 0.9rem">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="position-relative form-group">
                                <label for="password" class="font-weight-bold">Password</label> <span
                                    class="font-weight-bold text-danger">*</span>
                                <input name="password" id="password" placeholder="Password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <p class="text-danger mt-1" style="font-size: 0.9rem">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="position-relative form-group">
                                <label for="password_confirmation" class="font-weight-bold">Confirm Password</label> <span
                                    class="font-weight-bold text-danger">*</span>
                                <input name="password_confirmation" id="password_confirmation" placeholder="Password" type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror" required>
                                @error('password_confirmation')
                                    <p class="text-danger mt-1" style="font-size: 0.9rem">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
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
