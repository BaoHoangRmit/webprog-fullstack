<?php
    // include_once 'login.php';

    // session_start();

    // if ($_SESSION['loggedin']) {
    //     // echo 'ok';
    //     if (isset($_SESSION['current_user'])) {
	// 	    echo '<pre>';
	// 	    print_r($_SESSION['current_user']);
	// 	  	echo '</pre>';
	// 	}
    // } else {
    //     echo 'not ok';
    // }

    // if (isset($_SESSION['current_user'])) {
    //     echo '<pre>';
    //     print_r($_SESSION['current_user']);
    //       echo '</pre>';
    // }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/customer/index.css">
    <link rel="stylesheet" href="css/customer/customerStyle.css">
    <link rel="stylesheet" href="css/layout/layout.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->

    <!-- JS script for onclick functions -->
    <script>
        let slideIndex = 1;
        // Next/previous controls
        function plusSlides(n){
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n){
            showSlides(slideIndex = n);
        }

        function showSlides(n){
            let slides = document.getElementsByClassName("advertisement-slide");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}

            if (n < 1) {slideIndex = slides.length}
            
            for (let i = 0; i < slides.length; i++) {
                slides[i].classList.remove("slide-active");
            }
            for (let i = 0; i < dots.length; i++) {
                dots[i].classList.remove("dot-active");
            }
            slides[slideIndex-1].classList.add("slide-active");
            dots[slideIndex-1].classList.add("dot-active");
        }

        function autoSlides(){
            slideIndex += 1;
            showSlides(slideIndex);
        }
        setInterval(autoSlides,5000);

        function viewDetail(id){
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('productID', id);
            location.href = `./customerDetail.html?${urlParams}`;
        }
    </script>

    <title>Customer | Home</title>
