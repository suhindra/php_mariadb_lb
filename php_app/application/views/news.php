        <div id="main" class="content-main">
            <div class="content-article">

                <!-- Write code -->
                <?php if(!empty($news->image_url)){
                    $parallax = base_url('assets/uploads/blog_posts/'.$news->image_url);
                }else {
                    $parallax = base_url('assets/dist/frontend/images/subbanner.jpg');
                }
                ?>
                <div class="section-subbanner" style="background: url('<?=$parallax?>') no-repeat fixed center center;  -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="caption"><?=$news->title?></div>
                                <ol class="breadcrumb">
                                    <li><a href="<?=base_url('')?>">Home</a> </li>
                                    <li><a href="<?=base_url('blog')?>">News</a> </li>
                                    <li class="active"><?=$news->title?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- E: .section-banner -->

                <div class="primary-content">
                <div class="blog blog-columns">
                <div class="container">
                <div class="row">
                <div class="col-xs-12 col-sm-9 col-md-9">
                    <div class="blog blogpost">
                        <article class="type-post">
                            <div class="entry-author">
                                <div class="media">
                                    
                                </div>
                            </div>
                            <div class="entry-title">
                                <h3><?=$news->title?> </h3>
                            </div>
                            <div class="entry-cover">
                                <img class="img-responsive" src="<?=base_url('assets/uploads/blog_posts/'.$news->image_url)?>" alt="image">
                            </div>
                            <div class="entry-content">
                                <?=$news->content?>
                            </div>
                            <div class="entry-meta">
                                <label>SHARE:</label>
                                <div class="post-share">
                                    <ul>
                                        <li><a href="https://twitter.com/share?url=<?=current_url();?>&amp;text=<?=urlencode($news->title)?>&amp;hashtags=websitecimsa" target="_blank" title="twitter"><i class="fa fa-twitter"></i> </a> </li>
                                        <li><a href="http://www.facebook.com/sharer.php?u=<?=current_url();?>" target="_blank" title="facebook"><i class="fa fa-facebook"></i> </a> </li>
                                        <li><a href="https://plus.google.com/share?url=<?=current_url();?>" target="_blank" title="google"><i class="fa fa-google"></i> </a> </li>
                                        <li><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" title="pinterest"><i class="fa fa-pinterest-p"></i> </a> </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <div class="widget recent-post">
                        <div class="widget-title">
                            <h4>Recent Post</h4>
                        </div>
                        <div class="widget-body">
                            <?php foreach ($recent_news as $value): ?>
                            <div class="media">
                                <div class="media-left pull-left">
                                    <a href="#">
                                        <?php if(isset($value->image_url)) {
                                            $thumb = 'assets/uploads/blog_posts/'. $value->image_url;
                                        //$thumb = image_thumb(base_url().'assets/uploads/blog_posts/'.$value->image_url, $value->image_url, 85, 100 );
                                        } else {
                                            $thumb = base_url('assets/dist/frontend/images/mini_news_thumb.png');
                                        }
                                        ?>
                                        <img src="<?=$thumb?>" class="media-object" alt="Mini Thumb <?=$value->title?>">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="<?=base_url('news/index/'.$value->id)?>" title="<?=$value->title?>"><?=$value->title?></a></h4>
                                    <p class="postago">Posted <span class="color-333"><?=$value->publish_time?></span></p>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <!-- E: .recent-post -->
                    <!-- E: . -->
                </div>
                </div>
                </div>
                </div>
                <!-- E: . -->
                </div>



                