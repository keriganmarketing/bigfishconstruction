<footer class="sticky-footer bg-black py-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="footer-content">
                    <main-menu :main-nav="{{ website_menu(14) }}" class="footer-menu" ></main-menu>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-content">
                    <h4 class="short-underline">Port St. Joe Office</h4>
                    <p><a href="tel:850-229-6400">850-229-6400</a></p>
                    <p>346 Commerce Blvd.<br>
                    Port St. Joe, FL. 32456</p>
                    <h4 class="short-underline">Connect</h4>
                    <social-icons :size="37" :margin=".25" class="d-flex social-icons" ></social-icons>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer-content">
                    <h4 class="short-underline">Contact Us</h4>
                    <contact-form></contact-form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <p class="copyright text-center">State Certified Building Contractor – CGC152946</p>
    <p class="copyright text-center">&copy;{{ date('Y') }} {{ get_bloginfo() }}. All Rights&nbsp;Reserved. 
        <a style="text-decoration:underline;" href="/privacy-policy" >Privacy&nbsp;Policy</a> 
        <span class="siteby">
            <svg version="1.1" id="kma" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="14" width="20"
                viewBox="0 0 12.5 8.7" style="enable-background:new 0 0 12.5 8.7;"
                xml:space="preserve">
                    <path fill="#b4be35"
                d="M6.4,0.1c0,0,0.1,0.3,0.2,0.9c1,3,3,5.6,5.7,7.2l-0.1,0.5c0,0-0.4-0.2-1-0.4C7.7,7,3.7,7,0.2,8.5L0.1,8.1 c2.8-1.5,4.8-4.2,5.7-7.2C6,0.4,6.1,0.1,6.1,0.1H6.4L6.4,0.1z"></path>
            </svg> &nbsp;<a href="https://keriganmarketing.com">Site&nbsp;by&nbsp;KMA</a>.
        </span></p>
</footer>