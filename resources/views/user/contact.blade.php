
<div class="contact_us_6">
  <style>
    .contact_us_6 * {
      font-family: Nunito, sans-serif;
    }
    .contact_us_6 .text-blk {
      margin: 0;
      line-height: 25px;
    }
    .contact_us_6 .responsive-cell-block {
      min-height: 75px;
    }
    .contact_us_6 input:focus,
    .contact_us_6 textarea:focus {
      outline: none;
      border-color: #03a9f4;
    }
    .contact_us_6 .container-block {
      min-height: 75px;
      width: 100%;
      padding: 10px;
      display: block;
    }
    .contact_us_6 .form-wrapper {
      background-color: white;
      max-width: 450px;
      text-align: center;
      padding: 50px 40px;
      box-shadow: rgba(0, 0, 0, 0.05) 0px 4px 20px 7px;
      border-radius: 6px;
      margin: 90px 0 60px 0;
    }
    .contact_us_6 .contactus-head {
      font-size: 36px;
      line-height: 52px;
      font-weight: 900;
    }
    .contact_us_6 .input {
      width: 100%;
      height: 50px;
      padding: 1px 15px;
      border: 2px solid #eeeeee;
      font-size: 16px;
      color: black;
      transition: border-color 0.3s ease;
    }
    .contact_us_6 .textinput {
      width: 98%;
      min-height: 150px;
      padding: 20px 15px;
      border: 2px solid #eeeeee;
      font-size: 16px;
    }
    .contact_us_6 .submit-btn {
      width: 98%;
      background-color: #03a9f4;
      height: 60px;
      font-size: 20px;
      font-weight: 700;
      color: white;
      border: none;
      border-radius: 40px;
    }
    .contact_us_6 .map-box {
      width: 100%;
      height: 320px;
    }
  </style>

  <div class="responsive-container-block container">
    <form class="form-box">
      <div class="form-wrapper">
        <p class="contactus-head">Get in Touch</p>
        <div class="responsive-container-block">
          <div class="responsive-cell-block" id="firstNameBlock">
            <p class="text-blk input-title">FIRST NAME</p>
            <input class="input" id="firstName" name="FirstName" placeholder="Please enter first name...">
          </div>
          <div class="responsive-cell-block" id="emailBlock">
            <p class="text-blk input-title">EMAIL</p>
            <input class="input" id="email" name="Email" placeholder="Please enter email...">
          </div>
          <div class="responsive-cell-block" id="phoneBlock">
            <p class="text-blk input-title">PHONE NUMBER</p>
            <input class="input" id="phone" name="PhoneNumber" placeholder="Please enter phone number...">
          </div>
          <div class="responsive-cell-block" id="queryBlock">
            <p class="text-blk input-title">WHAT DO YOU HAVE IN MIND?</p>
            <textarea class="textinput" id="query" placeholder="Please enter query..."></textarea>
          </div>
        </div>
        <button type="submit" class="submit-btn">Submit</button>
      </div>
    </form>

    <div class="responsive-cell-block" id="contactInfo">
      <div class="map-part">
        <p class="text-blk map-contactus-head">Reach us at</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Felis diam lectus sapien.</p>
        <div class="social-media-links">
          <a href="#"><img class="link-img" src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-twitter.png"></a>
          <a href="#"><img class="link-img" src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-facebook.png"></a>
          <a href="#"><img class="link-img" src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-instagram.png"></a>
          <a href="#"><img class="link-img" src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-linkedin.png"></a>
        </div>
      </div>
      <div class="map-box" id="map"></div>
    </div>
  </div>
</div>
<script async src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap"></script>
<script>
  // Initialize Google Maps
  function initMap() {
    const location = { lat: 12.9716, lng: 77.5946 }; // Coordinates for Bengaluru, you can update this as needed
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 12,
      center: location,
    });
    new google.maps.Marker({
      position: location,
      map: map,
    });
  }

  // Add event listeners for live feedback on form inputs
  document.getElementById("firstName").addEventListener("input", function() {
    this.style.borderColor = this.value ? "#03a9f4" : "#eeeeee";
  });
  document.getElementById("email").addEventListener("input", function() {
    this.style.borderColor = this.value ? "#03a9f4" : "#eeeeee";
  });
  document.getElementById("phone").addEventListener("input", function() {
    this.style.borderColor = this.value ? "#03a9f4" : "#eeeeee";
  });
  document.getElementById("query").addEventListener("input", function() {
    this.style.borderColor = this.value ? "#03a9f4" : "#eeeeee";
  });
</script>

<!-- Load Google Maps API -->


