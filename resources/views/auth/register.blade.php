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
    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />


    <!-- Custom styles for this template-->
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    @include('sweetalert::alert')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image" style="background: url({{ asset('storage/foto/register-page.jpg') }}); background-position: center;
                    background-size: cover"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="{{ route('register.save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                <label class="labels">Username</label>
                                    <input name="name" type="text"
                                        class="form-control form-control-user @error('name')is-invalid @enderror"
                                        id="exampleInputName" placeholder="User Name">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label class="labels">Email Address</label>
                                    <input name="email" type="email"
                                        class="form-control form-control-user @error('email')is-invalid @enderror"
                                        id="exampleInputEmail" placeholder="Email Address">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="labels">Password</label>
                                        <input name="password" type="password"
                                            class="form-control form-control-user @error('password')is-invalid @enderror"
                                            id="exampleInputPassword" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                    <label class="labels">Password Confirmation</label>
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
                                <label class="labels">Phone Number</label>
                                    <input name="phone_num" type="text"
                                        class="form-control form-control-user @error('phone_num')is-invalid @enderror"
                                        id="exampleInputPhoneNum" placeholder="Phone Number">
                                    @error('phone_num')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label class="labels">Birthdate</label>
                                    <!--<label for="exampleInputBirthdate">Birthdate</label>-->
                                    <input name="birthdate" type="date"
                                        class="form-control form-control-user @error('birthdate')is-invalid @enderror"
                                        id="exampleInputBirthdate" placeholder="Birthdate">
                                    @error('birthdate')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label class="labels">Gender</label>
                                    <select name="gender" id="gender"
                                        class="form-control form-control-user @error('gender') is-invalid @enderror">
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
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

                                <div class="form-group" id="identityNumberGroup">
                                <label class="labels">Identity Number</label>
                                    <input name="identify_number" type="text"
                                        class="form-control form-control-user @error('identify_number')is-invalid @enderror"
                                        id="identityNumber" placeholder="Identiy Number" required>
                                    @error('identify_number')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label class="labels">Role</label>
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

                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        // Sembunyikan input identitas saat halaman dimuat
                                        $('#identityNumberGroup').hide();

                                        // Event listener untuk perubahan pada pilihan peran (role)
                                        $('#role').change(function() {
                                            // Ambil nilai peran yang dipilih
                                            var selectedRole = $(this).val();

                                            // Tampilkan atau sembunyikan input identitas berdasarkan peran
                                            if (selectedRole === 'Event') {
                                                $('#identityNumberGroup').show();
                                            } else {
                                                $('#identityNumberGroup').hide();
                                            }
                                        });
                                    });
                                </script>
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
