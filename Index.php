<?php
include 'config/db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room, Shop & Marriage Venue Portal</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3b82f6;
            --secondary-color: #1e293b;
            --accent-color: #f59e0b;
        }
        body { background-color: #f8fafc; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #334155; }
        .navbar { background: var(--secondary-color); }
        .hero-section { background: linear-gradient(135deg, #1e293b, #0f172a); color: white; padding: 90px 0; }
        .property-card { transition: transform 0.3s ease, box-shadow 0.3s ease; border: none; border-radius: 12px; overflow: hidden; background: #fff; }
        .property-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.08); }
        .badge-status { position: absolute; top: 15px; left: 15px; font-weight: 600; padding: 6px 12px; border-radius: 20px; }
        .btn-custom { background-color: var(--primary-color); color: #fff; border-radius: 8px; }
        .btn-custom:hover { background-color: #2563eb; color: #fff; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="index.php"><i class="fas fa-city me-2 text-warning"></i>UrbanNest</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center gap-2">
                    <li class="nav-item"><a class="nav-link active" href="index.php"><i class="fas fa-home me-1"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="marriage_booking.php"><i class="fas fa-ring me-1 text-warning"></i> Marriage Booking</a></li>
                    <?php if(isset($_SESSION['user_logged'])): ?>
                        <li class="nav-item"><a class="btn btn-outline-light btn-sm px-3" href="auth/logout.php"><i class="fas fa-sign-out-alt me-1"></i> Logout</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="btn btn-outline-light btn-sm px-3" href="auth/login.php"><i class="fas fa-sign-in-alt me-1"></i> Login</a></li>
                        <li class="nav-item"><a class="btn btn-custom btn-sm px-3" href="auth/register.php"><i class="fas fa-user-plus me-1"></i> Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Find Your Ideal Room, Shop or Marriage Lawn</h1>
            <p class="lead text-light opacity-75 mb-4">The most trusted platform for renting properties and booking grand wedding venues.</p>
            <a href="marriage_booking.php" class="btn btn-warning btn-lg fw-bold px-4 py-2 text-dark shadow"><i class="fas fa-glass-cheers me-2"></i>Book Marriage Lawn / Banquet</a>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-dark"><i class="fas fa-building me-2 text-primary"></i>Available Properties</h3>
            <span class="text-muted small">Explore verified rooms, shops & houses</span>
        </div>

        <div class="row g-4">
            <!-- Property 1 -->
            <div class="col-md-4">
                <div class="card property-card position-relative h-100">
                    <span class="badge bg-success badge-status shadow-sm">Available</span>
                    <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=500&q=80" class="card-img-top" style="height: 220px; object-fit: cover;" alt="Room">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold">Modern 2BHK Apartment</h5>
                        <p class="card-text text-muted small mb-2"><i class="fas fa-map-marker-alt text-danger me-1"></i> Hazratganj, Lucknow</p>
                        <p class="card-text text-primary fw-bold fs-5 mb-2">₹12,000 / month</p>
                        <p class="small text-secondary mb-3"><i class="fas fa-percentage me-1"></i> Annual Increment: 5%</p>
                        <a href="property_detail.php" class="btn btn-outline-primary w-100 fw-bold"><i class="fas fa-eye me-1"></i> View Details</a>
                    </div>
                </div>
            </div>

            <!-- Property 2 -->
            <div class="col-md-4">
                <div class="card property-card position-relative h-100">
                    <span class="badge bg-danger badge-status shadow-sm">Rented Out</span>
                    <img src="https://images.unsplash.com/photo-1541123437800-1bb1317badc2?auto=format&fit=crop&w=500&q=80" class="card-img-top" style="height: 220px; object-fit: cover;" alt="Shop">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold">Commercial Retail Shop</h5>
                        <p class="card-text text-muted small mb-2"><i class="fas fa-map-marker-alt text-danger me-1"></i> Gomti Nagar, Lucknow</p>
                        <p class="card-text text-primary fw-bold fs-5 mb-2">₹18,000 / month</p>
                        <p class="small text-secondary mb-3"><i class="fas fa-percentage me-1"></i> Annual Increment: 10%</p>
                        <a href="#" class="btn btn-light text-muted w-100 disabled fw-bold">Rented Out</a>
                    </div>
                </div>
            </div>

            <!-- Property 3 -->
            <div class="col-md-4">
                <div class="card property-card position-relative h-100">
                    <span class="badge bg-success badge-status shadow-sm">Available</span>
                    <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=500&q=80" class="card-img-top" style="height: 220px; object-fit: cover;" alt="Villa">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold">Luxury Independent House</h5>
                        <p class="card-text text-muted small mb-2"><i class="fas fa-map-marker-alt text-danger me-1"></i> Aliganj, Lucknow</p>
                        <p class="card-text text-primary fw-bold fs-5 mb-2">₹25,000 / month</p>
                        <p class="small text-secondary mb-3"><i class="fas fa-percentage me-1"></i> Annual Increment: 7%</p>
                        <a href="property_detail.php" class="btn btn-outline-primary w-100 fw-bold"><i class="fas fa-eye me-1"></i> View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0">&copy; 2026 UrbanNest Portal. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
