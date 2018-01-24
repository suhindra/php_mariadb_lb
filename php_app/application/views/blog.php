<div id="main" class="content-main">
    <div class="content-article">

        <!-- Write code -->

        <div class="section-subbanner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="caption"><?=$title?></div>
                        <ol class="breadcrumb">
                            <li><a href="<?=base_url()?>">Home</a> </li>
                            <li class="active"><?=$title?></li>
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
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="row area-blog mb30">
                        <?php foreach ($blog as $value) { ?>
                        <div class="col-xs-12 col-sm-4">
                            <div class="item-box">
                                <div class="pic">
                                    <?php if(isset($value->image_url)) {
                                        $thumb = 'assets/uploads/blog_posts/'.$value->image_url;
                                    } else {
                                        $thumb = base_url('assets/dist/frontend/images/news_thumb.png');
                                    }
                                    ?>
                                    <img src="<?=$thumb?>" class="img-responsive" alt="<?=$value->title?>">
                                </div>
                                <div class="item-box-body">
                                    <h4 class="tt05"><a href="<?=base_url('news/index/'.$value->id)?>"><?=$value->title?></a> </h4>
                                    <p class="postby">Posted <a href="#" class="datetime"><?=$value->publish_time;?></a>   by <a href="#">Admin</a></p>
                                    <p><?=character_limiter(strip_tags($value->content), 100)?> <a href="<?=base_url('news/index/'.$value->id)?>">[Read more]</a></p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="text-center spacing-bottom">
                <?=$links?>
            </div>
        </div>
        </div>
        <!-- E: .area-blog -->
        </div>


      