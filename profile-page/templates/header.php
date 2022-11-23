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
  <body>
    <header>
      <div class="logo">
        <!-- div to hold anchor and PHP logo -->
        <a href="index.php" target="#">
          <!-- image from: https://cdnb.artstation.com/p/assets/images/images/006/024/065/large/anthony-beyer-anthony-beyer-logo.jpg?1495490840 -->
          <img src="./img/site-logo.jpg" alt="Gamer's Paradise logo">
        </a>
      </div>
      <nav>
        <!-- navigation contains a ul with three different site pages -->
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="read.php">Profiles</a></li>
          <li><a href="create.php">Create Profile</a></li>
        </ul>
      </nav>
    </header>
<!-- html is closed in footer -->
