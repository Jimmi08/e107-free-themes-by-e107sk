<?php 
//Note:  DEFAULT_MENUAREA shortcode is part of JM Theme plugin
$LAYOUT['_footer_'] = ' 
{SETSTYLE=footer}
<footer class="footer text-center">
    <div class="container">
      <div class="row">
        {SETSTYLE=footer}
        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">  
            <h4 class="text-uppercase mb-4">'.LAN_FL_THEME_11.'</h4> 
            {SITECONTACTINFO}{MENU=101}
        </div>
        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">'.LAN_FL_THEME_10.'</h4>
            {MENU=102}{XURL_ICONS: size=2x} 
        </div>
        <!-- Footer About Text -->
        <div class="col-lg-4">
            {MENU=103}
        </div>
      </div>
    </div>
  </footer>

<!-- Copyright Section -->
<section class="copyright py-4 text-center text-white">
    <div class="container">
    <small>{SITEDISCLAIMER}</small>
    </div>
</section>


<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div   id="back-top">
    <a class="text-center text-white rounded" href="#page-top">
    <i class="fa fa-chevron-up"></i>
    </a>
</div>
{FREELANCER_MODALPORTFOLIO}
';