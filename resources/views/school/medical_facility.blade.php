@extends('Layouts.main')
@section('title', 'Medical Facility')
@section('setting_form', 'mm-active')
@section('is_active_medical_infromation', 'nav_bar_active')
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
                    <form action="{{ route('school.medical_facility_store', $school) }}" method="post">
                        @csrf
                        <table class="mb-0 table table-bordered">
                            <tbody class="bg-light">
                                {{-- MEDICAL FACILITY STATUS TR --}}
                                <tr class="bg-success text-center text-white">
                                    <th colspan="3">Medical Facility Status</th>
                                </tr>
                                <tr class="bg-light">
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="first_aid_service" class="font-weight-bold">First Aid Service
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="first_aid_service" id="first_aid_service" placeholder=""
                                                type="number" class="form-control"
                                                value="{{ old('first_aid_service') ? old('first_aid_service') : 0 }}"
                                                required>
                                            @error('first_aid_service')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="nearest_distance" class="font-weight-bold">Nearest Distance (KM)
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="nearest_distance" id="nearest_distance" placeholder=""
                                                type="number" class="form-control" step="0.1"
                                                value="{{ old('nearest_distance') ? old('nearest_distance') : 0 }}"
                                                required>
                                            @error('nearest_distance')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="transport_facility" class="font-weight-bold">Transport Facility
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <textarea name="transport_facility" id="transport_facility" class="form-control">{{ old('transport_facility') ? old('transport_facility') : '' }}</textarea>
                                            @error('transport_facility')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>

                                {{-- TOILET FACILITY STATUS TR --}}
                                <tr class="bg-warning text-center text-white">
                                    <th colspan="3">Toilet Status </th>
                                </tr>
                                <tr class="bg-light">
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="urinal_teacher" class="font-weight-bold">Urinal For Teacher
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="urinal_teacher" id="urinal_teacher" placeholder=""
                                                type="number" class="form-control"
                                                value="{{ old('urinal_teacher') ? old('urinal_teacher') : 0 }}"
                                                required>
                                            @error('urinal_teacher')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="urinal_boy" class="font-weight-bold">Urinal For Boy
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="urinal_boy" id="urinal_boy" placeholder=""
                                                type="number" class="form-control"
                                                value="{{ old('urinal_boy') ? old('urinal_boy') : 0 }}"
                                                required>
                                            @error('urinal_boy')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="no_of_toilet_boy" class="font-weight-bold">No. Of Toilet For Boy
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="no_of_toilet_boy" id="no_of_toilet_boy" placeholder=""
                                                type="number" class="form-control"
                                                value="{{ old('no_of_toilet_boy') ? old('no_of_toilet_boy') : 0 }}"
                                                required>
                                            @error('no_of_toilet_boy')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr class="bg-light">
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="no_of_toilet_girl" class="font-weight-bold">No. Of Toilet For Girl
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="no_of_toilet_girl" id="no_of_toilet_girl" placeholder=""
                                                type="number" class="form-control"
                                                value="{{ old('no_of_toilet_girl') ? old('no_of_toilet_girl') : 0 }}"
                                                required>
                                            @error('no_of_toilet_girl')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="no_of_toilet_teacher" class="font-weight-bold">No. Of Toilet For Teacher
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="no_of_toilet_teacher" id="no_of_toilet_teacher" placeholder=""
                                                type="number" class="form-control"
                                                value="{{ old('no_of_toilet_teacher') ? old('no_of_toilet_teacher') : 0 }}"
                                                required>
                                            @error('no_of_toilet_teacher')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="no_of_toilet_with_water_facility" class="font-weight-bold">No. Of Toilet With Water Facility
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="no_of_toilet_with_water_facility" id="no_of_toilet_with_water_facility" placeholder=""
                                                type="number" class="form-control"
                                                value="{{ old('no_of_toilet_with_water_facility') ? old('no_of_toilet_with_water_facility') : 0 }}"
                                                required>
                                            @error('no_of_toilet_with_water_facility')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
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
