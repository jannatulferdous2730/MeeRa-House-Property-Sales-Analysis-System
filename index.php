<?php
session_start();
include 'config/config.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : '';

$sql = "SELECT * FROM properties WHERE title LIKE '%$search%'";

if ($type) {
    $sql .= " AND type='$type'";
}

$result = $conn->query($sql);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeeRa - Choose your dream place</title>
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link href="assets/css/realvine.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body id="top">


  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
      <div class="container">

          <a href="index.php" class="logo">
              <ion-icon name="business-outline"></ion-icon> MeeRa
          </a>

          <nav class="navbar container" data-navbar>
              <ul class="navbar-list">

                  <li>
                      <a href="index.php" class="navbar-link" data-nav-link>Home</a>
                  </li>

                  <!-- <li>
                      <a href="#" class="navbar-link" data-nav-link>Buy</a>
                  </li>

                  <li>
                      <a href="#" class="navbar-link" data-nav-link>Sell</a>
                  </li> -->

                  <li>
                      <a href="#property" class="navbar-link" data-nav-link>Listing</a>
                  </li>

                  <li>
                      <a href="#about" class="navbar-link" data-nav-link>About Us</a>
                  </li>

                  <li>
                      <a href="#contact" class="navbar-link" data-nav-link>Contact</a>
                  </li>

              </ul>
          </nav>

          <div class="dropdown-button">
              <?php if (isset($_SESSION['user_id'])) { ?>
                  <button class="signin-button">Profile</button>
                  <div class="dropdown-content">
                      <button><a href="profile.php">My Profile</a></button>
                      <button><a href="logout.php">Sign Out</a></button>
                  </div><?php } else { ?>
                  <button class="signin-button">Sign In</button>
                  <div class="dropdown-content">
                      <button><a href="admin/login.php">Admin SignIn</a></button>
                      <button><a href="login.php">User SignIn</a></button>
                  </div> <?php } ?>
          </div>

          <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
              <ion-icon name="menu-outline" aria-hidden="true" class="menu-icon"></ion-icon>
              <ion-icon name="close-outline" aria-hidden="true" class="close-icon"></ion-icon>
          </button>

      </div>
  </header>


    <main>
        <article class="article">

            <!-- 
        - #HERO
      -->

            <section class="section hero" aria-label="hero">
                <div class="container">

                    <div class="hero-bg">
                        <div class="hero-content">

                            <h1 class="h1 hero-title">
                                We will help you find your <span class="span">Wonderful</span> home
                            </h1>

                            <p class="hero-text">
                                A great plateform to buy, sell and rent your properties without any agent or commisions.
                            </p>

                        </div>
                    </div>

                    <div class="hero-form-wrapper">


                        <form action="" class="hero-form">

                            <div class="input-wrapper">

                                <label for="search" class="input-label">Search : *</label>

                                <input type="search" name="search" id="search" placeholder="Search your home" required class="input-field">

                                <ion-icon name="search-outline"></ion-icon>

                            </div>

                            <div class="input-wrapper">
                                <label for="category" class="input-label">Select Categories:</label>

                                <select name="category" id="category" class="dropdown-list">

                                    <option value="house">House</option>
                                    <option value="apartment">Apartment</option>
                                    <option value="offices">Offices</option>
                                    <option value="townhome">Townhome</option>

                                </select>
                            </div>

                            <div class="input-wrapper">
                                <label for="min-price" class="input-label">Min Price :</label>

                                <select name="min-price" id="min-price" class="dropdown-list">

                                    <option value="min price">Min Price</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                    <option value="2000">2000</option>
                                    <option value="3000">3000</option>
                                    <option value="4000">4000</option>
                                    <option value="5000">5000</option>
                                    <option value="6000">6000</option>

                                </select>
                            </div>

                            <div class="input-wrapper">
                                <label for="max-price" class="input-label">Max Price :</label>

                                <select name="max-price" id="max-price" class="dropdown-list">

                                    <option value="max price">Max Price</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                    <option value="2000">2000</option>
                                    <option value="3000">3000</option>
                                    <option value="4000">4000</option>
                                    <option value="5000">5000</option>
                                    <option value="6000">6000</option>

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Search now</button>

                        </form>
                    </div>

                </div>
            </section>





            <!-- 
        - #ABOUT
      -->

            <section class="section about" aria-label="about">
                <div id="about" class="container">

                    <div class="about-banner img-holder" style="--width: 600; --height: 700;">
                        <img src="assets/images/about-banner.jpg" width="600" height="700" loading="lazy" alt="about banner" class="img-cover">

                        <button class="play-btn" aria-label="play video">
                            <ion-icon name="play" aria-hidden="true"></ion-icon>
                        </button>
                    </div>

                    <div class="about-content">

                        <h2 class="h2 section-title">Efficiency. Transparency. Control.</h2>

                        <p class="section-text">
                            Hously developed a platform for the House Property sales marketplace that allows buyers and sellers to easily
                            execute a
                            transaction on their own. The platform drives efficiency, cost transparency and control into the hands of
                            the consumers.
                            Hously is Real Estate Redefined.
                        </p>

                        <a href="addProperty.php" class="btn btn-primary">Add Property</a>


                    </div>

                </div>
            </section>





            <!-- 
        - #SERVICE
      -->

            <section class="section service" aria-label="service">
                <div class="container">

                    <h2 class="h2 section-title">How It Works</h2>

                    <p class="section-text">
                        A great plateform to buy, sell and rent your properties without any agent or commisions.
                    </p>

                    <ul class="service-list">

                        <li>
                            <div class="service-card">

                                <div class="card-icon">
                                    <ion-icon name="home-outline"></ion-icon>
                                </div>

                                <h3 class="h3 card-title">Evaluate Property</h3>

                                <p class="card-text">
                                    If the distribution of letters and 'words' is random, the reader will not be distracted from making.
                                </p>

                            </div>
                        </li>

                        <li>
                            <div class="service-card">

                                <div class="card-icon">
                                    <ion-icon name="briefcase-outline"></ion-icon>
                                </div>

                                <h3 class="h3 card-title">Meeting with Agent</h3>

                                <p class="card-text">
                                    If the distribution of letters and 'words' is random, the reader will not be distracted from making.
                                </p>

                            </div>
                        </li>

                        <li>
                            <div class="service-card">

                                <div class="card-icon">
                                    <ion-icon name="key"></ion-icon>
                                </div>

                                <h3 class="h3 card-title">Close the Deal</h3>

                                <p class="card-text">
                                    If the distribution of letters and 'words' is random, the reader will not be distracted from making.
                                </p>

                            </div>
                        </li>

                    </ul>

                </div>
            </section>





            <!-- 
        - #PROPERTY
      -->

            <section class="section property" aria-label="property">
                <div id="property" class="container">

                    <h2 class="h2 section-title">Featured Properties</h2>

                    <p class="section-text">
                        A great plateform to buy, sell and rent your properties without any agent or commisions.
                    </p>

                    <ul class="property-list">
                        <?php $query = mysqli_query($conn, "SELECT * FROM properties ORDER BY property_id DESC");
                        while ($row = mysqli_fetch_array($query)) { ?>
                            <li>
                                <div class="property-card">

                                    <figure class="card-banner img-holder" style="--width: 800; --height: 533;">
                                        <img src="assets/images/<?php echo $row['property_image']; ?>" width="800" height="533" loading="lazy" alt="B-block Hillshire Ave, Bosundora, Dhaka, Bangladesh" class="img-cover">
                                    </figure>

                                    <!-- <button class="card-action-btn" aria-label="add to favourite">
                                    <ion-icon name="heart" aria-hidden="true"></ion-icon>
                                </button> -->

                                    <div class="card-content">

                                        <h3 class="h3">
                                            <a href="property_details.php?property_id=<?php echo $row['property_id']; ?>" class="card-title"><?php echo $row['title']; ?>, <?php echo $row['address']; ?></a>
                                        </h3>

                                        <ul class="card-list">

                                            <li class="card-item">
                                                <div class="item-icon">
                                                    <ion-icon name="cube-outline"></ion-icon>
                                                </div>

                                                <span class="item-text"><?php echo $row['area_size']; ?>sqf</span>
                                            </li>

                                            <li class="card-item">
                                                <div class="item-icon">
                                                    <ion-icon name="bed-outline"></ion-icon>
                                                </div>

                                                <span class="item-text"><?php echo $row['bedroom']; ?> Beds</span>
                                            </li>

                                            <li class="card-item">
                                                <div class="item-icon">
                                                    <ion-icon name="man-outline"></ion-icon>
                                                </div>

                                                <span class="item-text"><?php echo $row['bathroom']; ?> Baths</span>
                                            </li>

                                        </ul>

                                        <div class="card-meta">

                                            <div>
                                                <span class="meta-title">Price</span>

                                                <span class="meta-text"><?php echo $row['price']; ?>৳</span>
                                            </div>

                                            <div>
                                                <span class="meta-title">Type</span>

                                                <span class="meta-text"><?php echo $row['property_type']; ?></span>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </li>
                        <?php } ?>

                    </ul>

                </div>
            </section>





            <!-- 
        - #CONTACT
      -->

            <section class="section contact" aria-label="contact">
                <div id="contact" class="container">

                    <h2 class="h2 section-title">Have Question ? Get in touch!</h2>

                    <p class="section-text">
                        A great plateform to buy, sell and rent your properties without any agent or commisions.
                    </p>

                    <button class="btn btn-primary">
                        <ion-icon name="call-outline"></ion-icon>

                        <span class="span">Contact us</span>
                    </button>

                </div>
            </section>





            <!-- 
        - #NEWSLETTER
      -->

            <section class="newsletter" aria-label="newsletter">
                <div class="container">

                    <div class="wrapper">
                        <h2 class="h2 section-title">Subscribe to Newsletter!</h2>

                        <p class="section-text">Subscribe to get latest updates and information.</p>
                    </div>

                    <form action="" class="newsletter-form">
                        <input type="email" name="email_address" placeholder="Enter your email :" aria-label="Enter your email" required class="email-field">

                        <button type="submit" class="btn btn-secondary">Subscribe</button>
                    </form>

                </div>
            </section>

        </article>
    </main>

    <!-- 
    - #FOOTER
  -->


