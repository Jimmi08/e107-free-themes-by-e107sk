<?php 

$LAYOUT['homepage'] =  '
<header class="masthead bg-primary text-white text-center">
 <div class="container d-flex align-items-center flex-column">
  <!-- Masthead Avatar Image -->
  {PROFILEIMAGE}
  <!-- Masthead Heading -->
  {SETSTYLE=wm}{---}
 </div>
</header>

{ALERTS} 
{CHAPTER_MENUS: name=portfolio&template=portfolio}
{CHAPTER_MENUS: name=portfolio&template=portfolio-modal}
 
{SETSTYLE=bare} 
{CMENU=freelancer-about-1}

{SETSTYLE=contact} 
{FREELANCER_CONTACTFORM} 
{MENU=1}
';