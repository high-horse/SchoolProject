@extends('Layouts.main')
@section('title', 'Edit CLASS deatil ')
@section('setting_form', 'mm-active')
@section('is_active_class_detail', 'nav_bar_active')
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card vue_app">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-12">
                            <h5 class="card-title font-weight-bold">EDIT THE FORM OF {{ $school->name }} </h5>
                            <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal"
                                data-target=".bd-example-modal-lg">View Form</button>
                        </div>
                    </div>
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
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">View Class Detail Form
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="mb-0 table table-bordered">
                        <thead>
                            <tr class="bg-primary text-center text-white">
                                <th colspan="3">Class Detail Form</th>
                            </tr>
                        </thead>
                        <table class="mb-0 table table-bordered">
                            <tbody class="bg-light">
                                {{-- MEDICAL FACILITY STATUS TR --}}
                                <tr class="bg-danger text-center text-white">
                                    <th colspan="3">Class Room Status 
                                        @if ($school_class_room_details->count())
                                            (ACADEMIC SESSION : {{$school_class_room_details[0]->academicSession == null ? '' : $school_class_room_details[0]->academicSession->name}})</th>
                                        @endif
                                </tr>
                                <tr class="text-center">
                                    <th>Class</th>
                                    <th>No. of male student</th>
                                    <th>No. of female student</th>
                                </tr>
                                @foreach ($school_class_room_details as $key => $school_class_room_detail)
                                    <tr class="text-center">
                                        <th>{{ $school_class_room_detail->classRoom == null ? '' : $school_class_room_detail->classRoom->name }}
                                        </th>
                                        <th>
                                            {{ $school_class_room_detail->no_of_male }}
                                        </th>
                                        <th>
                                            {{ $school_class_room_detail->no_of_female }}
                                        </th>
                                    </tr>
                                @endforeach
                                <tr class="bg-primary text-center text-white">
                                    <th colspan="3">EXTRA CLASS STATUS</th>
                                </tr>
                                <tr class="text-center">
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Number Of Room</th>
                                </tr>
                                @foreach ($school_class_room_extra_details as $key => $school_class_room_extra_detail)
                                    <tr class="text-center">
                                        <th>{{ $key + 1 }}</th>
                                        <th>{{ $school_class_room_extra_detail->extraClassRoom == null ? '' : $school_class_room_extra_detail->extraClassRoom->name }}
                                        </th>
                                        <th>
                                            {{ $school_class_room_extra_detail->total }}
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
