<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - LMS</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon(32X32).png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .toggle-switch {
            display: inline-block;
            width: 40px;
            height: 20px;
            position: relative;
        }

        .toggle-switch input {
            display: none;
        }

        .slider {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 20px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 14px;
            width: 14px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #4f46e5;
        }

        input:checked+.slider:before {
            transform: translateX(20px);
        }
    </style>
</head>

<body class="flex justify-center items-center min-h-[100vh]">

    <section class="bg-white p-5 rounded-xl shadow-lg min-h-[80vh] w-[80vw]">


        <div class="grid lg:grid-cols-2 grid-cols-1 w-full">
            <div class="h-[80vh] flex justify-center items-center">
                <div class=" w-full">
                    <div class="text-center">
                        <h1 class="gradient-text text-2xl font-bold">Welcome Back</h1>
                        <p class="text-[#000000] opacity-[50%]">Create a New Accout OR Sign In With These
                            Credentials:
                            <br> Email: <strong>user@example.com </strong><br> Password: <strong>Secret</strong>
                        </p>
                    </div>

                    <form id="login_data" method="post" class="mt-7">
                        @csrf
                        <div>
                            <label class="text-[14px] font-normal" for="email">Email</label>
                            <input type="email" required
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="email" id="email" value="{{ $user->name ?? '' }}"
                                placeholder="Email Address Here">
                        </div>
                        <div class="mt-3">
                            <label class="text-[14px] font-normal" for="password">@lang('lang.Password')</label>
                            <div class="relative">
                                <input type="password"
                                    class="w-full border-[#DEE2E6] passinput rounded-[4px] focus:border-primary h-[40px] text-[14px]"
                                    name="password" id="password" placeholder="@lang('lang.Password_Here')"
                                    {{ isset($user->id) ? '' : 'required' }}>
                                <img src="{{ asset('images/icons/eye-invisible.png') }}" data-toggle="password"
                                    class="absolute eyebtns cursor-pointer right-2 bottom-3" alt="">
                            </div>
                        </div>

                        <div class="mt-3 flex items-center">
                            <label class="toggle-switch">
                                <input type="checkbox" id="rememberMeCheckbox">
                                <span class="slider"></span>
                            </label>
                            <label for="rememberMeCheckbox" class="ml-2 text-gray-700 font-medium">Remember me</label>
                        </div>
                        <div class="flex items-center flex-col mt-3">
                            <button id="loginbutton"
                                class="w-[55%] gradient-bakground active:text-black active:w-[60%] duration-150 mx-auto mt-6 py-3 rounded-full text-white uppercase">Login</button>
                            <p class="text-[#000000] mt-3 opacity-[50%]">Create an Account <a href="../register"
                                    class="text-blue-600">Register</a></p>
                        </div>



                    </form>
                </div>
            </div>
            <div class="h-[100%]  justify-center items-center lg:flex hidden">
                <img src="{{ asset('images/login-image.svg') }}" width="97%" height="97%" alt="">
            </div>
        </div>
    </section>

    <script src="{{ asset('javascript/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        document.getElementById('rememberMeCheckbox').addEventListener('change', function() {
            if (this.checked) {
                console.log("Remember Me toggled on");
            } else {
                console.log("Remember Me toggled off");
            }
        });
        $(document).ready(function() {
            $("#login_data").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "/login",
                    data: formData,
                    dataType: "json",
                    beforeSend: function() {
                        $('#spinner').removeClass('hidden');
                        $('#text').addClass('hidden');
                        $('#loginbutton').attr('disabled', true);
                    },
                    success: function(response) {
                        // Handle the success response here
                        if (response.success == true) {
                            $('#text').removeClass('hidden');
                            $('#spinner').addClass('hidden');

                            window.location.href = '/';

                        } else if (response.success == false) {
                            Swal.fire(
                                'Warning!',
                                response.message,
                                'warning'
                            )
                        }
                    },
                    error: function(jqXHR) {

                        let response = JSON.parse(jqXHR.responseText);

                        Swal.fire(
                            'Warning!',
                            response.message,
                            'warning'
                        )
                        $('#text').removeClass('hidden');
                        $('#spinner').addClass('hidden');
                        $('#loginbutton').attr('disabled', false);
                    }
                });
            });
        });

        document.querySelectorAll('img[data-toggle="password"]').forEach(function(eyeIcon) {
            eyeIcon.addEventListener('click', function() {
                let inputField = this.previousElementSibling;
                if (inputField.type === "password") {
                    inputField.type = "text";
                    this.src = "{{ asset('images/icons/eye-visible.png') }}";
                } else {
                    inputField.type = "password";
                    this.src = "{{ asset('images/icons/eye-invisible.png') }}";
                }
            });
        });
    </script>

</body>

</html>
