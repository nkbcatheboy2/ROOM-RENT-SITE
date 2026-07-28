<?php
include '../config/db.php';
session_start();

if(!isset($_SESSION['admin_logged'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Handle Delete Property
if(isset($_GET['delete_id'])) {
    $del_id = $_GET['delete_id'];
    $conn->query("DELETE FROM properties WHERE id = $del_id");
    header("Location: dashboard.php");
    exit();
}

$prop_result = $conn->query("SELECT * FROM properties ORDER BY id DESC");
$user_count = $conn->query("SELECT COUNT(*) as total FROM users")->fetch_assoc()['total'];
$prop_count = $conn->query("SELECT COUNT(*) as total FROM properties")->fetch_assoc()['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8fafc; font-family: 'Segoe UI', sans-serif; }
        .sidebar { min-height: 100vh; background: #0f172a; color: #fff; position: fixed; width: 250px; }
        .sidebar .nav-link { color: #94a3b8; padding: 12px 20px; margin: 4px 0; border-radius: 6px; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: #3b82f6; color: #fff; }
        .main-content { margin-left: 250px; padding: 30px; }
    </style>
</head>
<body>

    <div class="sidebar p-3 d-flex flex-column justify-content-between">
        <div>
            <h4 class="text-white text-center py-3 fw-bold border-bottom border-secondary"><i class="fas fa-tachometer-alt me-2 text-primary"></i>Admin Panel</h4>
            <ul class="nav flex-column mt-3">
                <li class="nav-item"><a href="dashboard.php" class="nav-link active"><i class="fas fa-home me-2"></i> Dashboard</a></li>
                <li class="nav-item"><a href="add_property.php" class="nav-link"><i class="fas fa-plus-circle me-2"></i> Add Property</a></li>
                <li class="nav-item"><a href="../index.php" class="nav-link"><i class="fas fa-globe me-2"></i> Visit Website</a></li>
            </ul>
        </div>
        <div class="border-top border-secondary pt-3">
            <a href="../auth/logout.php" class="nav-link text-danger"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
        </div>
    </div>

    <div class="main-content">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Admin Control Dashboard</h2>
                <a href="add_property.php" class="btn btn-success fw-bold"><i class="fas fa-plus me-1"></i> Add New Property</a>
            </div>

            <!-- Stats -->
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="card p-3 border-0 shadow-sm border-start border-primary border-4">
                        <p class="text-muted mb-1">Total Users</p>
                        <h3 class="fw-bold mb-0"><?php echo $user_count; ?></h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-3 border-0 shadow-sm border-start border-success border-4">
                        <p class="text-muted mb-1">Total Properties Listed</p>
                        <h3 class="fw-bold mb-0 text-success"><?php echo $prop_count; ?></h3>
                    </div>
                </div>
            </div>

            <!-- Properties Management Table with Edit/Delete Buttons -->
            <div class="card shadow-sm border-0 p-4">
                <h5 class="fw-bold mb-3"><i class="fas fa-building me-2 text-primary"></i>Manage Properties (Edit / Delete / Add)</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#ID</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Rent</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($prow = $prop_result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $prow['id']; ?></td>
                                <td class="fw-bold"><?php echo $prow['title']; ?></td>
                                <td><?php echo $prow['type']; ?></td>
                                <td><?php echo $prow['location']; ?></td>
                                <td class="text-primary fw-bold">₹<?php echo $prow['rent']; ?></td>
                                <td><span class="badge bg-<?php echo ($prow['status'] == 'Available') ? 'success' : 'secondary'; ?>"><?php echo $prow['status']; ?></span></td>
                                <td>
                                    <a href="edit_property.php?id=<?php echo $prow['id']; ?>" class="btn btn-sm btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="dashboard.php?delete_id=<?php echo $prow['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this property?');" title="Delete"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>