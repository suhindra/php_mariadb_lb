<?php if (($this->uri->segment(1) != 'admin') and ($this->uri->segment(1) != 'api')): ?>
                  <section class="section-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <div class="widget contact-info-footer">
                                    <h3>Alamat</h3>
                                    <p><i class="fa fa-map-marker"></i>Jl. Raya Janti Karang Jambe No. 143 Yogyakarta 55198 Indonesia</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="widget contact-info-footer">
                                    <h3>Email</h3>
                                    <p><i class="fa fa-envelope"></i><a href="mailto:info@akakom.ac.id" class="mailto"></a>info@akakom.ac.id</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="widget contact-info-footer">
                                    <h3>Telepon</h3>
                                    <p><i class="fa fa-phone-square"></i>Telepon +62 274 486664, Fax +62 274 486438</p> 
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- E: .section-footer -->

                <!-- End code -->

            </div>
        </div>
        <footer id="page-footer">
        <div class="">
            <div class="container">
                <div class="row footer">
                    <div class="col-md-9">
                        <div class="copyright pull-left">
                            Copyright Akakom 2017
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="social-links">
                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    
    <!-- End Footer -->

    </div>
    <a href="#0" class="cd-top">Top</a>
    <?php endif ?>
    <?php
        foreach ($scripts['foot'] as $file)
        {
            $url = starts_with($file, 'http') ? $file : base_url($file);
            echo "<script src='$url'></script>".PHP_EOL;
        }
    ?>

    <?php if (!$this->uri->segment(1)) { ?>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            items : 6,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [979,3]
        });

        $("#owl-testi").owlCarousel({
            navigation: false,
            slideSpeed: 10000,
            paginationSpeed: 800,
            singleItem: true,
            autoPlay: true
        });
    });
    </script>
    <?php } ?>
</body>
</html>