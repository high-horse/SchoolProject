@extends('Layouts.main')
@section('title', 'external Monitoring Status Room')
@section('setting_parent', 'mm-active')
@section('is_active_external_monitoring_status', 'nav_bar_active')
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card vue_app">
                <div class="card-body">
                    <div class="row text-right">
                        <div class="col-6">
                            <h5 class="card-title font-weight-bold">external Monitoring Status List</h5>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal"
                                data-target=".bd-example-modal-lg">Add external Monitoring Status</button>
                        </div>
                    </div>
                    <table class="mb-0 table table-bordered">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th class="text-center">S.No</th>
                                <th class="text-center">external Monitoring Status</th>
                                <th class="text-center">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($external_monitoring_statuses as $key => $external_monitoring_status)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $external_monitoring_status->name }}</td>
                                    <td class="text-center">{{ $external_monitoring_status->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Add external Monitoring Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('external-monitoring-status.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="position-relative form-group">
                            <label for="name" class="font-weight-bold">external Monitoring Status
                                Name</label> <span class="font-weight-bold text-danger">*</span>
                            <input name="name" id="name" placeholder="Class Name" type="text"
                                class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                                <p class="text-danger mt-1" style="font-size: 0.9rem">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="description" class="font-weight-bold">Description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
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
@endsection
