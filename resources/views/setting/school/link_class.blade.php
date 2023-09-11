@extends('Layouts.main')
@section('title', 'Link class via School')
@section('setting_parent', 'mm-active')
@section('is_active_school_class_link', 'nav_bar_active')
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card vue_app">
                <div class="card-body">
                    <div class="row text-right">
                        <div class="col-6">
                            <h5 class="card-title font-weight-bold">Link school & class</h5>
                        </div>
                    </div>
                    <table class="mb-0 table table-bordered">
                        <thead>
                            <tr class="bg-primary text-white text-center">
                                <th>S.No</th>
                                <th>School Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($schools as $key => $school)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $school->name }}</td>
                                    <td>
                                        <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal"
                                            data-target=".bd-example-modal-lg" onclick="linkClass('{{ $school->id }}')"><i
                                                class="fa-solid fa-link px-1"></i> LINK CLASS</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.2/axios.min.js"
        integrity="sha512-NCiXRSV460cHD9ClGDrTbTaw0muWUBf/zB/yLzJavRsPNUl9ODkUVmUHsZtKu17XknhsGlmyVoJxLg/ZQQEeGA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function linkClass(params) {
            console.log('ere');
            axios.get("{{ route('api.linkClass') }}", {
                    params: {
                        school_id: params
                    }
                })
                .then(function(res) {
                    var row = document.getElementById("row");
                    row.innerHTML = res.data;
                }).catch(function(err) {
                    alert("Something Went wrong...");
                });
        }
    </script>
@endsection
@endsection
@section('modal')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="bd-example-modal-lg">
    <div class="modal-dialog modal-xl">
        <form action="{{route('link_class')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">LINK SCHOOL & CLASS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mt-2 text-center" id="row">
    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
