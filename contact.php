


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>New ex</title>
  <!-- ✅ Bootstrap 5.3.2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- ✅ Bootstrap 5.3.2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

  <style>
    .navbar {
      background-color: #3f1f1f;
    }

    .sbtn {
      background: #4ead97;
      color: white;
    }

    .text-color {
      color: #fff
    }

     body {
      font-family: Arial, sans-serif;
      background-color: #d9f0f0;
      margin: 0;
      padding: 0;
    }
    .support-container {
      background-color: #fff;
      border-radius: 10px;
      margin: 40px auto;
      max-width: 1200px;
      padding: 30px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .left-box {
      border-right: 1px solid #ddd;
    }
    .support-title {
      font-size: 2.5rem;
      font-weight: bold;
    }
    .btn-chat, .btn-whatsapp {
      margin-top: 15px;
      margin-right: 10px;
      font-weight: bold;
    }
    .btn-chat {
      background-color: #000;
      color: #fff;
    }
    .btn-whatsapp {
      background-color: #fff;
      border: 1px solid #ccc;
    }
    .btn-chat:hover {
      background-color: #333;
    }
    .btn-whatsapp:hover {
      background-color: #eee;
    }
    .image-box {
      text-align: right;
    }
    .guide-name {
      font-size: 0.9rem;
      color: #555;
    }
  </style>
  </head>
  <body style="margin:0; font-family: 'Poppins', sans-serif; background-color:#fdfdfd; color:#333;">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <img src="ragita2.png" alt="logo" height="10%" width="10%">
      <div class="ms-auto">
        <ul class="navbar-nav d-flex flex-row gap-4">
          <li class="nav-item">
            <a class="nav-link text-white fw-semibold" href="index.html">SkinCare</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-semibold" href="Makeup.html">Makeup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-semibold" href="bodycare.html">BodyCare</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-semibold" href="lifestyle.html">LifeStyle</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-semibold" href="Accessories.html">Accessories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-semibold" href="contact.php">Contact</a>
          </li>
          <div class="container-fluid">
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="sbtn" type="submit">Search</button>
            </form>
          </div>
        </ul>
      </div>
    </div>
  </nav>
<!--  -->
  <?php
// 🧠 DB connection variables
$host = "localhost";      // usually localhost
$user = "root";           // your DB username
$pass = "";               // your DB password (empty in XAMPP)
$dbname = "lifestyle_db"; // your database name

// ✅ Connect to DB
$conn = new mysqli($host, $user, $pass, $dbname);

// ❌ Check connection
if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}

// ✅ Form handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $message = htmlspecialchars($_POST["message"]);

  // Save to DB
  $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $message);

  if ($stmt->execute()) {
   echo "<div style='background:#d4edda; color:#155724; padding:15px; border-radius:5px; margin:20px auto; max-width:600px; font-family:Poppins, sans-serif;'>
          ✅ Thank you, <strong>$name</strong>. Your message has been received. We’ll get back to you soon!
        </div>";
  } else {
    echo "<div style='background:#f8d7da; color:#721c24; padding:15px; border-radius:5px; margin:20px auto; max-width:600px; font-family:Poppins, sans-serif;'>
            ❌ Sorry, there was an error saving your message.
          </div>";
  }

  $stmt->close();
}
?>

<!--  -->


