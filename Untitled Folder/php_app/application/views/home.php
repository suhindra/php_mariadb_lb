<div class="home" id="home"></div>

<!--  TOP SLIDER -->
<section id="topslider">
<div class="container-fluid front slider-overlay-style" >
  <div class="row">
    <!-- title-blogtop -->
    <div class="col-xs-12 first-page" id="info-topslider">
      <div class="inner-info-block">
        <div class="block-center">

          <div class="slider-overlay" style="opacity: 0;">
            <div class="slider-content">
              <div class="content-bg">
                <div class="bg"></div>
                <div class="bg"></div>
                <div class="bg"></div>
              </div>
              
              <div class="content-box">
                <div class="bg"></div>
                
                <div class="title-box">
                  <h1 class="title"
                    data-fontsize="190"
                    data-fontweight=""
                    data-fontfamily=""
                    data-bg="">CIMSA</h1>
                  <div class="social-box">
                    <ul class="bg">
                    
                    </ul>
                  </div>
                <div class="bg bg-padding"></div>
                </div>
                
                <div class="bg"></div>
              </div>
              
              <div class="content-bg">
                <div class="bg"></div>
                <div class="bg"></div>
                <div class="bg"></div>
              </div>
            </div>
          </div> <!-- .slider-overlay -->

        </div>
      </div>
    </div>
    <!-- / title-blogtop -->
      
    <!-- Slider -->
    <div class="col-xs-12" id="r-slider">
      <div class="preloader first-preloader">
        <div class="preload-img"></div>
      </div>
      <div id="full-width-slider" class="royalSlider heroSlider rsMinW load">
        <?php foreach ($slider as $value): ?>
        <div class="rsContent">
          <img class="rsImg" src="<?=$value->image_url?>" alt="">
        </div>
        <?php endforeach ?>
      </div>
    </div><!-- / Slider -->

  </div>
</div>
</section>
<!--  / TOP SLIDER -->

<!-- Begin Main -->
<div id="main" class="content-main">
    <div class="content-article">
        <section class="section-news">
            <div class="container">
                <h2 class="tt02">News Update</h2>
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-7">
                        <p class="intro mb60">
                            
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 pull-right">
                        <div class="view-more">
                            <a href="<?=base_url('news')?>" class="btn medical-button view-more-md">View all post</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($blog as $value): ?>
                    <div class="col-xs-12 col-sm-4">
                        <div class="item-box">
                            <div class="pic">
                                <?php if(isset($value->image_url)) {
                                    $thumb = 'assets/uploads/blog_posts/'.$value->image_url;
                                } else {
                                    $thumb = base_url('assets/dist/frontend/images/news_thumb.png');
                                }
                                ?>
                                <img src="<?=$thumb?>" class="img-responsive" alt="image <?=$value->title?>">
                            </div>
                            <div class="item-box-body">
                                <h4 class="tt05"><a href="<?=base_url('news/index/'.$value->id)?>"><?=$value->title?></a> </h4>
                                <p class="postby">Posted <a href="#" class="datetime"><?=$value->publish_time?></a>   by <a href="#">Admin</a></p>
                                <p><?=word_limiter(strip_tags($value->content), 25)?> <a href="<?=base_url('news/index/'.$value->id)?>">[Read more]</a></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
        <!-- E: .section-news -->

       