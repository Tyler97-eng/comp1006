<!doctype html>
<!-- global header -->
<html lang="en">
  <head>
    <!-- adding the meta data -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- empty variables for title and description to edit in each document -->
		<title><?php echo $title; ?></title>
		<meta name="description" content="<?php echo $description; ?>">
    <meta name="robots" content="noindex, nofollow">
    <!-- adding the fonts; Noto for titles, Poppins for budy -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Khojki&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- linking the html document to the css document -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- add Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
		<!-- JavaScript file added -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <header>
      <nav>
        <!-- navigation contains a ul with five different site pages -->
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">Content</a></li>
          <!-- third li holds the a element with the site logo; image from: https://logos-world.net/wp-content/uploads/2020/11/Spider-Man-Emblem.png -->
          <li class="logo"><a href="index.php"><img src="./img/mcu-logo.png" alt="M-See-You site logo"></a></li>
          <li><a href="create.php">Register</a></li>
          <li><a href="read.php">Profiles</a></li>
        </ul>
      </nav>
    </header>
<!-- html is closed in footer -->
