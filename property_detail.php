<?php
// property_detail.php
include 'config/db.php';
?>
<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>प्रॉपर्टी विवरण - Rental Portal</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .property-img { border-radius: 10px; object-fit: cover; height: 350px; width: 100%; }
        .thumbnail-img { width: 80px; height: 60px; object-fit: cover; border-radius: 6px; cursor: pointer; opacity: 0.7; transition: 0.3s; }
        .thumbnail-img:hover, .thumbnail-img.active { opacity: 1; border: 2px solid #0d6efd; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php"><i class="fas fa-home me-2"></i>RentalPortal</a>
            <a href="index.php" class="btn btn-light btn-sm text-primary fw-bold"><i class="fas fa-arrow-left me-1"></i> पीछे जाएं</a>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container my-5">
        <div class="row g-4">
            
            <!-- Left Side: Images & Details -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 p-4 bg-white rounded-3">
                    <!-- Main Image -->
                    <div class="mb-3">
                        <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=800&q=80" class="property-img shadow-sm" alt="Property Image" id="mainImage">
                    </div>
                    <!-- Thumbnails for 2-3 photos -->
                    <div class="d-flex gap-2 mb-4">
                        <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=200&q=80" class="thumbnail-img active" onclick="changeImage(this)">
                        <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=200&q=80" class="thumbnail-img" onclick="changeImage(this)">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=200&q=80" class="thumbnail-img" onclick="changeImage(this)">
                    </div>

                    <h2 class="fw-bold text-dark">शानदार 2BHK रेजिडेंशियल फ्लैट</h2>
                    <p class="text-muted mb-3"><i class="fas fa-map-marker-alt text-danger me-1"></i> हजरतगंज, मुख्य मार्ग के पास, लखनऊ</p>
                    
                    <hr>

                    <div class="row text-center my-3 bg-light p-3 rounded-3">
                        <div class="col-4 border-end">
                            <span class="text-muted small d-block">मासिक किराया</span>
                            <h5 class="fw-bold text-primary mb-0">₹12,000 / महीना</h5>
                        </div>
                        <div class="col-4 border-end">
                            <span class="text-muted small d-block">वार्षिक वृद्धि</span>
                            <h5 class="fw-bold text-dark mb-0">5% प्रति वर्ष</h5>
                        </div>
                        <div class="col-4">
                            <span class="text-muted small d-block">स्थिति</span>
                            <span class="badge bg-success mt-1">Available (उपलब्ध)</span>
                        </div>
                    </div>

                    <h5 class="fw-bold text-secondary mt-4">प्रॉपर्टी विवरण</h5>
                    <p class="text-muted">यह फ्लैट हवादार और पूरी तरह से फिनिश किया हुआ है। इसमें 2 बेडरूम, 1 किचन, आधुनिक बाथरूम और पानी-बिजली की 24 घंटे सुविधा उपलब्ध है। परिवार के रहने के लिए यह एकदम उत्तम स्थान है।</p>
                </div>
            </div>

            <!-- Right Side: Contact / Inquiry Form -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 p-4 bg-white rounded-3 sticky-top" style="top: 20px;">
                    <h5 class="fw-bold text-dark mb-3"><i class="fas fa-phone-alt text-primary me-2"></i>मालिक से संपर्क करें</h5>
                    <p class="small text-muted mb-3">इस प्रॉपर्टी को किराए पर लेने या विजिट करने के लिए नीचे दिया गया फॉर्म भरें।</p>
                    
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">आपका पूरा नाम</label>
                            <input type="text" class="form-control" placeholder="नाम लिखें" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">मोबाइल नंबर</label>
                            <input type="text" class="form-control" placeholder="10 अंकों का मोबाइल नंबर" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">संदेश / पूछताछ</label>
                            <textarea class="form-control" rows="3" placeholder="मुझे यह कमरा पसंद है...">मैं इस प्रॉपर्टी को देखना चाहता हूँ।</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold"><i class="fas fa-paper-plane me-1"></i> इंक्वायरी भेजें</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- JavaScript for Image Switcher -->
    <script>
        function changeImage(element) {
            document.getElementById('mainImage').src = element.src;
            let thumbs = document.querySelectorAll('.thumbnail-img');
            thumbs.forEach(thumb => thumb.classList.remove('active'));
            element.classList.add('active');
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
