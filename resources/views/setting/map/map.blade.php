@extends('Layouts.main')
@section('title', 'Map')
@section('setting_parent', 'mm-active')
@section('is_active_map', 'nav_bar_active')
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card vue_app">
                <div class="card-body">
                    <div class="row text-right">
                        <div class="col-6">
                            <h5 class="card-title font-weight-bold">view Map of {{ config('CONSTANT.AREA_NAME') }} </h5>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('school.index') }}" class="btn mr-2 mb-2 btn-primary">Go Back</a>
                        </div>
                    </div>
                    <div id="map" style="height:500px;">

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
        const schools = @json($schools);
        const MARKER_IMAGE_SCHOOL = @json(asset('school_icon.png'))

        // Creating map options
        var mapOptions = {
            center: [27.68441997663206, 85.4006497320509],
            zoom: 14
        }

        // Creating a map object
        var map = new L.map('map', mapOptions);

        // Creating a Layer object
        var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

        // Adding layer to the map
        map.addLayer(layer);

        // Creating latlng object
        var latlngs = [
            [27.6678709298264, 85.3520612140065],
            [27.68246501409986, 85.35712191817238],
            [27.694323406834183, 85.37600410459689],
            [27.69584341886911, 85.38475968006288],
            [27.69743925723064, 85.38965271276622],
            [27.70230364707995, 85.38939569642541],
            [27.7008590124932, 85.3953188226585],
            [27.701542966097172, 85.39626323858843],
            [27.684441199187592, 85.40038034155086],
            [27.68231208708334, 85.4058731568164],
            [27.677751852928385, 85.40535709241394],
            [27.670761099269214, 85.39419861062403],
            [27.671978043388567, 85.38261289263082],
            [27.669317898905977, 85.37823604938376],
            [27.671294040250448, 85.37754947610097],
            [27.67288942396989, 85.36510529898247],
            [27.669868973886896, 85.3639095617319],
            [27.6678709298264, 85.3520612140065]
        ];

        var greenIcon = L.icon({
            iconUrl: MARKER_IMAGE_SCHOOL,

            iconSize: [20, 630], // size of the icon
            shadowSize: [50, 64], // size of the shadow
            iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62], // the same for the shadow
            popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        schools.forEach(element => {
            html = '';
            html += '<table class="mb-0 table table-bordered" id="table">' +
                '<thead>' +
                '<tr class="bg-primary text-white">' +
                '<th>School Name</th>' +
                '<th>Address</th>' +
                '<th>Contact No</th>' +
                '<th>Principal name</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>' +
                '<tr>' +
                '<td>' + element.name + '</td>' +
                '<td>' + element.address + '</td>' +
                '<td>' + element.contact_no + '</td>' +
                '<td>' + element.p_name + '</td>' +
                '</tr>' +
                '</tbody>' +
                '</table>';

            L.marker([parseFloat(element.latitude), parseFloat(element.longitude)], {
                title: element.name
            }).addTo(map).bindPopup(html);

        });

        // Creating a poly line
        var polyline = L.polyline(latlngs, {
            color: 'red'
        });

        // Adding to poly line to map
        polyline.addTo(map);
    </script>
@endsection
@endsection
