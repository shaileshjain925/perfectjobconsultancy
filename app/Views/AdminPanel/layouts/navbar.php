<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link" href="{% url 'logoutAdmin' %}">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout <i class="fas fa-sign-out-alt"></i></span>
            </a>
        </li>
    </ul>
</nav>