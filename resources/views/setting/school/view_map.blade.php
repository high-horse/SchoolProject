@extends('Layouts.main')
@section('title', 'School')
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card vue_app">
                <div class="card-body">
                    <div class="row text-right">
                        <div class="col-6">
                            <h5 class="card-title font-weight-bold">view Map of {{ $school->name }}</h5>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('school.index') }}" class="btn mr-2 mb-2 btn-primary">Go Back</a>
                        </div>
                    </div>
                    <div id="map" style="height:350px;">

                    </div>
                    <div class="d-none">
                        <table class="mb-0 table table-bordered" id="table">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th>School Name</th>
                                    <th>Address</th>
                                    <th>Contact No</th>
                                    <th>Principal name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $school->name }}</td>
                                    <td>{{ $school->address }}</td>
                                    <td>{{ $school->contact_no }}</td>
                                    <td>{{ $school->p_name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
    <script type="text/javascript" src="{{ asset('vue/bundle.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script>
        new Vue({
            el: "#vue_app",
            data: {
                lat: @json($school->latitude),
                long: @json($school->longitude),
            },
            methods: {},
            mounted() {
                let vm = this;
                const table = document.getElementById("table");
                var map = L.map('map').setView([parseFloat(vm.lat), parseFloat(vm.long)], 13);
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);
                var marker = L.marker([parseFloat(vm.lat), parseFloat(vm.long)]).addTo(map);
                marker.bindPopup(table).openPopup();
            }
        });
    </script>
@endsection
@endsection