</head>
<body>
    
    <?php 
        include_once 'layout/header.php';
    ?>

    <main>
        <section id="advertisement">
            <div id="advertisement-slide-container">
                <div class="advertisement-slide fade slide-active">
                    <div class="advertisement-slide-order">
                        <p class="text-sub">1 / 3</p>
                    </div>
                    <div class="advertisement-slide-image">
                        <img src="./img/bannerPromo1.JPG" alt="bannerPromo">
                    </div>
                </div>
    
                <div class="advertisement-slide fade">
                    <div class="advertisement-slide-order">
                        <p class="text-sub">2 / 3</p>
                    </div>
                    <div class="advertisement-slide-image">
                        <img src="./img/bannerPromo2.JPG" alt="bannerPromo">
                    </div>
                </div>
    
                <div class="advertisement-slide fade">
                    <div class="advertisement-slide-order">
                        <p class="text-sub">3 / 3</p>
                    </div>
                    <div class="advertisement-slide-image">
                        <img src="./img/bannerPromo3.JPG" alt="bannerPromo">
                    </div>
                </div>
                
                <div id="advertisement-prev" class="advertisement-slide-arrow" onclick="plusSlides(-1)">
                    <span>&#10094;</span>
                </div>
                <div id="advertisement-next" class="advertisement-slide-arrow" onclick="plusSlides(1)">
                    <span>&#10095;</span>
                </div>

                <nav id="advertisement-nav">
                    <span class="dot dot-active" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </nav>
            </div>
        </section>

        <section id="suggestion">
            <h2>Daily Discover</h2>
            <div id="suggestion-list" class="list-horizontal">
                <div id="1" class="card">
                    <figure class="card-image">
                        <img src="./img/itemTest.png" alt="itemTest">
                        <div class="card-image-overlay">
                            <button class="view-detail-btn border-btn">
                                <p class="text-bold">View Details</p>
                            </button>
                        </div>
                    </figure>

                    <div class="card-info">
                        <div class="card-info-detail">
                            <p class="text-sub card-info-detail-vendor">Vendor</p>
                            <p class="text-para card-info-detail-name">MisFit Ring</p>
                        </div>
                        <div class="card-info-price">
                            <p class="text-bold">$454.00</p>
                        </div>
                    </div>
                </div>

                <div id="2" class="card">
                    <figure class="card-image">
                        <img src="./img/itemTest.png" alt="itemTest">
                        <div class="card-image-overlay">
                            <button class="view-detail-btn border-btn">
                                <p class="text-bold">View Details</p>
                            </button>
                        </div>
                    </figure>

                    <div class="card-info">
                        <div class="card-info-detail">
                            <p class="text-sub card-info-detail-vendor">Vendor</p>
                            <p class="text-para card-info-detail-name">MisFit Ring</p>
                        </div>
                        <div class="card-info-price">
                            <p class="text-bold">$454.00</p>
                        </div>
                    </div>
                </div>

                <div id="3" class="card">
                    <figure class="card-image">
                        <img src="./img/itemTest.png" alt="itemTest">
                        <div class="card-image-overlay">
                            <button class="view-detail-btn border-btn">
                                <p class="text-bold">View Details</p>
                            </button>
                        </div>
                    </figure>

                    <div class="card-info">
                        <div class="card-info-detail">
                            <p class="text-sub card-info-detail-vendor">Vendor</p>
                            <p class="text-para card-info-detail-name">MisFit Ring</p>
                        </div>
                        <div class="card-info-price">
                            <p class="text-bold">$454.00</p>
                        </div>
                    </div>
                </div>

                <div id="4" class="card">
                    <figure class="card-image">
                        <img src="./img/itemTest.png" alt="itemTest">
                        <div class="card-image-overlay">
                            <button class="view-detail-btn border-btn">
                                <p class="text-bold">View Details</p>
                            </button>
                        </div>
                    </figure>

                    <div class="card-info">
                        <div class="card-info-detail">
                            <p class="text-sub card-info-detail-vendor">Vendor</p>
                            <p class="text-para card-info-detail-name">MisFit Ring</p>
                        </div>
                        <div class="card-info-price">
                            <p class="text-bold">$454.00</p>
                        </div>
                    </div>
                </div>

                <div id="5" class="card">
                    <figure class="card-image">
                        <img src="./img/itemTest.png" alt="itemTest">
                        <div class="card-image-overlay">
                            <button class="view-detail-btn border-btn">
                                <p class="text-bold">View Details</p>
                            </button>
                        </div>
                    </figure>

                    <div class="card-info">
                        <div class="card-info-detail">
                            <p class="text-sub card-info-detail-vendor">Vendor</p>
                            <p class="text-para card-info-detail-name">MisFit Ring</p>
                        </div>
                        <div class="card-info-price">
                            <p class="text-bold">$454.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="update">
            <h2>Sign Up For EMAIL Updates</h2>
            <form action="#" id="update-email">
                <input type="email" id="emailUpdate" name="emailUpdate" placeholder="Email">
                <input type="submit" name="update-submit" id="update-submit" value="Go">
            </form>
        </section>

        <section id="category">
            <div id="category-heading">
                <h2>All Products</h2>

                <div id="category-heading-search">
                    <input type="text" name="search-bar" id="search-bar" placeholder="Search">

                    <div id="category-heading-search-icon">
                        <img src="img/icon/Search.png" alt="magnifying glass">
                    </div>
                </div>

                <button id="filter-btn">
                    <img src="./img/icon/filter.svg" alt="filter">
                    <p class="text-bold">Filter</p>
                </button>
            </div>

            <div id="category-container">
                <h3 id="category-list-notification">Sorry, we can't find any suitable products for you!</h3>

                <div id="category-list" class="list-vertical">
                    <div id="6" class="card" onclick="viewDetail(6)">
                        <figure class="card-image">
                            <img src="./img/itemTest.png" alt="itemTest">
                            <div class="card-image-overlay">
                                <button class="view-detail-btn border-btn">
                                    <p class="text-bold">View Details</p>
                                </button>
                            </div>
                        </figure>
    
                        <div class="card-info">
                            <div class="card-info-detail">
                                <p class="text-sub card-info-detail-vendor">Vendor</p>
                                <p class="text-para card-info-detail-name">MisFit Ring</p>
                            </div>
                            <div class="card-info-price">
                                <p class="text-bold">$454.00</p>
                            </div>
                        </div>
                    </div>

                    <div id="7" class="card">
                        <figure class="card-image">
                            <img src="./img/itemTest.png" alt="itemTest">
                            <div class="card-image-overlay">
                                <button class="view-detail-btn border-btn">
                                    <p class="text-bold">View Details</p>
                                </button>
                            </div>
                        </figure>
    
                        <div class="card-info">
                            <div class="card-info-detail">
                                <p class="text-sub card-info-detail-vendor">Vendor</p>
                                <p class="text-para card-info-detail-name">MisFit Ring</p>
                            </div>
                            <div class="card-info-price">
                                <p class="text-bold">$454.00</p>
                            </div>
                        </div>
                    </div>

                    <div id="8" class="card">
                        <figure class="card-image">
                            <img src="./img/itemTest.png" alt="itemTest">
                            <div class="card-image-overlay">
                                <button class="view-detail-btn border-btn">
                                    <p class="text-bold">View Details</p>
                                </button>
                            </div>
                        </figure>
    
                        <div class="card-info">
                            <div class="card-info-detail">
                                <p class="text-sub card-info-detail-vendor">Vendor</p>
                                <p class="text-para card-info-detail-name">MisFit Ring</p>
                            </div>
                            <div class="card-info-price">
                                <p class="text-bold">$454.00</p>
                            </div>
                        </div>
                    </div>

                    <div id="9" class="card">
                        <figure class="card-image">
                            <img src="./img/itemTest.png" alt="itemTest">
                            <div class="card-image-overlay">
                                <button class="view-detail-btn border-btn">
                                    <p class="text-bold">View Details</p>
                                </button>
                            </div>
                        </figure>
    
                        <div class="card-info">
                            <div class="card-info-detail">
                                <p class="text-sub card-info-detail-vendor">Vendor</p>
                                <p class="text-para card-info-detail-name">MisFit Ring</p>
                            </div>
                            <div class="card-info-price">
                                <p class="text-bold">$454.00</p>
                            </div>
                        </div>
                    </div>

                    <div id="10" class="card">
                        <figure class="card-image">
                            <img src="./img/itemTest.png" alt="itemTest">
                            <div class="card-image-overlay">
                                <button class="view-detail-btn border-btn">
                                    <p class="text-bold">View Details</p>
                                </button>
                            </div>
                        </figure>
    
                        <div class="card-info">
                            <div class="card-info-detail">
                                <p class="text-sub card-info-detail-vendor">Vendor</p>
                                <p class="text-para card-info-detail-name">MisFit Ring</p>
                            </div>
                            <div class="card-info-price">
                                <p class="text-bold">$454.00</p>
                            </div>
                        </div>
                    </div>

                    <div id="11" class="card">
                        <figure class="card-image">
                            <img src="./img/itemTest.png" alt="itemTest">
                            <div class="card-image-overlay">
                                <button class="view-detail-btn border-btn">
                                    <p class="text-bold">View Details</p>
                                </button>
                            </div>
                        </figure>
    
                        <div class="card-info">
                            <div class="card-info-detail">
                                <p class="text-sub card-info-detail-vendor">Vendor</p>
                                <p class="text-para card-info-detail-name">MisFit Ring</p>
                            </div>
                            <div class="card-info-price">
                                <p class="text-bold">$454.00</p>
                            </div>
                        </div>
                    </div>

                    <div id="12" class="card">
                        <figure class="card-image">
                            <img src="./img/itemTest.png" alt="itemTest">
                            <div class="card-image-overlay">
                                <button class="view-detail-btn border-btn">
                                    <p class="text-bold">View Details</p>
                                </button>
                            </div>
                        </figure>
    
                        <div class="card-info">
                            <div class="card-info-detail">
                                <p class="text-sub card-info-detail-vendor">Vendor</p>
                                <p class="text-para card-info-detail-name">MisFit Ring</p>
                            </div>
                            <div class="card-info-price">
                                <p class="text-bold">$454.00</p>
                            </div>
                        </div>
                    </div>

                    <div id="13" class="card">
                        <figure class="card-image">
                            <img src="./img/itemTest.png" alt="itemTest">
                            <div class="card-image-overlay">
                                <button class="view-detail-btn border-btn">
                                    <p class="text-bold">View Details</p>
                                </button>
                            </div>
                        </figure>
    
                        <div class="card-info">
                            <div class="card-info-detail">
                                <p class="text-sub card-info-detail-vendor">Vendor</p>
                                <p class="text-para card-info-detail-name">MisFit Ring</p>
                            </div>
                            <div class="card-info-price">
                                <p class="text-bold">$454.00</p>
                            </div>
                        </div>
                    </div>

                    <div id="14" class="card">
                        <figure class="card-image">
                            <img src="./img/itemTest.png" alt="itemTest">
                            <div class="card-image-overlay">
                                <button class="view-detail-btn border-btn">
                                    <p class="text-bold">View Details</p>
                                </button>
                            </div>
                        </figure>
    
                        <div class="card-info">
                            <div class="card-info-detail">
                                <p class="text-sub card-info-detail-vendor">Vendor</p>
                                <p class="text-para card-info-detail-name">MisFit Ring</p>
                            </div>
                            <div class="card-info-price">
                                <p class="text-bold">$454.00</p>
                            </div>
                        </div>
                    </div>

                    <div id="15" class="card">
                        <figure class="card-image">
                            <img src="./img/itemTest.png" alt="itemTest">
                            <div class="card-image-overlay">
                                <button class="view-detail-btn border-btn">
                                    <p class="text-bold">View Details</p>
                                </button>
                            </div>
                        </figure>
    
                        <div class="card-info">
                            <div class="card-info-detail">
                                <p class="text-sub card-info-detail-vendor">Vendor</p>
                                <p class="text-para card-info-detail-name">MisFit Ring</p>
                            </div>
                            <div class="card-info-price">
                                <p class="text-bold">$454.00</p>
                            </div>
                        </div>
                    </div>
    
                    <div id="16" class="card">
                        <figure class="card-image">
                            <img src="./img/itemTest.png" alt="itemTest">
                            <div class="card-image-overlay">
                                <button class="view-detail-btn border-btn">
                                    <p class="text-bold">View Details</p>
                                </button>
                            </div>
                        </figure>
    
                        <div class="card-info">
                            <div class="card-info-detail">
                                <p class="text-sub card-info-detail-vendor">Vendor</p>
                                <p class="text-para card-info-detail-name">MisFit Ring</p>
                            </div>
                            <div class="card-info-price">
                                <p class="text-bold">$454.00</p>
                            </div>
                        </div>
                    </div>
    
                    <div id="17" class="card">
                        <figure class="card-image">
                            <img src="./img/itemTest.png" alt="itemTest">
                            <div class="card-image-overlay">
                                <button class="view-detail-btn border-btn">
                                    <p class="text-bold">View Details</p>
                                </button>
                            </div>
                        </figure>
    
                        <div class="card-info">
                            <div class="card-info-detail">
                                <p class="text-sub card-info-detail-vendor">Vendor</p>
                                <p class="text-para card-info-detail-name">MisFit Ring</p>
                            </div>
                            <div class="card-info-price">
                                <p class="text-bold">$454.00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="category-extended-btn">
                    <button class="extended-btn border-btn">
                        <p class="text-bold">VIEW MORE</p>
                    </button>
                </div>
            </div>
        </section>

        <button id="scroll-top-btn" class="scroll-top-btn">
            <span>&#708</span>
        </button>
    </main>
    
    <?php
        include_once 'layout/footer.html';
    ?>

    <!-- JS -->
    <script src="./js/customerMain.js"></script>
    <script src="./js/customerHome.js"></script>
</body>
</html>