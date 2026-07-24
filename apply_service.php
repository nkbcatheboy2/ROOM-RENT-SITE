<?php
// apply_service.php
include 'config/db.php';

$success_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $service_type = $_POST['service_type'];
    $amount = $_POST['required_amount'];
    $details = $_POST['details'];

    // डेटाबेस में सेव करने का लॉजिक यहाँ आएगा
    if (!empty($name) && !empty($phone)) {
        $success_msg = "आपका आवेदन सफलतापूर्वक जमा हो गया है! हमारी टीम जल्द ही आपसे संपर्क करेगी।";
    }
}
?>
<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>लोन और वित्तीय सेवाएं - RentalPortal</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php"><i class="fas fa-home me-2"></i>RentalPortal</a>
            <a href="index.php" class="btn btn-light btn-sm text-primary fw-bold"><i class="fas fa-arrow-left me-1"></i> होम पर जाएं</a>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 p-4 bg-white rounded-3">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-dark"><i class="fas fa-hand-holding-usd text-primary me-2"></i>लोन और वित्तीय सहायता फॉर्म</h3>
                        <p class="text-muted small">मैरिज लोन, होम लोन या अन्य वित्तीय जरूरतों के लिए आवेदन करें</p>
                    </div>

                    <?php if (!empty($success_msg)): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i> <?php echo $success_msg; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small">पूरा नाम</label>
                                <input type="text" class="form-control" name="full_name" placeholder="अपना नाम लिखें" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small">मोबाइल नंबर</label>
                                <input type="text" class="form-control" name="phone" placeholder="10 अंकों का नंबर" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small">किस सेवा के लिए आवेदन कर रहे हैं?</label>
                                <select class="form-select" name="service_type" required>
                                    <option value="" selected disabled>चुनें...</option>
                                    <option value="Marriage Loan">मैरिज लोन (Marriage Loan)</option>
                                    <option value="Home Loan">होम/प्रॉपर्टी लोन</option>
                                    <option value="Personal Loan">पर्सनल लोन</option>
                                    <option value="Other">अन्य वित्तीय सेवा</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small">आवश्यक राशि (₹)</label>
                                <input type="number" class="form-control" name="required_amount" placeholder="जैसे: 200000" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small">अतिरिक्त विवरण या आवश्यकता</label>
                                <textarea class="form-control" name="details" rows="3" placeholder="अपनी जरूरत के बारे में थोड़ा विस्तार से बताएं..."></textarea>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold"><i class="fas fa-paper-plane me-2"></i>आवेदन जमा करें</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
