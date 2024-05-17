<header class="header header-custom header-fixed header-one">
    <div class="container">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="{{ route('dashboard') }}" class="navbar-brand logo">
                    <img src="{{ asset('assets/client/img/logo.svg') }}" class="img-fluid" alt="Lovemed">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{ route('dashboard') }}" class="menu-logo">
                        <img src="{{ asset('assets/client/img/logo.svg') }}" class="img-fluid" alt="Lovemed">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li class="has-submenu megamenu">
                        <a href="/">Home </a>
                    </li>
                    {{-- <li class="has-submenu active">
                        <a href="javascript:void(0);">Doctors <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li class="active"><a href="doctor-dashboard.html">Doctor Dashboard</a></li>
                            <li><a href="appointments.html">Appointments</a></li>
                            <li><a href="schedule-timings.html">Schedule Timing</a></li>
                            <li><a href="my-patients.html">Patients List</a></li>
                            <li><a href="patient-profile.html">Patients Profile</a></li>
                            <li><a href="chat-doctor.html">Chat</a></li>
                            <li><a href="invoices.html">Invoices</a></li>
                            <li><a href="doctor-profile-settings.html">Profile Settings</a></li>
                            <li><a href="reviews.html">Reviews</a></li>
                            <li><a href="doctor-register.html">Doctor Register</a></li>
                            <li class="has-submenu">
                                <a href="doctor-blog.html">Blog</a>
                                <ul class="submenu">
                                    <li><a href="doctor-blog.html">Blog</a></li>
                                    <li><a href="blog-details.html">Blog view</a></li>
                                    <li><a href="doctor-add-blog.html">Add Blog</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="javascript:void(0);">Patients <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li class="has-submenu">
                                <a href="javascript:void(0);">Doctors</a>
                                <ul class="submenu inner-submenu">
                                    <li><a href="map-grid.html">Map Grid</a></li>
                                    <li><a href="map-list.html">Map List</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="javascript:void(0);">Search Doctor</a>
                                <ul class="submenu inner-submenu">
                                    <li><a href="search.html">Search Doctor 1</a></li>
                                    <li><a href="search-2.html">Search Doctor 2</a></li>
                                </ul>
                            </li>
                            <li><a href="doctor-profile.html">Doctor Profile</a></li>
                            <li class="has-submenu">
                                <a href="javascript:void(0);">Booking</a>
                                <ul class="submenu inner-submenu">
                                    <li><a href="booking.html">Booking 1</a></li>
                                    <li><a href="booking-2.html">Booking 2</a></li>
                                </ul>
                            </li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="booking-success.html">Booking Success</a></li>
                            <li><a href="patient-dashboard.html">Patient Dashboard</a></li>
                            <li><a href="favourites.html">Favourites</a></li>
                            <li><a href="chat.html">Chat</a></li>
                            <li><a href="profile-settings.html">Profile Settings</a></li>
                            <li><a href="change-password.html">Change Password</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="javascript:void(0);">Pharmacy <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="pharmacy-index.html">Pharmacy</a></li>
                            <li><a href="pharmacy-details.html">Pharmacy Details</a></li>
                            <li><a href="pharmacy-search.html">Pharmacy Search</a></li>
                            <li><a href="product-all.html">Product</a></li>
                            <li><a href="product-description.html">Product Description</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="product-checkout.html">Product Checkout</a></li>
                            <li><a href="payment-success.html">Payment Success</a></li>
                            <li><a href="pharmacy-register.html">Pharmacy Register</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="javascript:void(0);">Pages <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li class="has-submenu">
                                <a href="javascript:void(0);">Call</a>
                                <ul class="submenu inner-submenu">
                                    <li><a href="voice-call.html">Voice Call</a></li>
                                    <li><a href="video-call.html">Video Call</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="javascript:void(0);">Invoices</a>
                                <ul class="submenu inner-submenu">
                                    <li><a href="invoices.html">Invoices</a></li>
                                    <li><a href="invoice-view.html">Invoice View</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="javascript:void(0);">Authentication</a>
                                <ul class="submenu inner-submenu">
                                    <li><a href="login-email.html">Login Email</a></li>
                                    <li><a href="login-phone.html">Login Phone</a></li>
                                    <li><a href="doctor-signup.html">Doctor Signup</a></li>
                                    <li><a href="patient-signup.html">Patient Signup</a></li>
                                    <li><a href="forgot-password.html">Forgot Password 1</a></li>
                                    <li><a href="forgot-password2.html">Forgot Password 2</a></li>
                                    <li><a href="login-email-otp.html">Email OTP</a></li>
                                    <li><a href="login-phone-otp.html">Phone OTP</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="javascript:void(0);">Error Pages</a>
                                <ul class="submenu inner-submenu">
                                    <li><a href="error-404.html">404 Error</a></li>
                                    <li><a href="error-500.html">500 Error</a></li>
                                </ul>
                            </li>
                            <li><a href="blank-page.html">Starter Page</a></li>
                            <li><a href="pricing.html">Pricing Plan</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="maintenance.html">Maintenance</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                            <li><a href="terms-condition.html">Terms & Condition</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="components.html">Components</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#">Blog <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="blog-list.html">Blog List</a></li>
                            <li><a href="blog-grid.html">Blog Grid</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#">Admin <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="admin/index.html" target="_blank">Admin</a></li>
                            <li><a href="pharmacy/index.html" target="_blank">Pharmacy Admin</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
            <ul class="nav header-navbar-rht">

                <!-- Cart -->
                {{-- <li class="nav-item dropdown noti-nav view-cart-header me-3">
                    <a href="#" class="dropdown-toggle nav-link p-0 position-relative"
                        data-bs-toggle="dropdown">
                        <i class="fa-solid fa-cart-shopping"></i> <small class="unread-msg1">7</small>
                    </a>
                    <div class="dropdown-menu notifications dropdown-menu-end">
                        <div class="shopping-cart">
                            <ul class="shopping-cart-items list-unstyled">
                                <li class="clearfix">
                                    <div class="close-icon"><i class="fa-solid fa-circle-xmark"></i></div>
                                    <a href="product-description.html"><img class="avatar-img rounded"
                                            src="assets/client/img/products/product.jpg" alt="User Image"></a>
                                    <a href="product-description.html" class="item-name">Benzaxapine
                                        Croplex</a>
                                    <span class="item-price">$849.99</span>
                                    <span class="item-quantity">Quantity: 01</span>
                                </li>

                                <li class="clearfix">
                                    <div class="close-icon"><i class="fa-solid fa-circle-xmark"></i></div>
                                    <a href="product-description.html"><img class="avatar-img rounded"
                                            src="assets/client/img/products/product1.jpg"
                                            alt="User Image"></a>
                                    <a href="product-description.html" class="item-name">Ombinazol
                                        Bonibamol</a>
                                    <span class="item-price">$1,249.99</span>
                                    <span class="item-quantity">Quantity: 01</span>
                                </li>

                                <li class="clearfix">
                                    <div class="close-icon"><i class="fa-solid fa-circle-xmark"></i></div>
                                    <a href="product-description.html"><img class="avatar-img rounded"
                                            src="assets/client/img/products/product2.jpg"
                                            alt="User Image"></a>
                                    <a href="product-description.html" class="item-name">Dantotate
                                        Dantodazole</a>
                                    <span class="item-price">$129.99</span>
                                    <span class="item-quantity">Quantity: 01</span>
                                </li>
                            </ul>
                            <div class="booking-summary pt-3">
                                <div class="booking-item-wrap">
                                    <ul class="booking-date">
                                        <li>Subtotal <span>$5,877.00</span></li>
                                        <li>Shipping <span>$25.00</span></li>
                                        <li>Tax <span>$0.00</span></li>
                                        <li>Total <span>$5.2555</span></li>
                                    </ul>
                                    <div class="booking-total">
                                        <ul class="booking-total-list text-align">
                                            <li>
                                                <div class="clinic-booking pt-3">
                                                    <a class="apt-btn" href="cart.html">View Cart</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="clinic-booking pt-3">
                                                    <a class="apt-btn"
                                                        href="product-checkout.html">Checkout</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li> --}}
                <!-- /Cart -->

                <!-- Notifications -->
                {{-- <li class="nav-item dropdown noti-nav me-3 pe-0">
                    <a href="#" class="dropdown-toggle nav-link p-0" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-bell"></i> <span class="badge">5</span>
                    </a>
                    <div class="dropdown-menu notifications dropdown-menu-end ">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="notify-block d-flex">
                                            <span class="avatar">
                                                <img class="avatar-img" alt="Ruby perin"
                                                    src="assets/client/img/clients/client-01.jpg">
                                            </span>
                                            <div class="media-body">
                                                <h6>Travis Tremble <span class="notification-time">18.30
                                                        PM</span></h6>
                                                <p class="noti-details">Sent a amount of $210 for his
                                                    Appointment <span class="noti-title">Dr.Ruby perin </span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="notify-block d-flex">
                                            <span class="avatar">
                                                <img class="avatar-img" alt="Hendry Watt"
                                                    src="assets/client/img/clients/client-02.jpg">
                                            </span>
                                            <div class="media-body">
                                                <h6>Travis Tremble <span class="notification-time">12 Min
                                                        Ago</span></h6>
                                                <p class="noti-details"> has booked her appointment to <span
                                                        class="noti-title">Dr. Hendry Watt</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="notify-block d-flex">
                                            <div class="avatar">
                                                <img class="avatar-img" alt="Maria Dyen"
                                                    src="assets/client/img/clients/client-03.jpg">
                                            </div>
                                            <div class="media-body">
                                                <h6>Travis Tremble <span class="notification-time">6 Min
                                                        Ago</span></h6>
                                                <p class="noti-details"> Sent a amount $210 for his Appointment
                                                    <span class="noti-title">Dr.Maria Dyen</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="notify-block d-flex">
                                            <div class="avatar avatar-sm">
                                                <img class="avatar-img" alt="client-image"
                                                    src="assets/client/img/clients/client-04.jpg">
                                            </div>
                                            <div class="media-body">
                                                <h6>Travis Tremble <span class="notification-time">8.30
                                                        AM</span></h6>
                                                <p class="noti-details"> Send a message to his doctor</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li> --}}
                <!-- /Notifications -->

                <!-- User Menu -->
                @auth
                <li class="nav-item dropdown has-arrow logged-item">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="assets/client/img/doctors/doctor-thumb-02.jpg"
                                width="31" alt="{{ auth()->user()->full_name }}">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="assets/client/img/doctors/doctor-thumb-02.jpg" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>{{ auth()->user()->full_name }}</h6>
                                {{-- <p class="text-muted mb-0">{{ auth()->user()->role->name }}</p> --}}
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endauth
                
                <!-- /User Menu -->

            </ul>
        </nav>
    </div>
</header>
