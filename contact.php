<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

<?php
    $showCaptchaError = "none";
    $messageSent = "none";

    if(isset($_GET['message'])){
        if($_GET['message'] == "captcha_failed"){
            $showCaptchaError = "block";
        }elseif($_GET['message'] == "success"){
            $messageSent = "block";
        }
    }
?>

<section id="contact">
    <h2 class="section-title">Contact Us</h2>
    <div class="contact-container">
        <div class="contact-logo">
            <div class="logo-details">
                <img class="contact-logo-img" src="img/Logo.png" alt="">
                <div class="contact-details">
                    <p><img src="img/logos/location.svg" alt="address" class="contact-icon">Address</p>
                    <p><img src="img/logos/phone.svg" alt="phone" class="contact-icon">(+4)0723 12 34 56</p>
                    <p><a href="mailto: mail@company.com"><img src="img/logos/email.svg" alt="email"
                                class="contact-icon">contact@company.com</a>
                    </p>

                </div>
            </div>
        </div>
        <form action="PHP/contact.php" method="POST" enctype="multipart/form-data">
        <p class="error" style="display: <?php echo $showCaptchaError ?>">Captcha failed. The form was not sent!</p>
        <p class="success" style="display: <?php echo $messageSent ?>">Message sent!</p>

        <!-- input needed for reCaptcha -->
        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
        
            <div class="form-line">
                <div class="input-container half-width">
                    <label for="name" class="floating-label">First Name</label>
                    <input class="label-transform  required-field" type="text" name="name">
                </div>
                <div class="input-container half-width">
                    <label for="lastName" class="floating-label">Last Name</label>
                    <input class="label-transform  required-field" type="text" name="lastName">
                </div>
            </div>
            <div class="form-line">
                <div class="input-container half-width">
                    <label for="email" class="floating-label">Email</label>
                    <input class="label-transform  required-field" type="email" name="email">
                </div>
                <div class="input-container half-width">
                    <label for="phone" class="floating-label">Phone</label>
                    <input class="label-transform required-field" type="tel" name="phone">
                </div>
            </div>
            <div class="form-line">
                <div class="input-container">
                    <label for="message" class="floating-label">Message</label>
                    <textarea class="label-transform required-field" name="message" rows="5"></textarea>
                </div>
            </div>
            <p class="terms-checkbox">
                <input type="checkbox" name="terms_and_conditions" class="required-field">
                I have read and accept the privacy policy and the legal notice
            </p>

            <p class="all-fields-required-message">Please fill in all fields</p>
            <small class="g-recaptcha-branding">This site is protected by reCAPTCHA and the Google 
                <a href="https://policies.google.com/privacy" target="_blank">Privacy Policy</a> and
                <a href="https://policies.google.com/terms" target="_blank">Terms of Service</a> apply.
            </small>
            <button type="submit" name="submit" class="submit-contact">SEND</button>
        </form>

        <!-- Get captcha token -->
        <script>
            function getReCaptcha() {
                    grecaptcha.ready(function() {
                    grecaptcha.execute("<?php echo $site_key ?>", {action: 'homepage'}).then(function(token) {
                        document.getElementById("g-recaptcha-response").value = token;
                    });
                });

            }       
            getReCaptcha();
            //Refesh token Every 110 Seconds
            setInterval(function(){
                getReCaptcha();
            }, 110*1000)
        </script>
    </div>
</section>

<?php include "PHP/footer.php"; ?>