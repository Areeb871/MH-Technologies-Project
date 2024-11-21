<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Popup</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
/* General body styling */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
}

* {
  box-sizing: border-box;
}

.chat-icon {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background-color: #077EED;
  color: #fff;
  padding: 15px;
  border-radius: 50%;
  cursor: pointer;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  transition: background-color 0.3s ease, transform 0.3s ease;
}

.chat-icon:hover {
  background-color:#077EED ;
  transform: scale(1.1);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
}

.chat-icon i {
  font-size: 24px;
}

/* Chat Popup */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 80px;
  right: 20px;
  width: 400px;
  background-color: #fff;
  border-radius: 16px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
  z-index: 1000;
  opacity: 0;
  transform: translateY(20px);
  transition: all 0.3s ease;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .chat-popup {
    width: 90%; /* Full width on small screens */
    right: 5%;
    bottom: 100px;
    overflow: hidden; /* Prevent overflow */
  }


  /* Show only the close button in header */
  .chat-header h3 {
     /* Hide title on mobile */
  }
  .chat-header {
  padding: 30px;
}
}

@media (max-width: 480px) {
  .chat-popup {
    width: 90%; /* Full width on extra small screens */
    right: 5%;
  }
}
/* Make popup visible with smooth transition */
.chat-popup.show {
  display: block;
  opacity: 1;
  transform: translateY(0);
}

/* Chat Header */
.chat-header {
  background-color: #077EED;
  color: #fff;
  padding: 10px;
  border-radius: 16px 16px 0 0;
  text-align: center;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}

.chat-header h3 {
  margin: 0;
  font-size: 20px;
  flex-grow: 1;
  text-align: center;
  color:white;
}

/* Close button */
.close-popup {
  color: white;
  font-size: 24px;
  cursor: pointer;
  position: absolute;
  top: 6px;
  right: 15px;
}

/* Chat Body */
.chat-body {
  padding: 0px;
  text-align: center;
}


/* Recent Conversations */
.recent-conversations {
  background-color: #f1f1f1;
  padding: 15px;
  border-radius: 12px;
  margin-bottom: 20px;
}

.recent-conversations p {
  margin: 5px 0;
}
/* Form styling */
form {
  display: flex;
  flex-direction: column;
  align-items: center;
}
form .form-control1 {
  width: 90%;
  padding: 10px;
  margin-bottom: 15px;
  border-radius: 6px;
  border: 1px solid #ccc;
  font-size: 14px;
}

form .form-control1:focus {
  outline: none;
  border-color: #007bff;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

form .btn-primary1 {
  width: 100%;
  padding: 12px;
  background-color: #077EED; /* Default background color */
  color: white; /* Keep text color white */
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s ease;
}
</style>
<body>
  <!-- Chat Icon -->
  <div class="chat-icon">
    <i class="fas fa-comment-dots" onclick="togglePopup()"></i>
  </div>

  <!-- Chat Popup -->
  <div id="chatPopup" class="chat-popup">
    <div class="chat-header">
      <h3>Contact Us</h3>
      <span class="close-popup" onclick="togglePopup()">&times;</span>
    </div>
    <div class="chat-body">
      <p>We'll respond as soon as we can.</p>
      <div class="recent-conversations">
        <p><strong>MH TECHNOLOGIES</strong></p>
        <p>Let me know if you have any questions!</p>
      </div>

      <!-- Form starts here -->
      <form action="{{ route('form.store') }}" method="post" data-aos="fade-up" data-aos-delay="200" enctype="multipart/form-data"class="aos-init aos-animate">
        @csrf
        <input type="text" name="first_name" class="form-control1" placeholder="Your Name" required="">
        <input type="email" name="email" class="form-control1" placeholder="Your Email" required="">
        <textarea name="message" class="form-control1" placeholder="Your Message" required=""></textarea>
        <button type="submit" 
        class="btn btn-primary1" 
        style="background-color: #007bff; color: white; border: none; transition: background-color 0.3s, color 0.3s;"
        onmouseover="this.style.backgroundColor='#007bff'; this.style.color='white';" 
        onmouseout="this.style.backgroundColor='#007bff'; this.style.color='white';">
    Send Message
</button>
      </form>
    </div>
  </div>
  <script>
    // Smooth toggle for the popup
    function togglePopup() {
      const popup = document.getElementById('chatPopup');
      popup.classList.toggle('show');
    }
  </script>
</body>
</html>
