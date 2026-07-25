<?php
include 'config/db.php';
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $event_date = $_POST['event_date'];
    $venue_type = $_POST['venue_type'];
    $message = trim($_POST['message']);

    $sql = "INSERT INTO marriage_bookings (name, phone, event_date, venue_type, message) VALUES ('$name', '$phone', '$event_date', '$venue_type', '$message')";
    if($conn->query($sql) === TRUE) {
        $msg = "Marriage Lawn booking request submitted successfully!";
    } else {
        $msg = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marriage Lawn Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>body { background-color: #f8fafc; font-family: 'Segoe UI', sans-serif; }</style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php"><i class="fas fa-city me-2 text-warning"></i>UrbanNest</a>
            <a href="index.php" class="btn btn-outline-light btn-sm"><i class="fas fa-arrow-left me-1"></i> Back to Home</a>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-sm border-0 p-4 bg-white rounded-4">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-dark"><i class="fas fa-ring text-warning me-2"></i>Marriage Lawn Booking</h3>
                        <p class="text-muted small">Book verified wedding lawns and banquet halls for your events.</p>
                    </div>

                    <?php if (!empty($msg)): ?><div class="alert alert-success"><?php echo $msg; ?></div><?php endif; ?>

                    <form action="" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Full Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Mobile Number</label>
                                <input type="text" class="form-control" name="phone" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Event Date</label>
                                <input type="date" class="form-control" name="event_date" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Select Venue Type</label>
                                <select class="form-select" name="venue_type" required>
                                    <option value="" selected disabled>Choose venue...</option>
                                    <option value="Grand Marriage Lawn">Grand Marriage Lawn</option>
                                    <option value="AC Banquet Hall">AC Banquet Hall</option>
                                    <option value="Party Lawn & Resort">Party Lawn & Resort</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Additional Message</label>
                                <textarea class="form-control" name="message" rows="3"></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-warning w-100 py-2 fw-bold text-dark shadow-sm">Submit Booking Request</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
