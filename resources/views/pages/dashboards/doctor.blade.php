@extends('layouts.doctor')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card dash-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <div class="dash-widget dct-border-rht">
                                <div class="circle-bar circle-bar1">
                                    <div class="circle-graph1" data-percent="75">
                                        <img src="assets/client/img/icon-01.png" class="img-fluid" alt="patient">
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6>Total Patient</h6>
                                    <h3>1500</h3>
                                    <p class="text-muted">Till Today</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-4">
                            <div class="dash-widget dct-border-rht">
                                <div class="circle-bar circle-bar2">
                                    <div class="circle-graph2" data-percent="65">
                                        <img src="assets/client/img/icon-02.png" class="img-fluid" alt="Patient">
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6>Today Patient</h6>
                                    <h3>160</h3>
                                    <p class="text-muted">06, Nov 2023</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-4">
                            <div class="dash-widget">
                                <div class="circle-bar circle-bar3">
                                    <div class="circle-graph3" data-percent="50">
                                        <img src="assets/client/img/icon-03.png" class="img-fluid" alt="Patient">
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6>Appoinments</h6>
                                    <h3>85</h3>
                                    <p class="text-muted">06, Apr 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-4">Active Users</h4>
            <div class="appointment-tab">

                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                    <li class="nav-item">
                        <a class="nav-link active" href="#patients" data-bs-toggle="tab">Patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#staff" data-bs-toggle="tab">Staff</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane show active" id="patients">
                        <div class="card card-table mb-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Language</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($patients as $patient)
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="patient-profile.html"
                                                                class="avatar avatar-sm me-2"><img
                                                                    class="avatar-img rounded-circle"
                                                                    src="assets/client/img/patients/patient.jpg"
                                                                    alt="User Image"></a>
                                                            <a href="#">{{ $patient->full_name }}</a>
                                                        </h2>
                                                    </td>
                                                    <td>
                                                        {{ $patient->language->name }}
                                                    </td>
                                                    <td>{{ $patient->phone }}</td>
                                                    <td>
                                                        <div class="table-action">
                                                            <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                <i class="far fa-eye"></i> View
                                                            </a>
                                                            <a href="{{ route('users.edit', ['user' => $patient]) }}"
                                                                class="btn btn-sm bg-success-light">
                                                                <i class="fas fa-pencil"></i> Edit
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm bg-danger-light"
                                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $patient->id }}').submit();">
                                                                <i class="fas fa-trash-o"></i> Delete
                                                            </a>
                                                            <form id="delete-form-{{ $patient->id }}"
                                                                action="{{ route('users.destroy', ['user' => $patient->id]) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="staff">
                        <div class="card card-table mb-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Language</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employees as $employee)
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="patient-profile.html"
                                                                class="avatar avatar-sm me-2"><img
                                                                    class="avatar-img rounded-circle"
                                                                    src="assets/client/img/patients/patient.jpg"
                                                                    alt="User Image"></a>
                                                            <a href="#">{{ $employee->full_name }}</a>
                                                        </h2>
                                                    </td>
                                                    <td>
                                                        {{ $employee->language->name }}
                                                    </td>
                                                    <td>{{ $employee->phone }}</td>
                                                    <td>
                                                        <div class="table-action">
                                                            <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                <i class="far fa-eye"></i> View
                                                            </a>
                                                            <a href="{{ route('users.edit', ['user' => $employee]) }}"
                                                                class="btn btn-sm bg-success-light">
                                                                <i class="fas fa-pencil"></i> Edit
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm bg-danger-light"
                                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $employee->id }}').submit();">
                                                                <i class="fas fa-trash-o"></i> Delete
                                                            </a>
                                                            <form id="delete-form-{{ $employee->id }}"
                                                                action="{{ route('users.destroy', ['user' => $employee->id]) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                document.getElementById('delete-form-' + userId).submit();
            }
        }
    </script>
@endsection
