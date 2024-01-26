 <!-- Newsletter Popup -->
 <div class="newsletter-wrap" id="popup-container">
  <div id="popup-window">
    <a class="btn closepopup"><i class="icon icon anm anm-times-l"></i></a>
    <!-- Modal content-->
    <div class="display-table splash-bg">
      <div class="display-table-cell width40"><img src="{{ asset('site/assets/images/newsletter-img.jpg') }}" alt="Join Our Mailing List" title="Join Our Mailing List" />
      </div>
      <div class="display-table-cell width60 text-center">
        <div class="newsletter-left">
          <h2>Join Our Mailing List</h2>
          <p>Sign Up for our exclusive email list and be the first to know about new products and special offers</p>
          <form action="#" method="post">
            <div class="input-group">
              <input type="email" class="input-group__field newsletter__input" name="EMAIL" value="" placeholder="Email address" required="">
                  <span class="input-group__btn">
                    <button type="submit" class="btn newsletter__submit" name="commit" id="subscribeBtn"> <span class="newsletter__submit-text--large">Subscribe</span> </button>
                  </span>
              </div>
          </form>
          <ul class="list--inline site-footer__social-icons social-icons">
            <li><a class="social-icons__link" href="#" title="Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
            <li><a class="social-icons__link" href="#" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a class="social-icons__link" href="#" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
            <li><a class="social-icons__link" href="#" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li><a class="social-icons__link" href="#" title="YouTube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            <li><a class="social-icons__link" href="#" title="Vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Newsletter Popup -->

<!-- Including Jquery -->
<script src="{{ asset('site/assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('site/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('site/assets/js/vendor/jquery.cookie.js') }}"></script>
<script src="{{ asset('site/assets/js/vendor/wow.min.js') }}"></script>
<!-- Including Javascript -->
<script src="{{ asset('site/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('site/assets/js/plugins.js') }}"></script>
<script src="{{ asset('site/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('site/assets/js/lazysizes.js') }}"></script>
<script src="{{ asset('site/assets/js/main.js') }}"></script>

<!--For Newsletter Popup-->
<script>
jQuery(document).ready(function(){  
 jQuery('.closepopup').on('click', function () {
   jQuery('#popup-container').fadeOut();
   jQuery('#modalOverly').fadeOut();
 });
 
 var visits = jQuery.cookie('visits') || 0;
 visits++;
 jQuery.cookie('visits', visits, { expires: 1, path: '/' });
 console.debug(jQuery.cookie('visits')); 
 if ( jQuery.cookie('visits') > 1 ) {
 jQuery('#modalOverly').hide();
 jQuery('#popup-container').hide();
 } else {
   var pageHeight = jQuery(document).height();
   jQuery('<div id="modalOverly"></div>').insertBefore('body');
   jQuery('#modalOverly').css("height", pageHeight);
   jQuery('#popup-container').show();
 }
 if (jQuery.cookie('noShowWelcome')) { jQuery('#popup-container').hide(); jQuery('#active-popup').hide(); }
}); 

jQuery(document).mouseup(function(e){
 var container = jQuery('#popup-container');
 if( !container.is(e.target)&& container.has(e.target).length === 0)
 {
 container.fadeOut();
 jQuery('#modalOverly').fadeIn(200);
 jQuery('#modalOverly').hide();
 }
});
</script>
<!--End For Newsletter Popup-->