<!-- 
    - #FOOTER
  -->

  <footer class="footer">

<div class="footer-top">
    <div class="container">

        <div class="footer-brand">

            <a href="#" class="logo">
                <ion-icon name="business-outline"></ion-icon> MeeRa
            </a>

            <p class="footer-text">
                A great plateform to buy and sell your properties without any agent or commisions.
            </p>

        </div>

        <ul class="footer-list">

            <li>
                <p class="footer-list-title">Company</p>
            </li>

            <li>
                <a href="#" class="footer-link">
                    <ion-icon name="chevron-forward"></ion-icon>

                    <span class="span">About us</span>
                </a>
            </li>

            <li>
                <a href="#" class="footer-link">
                    <ion-icon name="chevron-forward"></ion-icon>

                    <span class="span">Services</span>
                </a>
            </li>

            <li>
                <a href="#" class="footer-link">
                    <ion-icon name="chevron-forward"></ion-icon>

                    <span class="span">Pricing</span>
                </a>
            </li>

            <li>
                <a href="#" class="footer-link">
                    <ion-icon name="chevron-forward"></ion-icon>

                    <span class="span">Blog</span>
                </a>
            </li>

            <li>
                <a href="#" class="footer-link">
                    <ion-icon name="chevron-forward"></ion-icon>

                    <span class="span">Login</span>
                </a>
            </li>

        </ul>

        <ul class="footer-list">

            <li>
                <p class="footer-list-title">Useful Links</p>
            </li>

            <li>
                <a href="#" class="footer-link">
                    <ion-icon name="chevron-forward"></ion-icon>

                    <span class="span">Terms of Services</span>
                </a>
            </li>

            <li>
                <a href="#" class="footer-link">
                    <ion-icon name="chevron-forward"></ion-icon>

                    <span class="span">Privacy Policy</span>
                </a>
            </li>

            <li>
                <a href="#" class="footer-link">
                    <ion-icon name="chevron-forward"></ion-icon>

                    <span class="span">Listing</span>
                </a>
            </li>

            <li>
                <a href="#" class="footer-link">
                    <ion-icon name="chevron-forward"></ion-icon>

                    <span class="span">Contact</span>
                </a>
            </li>

        </ul>

        <ul class="footer-list">

            <li>
                <p class="footer-list-title">Contact Details</p>
            </li>

            <li class="footer-item">
                <ion-icon name="location-outline"></ion-icon>

                <address class="address">
                    C/54 Meera villa,<br>
                    Hathazari,<br>
                    Ctg, Bangladesh
                    <a href="#" class="address-link">View on Google map</a>
                </address>
            </li>

            <li class="footer-item">
                <ion-icon name="mail-outline"></ion-icon>

                <a href="mailto:jannatulferdous.iiuc.97@gmail.com" class="footer-link">jannatulferdous.iiuc.97@gmail.com</a>
            </li>

            <li class="footer-item">
                <ion-icon name="call-outline"></ion-icon>

                <a href="tel:+8801882652527" class="footer-link">+880 18826-52527</a>
            </li>

        </ul>

    </div>
</div>

<div class="footer-bottom">
    <div class="container">

        <p class="copyright">
            &copy; 2024 MeeRa . All Right Reserved by <a href="https://www.facebook.com/profile.php?id=100072528107864" class="copyright-link"> 𝘑𝘢𝘯𝘯𝘢𝘵𝘶𝘭 𝘍𝘦𝘳𝘥𝘰𝘶𝘴 </a>.
        </p>

        <ul class="social-list">

            <li>
                <a href="#" class="social-link">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
            </li>

            <li>
                <a href="#" class="social-link">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
            </li>

            <li>
                <a href="#" class="social-link">
                    <ion-icon name="logo-twitter"></ion-icon>
                </a>
            </li>

            <li>
                <a href="#" class="social-link">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a>
            </li>

        </ul>

    </div>
</div>

</footer>


    <!-- 
    - #BACK TO TOP
  -->

    <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
        <ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
    </a>





    <!-- 
    - custom js link
  -->
    <script src="assets/js/realvine.js" defer></script>

    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>