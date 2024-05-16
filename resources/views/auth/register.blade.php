@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="account-content">
                <div class="row align-items-start justify-content-center">
                    <div class="col-md-7 col-lg-6 login-left">
                        <img src="assets/client/img/login-banner.png" class="img-fluid" alt="Lovemed">
                    </div>
                    <div class="col-md-12 col-lg-6 login-right">
                        <div class="login-header">
                            <h3>Patient Register <a href="{{ route('login') }}">Already registered?</a></h3>
                        </div>

                        <!-- Multistep Form -->
                        <form id="registerForm" action="{{ route('register') }}" method="POST">
                            @csrf

                            <!-- Step 1 -->
                            <div class="step step-1">
                                <div class="mb-3 form-focus">
                                    <input type="text" name="first_name" id="first_name" class="form-control floating"
                                        value="{{ old('first_name') }}">
                                    <label class="focus-label">First Name</label>
                                    <div class="invalid-feedback" id="first_name_error"></div>
                                </div>
                                <div class="mb-3 form-focus">
                                    <input type="text" name="last_name" id="last_name" class="form-control floating"
                                        value="{{ old('last_name') }}">
                                    <label class="focus-label">Last Name</label>
                                    <div class="invalid-feedback" id="last_name_error"></div>
                                </div>
                                <div class="mb-3 form-focus">
                                    <input type="email" name="email" id="email" class="form-control floating"
                                        value="{{ old('email') }}">
                                    <label class="focus-label">Email</label>
                                    <div class="invalid-feedback" id="email_error"></div>
                                </div>
                                <div class="mb-3 form-focus">
                                    <input type="text" name="phone" id="phone" class="form-control floating"
                                        value="{{ old('phone') }}" placeholder="+27820881256">
                                    <label class="focus-label">Phone Number</label>
                                    <div class="invalid-feedback" id="phone_error"></div>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-primary btn-next">Next</button>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div class="step step-2" style="display:none;">
                                <div class="mb-3 form-focus">
                                    <input type="text" name="phone_verification_code" id="phone_verification_code"
                                        class="form-control floating">
                                    <label class="focus-label">Phone Verification Code</label>
                                    <div class="invalid-feedback" id="phone_verification_code_error"></div>
                                </div>
                                <div class="mb-3 form-focus">
                                    <input type="text" name="id_number" id="id_number" class="form-control floating"
                                        value="{{ old('id_number') }}">
                                    <label class="focus-label">ID Number</label>
                                    <div class="invalid-feedback" id="id_number_error"></div>
                                </div>
                                <div class="mb-3 form-focus">
                                    <input type="text" name="date_of_birth" id="date_of_birth"
                                        class="form-control floating" readonly>
                                    <label class="focus-label">Date of Birth</label>
                                    <div class="invalid-feedback" id="date_of_birth_error"></div>
                                </div>
                                <div class="mb-3 form-focus">
                                    <select class="form-select form-control select-clear" name="language">
                                        <option value="" disabled selected>Select Language</option>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback language"></div>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-secondary btn-prev">Previous</button>
                                    <button type="button" class="btn btn-primary btn-next">Next</button>
                                </div>
                            </div>

                            <!-- Step 3 -->
                            <div class="step step-3" style="display:none;">
                                <div class="form-group mb-3">
                                    <label for="interests-select">Interests</label>
                                    <select class="form-control interests w-100" name="interests[]" multiple="multiple"
                                        id="interests-select">
                                        @foreach ($interests as $interest)
                                            <option value="{{ $interest->id }}">{{ $interest->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback" id="interests_error"></div>
                                </div>
                                <div class="mb-3 form-focus">
                                    <input type="password" name="password" id="password" class="form-control floating">
                                    <label class="focus-label">Password</label>
                                    <div class="invalid-feedback" id="password_error"></div>
                                </div>
                                <div class="mb-3 form-focus">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control floating">
                                    <label class="focus-label">Confirm Password</label>
                                    <div class="invalid-feedback" id="password_confirmation_error"></div>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-secondary btn-prev">Previous</button>
                                    <button type="submit" class="btn btn-primary">Signup</button>
                                </div>
                            </div>
                        </form>

                        <div id="debug" style="display: none; color: red;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.interests').select2();

        function validateField(fieldId, errorId, validateFn) {
            const value = $(fieldId).val();
            const error = validateFn(value);
            if (error) {
                $(errorId).text(error).show();
                return false;
            } else {
                $(errorId).hide();
                return true;
            }
        }

        function validateStep(step) {
            let valid = true;
            if (step === 1) {
                valid &= validateField('#first_name', '#first_name_error', value => value.trim() === '' ?
                    'First name is required' : '');
                valid &= validateField('#last_name', '#last_name_error', value => value.trim() === '' ?
                    'Last name is required' : '');
                valid &= validateField('#email', '#email_error', value => !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(
                    value) ? 'Invalid email address' : '');
                valid &= validateField('#phone', '#phone_error', value => !/^\+27\d{9}$/.test(value) ?
                    'Invalid phone number' : '');
            } else if (step === 2) {
                valid &= validateField('#phone_verification_code', '#phone_verification_code_error', value =>
                    value.trim() === '' ? 'Phone verification code is required' : '');
                valid &= validateRSAidnumber();
                valid &= validateField('select[name="language"]', '.invalid-feedback.language', value => $(
                    value).val() === '' ? 'Language is required' : '');
            } else if (step === 3) {
                valid &= validateField('#password', '#password_error', value => value.length < 6 ?
                    'Password must be at least 6 characters' : '');
                valid &= validateField('#password_confirmation', '#password_confirmation_error', value =>
                    value !== $('#password').val() ? 'Passwords do not match' : '');
            }
            return valid;
        }

        let currentStep = 1;

        function showStep(step) {
            $('.step').hide();
            $('.step-' + step).show();
        }

        function checkRecordsExistence() {
            return $.when(
                $.post('{{ route('check.email') }}', {
                    email: $('#email').val(),
                    _token: '{{ csrf_token() }}'
                }),
                $.post('{{ route('check.phone') }}', {
                    phone: $('#phone').val(),
                    _token: '{{ csrf_token() }}'
                })
            ).then(function(emailData, phoneData) {
                let canProceed = true;
                if (emailData[0].exists) {
                    $('#email_error').text('Email already exists').show();
                    canProceed = false;
                }
                if (phoneData[0].exists) {
                    $('#phone_error').text('Phone number already exists').show();
                    canProceed = false;
                }
                return canProceed;
            });
        }

        function formatPhoneNumber(phone) {
            // Remove non-numeric characters except the leading +
            phone = phone.replace(/[^0-9+]/g, '');

            // Ensure it starts with +27 and has exactly 12 characters
            if (phone.startsWith('27')) {
                phone = '+' + phone;
            } else if (phone.startsWith('0')) {
                phone = '+27' + phone.slice(1);
            } else if (!phone.startsWith('+27')) {
                phone = '+27' + phone;
            }

            // Trim to max 12 characters
            return phone.slice(0, 12);
        }

        $('.btn-next').on('click', function() {
            if (validateStep(currentStep)) {
                if (currentStep === 1) {
                    checkRecordsExistence().then(function(canProceed) {
                        if (canProceed) {
                            $.post('/send-code', {
                                phone: $('#phone').val(),
                                _token: '{{ csrf_token() }}'
                            }).done(function(data) {
                                currentStep++;
                                showStep(currentStep);
                            }).fail(function(error) {
                                $('#phone_error').text(
                                    'Failed to send verification code.').show();
                            });
                        }
                    });
                } else if (currentStep === 2) {
                    $.post('/verify-code', {
                        phone: $('#phone').val(),
                        code: $('#phone_verification_code').val(),
                        _token: '{{ csrf_token() }}'
                    }).done(function(data) {
                        currentStep++;
                        showStep(currentStep);
                    }).fail(function(error) {
                        $('#phone_verification_code_error').text('Invalid verification code.')
                            .show();
                    });
                } else {
                    currentStep++;
                    showStep(currentStep);
                }
            }
        });

        $('.btn-prev').on('click', function() {
            currentStep--;
            showStep(currentStep);
        });

        $('#first_name').on('blur', function() {
            validateField('#first_name', '#first_name_error', value => value.trim() === '' ?
                'First name is required' : '');
        });

        $('#last_name').on('blur', function() {
            validateField('#last_name', '#last_name_error', value => value.trim() === '' ?
                'Last name is required' : '');
        });

        $('#email').on('blur', function() {
            validateField('#email', '#email_error', value => !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value) ?
                'Invalid email address' : '');
            // Add AJAX call to check if email exists
            $.post('{{ route('check.email') }}', {
                    email: $('#email').val(),
                    _token: '{{ csrf_token() }}'
                })
                .done(function(data) {
                    if (data.exists) {
                        $('#email_error').text('Email already exists').show();
                    }
                });
        });

        $('#phone').on('blur', function() {
            const formattedPhone = formatPhoneNumber($('#phone').val());
            $('#phone').val(formattedPhone);
            validateField('#phone', '#phone_error', value => !/^\+27\d{9}$/.test(value) ?
                'Invalid phone number' : '');
            // Add AJAX call to check if phone exists
            $.post('{{ route('check.phone') }}', {
                    phone: formattedPhone,
                    _token: '{{ csrf_token() }}'
                })
                .done(function(data) {
                    if (data.exists) {
                        $('#phone_error').text('Phone number already exists').show();
                    }
                });
        });

        $('#phone_verification_code').on('blur', function() {
            validateField('#phone_verification_code', '#phone_verification_code_error', value => value
                .trim() === '' ? 'Phone verification code is required' : '');
        });

        $('#id_number').on('blur', function() {
            validateRSAidnumber();
            // Add AJAX call to check if ID number exists
            $.post('{{ route('check.id') }}', {
                    id_number: $('#id_number').val(),
                    _token: '{{ csrf_token() }}'
                })
                .done(function(data) {
                    if (data.exists) {
                        $('#id_number_error').text('ID number already exists').show();
                    }
                });
        });

        function validateRSAidnumber() {
            var idnumber = $('#id_number').val(),
                invalid = 0;

            var debug = $('#debug');
            debug.empty();

            if (isNaN(idnumber)) {
                debug.append('Value supplied is not a valid number.<br />');
                invalid++;
            }

            if (idnumber.length != 13) {
                debug.append('Number supplied does not have 13 digits.<br />');
                invalid++;
            }

            var yy = idnumber.substring(0, 2),
                mm = idnumber.substring(2, 4),
                dd = idnumber.substring(4, 6);

            var dob = new Date(yy, (mm - 1), dd);

            if (!(((dob.getFullYear() + '').substring(2, 4) == yy) && (dob.getMonth() == mm - 1) && (dob
                    .getDate() == dd))) {
                debug.append('Date in first 6 digits is invalid.<br />');
                invalid++;
            }

            var gender = parseInt(idnumber.substring(6, 10), 10) > 5000 ? "M" : "F";

            if (idnumber.substring(10, 11) > 1) {
                debug.append('Third to last digit can only be a 0 or 1 but is a ' + idnumber.substring(10, 11) +
                    '.<br />');
                invalid++;
            }

            if (idnumber.substring(11, 12) < 8) {
                debug.append('Second to last digit can only be a 8 or 9 but is a ' + idnumber.substring(11,
                    12) + '.<br />');
                invalid++;
            }

            var ncheck = 0,
                beven = false;

            for (var c = 0; c < idnumber.length; c++) {
                var cdigit = idnumber.charAt(c),
                    ndigit = parseInt(cdigit, 10);

                if (beven) {
                    if ((ndigit *= 2) > 9) ndigit -= 9;
                }

                ncheck += ndigit;
                beven = !beven;
            }

            if ((ncheck % 10) !== 0) {
                debug.append('Checkbit is incorrect.<br />');
                invalid++;
            }

            if (invalid > 0) {
                debug.css('display', 'block');
            } else {
                debug.css('display', 'none');
                const yearPrefix = parseInt(idnumber.substring(0, 2), 10) > 20 ? '19' : '20';
                const year = yearPrefix + idnumber.substring(0, 2);
                const month = idnumber.substring(2, 4);
                const day = idnumber.substring(4, 6);
                const dob = `${year}-${month}-${day}`;
                $('#date_of_birth').val(dob);
            }

            return (ncheck % 10) === 0;
        }

        // Initialize select2 for interests
        $('.interests').select2({
            width: '100%'
        });

        // Trigger validation on page load if ID number is already filled
        if ($('#id_number').val()) {
            setTimeout(validateRSAidnumber, 500);
        }

        // Show the first step initially
        showStep(currentStep);
    });
</script>
