@extends('Layouts.main')
@section('title', 'School')
@section('is_active_school_form', 'nav_bar_active')
@section('main_content')
    <link rel="stylesheet" href="{{ asset('assets/arc_css.css') }}">
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card vue_app">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-12">
                            <h5 class="card-title font-weight-bold">FILL THE FORM OF {{ $school->name }} </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-3 widget-chart">
                                <div class="icon-wrapper rounded-circle">
                                    <div class="icon-wrapper-bg bg-primary"></div>
                                    <i class="fa-solid fa-school"></i>
                                </div>
                                <div class="widget-numbers"><span class="count-up-wrapper-2"></span></div>
                                <div class="widget-subheading">School Physical Information</div>
                                <div class="widget-description text-success">
                                    <span class="pl-1">
                                        <span class="count-up-wrapper-3">
                                            <a href="{{ route('school.physical_infortmation',$school) }}"
                                                class="btn btn-primary">Add Physical Information </a>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@section('scripts')
    <script type="text/javascript" src="{{ asset('vue/bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/jquery.js') }}"></script>
@endsection
@endsection
