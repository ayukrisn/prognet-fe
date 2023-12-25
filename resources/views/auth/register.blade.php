<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('storage/foto/images-removebg-preview.ico') }}" type="image/ico" />
    <title>Register - Account</title>
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body 

class="bg-gradient-primary">
@include('sweetalert::alert')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="{{ route('register.save') }}" method="POST" enctype="multipart/form-data"
                                class="user">
                                @csrf
                                <div class="form-group">
                                    <input name="name" type="text"
                                        class="form-control form-control-user @error('name')is-invalid @enderror"
                                        id="exampleInputName" placeholder="Name">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email"
                                        class="form-control form-control-user @error('email')is-invalid @enderror"
                                        id="exampleInputEmail" placeholder="Email Address">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="password" type="password"
                                            class="form-control form-control-user @error('password')is-invalid @enderror"
                                            id="exampleInputPassword" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="password_confirmation" type="password"
                                            class="form-control form-control-user @error('password_confirmation')is-invalid @enderror"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Kelompokkan form untuk phone_num, birthdate, gender, identify_number, dan profile_photo_path -->
                                <div class="form-group">
                                    <input name="phone_num" type="text"
                                        class="form-control form-control-user @error('phone_num')is-invalid @enderror"
                                        id="exampleInputPhoneNum" placeholder="Phone Number">
                                    @error('phone_num')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <!--<label for="exampleInputBirthdate">Birthdate</label>-->
                                    <input name="birthdate" type="date"
                                        class="form-control form-control-user @error('birthdate')is-invalid @enderror"
                                        id="exampleInputBirthdate">
                                    @error('birthdate')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputGender">Select Option</label>
                                    <select name="gender" id="gender"
                                        class="form-control form-control-user @error('gender') is-invalid @enderror">
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Mental Illness">Mental Illness</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="selectedOptionInput">Gender</label>
                                    <input type="text" name="selected_option_input" id="selectedOptionInput"
                                        class="form-control" readonly>
                                </div>

                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        $('#gender').change(function() {
                                            var gender = $(this).val();
                                            $('#selectedOptionInput').val(gender);
                                        });
                                    });
                                </script>

                                <div class="form-group">
                                    <input name="identify_number" type="text"
                                        class="form-control form-control-user @error('identify_number')is-invalid @enderror"
                                        id="exampleInputIdentifyNumber" placeholder="Identify Number">
                                    @error('identify_number')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                              
                                <div class="form-group">
                                    <label for="exampleInputrole">Select Option</label>
                                    <select name="role" id="role"
                                        class="form-control form-control-user @error('role') is-invalid @enderror">
                                        <option value="" disabled selected>Select Role</option>
                                        <option value="Event">Event</option>
                                        <option value="User">User</option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="selectedOptionInputt">Role</label>
                                    <input type="text" name="selected_option_input" id="selectedOptionInputt"
                                        class="form-control" readonly>
                                </div>

                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        $('#role').change(function() {
                                            var role = $(this).val();
                                            $('#selectedOptionInputt').val(role);
                                        });
                                    });
                                </script>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Register
                                    Account</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
    <!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
{{-- <script>
    $(document).ready(function () {
        $('form').submit(function (event) {
            // Menghentikan aksi default form submission
            event.preventDefault();

            // Menampilkan SweetAlert setelah berhasil mendaftar
            Swal.fire({
                icon: 'success',
                title: 'Registration Success',
                text: 'Congratulation! You have successfully registered.',
            }).then((result) => {
                // Redirect ke halaman login setelah menutup SweetAlert
                if (result.isConfirmed || result.isDismissed) {
                    window.location.href = "{{ route('login') }}";
                }
            });
        });
    });
</script> --}}
</body>

</html>