<div class="container mt-5">
    <div class="row align-items-center">
      <div class="col-md-8">
        <img src="ragita2.png" alt="GoDaddy Guides" height="35">
        <h1 class="support-title mt-3">We're here to help 24/7</h1>
        <p>"Our beauty experts are always ready to guide you—whether you’re looking for skincare tips, makeup advice, or lifestyle inspiration to glow every day."</p>
      </div>
      <div class="col-md-4 image-box">
        <img src="https://images.picxy.com/cache/2020/7/2/7b74217d269c5894462280623796cdf2.jpg" alt="Support Agent" class="img-fluid" style="max-height: 200px;">
        <div class="guide-name mt-2 text-end">Enkidu D.<br>Raghita</div>
      </div>
    </div>

    <div class="support-container row mt-4">
      <!-- Call Us -->
      <div class="col-md-6 left-box">
        <h4>Call Us</h4>
        <p><strong>Contact our award-winning support team</strong><br>
        <a href="tel:04067607600">040-67607600</a><br>
        Everyday 9:00 am - 7:00 pm.</p>
        <p><strong>Global Directory</strong><br>
        <a href="#">Phone numbers and hours</a></p>
      </div>

      <!-- Chat Now -->
      <div class="col-md-6">
        <h4>Chat Now</h4>
        <p>Chat for quick help on product issues, your account, and more.</p>
        <button class="btn btn-chat"><i class="bi bi-chat-dots"></i> Start Chatting</button>
        <button class="btn btn-whatsapp"><i class="bi bi-whatsapp"></i> WhatsApp</button>
        <p class="mt-3">Hours: 24x7 Chat</p>
      </div>
    </div>
  </div>

  <!--  -->

  <!-- ✅ Contact Header Section -->
  <section style="background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1620912189866-bf10f1e21409?auto=format&fit=crop&w=1200&q=80'); background-size:cover; background-position:center; padding:80px 20px; text-align:center; color:#fff;">
    <h1 style="font-size:3rem; margin-bottom:10px;">Contact Us</h1>
    <p style="font-size:1.2rem;">We’re here to help with all your beauty, fashion & lifestyle needs.</p>
  </section>

  <!-- ✅ Contact Info -->
  <section style="max-width:900px; margin: 2rem auto; padding: 0 1rem;">
    <div style="text-align:center; margin-bottom:30px;">
      <p><strong>📍 Location:</strong> Office No. A101/A102, S N - 26/2B, Kensination Court, P. No - 345, Lane No. 5, Koregaon Park, Pune, Maharashtra, India, 411001.</p>
      <p><strong>📧 Email:</strong> xyz@gmail.com</p>
      <p><strong>📞 Phone:</strong> +91 98765 43210</p>
      <div style="margin-top:15px;">
        <a href="#" style="margin:0 10px; text-decoration:none; font-size:20px;">🌐</a>
        <a href="#" style="margin:0 10px; text-decoration:none; font-size:20px;">📸</a>
        <a href="#" style="margin:0 10px; text-decoration:none; font-size:20px;">📘</a>
      </div>
    </div>

    <!-- ✅ Contact Form -->
    <form method="POST" action="" style="background:#fff; padding:30px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
      <div style="margin-bottom:15px;">
        <label style="display:block; margin-bottom:5px;">Name</label>
        <input type="text" name="name" required style="width:100%; padding:12px; border:1px solid #ccc; border-radius:5px;">
      </div>

      <div style="margin-bottom:15px;">
        <label style="display:block; margin-bottom:5px;">Email</label>
        <input type="email" name="email" required style="width:100%; padding:12px; border:1px solid #ccc; border-radius:5px;">
      </div>

      <div style="margin-bottom:15px;">
        <label style="display:block; margin-bottom:5px;">Message</label>
        <textarea name="message" rows="5" required style="width:100%; padding:12px; border:1px solid #ccc; border-radius:5px;"></textarea>
      </div>

      <button type="submit" style="padding:12px 25px; background-color:#e06b4f; color:white; border:none; border-radius:5px; font-weight:600; cursor:pointer;">
        ✉️ Send Message
      </button>
    </form>
  </section>

<!--  -->



    <!-- Back to Top Button -->
<a href="#top" class="btn btn-outline-secondary position-fixed bottom-0 end-0 m-4" style="z-index:999;">
  ↑ Top
