@extends('Layouts.main')
@section('title', 'External Monitoring Status')
@section('setting_form', 'mm-active')
@section('is_active_external_monitoring_status', 'nav_bar_active')
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

                    <form action="{{ route('school.external_monitoring_status_store', $school) }}" method="post">
                        @csrf
                        <table class="mb-0 table table-bordered">
                            <tbody class="bg-light">
                                <tr class="bg-danger text-white">
                                    <th colspan="2">
                                        <div class="position-relative form-group">
                                            <label for="teaching_method" class="font-weight-bold">Teaching Method</label>
                                            <span class="font-weight-bold text-danger">*</span>
                                            <select name="teaching_method_id" id="teaching_method_id"
                                                class="form-control @error('teaching_method_id') is-invalid @enderror"
                                                required>
                                                <option value="">--SELECT--</option>
                                                @foreach ($teaching_methods as $key => $teaching_method)
                                                    <option value="{{ $teaching_method->id }}"
                                                        {{ $school_external_monitoring_status_form == null ? '' : ($school_external_monitoring_status_form->teaching_method_id == $teaching_method->id ? 'selected' : '') }}>
                                                        {{ $teaching_method->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('teaching_method_id')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </th>
                                    <th>
                                        <div class="position-relative form-group">
                                            <label for="teaching_method" class="font-weight-bold">Child Club</label>
                                            <span class="font-weight-bold text-danger">*</span>
                                            <div class="position-relative form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="child_club"
                                                        {{ $school_external_monitoring_status_form == null ? '' : ($school_external_monitoring_status_form->child_club ? 'checked' : '') }}
                                                        value="true"> Check if there is child club
                                                </label>
                                            </div>
                                            @error('teaching_method_id')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </th>
                                </tr>
                                {{-- EXTERNAL MONITORING STATUS TR --}}
                                <tr class="bg-primary text-center text-white">
                                    <th colspan="3">External Monitoring Status</th>
                                </tr>
                                <tr class="text-center">
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Number</th>
                                </tr>
                                @foreach ($external_monitoring_statuses as $key => $external_monitoring_status)
                                    {{-- @dd($external_monitoring_status) --}}
                                    <tr class="text-center">
                                        <th>{{ $key + 1 }}</th>
                                        <th>{{ $external_monitoring_status->name }}</th>
                                        <th>
                                            <div class="position-relative form-group">
                                                <input
                                                    name="external_monitoring_status_id[{{ $external_monitoring_status->id }}]"
                                                    id="external_monitoring_status_id_{{ $key }}" placeholder=""
                                                    type="number" class="form-control" step="0.1"
                                                    value="{{ $external_monitoring_status->schoolEternalMonitoringStatusForm == null ? 0 : (int) $external_monitoring_status->schoolEternalMonitoringStatusForm->total }}"
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
