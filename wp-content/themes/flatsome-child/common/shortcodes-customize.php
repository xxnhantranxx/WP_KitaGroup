<?php
// shortcode Năm
function create_year()
{
  return date('Y');
}
add_shortcode('year', 'create_year');

// Custom share
function my_link_here()
{ ?>
  <div class="social-icons share-icons share-row relative">
    <span>Chia sẻ: </span>
    <a href="//www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" data-label="Facebook" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank" class="icon plain tooltip facebook tooltipstered"></a>
    <a href="//twitter.com/share?url=<?php echo get_permalink(); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank" class="icon plain tooltip twitter tooltipstered"></a>
    <a href="//www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" data-label="Instagram" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank" class="icon plain tooltip instagram tooltipstered"></a>
    <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo get_permalink(); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank" class="icon plain tooltip linkedin tooltipstered"></a>
    <a href="//pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank" class="icon plain tooltip pinterest tooltipstered"></a>
  </div>
<?php }
add_shortcode('my_link_shortcode', 'my_link_here');



//Button Contact us
function ButtonContactUs()
{
  ob_start(); ?>
  <div class="header-button">
    <a href="<?php echo home_url(); ?>/#section_13" class="customize-button-contact">
        <span>Liên hệ</span>
        <i class="fa-regular fa-arrow-up-right"></i>
    </a>
  </div>
<?php
  $contentShortcode = ob_get_contents();
  ob_end_clean();
  return $contentShortcode;
}
add_shortcode('ButtonContactUs', 'ButtonContactUs');
