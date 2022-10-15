<!doctype html>
<html lang="en">
  <head>
    <!-- adding the meta data -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>HortonSQL | Home</title>
		<meta name="description" content="homepage describes the basic CRUD system of HortonSQL">
    <meta name="robots" content="noindex, nofollow">
    <!-- adding the fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Roboto&display=swap" rel="stylesheet">
    <!-- linking the html document to the css document -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- add Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
		<!-- JavaScript file added -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="home">
    <header>
      <div class="logo">
        <!-- div to hold anchor and PHP logo -->
        <a href="index.php" target="#">
          <!-- image from: https://www.entropywins.wtf/blog/wp-content/uploads/2018/10/php-1.png -->
          <img src="./img/sql-logo.png" alt="HortonSQL logo">
        </a>
      </div>
      <nav>
        <!-- navigation contains a ul with two different site pages -->
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="view.php">Database</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <section class="masthead">
        <!-- div to hold CSS background image with h1 in foreground -->
        <div>
          <h1>Databases should be easy to use and reliable...</h1>
        </div>
      </section>
      <section class="welcome">
        <div>
          <!-- h2 to welcome customers -->
          <h2>Welcome to HortonSQL</h2>
          <!-- p element to hold a brief description of the service offered -->
          <p>At HortonSQL, we provide an easy-to-use database service to allow users to create, view, and share database content. We know that you don't want to enter information into a database and lose that information forever. That's why HortonSQL is a service you can trust as we make it our top priority to store user database entries inside our 1,000,000 terrabytes of server storage space. Remember: if you have data you can't lose, make sure you trust the elephant blue!</p>
        </div>
      </section>
      <!-- section has three columns -->
      <section class="columns">
        <!-- each column is stored in a div with an h3 and p element -->
        <div>
          <h3>Create</h3>
          <p>On HortonSQL, you can create your own database entries that will be stored forever</p>
        </div>
        <div>
          <h3>View</h3>
          <p>Browse the diverse HortonSQL database with pre-made and user-made entries</p>
        </div>
        <div>
          <h3>Share</h3>
          <p>Display your HortonSQL database entries with friends and family</p>
        </div>
      </section>
    </main>
  <!-- footer section has four columns -->
  <footer>
    <!-- each footer column is stored in a div with h4 and a elements -->
      <div>
        <h4>Resources For</h4>
        <!-- when clicked, each anchor element leads to the current page -->
        <a href="#">Students</a>
        <!-- br element used between anchor elements to make the footer more appealing -->
        <br>
        <a href="#">Teachers</a>
        <br>
        <a href="#">Businesses</a>
        <br>
        <a href="#">Investors</a>
        <br>
        <a href="#">Partners</a>
      </div>
      <div>
        <h4>About HortonSQL</h4>
        <a href="#">Database</a>
        <br>
        <a href="#">Server Storage</a>
        <br>
        <a href="#">Cloud Computing</a>
        <br>
        <a href="#">Reports</a>
        <br>
        <a href="#">Privacy and Security</a>
      </div>
      <div>
        <h4>Learn More</h4>
        <a href="#">MySQL</a>
        <br>
        <a href="#">HTML</a>
        <br>
        <a href="#">PHP</a>
        <br>
        <a href="#">CRUD</a>
        <br>
        <a href="#">CSS</a>
      </div>
      <div class="last">
        <h4>Contact Us</h4>
        <!-- p elements used to display contact info -->
        <p>Email: HortonSQL@email.com</p>
        <p>Phone: (705) 555-DATA</p>
        <p>Address: 2 Clumbo Avenue Atlantis,OH</p>
        <a href="#">FAQ</a>
        <br>
        <a href="#">Events</a>
        <br>
        <br>
        <p>All Rights Reserved, Copyright 2022, HortonSQL</p>
      </div>
  </footer>
  </body>
</html>
