@extends('Layouts.main')
@section('title', 'School')
@section('setting_parent', 'mm-active')
@section('is_active_school', 'nav_bar_active')
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card vue_app">
                <div class="card-body">
                    <div class="row text-right">
                        <div class="col-6">
                            <h5 class="card-title font-weight-bold">School List</h5>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal"
                                data-target=".bd-example-modal-lg">Add School</button>
                        </div>
                    </div>
                    <table class="mb-0 table table-bordered">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>S.No</th>
                                <th>School Name</th>
                                <th>Address</th>
                                <th>Contact No</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <template>
                                <tr v-for="(school,index) in schools">
                                    <th scope="row" v-text="index+1"></th>
                                    <td v-text="school.name"></td>
                                    <td v-text="school.address"></td>
                                    <td v-text="school.contact_no"></td>
                                    <td class="text-center">
                                        <button type="button" class="btn mr-2 mb-2 btn-success"
                                            v-on:click="viewMap(school.id)">View in Map
                                            <i class="fa-solid fa-map px-1"></i></button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
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
                schools: []
            },
            methods: {
                loadData: function() {
                    let vm = this;
                    // button = document.getElementById('search');
                    // button.disabled = true;
                    // button.innerHTML = 'Loading <i class="fa-solid fa-spinner px-1"></i>';
                    axios.post("{{ route('school.index_report') }}")
                        .then(function(response) {
                            vm.schools = response.data;
                            // button.disabled = false;
                            // button.innerHTML = 'Search <i class="fa-solid fa-magnifying-glass px-1"></i>';
                        })
                        .catch(function(error) {
                            console.log(error);
                            alert("Some Problem Occured");
                        });
                },
                viewMap: function(param) {
                    let vm = this;
                    window.location.href = "{{ url('school/view-map/') }}"+'/'+param;
                }
            },
            mounted() {
                let vm = this;
                vm.loadData();
            }
        });
    </script>
@endsection
@endsection
@section('modal')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add School</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('school.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="position-relative form-group">
                        <label for="name" class="font-weight-bold">School
                            Name</label> <span class="font-weight-bold text-danger">*</span>
                        <input name="name" id="name" placeholder="School Name" type="text"
                            class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')
                            <p class="text-danger mt-1" style="font-size: 0.9rem">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="position-relative form-group">
                        <label for="address" class="font-weight-bold">School Address</label> <span
                            class="font-weight-bold text-danger">*</span>
                        <input name="address" id="address" placeholder="School Adress" type="text"
                            class="form-control @error('address') is-invalid @enderror">
                        @error('address')
                            <p class="text-danger mt-1" style="font-size: 0.9rem">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="position-relative form-group">
                        <label for="contact_no" class="font-weight-bold">Contact No.</label> <span
                            class="font-weight-bold text-danger">*</span>
                        <input name="contact_no" id="contact_no" placeholder="Contact No" type="number"
                            class="form-control @error('contact_no') is-invalid @enderror">
                        @error('contact_no')
                            <p class="text-danger mt-1" style="font-size: 0.9rem">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="position-relative form-group">
                                <label for="p_name" class="font-weight-bold">Principal Name</label> <span
                                    class="font-weight-bold text-danger">*</span>
                                <input name="p_name" id="p_name" placeholder="Principal Name" type="text"
                                    class="form-control @error('p_name') is-invalid @enderror">
                                @error('p_name')
                                    <p class="text-danger mt-1" style="font-size: 0.9rem">
                                        {{ 'Principal Name field is required' }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="position-relative form-group">
                                <label for="c_name" class="font-weight-bold">Coordinator Name</label> <span
                                    class="font-weight-bold text-danger">*</span>
                                <input name="c_name" id="c_name" placeholder="Coordinator Name" type="text"
                                    class="form-control @error('c_name') is-invalid @enderror">
                                @error('c_name')
                                    <p class="text-danger mt-1" style="font-size: 0.9rem">
                                        {{ 'Coordinator Name field is required' }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="position-relative form-group">
                                <label for="latitude" class="font-weight-bold">Latitude </label> <span
                                    class="font-weight-bold text-danger">*</span>
                                <input name="latitude" id="latitude" placeholder="Latitude" type="text"
                                    class="form-control @error('latitude') is-invalid @enderror">
                                @error('latitude')
                                    <p class="text-danger mt-1" style="font-size: 0.9rem">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="position-relative form-group">
                                <label for="longitude" class="font-weight-bold">longitude </label> <span
                                    class="font-weight-bold text-danger">*</span>
                                <input name="longitude" id="longitude" placeholder="longitude" type="text"
                                    class="form-control @error('longitude') is-invalid @enderror">
                                @error('longitude')
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
{{-- <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="width:1050px;">
                <div id="map" style="height: 357px;
                width: 1020px !important; !important;">

                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
    </div>
</div> --}}
@endsection
