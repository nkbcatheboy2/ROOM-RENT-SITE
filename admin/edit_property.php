<?php
include '../config/db.php';
session_start();
if(!isset($_SESSION['admin_logged'])) { header("Location: ../auth/login.php"); exit(); }

$id = $_GET['id'];
$prop = $conn->query("SELECT * FROM properties WHERE id = $id")->fetch_assoc();
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $rent = mysqli_real_escape_string($conn, $_POST['rent']);
    $increment_rate = mysqli_real_escape_string($conn, $_POST['increment_rate']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $sql = "UPDATE properties SET title='$title', type='$type', location='$location', rent='$rent', increment_rate='$increment_rate', status='$status' WHERE id=$id";
    if($conn->query($sql) === TRUE) {
        $msg = "Property updated successfully!";
        $prop = $conn->query("SELECT * FROM properties WHERE id = $id")->fetch_assoc();
    } else {
        $msg = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Property</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5" style="max-width: 700px;">
        <div class="card shadow-sm border-0 p-4 rounded-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Edit Property</h3>
                <a href="dashboard.php" class="btn btn-outline-secondary btn-sm">Back to Dashboard</a>
            </div>
            <?php if(!empty($msg)): ?><div class="alert alert-success"><?php echo $msg; ?></div><?php endif; ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold">Property Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $prop['title']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Property Type</label>
                    <select class="form-select" name="type" required>
                        <option value="Room" <?php if($prop['type']=='Room') echo 'selected'; ?>>Room</option>
                        <option value="Shop" <?php if($prop['type']=='Shop') echo 'selected'; ?>>Shop</option>
                        <option value="2BHK" <?php if($prop['type']=='2BHK') echo 'selected'; ?>>2BHK House</option>
                        <option value="3BHK House" <?php if($prop['type']=='3BHK House') echo 'selected'; ?>>3BHK House</option>
                        <option value="3BHK + S" <?php if($prop['type']=='3BHK + S') echo 'selected'; ?>>3BHK + S</option>
                        <option value="Goudam" <?php if($prop['type']=='Goudam') echo 'selected'; ?>>Goudam</option>
                        <option value="4BHK House" <?php if($prop['type']=='4BHK House') echo 'selected'; ?>>4BHK House</option>
                        <option value="Villa" <?php if($prop['type']=='Villa') echo 'selected'; ?>>Villa</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Location</label>
                    <input type="text" class="form-control" name="location" value="<?php echo $prop['location']; ?>" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Monthly Rent (₹)</label>
                        <input type="number" class="form-control" name="rent" value="<?php echo $prop['rent']; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Annual Increment (%)</label>
                        <input type="text" class="form-control" name="increment_rate" value="<?php echo $prop['increment_rate']; ?>" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Status</label>
                    <select class="form-select" name="status">
                        <option value="Available" <?php if($prop['status']=='Available') echo 'selected'; ?>>Available</option>
                        <option value="Rented Out" <?php if($prop['status']=='Rented Out') echo 'selected'; ?>>Rented Out</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Update Property</button>
            </form>
        </div>
    </div>
</body>
</html>