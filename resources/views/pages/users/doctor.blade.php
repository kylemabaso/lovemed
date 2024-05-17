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
                                    <img src="{{ asset('assets/client/img/icon-01.png')}}" class="img-fluid"
                                        alt="patient">
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
                                    <img src="{{ asset('assets/client/img/icon-02.png') }}" class="img-fluid"
                                        alt="Patient">
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
                                    <img src="{{ asset('assets/client/img/icon-03.png') }}" class="img-fluid"
                                        alt="Patient">
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
                    <a class="nav-link active" href="#patients"
                        data-bs-toggle="tab">Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#staff"
                        data-bs-toggle="tab">Staff</a>
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
                                            <th>Email</th>
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
                                                            src="{{ asset('assets/client/img/patients/patient.jpg')}}"
                                                            alt="User Image"></a>
                                                    <a href="#">{{ $patient->full_name }}</a>
                                                </h2>
                                            </td>
                                            <td>
                                                {{ $patient->language->name }}
                                            </td>
                                            <td>{{ $patient->email }}</td>
                                            <td>{{ $patient->phone }}</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>

                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-success-light">
                                                        <i class="fas fa-pencil"></i> Edit
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-danger-light">
                                                        <i class="fas fa-trash-o"></i> Delete
                                                    </a>
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
                                            <th>Patient Name</th>
                                            <th>Appt Date</th>
                                            <th>Purpose</th>
                                            <th>Type</th>
                                            <th>Paid Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="patient-profile.html"
                                                        class="avatar avatar-sm me-2"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/client/img/patients/patient6.jpg"
                                                            alt="User Image"></a>
                                                    <a href="patient-profile.html">Elsie Gilley
                                                        <span>#PT0006</span></a>
                                                </h2>
                                            </td>
                                            <td>14 Nov 2023 <span
                                                    class="d-block text-info">6.00 PM</span>
                                            </td>
                                            <td>Fever</td>
                                            <td>Old Patient</td>
                                            <td>$300</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>

                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-success-light">
                                                        <i class="fas fa-check"></i> Accept
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-danger-light">
                                                        <i class="fas fa-times"></i> Cancel
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="patient-profile.html"
                                                        class="avatar avatar-sm me-2"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/client/img/patients/patient7.jpg"
                                                            alt="User Image"></a>
                                                    <a href="patient-profile.html">Joan Gardner
                                                        <span>#PT0006</span></a>
                                                </h2>
                                            </td>
                                            <td>14 Nov 2023 <span
                                                    class="d-block text-info">5.00 PM</span>
                                            </td>
                                            <td>General</td>
                                            <td>Old Patient</td>
                                            <td>$100</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>

                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-success-light">
                                                        <i class="fas fa-check"></i> Accept
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-danger-light">
                                                        <i class="fas fa-times"></i> Cancel
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="patient-profile.html"
                                                        class="avatar avatar-sm me-2"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/client/img/patients/patient8.jpg"
                                                            alt="User Image"></a>
                                                    <a href="patient-profile.html">Daniel
                                                        Griffing <span>#PT0007</span></a>
                                                </h2>
                                            </td>
                                            <td>14 Nov 2023 <span
                                                    class="d-block text-info">3.00 PM</span>
                                            </td>
                                            <td>General</td>
                                            <td>New Patient</td>
                                            <td>$75</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>

                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-success-light">
                                                        <i class="fas fa-check"></i> Accept
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-danger-light">
                                                        <i class="fas fa-times"></i> Cancel
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="patient-profile.html"
                                                        class="avatar avatar-sm me-2"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/client/img/patients/patient9.jpg"
                                                            alt="User Image"></a>
                                                    <a href="patient-profile.html">Walter
                                                        Roberson <span>#PT0008</span></a>
                                                </h2>
                                            </td>
                                            <td>14 Nov 2023 <span
                                                    class="d-block text-info">1.00 PM</span>
                                            </td>
                                            <td>General</td>
                                            <td>Old Patient</td>
                                            <td>$350</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>

                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-success-light">
                                                        <i class="fas fa-check"></i> Accept
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-danger-light">
                                                        <i class="fas fa-times"></i> Cancel
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="patient-profile.html"
                                                        class="avatar avatar-sm me-2"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/client/img/patients/patient10.jpg"
                                                            alt="User Image"></a>
                                                    <a href="patient-profile.html">Robert
                                                        Rhodes <span>#PT0010</span></a>
                                                </h2>
                                            </td>
                                            <td>14 Nov 2023 <span
                                                    class="d-block text-info">10.00 AM</span>
                                            </td>
                                            <td>General</td>
                                            <td>New Patient</td>
                                            <td>$175</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>

                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-success-light">
                                                        <i class="fas fa-check"></i> Accept
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-danger-light">
                                                        <i class="fas fa-times"></i> Cancel
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="patient-profile.html"
                                                        class="avatar avatar-sm me-2"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/client/img/patients/patient11.jpg"
                                                            alt="User Image"></a>
                                                    <a href="patient-profile.html">Harry
                                                        Williams <span>#PT0011</span></a>
                                                </h2>
                                            </td>
                                            <td>14 Nov 2023 <span
                                                    class="d-block text-info">11.00 AM</span>
                                            </td>
                                            <td>General</td>
                                            <td>New Patient</td>
                                            <td>$450</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>

                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-success-light">
                                                        <i class="fas fa-check"></i> Accept
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm bg-danger-light">
                                                        <i class="fas fa-times"></i> Cancel
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
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
@endsection