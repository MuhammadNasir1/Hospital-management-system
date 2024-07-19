<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LMS - @yield('title', 'Software')</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon(32X32).png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/DataTables-1.13.8/css/jquery.dataTables.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="flex justify-center items-center min-h-[100vh]">



    <section class="bg-white p-5 rounded-md shadow-lg min-h-[80vh] w-[80vw]">


        <div class="grid lg:grid-cols-2 grid-cols-1 w-full">
            <div class="h-[100%] flex justify-center items-center">
                <div class=" w-full">
                    <h1 class="gradient-text text-2xl font-bold">Welcome Back</h1>
                    <p class="text-[#000000] opacity-[50%]">Request For a Service</p>

                    <form action="#" class="mt-7">
                        <div>
                            <label class="text-[14px] font-normal" for="email">Email</label>
                            <input type="email" required
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="email" id="email" value="{{ $user->name ?? '' }}"
                                placeholder="Email Address Here">
                        </div>
                        <div class="mt-3">
                            <label class="text-[14px] font-normal" for="name">Full Name</label>
                            <input type="text" required
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="name" id="name" value="{{ $user->name ?? '' }}"
                                placeholder="Full Name Here">
                        </div>
                        <div class="mt-3">
                            <label class="text-[14px] font-normal" for="phone">Phone No</label>
                            <input type="number" required min="0"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="phone" id="phone" value="{{ $user->name ?? '' }}"
                                placeholder="Phone No Here">
                        </div>
                        <div class="mt-3">
                            <label class="text-[14px] font-normal" for="company">Company Name</label>
                            <input type="text" required
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="company" id="company" value="{{ $user->name ?? '' }}"
                                placeholder="Company Name Here">
                        </div>
                        <div class="mt-3">
                            <label class="text-[14px] font-normal" for="password">Password</label>
                            <input type="password" required
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="password" id="password" value="{{ $user->name ?? '' }}"
                                placeholder="Password Here">
                        </div>
                        <div class="mt-3">
                            <label class="text-[14px] font-normal" for="address">Address</label>
                            <input type="text" required
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="address" id="address" value="{{ $user->name ?? '' }}"
                                placeholder="Your Address Here">
                        </div>

                        <div class="flex items-center flex-col">
                            <button
                                class="w-[55%] gradient-bakground mx-auto mt-6 py-3 rounded-full text-white uppercase">Register</button>
                            <p class="text-[#000000] mt-3 opacity-[50%]">Have an Account <a href="../login"
                                    class="text-blue-600">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="h-[100%]  justify-center items-center lg:flex hidden">
                <img src="{{ asset('images/login-image.svg') }}" width="97%" height="97%" alt="">
            </div>
        </div>
    </section>



    {{--  --}}


    <script src="https://kit.fontawesome.com/b6b9586b26.js" crossorigin="anonymous"></script>
    <script src="{{ asset('javascript/jquery.js') }}"></script>
    <script src="{{ asset('javascript/canvas.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
        integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ asset('DataTables/DataTables-1.13.8/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('javascript/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</body>

</html>
