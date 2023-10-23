<div class="container">
    <div class="row justify-content-center" id="Stalls">
        <h1 class="h1">Stall Varieties</h1>
    </div>
    <hr>
    <style>
        * {box-sizing: border-box;}
        
        .mySlides {display: none;}
        img {vertical-align: middle;}

        /* Slideshow container */
        .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
        }
        /* Caption text */
        .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
        }

        .active {
        background-color: #04204e;
        }

        /* Fading animation */
        .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
        }

        @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
        .text {font-size: 11px}
        }
    </style>
                <div class="slideshow-container">

                    <div class="mySlides fade bg-secondary">
                        <div class="numbertext">1 / 3</div>
                        <img src="img/maps/map_copy/mapa3.jpg" style="width:100%; height:50vmin;">
                    </div>

                    <div class="mySlides fade bg-secondary">
                        <div class="numbertext">1 / 3</div>
                        <img src="img/maps/map_copy/wetmarket.jpg" style="width:100%; height:50vmin;">
                    </div>


                    <div class="mySlides fade bg-secondary">
                        <div class="numbertext">1 / 3</div>
                        <img src="img/maps/map_copy/map_cut.jpg" style="width:100%; height:50vmin;">
                    </div>
                </div>
                    <br>

                <div style="text-align:center">
                    <span class="dot"></span> 
                    <span class="dot"></span> 
                    <span class="dot"></span> 
                </div>

                <script>
                    var slideIndex = 0;
                    showSlides();

                    function showSlides() {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("dot");
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";  
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {slideIndex = 1}    
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex-1].style.display = "block";  
                    dots[slideIndex-1].className += " active";
                    setTimeout(showSlides, 2000); // Change image every 2 seconds
                    }
                </script><hr>
    <div class="row">
        <div class="col-md-12">
            <div id="imageSlider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card">
                            <img src="img/maps/map_copy/map_cut.jpg" class="d-block w-100" alt="Image 1"style="max-height: 80vh;">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card">
                            <img src="img/maps/map_copy/wetmarket.jpg" class="d-block w-100" alt="Image 2"style="max-height: 80vh;">
                        </div>
                    </div>
                    <!-- Add more carousel items as needed -->
                </div>
                <a class="carousel-control-prev" href="#imageSlider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#imageSlider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
        $sikwel = "SELECT ms.market_section_id, ms.section_name, COUNT(rt.section_id) AS countCluster 
                   FROM market_section ms
                   LEFT JOIN rental_tbl rt ON ms.market_section_id = rt.section_id AND rt.status = 'Available'
                   WHERE rt.status = 'Available' AND rt.section_id IS NOT NULL
                   GROUP BY ms.market_section_id, ms.section_name
                   ORDER BY ms.section_name ASC;";
        $results = mysqli_query($conn, $sikwel);
        $resultsCheck = mysqli_num_rows($results);
        if ($resultsCheck > 0) {
            while ($rows = mysqli_fetch_assoc($results)) {
                $sectionId = $rows['market_section_id'];
                $distinctSection = $rows['section_name'];
                $countCluster = $rows['countCluster'];
        ?>
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body text-center" style="background-color: #088395; color: white;">
                    <!-- Icon (You can replace "fa-icon" with your preferred icon library) -->
                    <i class="fas fa-store fa-3x" style="color: black;"></i>
                    <h5 class="card-title"><?php echo $distinctSection; ?></h5>
                    <p class="card-text">Available Stalls: <?php echo $countCluster; ?></p>
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
</div>
