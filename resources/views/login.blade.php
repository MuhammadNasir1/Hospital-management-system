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
</head>

<body class="flex justify-center items-center min-h-[100vh]">

    <section class="bg-white p-5 rounded-md shadow-lg min-h-[80vh] w-[80vw]">


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
                            <label class="text-[14px] font-normal" for="password">Password</label>
                            <input type="password" required
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="password" id="password" value="{{ $user->name ?? '' }}"
                                placeholder="Password Here">
                        </div>



                        {{-- <form id="login_data" method="post" class="flex flex-col gap-4 mt-5">
                        @csrf
                        <div class="relative mt-16 border-b-2 border-black">
                            <label for="email" class="text-sm text-black">Email</label>
                            <input
                                class="p-2 pl-6 relative focus:outline-none focus:border-none focus:border-transparent outline-none border-none w-full text-sm"
                                type="email" name="email" placeholder="Enter your Email Address" id="email">
                            <img class="absolute bottom-3" width="17" src="{{ asset('images/icons/email.svg') }}"
                                alt="email">
                        </div>
                        <div class="relative border-b-2 border-black">
                            <label for="Password" class="text-sm text-black">Password</label>
                            <input
                                class="passinput p-2 pl-6  focus:outline-none focus:border-transparent outline-none border-none w-full  text-sm"
                                type="password" name="password" placeholder="Enter your Password" id="Password">
                            <img class="absolute bottom-3" width="15" src="{{ asset('images/icons/lock.svg') }}"
                                alt="password">
                            <div>
                                <img class="eyeicon absolute right-0 bottom-2 cursor-pointer" id="eyeicon"
                                    width="18px" src="{{ asset('images/icons/eye-invisible.png') }}" alt="show">

                            </div>
                        </div>
                        <button type="submit" id="loginbutton"
                            class="bg-primary rounded-full w-full text-white  py-4 hover:scale-105 duration-300 shadow-sm mt-4">
                            <div class=" text-center hidden" id="spinner">
                                <svg aria-hidden="true"
                                    class="w-5 h-5 mx-auto text-center text-gray-200 animate-spin fill-white"
                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                        fill="currentColor" />
                                    <path
                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                        fill="currentFill" />
                                </svg>
                            </div>
                            <div class="text-white  font-semibold" id="text">
                                Login
                            </div>
                        </button>
                        <div class=" text-center">
                            <h2><a href="../home" class="text-primary font-bold underline">Websites Collections</a></h2>
                        </div>
                    </form> --}}

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

        //  register page password show and hide

        let passinputs = document.querySelectorAll('.passinput');
        let eyebtns = document.querySelectorAll(".eyeicon");

        eyebtns.forEach((btn, index) => {
            btn.addEventListener("click", () => {
                let passinput = passinputs[index];
                if (passinput.type === "password") {
                    passinput.type = "text";
                    btn.src = "images/icons/eye-visible.png";
                } else {
                    passinput.type = "password";
                    btn.src = "images/icons/eye-invisible.png";
                }
            });
        });
    </script>

</body>

</html>