</a>
  <!-- Footer -->
  <footer style="background-color: rgb(10, 2, 41); color: rgb(165, 78, 7); padding: 40px 0;">
    <div class="container">
      <div class="row mb-5 gy-4">
        <!-- Subscribe -->
        <div class="col-lg-3 col-md-6 col-12">
          <h5>Subscribe to receive exciting offers!</h5>
          <form class="d-flex mt-3">
            <input type="email" class="form-control me-2" placeholder="Your email address">
            <button class="btn btn-outline-light" type="submit">
              <i class="bi bi-envelope"></i>
            </button>
          </form>
          <div class="mt-4 text-white">
            <strong>DEMIFINE FASHION PVT LTD</strong>
            <p style="font-size: 14px;">
              <i class="bi bi-geo-alt"></i> Office No. A101/A102, S N - 26/2B, Kensination Court, P. No - 345, Lane No.
              5, Koregaon Park, Pune, Maharashtra, India, 411001.<br>
              <i class="bi bi-telephone"></i> +91 0000005645<br>
              <i class="bi bi-envelope"></i> xyz@gmail.com
            </p>
          </div>
        </div>

        <!-- Vertical Divider (Large screens only) -->
        <div class="d-none d-lg-block col-lg-1">
          <div style="border-left: 3px solid rgb(165, 78, 7); height: 100%;"></div>
        </div>

        <!-- Policy -->
        <div class="col-lg-2 col-md-6 col-6">
          <h5>Policy</h5>
          <ul class="list-unstyled small">
            <li><a href="#" class="text-white text-decoration-none">Shipping & Delivery</a></li>
            <li><a href="#" class="text-white text-decoration-none">Return & Exchange</a></li>
            <li><a href="#" class="text-white text-decoration-none">Lifetime Warranty</a></li>
            <li><a href="#" class="text-white text-decoration-none">BuyBack Policy</a></li>
            <li><a href="#" class="text-white text-decoration-none">Payment Policy</a></li>
            <li><a href="#" class="text-white text-decoration-none">Grievance Redressal</a></li>
          </ul>
        </div>

        <!-- Vertical Divider (Large screens only) -->
        <div class="d-none d-lg-block col-lg-1">
          <div style="border-left: 3px solid rgb(165, 78, 7); height: 100%;"></div>
        </div>

        <!-- Help -->
        <div class="col-lg-2 col-md-6 col-6">
          <h5>Help</h5>
          <ul class="list-unstyled small">
            <li><a href="#" class="text-white text-decoration-none">FAQ's</a></li>
            <li><a href="#" class="text-white text-decoration-none">Contact Us</a></li>
            <li><a href="#" class="text-white text-decoration-none">Terms of Service</a></li>
            <li><a href="#" class="text-white text-decoration-none">Privacy Policy</a></li>
            <li><a href="#" class="text-white text-decoration-none">Track Order</a></li>
          </ul>
        </div>

        <!-- Vertical Divider (Large screens only) -->
        <div class="d-none d-lg-block col-lg-1">
          <div style="border-left: 3px solid rgb(165, 78, 7); height: 100%;"></div>
        </div>

        <!-- About Us -->
        <div class="col-lg-2 col-md-6 col-12">
          <h5>About Us</h5>
          <ul class="list-unstyled small">
            <li><a href="services..html" class="text-white text-decoration-none">Services</a></li>
            <li><a href="skincare.html" class="text-white text-decoration-none">Skincare</a></li>
            <li><a href="contact.html" class="text-white text-decoration-none">Contact</a></li>
            <li><a href="lifestyle.html" class="text-white text-decoration-none">Stores</a></li>
          </ul>
        </div>
      </div>

      <!-- Horizontal line -->
      <hr class="border-light mb-4">

      <!-- Bottom Row -->
      <div class="row align-items-center text-center text-md-start gy-3">
        <div class="col-md-4">
          <a href="#"><i class="bi bi-facebook text-white fs-4 me-3"></i></a>
          <a href="#"><i class="bi bi-instagram text-white fs-4 me-3"></i></a>
          <a href="#"><i class="bi bi-linkedin text-white fs-4 me-3"></i></a>
          <a href="#"><i class="bi bi-youtube text-white fs-4"></i></a>
        </div>
        <div class="col-md-4 text-center">
          <p class="mb-0 small">All Rights Reserved © Raghita</p>
          <p class="mb-0 small">Annual Returns 2025–26</p>
        </div>
        <div class="col-md-4 text-md-end text-center" style="cursor: pointer;">
          <img src="https://img.icons8.com/color/48/000000/paytm.png" style="height: 30px; margin-left: 10px;"
            alt="Paytm">
          <img src="https://img.icons8.com/color/48/000000/google-pay.png" style="height: 30px; margin-left: 10px;"
            alt="Google Pay">
          <img src="https://img.icons8.com/color/48/000000/visa.png" style="height: 30px; margin-left: 10px;"
            alt="Visa">
          <img src="https://img.icons8.com/color/48/000000/paypal.png" style="height: 30px; margin-left: 10px;"
            alt="Paypal">
        </div>
      </div>
    </div>
    <!-- button -->
    <div class="col-12 d-flex justify-content-center gap-3" style="padding-top: 17px;">
      <a href="#" class="btn btn-outline-light btn-lg me-2">
        <i class="bi bi-apple"></i> Download
      </a>
      <a href="#" class="btn btn-outline-light btn-lg">
        <i class="bi bi-google-play"></i> Download
      </a>
    </div>
  </footer>

  
</body>
</html>
