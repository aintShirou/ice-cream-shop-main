<style>
    .navbar {
        background-color: white;
        position: sticky;
        top: 0;
        z-index: 1000;
    }
    .navbar-nav .nav-link {
        color: #ff69b4;
        font-size: 1.1rem;
        font-weight: bold;
        transition: all 0.3s ease; /* Updated transition for smooth effect */
        padding: 8px 16px; /* Adds padding to make the border effect more visible */
        border-radius: 20px; /* Rounds the corners of the link */
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
    .btn-outline-dark:hover {
        background-color: #ff69b4;
        color: white;
    }
    .navbar-nav .nav-link:hover {
        background-color: #f8d7d1;
        color: #d36f8d;
        border-radius: 10px; 
    }
    .nav-item:hover .nav-link {
        cursor: pointer;
    }
</style>



<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        
        <!-- Logo and Brand Name -->
        <a class="navbar-brand d-flex align-items-center" href="#" style="font-family: 'Pacifico', cursive; font-size: 1.5rem; color: #ff69b4;">
            <img src="./assets/img/brand2.png" alt="logo" style="max-height: 50px; max-width: 80px; margin-right: 10px;">
            <span>Paparazzi</span>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-color: #ff69b4;"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav" style="margin-right: 50px;">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-dark" href="index.php#home" style="color: #ff69b4; font-size: 1.2rem; font-weight: bold;">🍦 Home</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="index.php#best-sellers" style="color: #ff69b4; font-size: 1.2rem; font-weight: bold;">🍨 Best Sellers</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="index.php#menu" style="color: #ff69b4; font-size: 1.2rem; font-weight: bold;">🍧 Menu</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="order_history.php" style="color: #ff69b4; font-size: 1.2rem; font-weight: bold;">
                    <i class="bi-clock-history me-1" style="color: #ff69b4;"></i> Order History
                </a></li>
                &nbsp;
            </ul>
            &nbsp;
            <form class="d-flex">
                <a class="btn" href="cart.php" type="submit" style="background: #ff69b4; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); color: white;">
                    <i class="bi-cart-fill me-1" style="color: white;"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </a>
            </form>
        </div>

        <br>

        <!-- User Account Dropdown -->
           <div class="dropdown" style="margin-left: 20px;">
               <button class="btn btn-outline-dark" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                   <img width="30" height="30" src="https://img.icons8.com/ios-filled/50/user.png" alt="user"/>
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
</nav>


