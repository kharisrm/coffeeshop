<section class="about" id="about">

    <h3 class="sub-heading" data-aos="fade-up"> about us </h3>
    <h1 class="heading" data-aos="fade-up">  </h1>

    <div class="about-info">
        <div class="image" data-aos="fade-right">
            <img src="images/12.PNG" alt="">
        </div>

        <div class="content" data-aos="fade-left">
            <h3>The Best Coffee Shop in This City</h3>
            <p>Our Team's Mission is to Create
Healthy and Healthy Coffee, Juices, Smoothies, Bowls and Snacks. Our Menu Is Full Of New Offerings That Are Highly Desirable And Guilt-Free. We take great pride in serving products that have high nutritional value.</p>
            <p>This coffee has a taste that is very popular among teenagers,
Our Juices Are Made Fresh to Order, And Our Smoothies Are Made With Fruit, Not Ice - Which Other Companies Typically Use.</p>
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-shipping-fast"></i>
                    <span>fast delivery</span>
                </div>
                <div class="icons">
                    <i class="fas fa-dollar-sign"></i>
                    <span>easy payments</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>24/7 service</span>
                </div>
            </div>
        </div>
    </div>

    <h3 class="sub-heading" data-aos="fade-up"> Customers </h3>
    <h1 class="heading" data-aos="fade-up"> Happy Customers! </h1>

    <div class="row" id="gallery" data-aos="fade-up">
        <div class="col-lg-8 m-auto">
            <div class="customer-table-img-slider" id="icon">
                <div class="swiper-wrapper">

                <?php for($i=1; $i<8;$i++){ ?>
                    <img src="./images/customers/c<?php echo $i ?>.jpg" data-fancybox="table-slider"
                        class="customer-table-img swiper-slide"></img>  
                <?php } ?>       
                 
                </div>
        
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <h3 class="sub-heading" data-aos="fade-up"> Team </h3>
    <h1 class="heading" data-aos="fade-up"> Our Beautiful Team! </h1>


    <div class="row team-slider" data-aos="fade-up">
        <div class="swiper-wrapper">

<!-- get all team member informations from table TEAM  -->
<?php
    $query="SELECT member_name, member_image, member_role FROM team";
    $result=mysqli_query($conn,$query);
    
    if($result){
        while($row=mysqli_fetch_assoc($result)){  ?>       

            <div class="col-lg-4 swiper-slide">
                <div class="team-box text-center">
                    <img src="./images/team/<?php echo $row['member_image'] ?>" class="team-img">

                    <h3 class="h3-title"><?php echo $row['member_name'] ?></h3>
                    <p> <?php echo $row['member_role'] ?> </p>
                    <div class="social-icon">
                        <ul>
                            <li>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

<?php }} ?>

        </div>

        <div class="swiper-pagination"></div>
    </div>



</section>
