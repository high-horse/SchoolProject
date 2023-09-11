@extends('Layouts.main')
@section('title', 'Edit Medical Facility')
@section('setting_form', 'mm-active')
@section('is_active_medical_infromation', 'nav_bar_active')
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card vue_app">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-12">
                            <h5 class="card-title font-weight-bold">EDDIT THE FORM OF {{ $school->name }} </h5>
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
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">View Medical & Toilet Facilty Status Form
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="mb-0 table table-bordered">
                        <thead>
                            <tr class="bg-success text-center text-white">
                                <th colspan="2">Medical Facility Status</th>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    First Aid Service :
                                </th>
                                <th class="text-left">
                                    {{ $medical_toilet_facility->first_aid_service }}
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    Nearest Distance (KM) :
                                </th>
                                <th class="text-left">
                                    {{ $medical_toilet_facility->nearest_distance }}
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    Transport Facility :
                                </th>
                                <th class="text-left">
                                    {{ $medical_toilet_facility->transport_facility }}
                                </th>
                            </tr>
                            <tr class="bg-warning text-center text-white">
                                <th colspan="2">Toilet Status </th>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    Urinal For Teacher :
                                </th>
                                <th class="text-left">
                                    {{ (int) $medical_toilet_facility->urinal_teacher }}
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    Urinal For Boy :
                                </th>
                                <th class="text-left">
                                    {{ (int) $medical_toilet_facility->urinal_boy }}
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    No. Of Toilet For Boy :
                                </th>
                                <th class="text-left">
                                    {{ (int) $medical_toilet_facility->no_of_toilet_boy }}
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    No. Of Toilet For Girl :
                                </th>
                                <th class="text-left">
                                    {{ (int) $medical_toilet_facility->no_of_toilet_girl }}
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    No. Of Toilet For Teacher :
                                </th>
                                <th class="text-left">
                                    {{ (int) $medical_toilet_facility->no_of_toilet_teacher }}
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    No. Of Toilet With Water Facility :
                                </th>
                                <th class="text-left">
                                    {{ (int) $medical_toilet_facility->no_of_toilet_with_water_facility }}
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
