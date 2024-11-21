<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

footer {
    background-color: #f8f9fa;
    padding: 40px;
    font-family: Arial, sans-serif;
    border-top: 1px solid #ddd;
}

.footer-container {
    margin:50px;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.footer-column {
    flex: 1;
    min-width: 250px;
    margin: 10px;
}

.footer-column h3 {
    font-size: 18px;
    color: #333;
    font-weight: bold;
}

.footer-column p, 
.footer-column ul, 
.footer-column address {
    margin: 10px 0;
    font-size: 14px;
    color: #666;
}

.footer-column ul {
    list-style: none;
    padding: 0;
}

.footer-column ul li {
    margin-bottom: 8px;
}

.footer-column ul li a {
    color: #333;
    text-decoration: none;
}

.footer-column ul li a:hover {
    color: #007bff;
}

.contact-number {
    font-size: 18px;
    font-weight: bold;
    color: #f0ad4e;
}

.social-icons {
    margin-top: 15px;
}

.social-icons a {
    font-size: 20px;
    margin-right: 10px;
    color: #666;
    text-decoration: none;
}

.social-icons a:hover {
    color: #007bff;
}

.facebook-embed {
    margin-top: 10px;
}

</style>
<body>
<footer>
    <div class="footer-container">
        <div class="footer-column">
            <h3>Contact Us</h3>
            <p>Call or Whatsapp</p>
            <p class="contact-number">03211412323</p>
            <p class="contact-number">03219489214</p>
            <p class="contact-number">03091490870</p>
            <address>
                Office No: 17 3rd Floor Hafeez Centre Main Boulevard Gulberg III Lahore<br>
                amjad@tradelinkspk.com
            </address>
            <div class="social-icons">
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
            </div>
        </div>

        <div class="footer-column">
            <h3>Support</h3>
            <ul>
                <li><a href="#">How To Order</a></li>
                <li><a href="#">Order Tracking</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Return/Exchange</a></li>
                <li><a href="#">Earn Discount</a></li>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Laptop Battery Help</a></li>
                <li><a href="#">Laptop Battery Q&A</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Company</h3>
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Store Location</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>For Updates Like The Page</h3>
            <div class="facebook-embed">
                <!-- Add your Facebook page embed code here -->
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FyourPageName&tabs&width=340&height=70&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="70" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
