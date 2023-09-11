@extends('Layouts.main')
@section('title', 'SCHOOL FORM')
@section('is_active_school_form', 'nav_bar_active')
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-12">
                            <h5 class="card-title font-weight-bold">School List</h5>
                        </div>
                    </div>
                    <table class="mb-0 table table-bordered">
                        <thead>
                            <tr class="bg-primary text-white text-center">
                                <th>S.No</th>
                                <th>School Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($schools as $key => $school)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $school->name }}</td>
                                    <td>
                                        <a href="{{ route('school.form_dashboard', $school) }}" class="btn btn-danger"><i class="fa-solid fa-fill px-1"></i> Fill
                                            Form</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
