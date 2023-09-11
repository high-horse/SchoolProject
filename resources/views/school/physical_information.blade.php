@extends('Layouts.main')
@section('title', 'Physical Infromation')
@section('setting_form', 'mm-active')
@section('is_active_physical_infromation', 'nav_bar_active')
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
                    <form action="{{route('school.physical_infortmation_store',$school)}}" method="post">
                        @csrf
                        <table class="mb-0 table table-bordered">
                            <thead class="text-center">
                                <tr class="bg-danger text-white">
                                    <th colspan="3">School's Physical Information</th>
                                </tr>
                                <tr class="text-center">
                                    <th colspan="3" v-text="'Computer and Internet Status'">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-light">
                                <tr>
                                    <td colspan="3">
                                        <div class="position-relative form-group">
                                            <label for="school_location" class="font-weight-bold">School Location
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <select name="school_location" id="school_location" class="form-control">
                                                <option value="0">--TERAI--</option>
                                                <option value="1">--HILLS--</option>
                                            </select>
                                            @error('school_location')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hills_land_detail">
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="ropani" class="font-weight-bold">Ropani
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="ropani" id="ropani" placeholder=""
                                                type="number" class="form-control" step="0.1"
                                                value="{{ old('ropani') ? old('ropani') : 0 }}"
                                                required>
                                            @error('ropani')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="aana" class="font-weight-bold">Aana
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="aana" id="aana" placeholder=""
                                                type="number" class="form-control" step="0.1"
                                                value="{{ old('aana') ? old('aana') : 0 }}"
                                                required>
                                            @error('aana')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="paisa" class="font-weight-bold">Paisa
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="paisa" id="paisa" placeholder=""
                                                type="number" class="form-control" step="0.1"
                                                value="{{ old('paisa') ? old('paisa') : 0 }}"
                                                required>
                                            @error('paisa')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hills_land_detail">
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="daam" class="font-weight-bold">Daam
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="daam" id="daam" placeholder=""
                                                type="number" class="form-control" step="0.1"
                                                value="{{ old('daam') ? old('daam') : 0 }}"
                                                required>
                                            @error('daam')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr class="terai_land_detail">
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="biggha" class="font-weight-bold">Biggha
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="biggha" id="biggha" placeholder=""
                                                type="number" class="form-control" step="0.1"
                                                value="{{ old('biggha') ? old('biggha') : 0 }}"
                                                required>
                                            @error('biggha')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="kattha" class="font-weight-bold">Kattha
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="kattha" id="kattha" placeholder=""
                                                type="number" class="form-control" step="0.1"
                                                value="{{ old('kattha') ? old('kattha') : 0 }}"
                                                required>
                                            @error('kattha')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="dhur" class="font-weight-bold">Dhur
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="dhur" id="dhur" placeholder=""
                                                type="number" class="form-control" step="0.1"
                                                value="{{ old('dhur') ? old('dhur') : 0 }}"
                                                required>
                                            @error('dhur')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="total_no_of_computer" class="font-weight-bold">Total No of computers
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="total_no_of_computer" id="total_no_of_computer" placeholder=""
                                                type="number" class="form-control"
                                                value="{{ old('total_no_of_computer') ? old('total_no_of_computer') : 0 }}"
                                                required>
                                            @error('total_no_of_computer')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="computers_for_teaching" class="font-weight-bold">Computers For Teaching
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="computers_for_teaching" id="computers_for_teaching" placeholder=""
                                                type="number" class="form-control"
                                                value="{{ old('computers_for_teaching') ? old('computers_for_teaching') : 0 }}"
                                                required>
                                            @error('computers_for_teaching')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="computer_for_admin" class="font-weight-bold">Computers For
                                                Administration/Others
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <input name="computer_for_admin" id="computer_for_admin" placeholder=""
                                                type="number" class="form-control"
                                                value="{{ old('computer_for_admin') ? old('computer_for_admin') : 0 }}"
                                                required>
                                            @error('computer_for_admin')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="position-relative form-group">
                                            <label for="is_internet" class="font-weight-bold">Internet
                                            </label> <span class="font-weight-bold text-danger">*</span>
                                            <select name="is_internet" id="is_internet" class="form-control">
                                                <option value="1">--YES--</option>
                                                <option value="0">--NO--</option>
                                            </select>
                                            @error('is_internet')
                                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tbody id="internet_row_div" class="bg-light">
                                    <tr id="internet_child_0">
                                        <td>
                                            <div class="position-relative form-group" style="margin-top:10px;">
                                                <label for="total_no_of_computer" class="font-weight-bold">Name OF ISP
                                                    <select name="isp_id[]" class="form-control">
                                                        <option value="">{{ '--SELECT--' }}</option>
                                                        @foreach ($isps as $key => $isp)
                                                            <option value="{{ $isp->id }}">{{ $isp->name }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="position-relative form-group">
                                                <label for="internet_speed" class="font-weight-bold">Internet Speed
                                                </label>
                                                <input name="internet_speed[]" id="internet_speed_0" placeholder=""
                                                    type="number" class="form-control" step="0.1" value="">
                                                @error('internet_speed')
                                                    <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="position-relative form-group">
                                                        <label for="isp_contact_no" class="font-weight-bold">ISP Contact No.
                                                        </label>
                                                        <input name="isp_contact_no[]" id="isp_contact_no" placeholder=""
                                                            type="text" class="form-control"
                                                            value="0"
                                                            required>
                                                        @error('isp_contact_no')
                                                            <p class="text-danger mt-1" style="font-size: 0.9rem">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <a class="btn btn-primary  text-white" style="margin-top:30px;"
                                                        id="add_more">ADD MORE</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </tbody>
                        </table>
                        <button class="my-2 btn btn-primary" type="submit" onclick="return confirm('Are you sure you want to submit ?');">Submit Form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <script type="text/javascript" src="{{ asset('vue/bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/jquery.js') }}"></script>
    <script>
        $(function() {
            $(".hills_land_detail").css("display","none");

            $("#school_location").on("change",function() {
                var school_location = $("#school_location").val();
                if (school_location == 1) {
                    $(".hills_land_detail").removeAttr("style");
                    $(".terai_land_detail").css("display","none");
                }else{
                    $(".hills_land_detail").css("display","none");
                    $(".terai_land_detail").removeAttr("style");
                }
            });
            
            $("#is_internet").on("change",function(){
                var is_internet = $("#is_internet").val();
                console.log(is_internet);
                if(is_internet == 1){
                    console.log("ghere");
                    $("#internet_row_div").removeAttr("style");
                }else{
                    $("#internet_row_div").css("display","none");
                }
            });

            let INTERNET_ROW  = 1;

            $("#add_more").on("click",function(){
                html = '<tr id="internet_child_'+INTERNET_ROW+'">'
                        +'<td>'
                            +'<div class="position-relative form-group" style="margin-top:10px;">'
                               +' <label for="total_no_of_computer" class="font-weight-bold">Name OF ISP'
                                    +'<select name="isp_id[]" class="form-control">'
                                        +'<option value="">{{ "--SELECT--" }}</option>'
                                        +'@foreach ($isps as $key => $isp)'
                                            +'<option value="{{ $isp->id }}">{{ $isp->name }}</option>'
                                        +'@endforeach'
                                    +'</select>'
                            +'</div>'
                        +'</td>'
                        +'<td>'
                            +'<div class="position-relative form-group">'
                                +'<label for="internet_speed" class="font-weight-bold">Internet Speed'
                                +'</label>'
                                +'<input name="internet_speed[]" id="internet_speed_0" placeholder=""'
                                    +'type="number" class="form-control" step="0.1" value="">'
                            +'</div>'
                        +'</td>'
                        +'<td>'
                            +'<div class="row">'
                                +'<div class="col-8">'
                                    +'<div class="position-relative form-group"><label for="isp_contact_no" class="font-weight-bold">ISP Contact No.</label>'
                                        +'<input name="isp_contact_no[]" id="isp_contact_no" placeholder=""'
                                            +'type="text" class="form-control"'
                                            +'value="">'
                                    +'</div>'
                                +'</div>'
                                +'<div class="col-4">'
                                    +'<button class="btn btn-danger" style="margin-top:30px;" onclick="removeInternetRow('+INTERNET_ROW+')">Remove</button>'
                                +'</div>'
                            +'</div>'
                        +'</td>'
                    +'</tr>';

                INTERNET_ROW++;

                $("#internet_row_div").append(html);
            });
        });

        function removeInternetRow(params) {
            $("#internet_child_"+params).remove();
        }
    </script>
@endsection
@endsection
