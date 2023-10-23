<?php
    require 'indexheader.php';
    require 'includes/dbh.inc.php';
?>
    <main>
        <div>
            <section class="home" id="home">
                <div class="container">
                    <div class="text-center" >
                    </div>
                <h3 class="text-center" data-aos="fade-down">WELCOME TO THE</h3>
                <h2 class="text-center" data-aos="fade-left" style="font-weight: bold;">
                    BINALBAGAN <span class="text-warning">STALL RENTAL</span>
                </h2>
                </div>
            </section>

    <section class="about bg-info" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="img/mayor.jpg" alt="Image description" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="text-uppercase font-weight-bold" style="color: #074160; font-size: 44px; font-weight: 800; line-height: 50px;">Mayor's Welcome</h2>
                    <div class="text-section">
                        <p class="text-white">Welcome to the official website of the Municipality of Binalbagan!</p>
                        <p class="text-white">If you're looking to rent a stall or inquire about available stalls in our town, we extend our warmest welcome to you. Our community is known for its exceptional hospitality, and we eagerly anticipate the opportunity to assist you in finding the perfect stall for your business or exploring the range of stalls available to suit your needs.</p>
                    </div>
                    <div class="d-flex flex-row">
                        <a href="index.php#aboutbplo" class="btn btn-primary mr-2 custom-button">About BPLO</a>
                        <a href="index.php#inquire" class="btn btn-secondary custom-button">Inquire Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <section class="stalls stalls-section" id="stalls">
            <?php include('stallsection.php'); ?>   
        </section>

        <section class="bg-primary" id="inquire">
            <?php include('inquiry.php'); ?>   
        </section>
    </div>
</main>
<?php
    require 'indexfooter.php';
?>