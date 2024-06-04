@extends('layouts.doctor')

@section('title')
    Edit User
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Basic Information</h4>
            <form id="editForm" action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <div class="change-avatar">
                                <div class="profile-img">
                                    <img src="{{ asset('assets/client/img/doctors/doctor-thumb-02.jpg') }}"
                                        alt="User Image">
                                </div>
                                <div class="upload-img">
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                        <input type="file" class="upload">
                                    </div>
                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                value="{{ old('first_name', $user->first_name) }}">
                            <div class="invalid-feedback" id="first_name_error"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                value="{{ old('last_name', $user->last_name) }}">
                            <div class="invalid-feedback" id="last_name_error"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="id_number" class="form-label">ID Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="id_number" id="id_number"
                                value="{{ old('id_number', $user->id_number) }}">
                            <div class="invalid-feedback" id="id_number_error"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="date_of_birth" id="date_of_birth"
                                value="{{ old('date_of_birth', $user->date_of_birth) }}" readonly>
                            <div class="invalid-feedback" id="date_of_birth_error"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ old('email', $user->email) }}">
                            <div class="invalid-feedback" id="email_error"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                value="{{ old('phone', $user->phone) }}">
                            <div class="invalid-feedback" id="phone_error"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="language" class="form-label">Language</label>
                            <select class="form-select form-control select-clear" name="language" id="language">
                                <option value="" disabled>Select Language</option>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}"
                                        {{ $language->id == $user->language_id ? 'selected' : '' }}>
                                        {{ $language->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback language"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="interests-select" class="form-label">Interests</label>
                            <select class="form-select form-control interests w-100" name="interests[]"
                                multiple="multiple" id="interests-select">
                                @foreach ($interests as $interest)
                                    <option value="{{ $interest->id }}"
                                        {{ in_array($interest->id, $user->interests->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $interest->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback" id="interests_error"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <div class="invalid-feedback" id="password_error"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="password_confirmation">
                            <div class="invalid-feedback" id="password_confirmation_error"></div>
                        </div>
                    </div>

                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfCpY4nqpNf+I7K7xkPxQ4T9aHT0VDO2UENek=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2 for interests
            $('#interests-select').select2({
                width: '100%'
            });

            // Example of validating input on blur
            function validateInput(input, errorContainer, validationFunction) {
                input.blur(function() {
                    const value = input.val().trim();
                    const error = validationFunction(value);
                    if (error) {
                        input.addClass('is-invalid');
                        errorContainer.text(error).show();
                    } else {
                        input.removeClass('is-invalid');
                        errorContainer.hide();
                    }
                });
            }

            // Validation functions
            function validateFirstName(value) {
                return value === '' ? 'First Name is required' : '';
            }

            function validateLastName(value) {
                return value === '' ? 'Last Name is required' : '';
            }

            function validatePhone(value) {
                const phonePattern = /^[0-9]{10}$/;
                return !phonePattern.test(value) ? 'Invalid Phone Number' : '';
            }

            // Validate fields on blur
            validateInput($('#first_name'), $('#first_name_error'), validateFirstName);
            validateInput($('#last_name'), $('#last_name_error'), validateLastName);
            validateInput($('#phone'), $('#phone_error'), validatePhone);
        });
    </script>
@endpush
