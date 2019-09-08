<?php

$MENU_TEMPLATE['about']['start'] 					= '
<!-- About Section -->
<section class="page-section bg-primary text-white mb-0" id="about">
  <div class="container">

    <!-- About Section Heading -->
    <h2 class="page-section-heading text-center text-uppercase text-white">{CMENUTITLE}</h2>

    <!-- Icon Divider -->
    <div class="divider-custom divider-light">
      <div class="divider-custom-line"></div>
      <div class="divider-custom-icon">
        <i class="fas fa-star"></i>
      </div>
      <div class="divider-custom-line"></div>
    </div> ';

$MENU_TEMPLATE['about']['body'] 					= '
<!-- About Section Content -->
<div class="row">
  <div class="col-lg-4 ml-auto">
    <p class="lead">{CPAGEBODY}</p>
  </div>
  <div class="col-lg-4 mr-auto">
    <p class="lead">{CMENUBODY}</p>
  </div>
</div>

<!-- About Section Button -->
<div class="text-center mt-4">
  <a class="btn btn-xl btn-outline-light" href="{CMENUURL}">
    <i class="fas fa-download mr-2"></i>
    '.LAN_FL_THEME_13.'
  </a>
</div> ';

$MENU_TEMPLATE['about']['end'] 					= '  
</div>
</section>';



$MENU_TEMPLATE['image-only2']['start'] = '{SETIMAGE: w=256&h=256&crop=1}<div class="cpage-menu {CMENUNAME}">';

$MENU_TEMPLATE['image-only2']['body'] = '{CMENUIMAGE}';

$MENU_TEMPLATE['image-only2']['end'] = '</div>';



$MENU_TEMPLATE['portfolio']['start'] = '  <!-- Portfolio Section -->
 <section class="page-section portfolio" id="portfolio">
   <div class="container">

     <!-- Portfolio Section Heading -->
     <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{CHAPTER_NAME}</h2>

     <!-- Icon Divider -->
     <div class="divider-custom">
       <div class="divider-custom-line"></div>
       <div class="divider-custom-icon">
         <i class="fas fa-star"></i>
       </div>
       <div class="divider-custom-line"></div>
     </div>
     {SETIMAGE: w=0&h=0}
     <!-- Portfolio Grid Items -->
     <div class="row">';

$MENU_TEMPLATE['portfolio']['body'] = '
 <div class="col-md-6 col-lg-4">
 <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal{CPAGEID}">
   <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
     <div class="portfolio-item-caption-content text-center text-white">
       <i class="fas fa-plus fa-3x"></i>
     </div>
   </div>
   <img class="img-fluid" src="{CMENUIMAGE=url}" alt="{CPAGETITLE}">
 </div>
</div>';

$MENU_TEMPLATE['portfolio']['end'] = '
 </div>
 </div>
 </section>';


$MENU_TEMPLATE['portfolio-modal']['start'] = '';

$MENU_TEMPLATE['portfolio-modal']['body'] = ' <!-- Portfolio Modal {CPAGEID} -->
<div class="portfolio-modal modal fade" id="portfolioModal{CPAGEID}" tabindex="-1" role="dialog" aria-labelledby="portfolioModal{CPAGEID}Label" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">
          <i class="fas fa-times"></i>
        </span>
      </button>
      <div class="modal-body text-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <!-- Portfolio Modal - Title -->
              <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{CPAGETITLE}</h2>
              <!-- Icon Divider -->
              <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon">
                  <i class="fas fa-star"></i>
                </div>
                <div class="divider-custom-line"></div>
              </div>
              <!-- Portfolio Modal - Image -->
              <img class="img-fluid rounded mb-5" src="{CMENUIMAGE=url}" alt="{CPAGETITLE}">
              <!-- Portfolio Modal - Text -->
              <p class="mb-5">{CPAGEBODY}</p>
              <button class="btn btn-primary" href="#" data-dismiss="modal">
                <i class="fas fa-times fa-fw"></i>
                '.LAN_FL_THEME_12.'
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>';

$MENU_TEMPLATE['portfolio-modal']['end'] = '';
 
?>