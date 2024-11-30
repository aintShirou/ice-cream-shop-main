<style>
    .navbar {
        background-color: #FF76CE;
        position: sticky;
        top: 0;
        z-index: 1000;
    }
    .navbar-nav .nav-link {
        color: #ff69b4;
        font-size: 1.1rem;
        font-weight: bold;
        transition: all 0.3s ease;
        padding: 8px 16px;
        border-radius: 20px;
    }
    .navbar-toggler {
        border: none;
    }
    .navbar-toggler-icon {
        background-color: #ff69b4;
    }
    .btn-outline-dark {
        color: #ff69b4;
        border-color: #ff69b4;
    }
    .nav-item:hover .nav-link {
        cursor: pointer;
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-color: #ff69b4;"></span>
        </button>
        
        <div class="collapse navbar-collapse d-flex justify-content-end mr-5" id="navbarNav">
            <!-- User Account Dropdown -->
            <div class="dropdown ms-3 mr-4">
                <button class="btn" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background: white;">
                    <img width="30" height="30" src="https://img.icons8.com/ios-filled/50/user.png" alt="user" style="color: white; background: white;"/>
                </button>
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item" href="profile.php">
                            <i class="bi bi-person-circle me-2"></i> My Account
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="logout.php">
                            <i class="bi bi-box-arrow-right me-2"></i> Log Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
