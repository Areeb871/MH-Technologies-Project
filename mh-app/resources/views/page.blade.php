<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Popup</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
</head>
<style>
/* General body styling */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
}

/* Ensure all elements respect padding and borders */
* {
  box-sizing: border-box;
}

/* Chat Icon */
.chat-icon {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background-color: #007bff;
  color: #fff;
  padding: 15px;
  border-radius: 50%;
  cursor: pointer;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  transition: background-color 0.3s ease, transform 0.3s ease; /* Added transition for transform */
}

/* Icon hover effect */
.chat-icon:hover {
  background-color: #0056b3; /* Darker background on hover */
  transform: scale(1.1); /* Scale up the icon on hover */
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Increased shadow on hover */
}

.chat-icon i {
  font-size: 24px; /* Font size for the icon */
}

/* Chat Popup */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 80px;
  right: 20px;
  width: 400px; /* Increased width */
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
    width: 350px; /* Adjusted width for medium screens */
    bottom: 60px;
  }
}

@media (max-width: 480px) {
  .chat-popup {
    width: 90%; /* Full width on small screens */
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
  background-color: #007bff;
  color: #fff;
  padding: 0px;
  border-radius: 16px 16px 0 0;
  text-align: center;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}

.chat-header h3 {
  margin: 0;
  font-size: 22px; /* Increased font size for better visibility */
  flex-grow: 1;
  text-align: center;
}

/* Close button */
.close-popup {
  color: white;
  font-size: 24px;
  cursor: pointer;
  position: absolute;
  top: 15px;
  right: 15px;
}

/* Chat Body */
.chat-body {
  padding: 20px;
  text-align: center;
}

.avatar img {
  width: 80px; /* Increased avatar size */
  border-radius: 50%;
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

form .form-control {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border-radius: 6px;
  border: 1px solid #ccc;
  font-size: 14px;
}

form .form-control:focus {
  outline: none;
  border-color: #007bff;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Button styling */
form .btn-primary {
  width: 100%;
  padding: 14px; /* Increased padding for better click area */
  background-color: #007bff; /* Main button color */
  color: white; /* Text color */
  border: none; /* Remove default border */
  border-radius: 12px; /* Adjusted border radius for a smoother look */
  cursor: pointer; /* Pointer cursor on hover */
  font-size: 18px; /* Increased font size for better readability */
  font-weight: bold; /* Bold text for emphasis */
  transition: background-color 0.3s ease, transform 0.2s ease; /* Added transition for transform */
}

form .btn-primary:hover {
  background-color: #0056b3; /* Darker shade on hover */
  transform: translateY(-2px); /* Slightly lift button on hover */
}

form .btn-primary:active {
  transform: translateY(0); /* Reset button position on click */
}

</style>
<body>

  <!-- Chat Icon -->
  <div class="chat-icon">
    <i class="fas fa-comments" onclick="togglePopup()"></i>
  </div>

  <!-- Chat Popup -->
  <div id="chatPopup" class="chat-popup">
    <div class="chat-header">
      <h3>Contact Us</h3>
      <span class="close-popup" onclick="togglePopup()">&times;</span>
    </div>
    <div class="chat-body">
      <div class="avatar">
      </div>
      <p>We'll respond as soon as we can.</p>
      <div class="recent-conversations">
        <p><strong>MH TECHNOLOGIES</strong></p>
        <p>Let me know if you have any questions!</p>
      </div>

      <!-- Form starts here -->
      <form action="{{ route('form.store') }}" method="post" data-aos="fade-up" data-aos-delay="200">
        @csrf
        <input type="text" name="first_name" class="form-control" placeholder="Your Name" required="">
        <input type="email" name="email" class="form-control" placeholder="Your Email" required="">
        <textarea name="message" class="form-control" placeholder="Your Message" required=""></textarea>
        <button type="submit" class="btn btn-primary">Send Message</button>
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
