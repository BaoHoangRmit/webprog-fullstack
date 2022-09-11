<?php
    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        // echo 'ok' . 'login van return $_SESSION[current_user] voi mang rong -> van chuyen my account khi an quay lai sau khi dang nhap sai mkhau';
        // echo '<br>';
        // echo 'test above function again but for now have fixed';
        // if (isset($_SESSION['current_user'])) {
		//     echo '<pre>';
		//     print_r($_SESSION['current_user']);
		//   	echo '</pre>';
		// }
    } else {
        // echo 'not ok';
    }
    // if (isset($_SESSION['current_user'])) {
    //     echo '<pre>';
    //     print_r($_SESSION['current_user']);
    //       echo '</pre>';
    // } else {
    //     echo 'no cookie';
    // }
    include_once 'product-file-control.php';
    include_once 'filter.php';

    $_SESSION['allProducts'] = read_product_file();
    $_SESSION['displayProducts'] = [];

    $selected_func = 'name_cmp';
    if (isset($_GET['filter-category-sort']) && !empty($_GET['filter-category-sort'])) {       
		if (array_key_exists($_GET['filter-category-sort'], $mapping)) {
			$selected_func = $mapping[$_GET['filter-category-sort']];
            unset($_SESSION['displayProducts']);
		} else {
            unset($_SESSION['displayProducts']);
        }
	} else {
        unset($_SESSION['displayProducts']);
    }
    usort($_SESSION['allProducts'], $selected_func);
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
            location.href = `./customerDetail.php?${urlParams}`;
        }
    </script>

    <title>Customer | Home</title>
</head>
<body id = "customerIndex">
    
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

                <?php 
                    if (isset($_SESSION['displayProducts'])) {
                        $_SESSION['allProducts'] = [];
                        $_SESSION['allProducts'] = $_SESSION['displayProducts'];
                    }   

                    $length = count($_SESSION['allProducts']);
                    if($length > 5){
                        $length = 5;
                    }
                    for ($i=0; $i < $length; $i++) { 
                        $product = $_SESSION['allProducts'][$i];
                        foreach ($product as $key => $value) {
                            $id = "itemFS" . strval($product['id']);
                            $name = $product['name'];
                            $price = strval($product['price']);
                            $img = $product['img'];
                            $desc = $product['desc'];
                            $ven = $product['ven'];
                        }
                        echo '';
                        echo '
                        <div class="card" onclick="viewDetail(\'' .$id. '\')">
                            <figure class="card-image">
                                <img src= "' . $img . '" alt="itemTest">
                                <div class="card-image-overlay">
                                    <button class="view-detail-btn border-btn">
                                        <p class="text-bold">View Details</p>
                                    </button>
                                </div>
                            </figure>
    
                            <div class="card-info">
                                <div class="card-info-detail">
                                    <p class="text-sub card-info-detail-vendor">' . $ven . '</p>
                                    <p class="text-para card-info-detail-name">' . $name . '</p>
                                </div>
                                <div class="card-info-price">
                                    <p class="text-bold">$' . $price . '</p>
                                </div>
                            </div>
                        </div>';
                    }
                        
                    ?>
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
            <form id="update-email" onsubmit="return false;">
                <input type="email" id="emailUpdate" name="emailUpdate" placeholder="Email">
                <button id="update-submit"><p class="text-para">Go</p></button>
            </form>
        </section>

        <section id = "filter-category">
            <div id = "filter-category-info">
                <form id = "filter-category-info-form" action="#category">
                    <p class="text-para filter-category-info-heading">Sort by</p>
                    <input type="radio" id = "category-sort-price" name = "filter-category-sort" value="price">
                    <label for="category-sort-price" class="text-para">Price</label>

                    <input type="radio" id = "category-sort-name" name = "filter-category-sort" value="name">
                    <label for="category-sort-name" class="text-para">Name</label>

                    <input type="radio" id = "category-sort-newest" name = "filter-category-sort" value="createdTime">
                    <label for="category-sort-price" class="text-para">Newest</label>
                </form>
                <div id = "filter-category-btn-list">
                    <button class="border-btn" id="close-filter-btn"><p class="text-para">Close</p></button>
                        
                    <input type="submit" id="submit-filter-btn" class="bg-btn text-para" value="Go" form="filter-category-info-form">
                </div>
            </div>
            <div id = "filter-category-background"></div>
        </section>

        <section id="category">
            <div id="category-heading">
                <h2>All Products</h2>

                <form id="category-heading-search" method="GET" action="#category">
                    <input type="text" name="search-bar" id="search-bar" placeholder="Search">

                    <div id="category-heading-search-icon">
                        <img src="img/icon/Search.png" alt="magnifying glass">
                    </div>
                </form>
                
                <div class="filter-container">
                    <button id="filter-btn">
                        <img src="./img/icon/filter.svg" alt="filter">
                        <p class="text-bold">Filter</p>
                    </button>

                    <a href="index.php#category" class="text-para">Clear</a>
                </div>
                
            </div>

            <div id="category-container">
                <h3 id="category-list-notification">Sorry, we can't find any suitable products for you!</h3>

                <div id="category-list" class="list-vertical">
                    <?php 
                        if (isset($_SESSION['displayProducts'])) {
                            $_SESSION['allProducts'] = [];
                            $_SESSION['allProducts'] = $_SESSION['displayProducts'];
                        }
                        $searchVal = 'search-value';
                        if (isset($_GET['search-bar']) && !empty($_GET['search-bar'])){
                            $currentUrlCus = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            $searchVal = parse_url($currentUrlCus);
                            parse_str($searchVal['query'], $params);
                            $searchVal = $params['search-bar'];
                        }

                        $length = count($_SESSION['allProducts']);
                        for ($i=0; $i < $length; $i++) { 
                            $product = $_SESSION['allProducts'][$i];
                            $check = 0;
                            foreach ($product as $key => $value) {
                                $id = strval($product['id']);
                                $name = $product['name'];
                                $price = strval($product['price']);
                                $img = $product['img'];
                                $desc = $product['desc'];
                                $ven = $product['ven'];
                            }
                            if($searchVal == 'search-value'){
                                $check = 1;
                            }else{
                                if(str_contains($name, $searchVal)){
                                    $check = 1;
                                }else{
                                    $check = 0;
                                }
                            }
                            if($check == 1){
                                echo "<div class=\"card\" onclick=\"viewDetail('itemFS" . $id . "')\">";
                                echo "<figure class='card-image'>";
                                echo "<img src='" . $img . "' alt='itemTest'>";
                                echo "<div class='card-image-overlay'>";
                                echo "<button class='view-detail-btn border-btn' onclick=\"viewDetail('itemFS". $id .  "')\">";
                                echo "<p class='text-bold'>View Details</p>";
                                echo "</button>";
                                echo '</div>';
                                echo '</figure>';
    
                                echo "<div class='card-info'>";
                                echo "<div class='card-info-detail'>";
                                echo "<p class='text-sub card-info-detail-vendor'>" . $ven . "</p>";
                                echo "<p class='text-para card-info-detail-name'>" . $name . "</p>";
                                echo '</div>';
                                echo "<div class='card-info-price'>";
                                echo "<p class='text-bold'>$" . $price . "</p>";
                                echo '</div>';
                                echo '</div>';
    
                                echo '</div>';
                            }
                        }
                        
                    ?>
    
                    <!-- <div id="17" class="card">
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
                    </div> -->
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