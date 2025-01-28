<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>LaraGigs | Find Laravel Jobs & Projects</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-10 ">
           
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <li>
                        @php
                           //get the name of  the  user
                            $fullname = explode(" ",auth()->user()->name);
                            //get  the frist name
                            $fristname = $fullname[0];
                        @endphp
                        <div class="profile-container">
                          <div class="profile">
                              <img src="{{ asset('images/user.png') }}" alt="Profile Photo" class="profile-photo">
                              <h3 class="profile-name">{{$fristname}}</h3>
                          </div>
                    </div>
                </li>
                <li>
                    <a href="manage" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>
                        Manage Listings</a
                    >
                </li>
                <li>
                    <form action="logout" method="POST">
                        @csrf
                        <button type="submit">
                           <i class="fas fa-sign-out-alt"></i> Logout
                       </button>
                    </form>
                </li>
                @else
                <div class="auth-buttons">
                    <a href="{{ route('login') }}" class="btn btn-login">
                       <i class="fas fa-sign-in-alt"></i>Login
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-register">
                        <i class="fas fa-user-plus"></i>Register
                    </a>
                </div>
                @endauth
            </ul>
        </nav>
        <style>
            .auth-buttons {
                display: flex;
                gap: 0px;
                justify-content: center;
                margin-top: 20px;
            }

            .btn {
                display: inline-block;
                padding: 12px 24px;
                font-size: 16px;
                font-weight: bold;
                text-decoration: none;
                border: 2px solid transparent;
                border-radius: 50px; /* Make the buttons more circular */
                transition: all 0.3s ease;
                cursor: pointer;
            }

            .btn-login {
                background-color: #4caf50; /* Green */
                color: white;
            }

            .btn-login:hover {
                background-color: #45a049;
                transform: scale(1.05);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .btn-register {
                background-color: #2196f3; /* Blue */
                color: white;
            }

            .btn-register:hover {
                background-color: #1e88e5;
                transform: scale(1.05);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }
</style>
    <style>
        .profile-container {
                position: absolute; /* Fixed position for the profile */
                top: 0px; /* Distance from the top */
                bottom: 200px; /* Distance from the top */
                right: 10px; /* Distance from the right */
                z-index: 1000; /* Ensure it stays above other content */
        }

        .profile {
            position: relative; /* Make the profile container a reference for absolute positioning */
            text-align: center; /* Center align the content */
        }

        .profile-photo {
            width: 60px; /* Adjust the size of the photo */
            height: 60px;
            border-radius: 100%; /* Make the photo circular */
            object-fit: cover; /* Ensure the photo covers the area */
        }

        .profile-name {
            position: absolute; /* Position the name absolutely inside the profile container */
            top: 15px; /* Place the name at the bottom of the image */
            left: 50%; /* Center the name horizontally */
            transform: translateX(-50%); /* Adjust for exact centering */
            color: black; /* Text color */
            font-size: 10px; /* Font size */
            font-weight: bold; /* Make the text bold */
            background-color: white; /* Semi-transparent background */
            padding: 0px 0px; /* Add some padding */
            border-radius: 5px; /* Rounded corners */
            white-space: nowrap; /* Prevent text from wrapping */
        }
    </style>
    <main>
        @yield('content')
    </main>

<x-flash-message />  
</body>
</html>