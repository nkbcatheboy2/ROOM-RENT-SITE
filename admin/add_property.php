<?php
include '../config/db.php';
session_start();
if(!isset($_SESSION['admin_logged'])) { header("Location: ../auth/login.php"); exit(); }

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $rent = mysqli_real_escape_string($conn, $_POST['rent']);
    $increment_rate = mysqli_real_escape_string($conn, $_POST['increment_rate']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Multiple Images Upload
    $uploaded_images = [];
    $target_dir = "../assets/uploads/";
    if(!is_dir($target_dir)) { mkdir($target_dir, 0777, true); }

    foreach($_FILES['images']['name'] as $key => $val) {
        $img_name = time() . '_' . basename($_FILES['images']['name'][$key]);
        $target_file = $target_dir . $img_name;
        if(move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file)) {
            $uploaded_images[] = $img_name;
        }
    }
    $images_str = implode(',', $uploaded_images);

    $sql = "INSERT INTO properties (title, type, location, rent, increment_rate, status, images) VALUES ('$title', '$type', '$location', '$rent', '$increment_rate', '$status', '$images_str')";
    if($conn->query($sql) === TRUE) {
        $msg = "Property added successfully!";
    } else {
        $msg = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Property</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5" style="max-width: 700px;">
        <div class="card shadow-sm border-0 p-4 rounded-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Add New Property</h3>
                <a href="dashboard.php" class="btn btn-outline-secondary btn-sm">Back to Dashboard</a>
            </div>
            <?php if(!empty($msg)): ?><div class="alert alert-success"><?php echo $msg; ?></div><?php endif; ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label fw-bold">Property Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Property Type</label>
                    <select class="form-select" name="type" required>
                        <option value="Room">Room</option>
                        <option value="Shop">Shop</option>
                        <option value="2BHK">2BHK House</option>
                        <option value="3BHK House">3BHK House</option>
                        <option value="3BHK + S">3BHK + S</option>
                        <option value="Goudam">Goudam</option>
                        <option value="4BHK House">4BHK House</option>
                        <option value="Villa">Villa</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Location (Area, City)</label>
                    <input type="text" class="form-control" name="location" placeholder="e.g. Hazratganj, Lucknow" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Monthly Rent (₹)</label>
                        <input type="number" class="form-control" name="rent" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Annual Increment (%)</label>
                        <input type="text" class="form-control" name="increment_rate" placeholder="e.g. 5%" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Status</label>
                    <select class="form-select" name="status">
                        <option value="Available">Available</option>
                        <option value="Rented Out">Rented Out</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Upload Photos (Select 2-3 images)</label>
                    <input type="file" class="form-control" name="images[]" multiple accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Save Property</button>
            </form>
        </div>
    </div>
</body>
</html>