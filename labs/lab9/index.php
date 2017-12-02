<?php
    include 'inc/header.php';
?>
        <!-- add Carousel component -->
        <div id="carousel" >
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
                 </ol>
                <div class="carousel-inner" role="listbox"> 
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="img/alex.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="img/bear.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="img/carl.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="img/charlie.jpg" alt="Fourth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="img/lion.jpg" alt="Fifth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="img/otter.jpg" alt="Sixth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="img/sally.jpg" alt="Seventh slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="img/samantha.jpg" alt="Eighth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="img/ted.jpg" alt="Ninth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="img/tiger.jpg" alt="Tenth slide">
                    </div>
                
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </div>
        </div>
        <br /><br />
        <a class="btn btn-outline-primary" href="adoptions.php" role="button">Adopt Now! </a>

        <br /><br />
        <hr>
        
<?php
    include 'inc/footer.php';
?>