@extends('layouts.guest')

@section('title', 'Login')

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection

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
                        <h3>Patient Register <a href="{{ route('login') }}">Are you a Doctor?</a></h3>
                    </div>

                    <!-- Register Form -->
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        @php
                            $fields = [
                                'first_name' => ['label' => 'First Name'],
                                'last_name' => ['label' => 'Last Name'],
                                'phone' => ['label' => 'Phone Number', 'placeholder' => '+27820881256'],
                                'id_number' => ['label' => 'ID Number', 'oninput' => 'updateDOB()'],
                                'password' => ['label' => 'Password'],
                                'password_confirmation' => ['label' => 'Confirm Password'],
                            ];
                        @endphp
                        @foreach ($fields as $field => $options)
                        <div class="mb-3 form-focus">
                            <input type="{{ $field === 'password' || $field === 'password_confirmation' ? 'password' : 'text' }}"
                                name="{{ $field }}" value="{{ old($field) }}"
                                required class="form-control floating @error($field) is-invalid @enderror"
                                @foreach ($options as $attr => $value)
                                    @if ($attr != 'label')
                                        {{ $attr }}="{{ $value }}"
                                    @endif
                                @endforeach>
                            @error($field)
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="focus-label">{{ $options['label'] }}</label>
                        </div>
                        @endforeach
                        <input type="hidden" name="date_of_birth" id="date_of_birth" required>
                        <div class="mb-3">
                            <select class="form-select form-control select-clear" name="language">
                                <option value="" disabled selected>Select Language</option>
                                @foreach ($languages as $language)
                                <option value="{{ $language->id }}">{{ $language->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="interests-select">Select Interests</label>
                            <select class="form-select form-control" name="interests[]" multiple="multiple"
                                id="interests-select">
                                @foreach ($interests as $interest)
                                <option value="{{ $interest->id }}">{{ $interest->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-end">
                            <a class="forgot-link" href="{{ route('login') }}">Already have an account?</a>
                        </div>
                        <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Signup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#interests-select').select2({
            placeholder: "Select interests",
            allowClear: true
        });
    });

    function updateDOB() {
        const idNum = document.getElementById('id_number').value;
        if (idNum.length >= 6) {
            const year = parseInt(idNum.substring(0, 2), 10) > 20 ? '19' + idNum.substring(0, 2) : '20' + idNum.substring(0, 2);
            const month = idNum.substring(2, 4);
            const day = idNum.substring(4, 6);
            const dob = `${year}-${month}-${day}`;
            document.getElementById('date_of_birth').value = dob;
        }
    }
</script>
@endsection
