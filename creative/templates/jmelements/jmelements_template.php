<?php

/*  - {ELEMENTS: mode=masthead&template=imageheader} */
$JMELEMENTS_TEMPLATE['imageheader']['start'] =  '
  <!-- Masthead -->
  <header class="masthead" style="
      background: -webkit-gradient(linear,left top,left bottom,from(rgba(92,77,66,.8)),to(rgba(92,77,66,.8))),url({SECTION_BGIMAGE});
      background: linear-gradient(to bottom,rgba(92,77,66,.8) 0,rgba(92,77,66,.8) 100%),url({SECTION_BGIMAGE}); ">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">{SECTION_TITLE}</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">{SECTION_SUBTITLE}</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="{SECTION_URL}">{SECTION_TEXT}</a>
        </div>
      </div>
    </div>
  </header>
 ';
$JMELEMENTS_TEMPLATE['imageheader']['item'] =  '';
$JMELEMENTS_TEMPLATE['imageheader']['end'] =  '';

 
 
/*  - {ELEMENTS: mode=about&template=about} */
$JMELEMENTS_TEMPLATE['about']['start'] =  '
  <!-- About Section -->
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">{SECTION_TITLE}</h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">{SECTION_SUBTITLE}</p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="{BUTTON_URL}">{BUTTON_TEXT}</a>
        </div>
      </div>
    </div>
  </section>
 ';
$JMELEMENTS_TEMPLATE['about']['item'] =  '';
$JMELEMENTS_TEMPLATE['about']['end'] =  ''; 


/*  - {ELEMENTS: mode=services&template=services} */
$JMELEMENTS_TEMPLATE['services']['start'] =  '
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">{SECTION_TITLE}</h2>
      <hr class="divider my-4">
      <div class="row">
 ';
$JMELEMENTS_TEMPLATE['services']['item'] =  '
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="{SERVICE_ICON}"></i>
            <h3 class="h4 mb-2">{SERVICE_TITLE}</h3>
            <p class="text-muted mb-0">{SERVICE_DESC}</p>
          </div>
        </div>
        ';
$JMELEMENTS_TEMPLATE['services']['end'] =  '      
      </div>
    </div>
  </section>'; 
?>