@extends('Layouts.main')
@section('title', 'Medical Facility')
@section('setting_form', 'mm-active')
@section('is_active_class_detail', 'nav_bar_active')
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card vue_app">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-12">
                            <h5 class="card-title font-weight-bold">FILL THE FORM OF {{ $school->name }} </h5>
                        </div>
                    </div>
                    <form action="{{ route('school.class_detail_store', $school) }}" method="post">
                        @csrf
                        <table class="mb-0 table table-bordered">
                            <tbody class="bg-light">
                                {{-- MEDICAL FACILITY STATUS TR --}}
                                <tr class="bg-danger text-center text-white">
                                    <th colspan="3">Class Room Status</th>
                                </tr>
                                <tr class="text-center">
                                    <th>Class</th>
                                    <th>No. of male student</th>
                                    <th>No. of female student</th>
                                </tr>
                                @foreach ($school->Classes as $class)
                                    <tr class="text-center">
                                        <th>{{ $class->name }}</th>
                                        <th>
                                            <div class="position-relative form-group">
                                                <input name="no_of_male[{{ $class->id }}]" id="no_of_male" placeholder=""
                                                    type="number" class="form-control" value="0" required>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="position-relative form-group">
                                                <input name="no_of_female[{{ $class->id }}]" id="no_of_female"
                                                    placeholder="" type="number" class="form-control" value="0"
                                                    required>
                                            </div>
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
                                @foreach ($extra_classes as $key => $extra_class)
                                    <tr class="text-center">
                                        <th>{{ $key+1 }}</th>
                                        <th>{{ $extra_class->name }}</th>
                                        <th>
                                            <div class="position-relative form-group">
                                                <input name="extra_class_room_id[{{ $extra_class->id }}]"
                                                    placeholder="" type="number" class="form-control" value="0"
                                                    required>
                                            </div>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button class="my-2 btn btn-primary" type="submit"
                            onclick="return confirm('Are you sure you want to submit ?');">Submit Form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <script type="text/javascript" src="{{ asset('vue/bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/jquery.js') }}"></script>
    <script></script>
@endsection
@endsection
