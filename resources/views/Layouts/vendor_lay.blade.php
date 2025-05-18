<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome for icons (Optional but recommended for the icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <!-- data table cdn -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

    <link rel="icon" href="{{ asset('asset/images/logo-1.png') }}">
    <title>ProXmart - Farmer</title>
</head>

<body>
    <div class="page">
        <div class="side_bar" id="sidebar">
            <div class="side_bar_content">
                <div class="side_bar_top">
                    <div class="logo" id="toggleSidebarLogo">
                        <div class="logo_content">
                            <img src="{{ asset('asset/images/logo-1.png') }}" alt="logo">
                            <span>Vendor</span>
                        </div>
                    </div>
                    <div class="bar"></div>

                    <div class="sideBar_link">

                        <a class="{{ Request::routeIs('vendor_dashboard') ? 'active' : '' }}"
                            href="{{ route('vendor_dashboard') }}"> <i class="bi bi-house-fill"></i>
                            <span>Dashboard</span></a>
                        <a class="{{ Request::routeIs('business') ? 'active' : '' }}"
                            href="{{ route('business') }}"> <i class="fa fa-building"></i>
                            <span>Business</span></a>
                        <a class="{{ Request::routeIs('paddy_demand_index') ? 'active' : '' }}"
                            href="{{ route('paddy_demand_index') }}"> <i class="fa fa-shopping-basket"></i>
                            <span>Paddy Demand</span></a>


                        {{-- <a style="cursor: pointer;" class="dropdown-btn"><i class="bi bi-diagram-3"></i>
                            <span>Utility ▼</span>
                        </a>

                        <div class="dropdown-content" style="display: none;">
                            <a href="{{ route('admin_file_no_index') }}"
                                class="{{ Request::routeIs('admin_file_no_index') ? 'active' : '' }}"> <i
                                    class="bi bi-folder-fill" style="font-size: 16px;"></i> <span>File NO</span></a>
                        </div> --}}

                    </div>

                </div>
                <div class="side_bar_bottom">
                    {{-- onclick="location.href='{{ route('logout') }}';" --}}
                    <a href="{{ route('logout') }}"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a>
                </div>
            </div>
        </div>
        <div class="content">
            <!-- {{-- successfull message --}} -->
            @if (Session::has('success'))
                <div class="toast-container position-fixed top-0 end-0 p-3">
                    <div class="toast align-items-center text-bg-success border-0 bottom-0 end-0 show" role="alert"
                        aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
                        <div class="toast-header">
                            <img src="{{ asset('asset/images/logo-1.png') }}" width="20px" class="rounded me-2"
                                alt="IIESL Logo">
                            <strong class="me-auto">ProXmart</strong>
                            <small>Just Now</small>
                            <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Success: {{ Session::get('success') }}
                        </div>
                    </div>
                </div>
            @endif

            <!-- {{-- error message --}} -->
            @if (Session::has('error'))
                <div class="toast-container position-fixed top-0 end-0 p-3">
                    <div class="toast align-items-center text-bg-danger border-0 bottom-0 end-0 show" role="alert"
                        aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
                        <div class="toast-header">
                            <img src="{{ asset('asset/images/logo-1.png') }}" width="20px" class="rounded me-2"
                                alt="IIESL Logo">
                            <strong class="me-auto">ProXmart</strong>
                            <small>Just Now</small>
                            <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Error: {{ Session::get('error') }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="nav_bar shadow-sm">
                <div class="nav_content">
                    <button class="openbtn" id="toggleButton">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="title"><span>@yield('title')</span></div>
                    <div class="items">
                        <i style="cursor: pointer;" class="bi bi-arrows-fullscreen" id="fullscreenButton"></i>
                        <div class="user">
                            <div class="img">
                                <img src="{{ asset('asset/images/role_2.jpeg') }}" alt="admin">
                            </div>
                            @if (session('vendor'))
                                <span class="name">{{ session('vendor')->fist_name }}</span>
                            @else
                                <span class="name">No admin email in session.</span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            @yield('content')
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropdownButtons = document.querySelectorAll('.dropdown-btn');

            dropdownButtons.forEach(btn => {
                btn.addEventListener('click', function(event) {
                    event.stopPropagation();

                    // Find the next sibling dropdown-content
                    const dropdownContent = this.nextElementSibling;

                    // Close other open dropdowns before opening the clicked one
                    document.querySelectorAll('.dropdown-content').forEach(content => {
                        if (content !== dropdownContent) {
                            content.style.display = 'none';
                        }
                    });

                    // Toggle display of the clicked dropdown
                    dropdownContent.style.display = dropdownContent.style.display === 'block' ?
                        'none' : 'block';
                });
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function() {
                document.querySelectorAll('.dropdown-content').forEach(content => {
                    content.style.display = 'none';
                });
            });

            // Prevent closing when clicking inside a dropdown
            document.querySelectorAll('.dropdown-content').forEach(content => {
                content.addEventListener('click', function(event) {
                    event.stopPropagation();
                });
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        document.getElementById('toggleButton').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('expanded');
        });
    </script>

    <script>
        // Function to toggle full screen and change the icon
        function toggleFullScreen() {
            const icon = document.getElementById('fullscreenButton');

            if (!document.fullscreenElement) {
                // Enter full-screen mode
                document.documentElement.requestFullscreen().then(() => {
                    // Change the icon to fullscreen-exit
                    icon.classList.remove('bi-arrows-fullscreen');
                    icon.classList.add('bi-fullscreen-exit');
                }).catch(err => {
                    console.error(`Error attempting to enable full-screen mode: ${err.message}`);
                });
            } else {
                // Exit full-screen mode
                document.exitFullscreen().then(() => {
                    // Change the icon back to fullscreen
                    icon.classList.remove('bi-fullscreen-exit');
                    icon.classList.add('bi-arrows-fullscreen');
                });
            }
        }

        // Add event listener to the button
        document.getElementById('fullscreenButton').addEventListener('click', toggleFullScreen);
    </script>

</body>

</html>
