<?php
  // session begins
  session_start();
  // give local values to the header variables for page title and description
  $title = "M-See-You | Content";
  $description = "main content page for the M-See-You fan forum containing posts by registered members";
  // require the global header
  require './templates/header.php';
  // require the database file
  require 'database.php';
  // new class object created
  $profileObject = new ProfileDatabase();
  // if deletePost button is pressed AND value is not empty AND session admin_id is equal to 1 (user is logged in)
  if(isset($_GET['deletePost']) && !empty($_GET['deletePost']) && $_SESSION['admin_id'] == 1){
    // profileID variable stores value from deletePost
    $profileID = $_GET['deletePost'];
    // deletePost function is called while passing in the profileID
    $profileObject->deletePost($profileID);
  }
  // else if deletePost button is pressed AND value is not empty AND session admin_id is NOT equal to 1 (user is NOT logged in)
  else if(isset($_GET['deletePost']) && !empty($_GET['deletePost']) && $_SESSION['admin_id'] != 1){
    // user is redirected to create page to create an admin account or sign in as an admin
    echo "<script>alert('Only admins can delete a post. Please sign-in as an admin.'); window.location.href='create.php';</script>";
  }
?>
<main class="about">
  <!-- section holds background image and h1 -->
  <section class="atop">
    <div>
      <h1>M-See-You Forum</h1>
    </div>
  </section>
  <!-- section holds explanation of page and retrieved sql data in table rows -->
  <section class="posts">
    <!-- div holds h2 and p elements to explain page -->
    <div>
      <h2>User Posts</h2>
      <p>This page allows you to view the current user posts on the M-See-You. Admins may update or delete posts by clicking on the update or delete icons located beside each post if they find any offensive content.</p>
      <p>Vel orci porta non pulvinar neque laoreet suspendisse interdum. Pellentesque habitant morbi tristique senectus et netus et. Ut porttitor leo a diam sollicitudin tempor id eu. Interdum varius sit amet mattis. In mollis nunc sed id semper. Vitae purus faucibus ornare suspendisse sed nisi lacus sed viverra. Nullam ac tortor vitae purus faucibus ornare suspendisse sed. Urna neque viverra justo nec.</p>
    </div>
    <!-- table element holds sql data -->
    <table>
      <!-- table head holds header cells that explain each column in the table -->
      <thead>
        <tr>
          <th>Profile Icon</th>
          <th>Profile#</th>
          <th>Username</th>
          <th>Post</th>
          <th>Date Posted</th>
          <th>Edit Post</th>
          <th>Delete Post</th>
        </tr>
      </thead>
      <!-- table body contains sql data in table cells -->
      <tbody>
        <?php
          // php opened up to store array values from readPost function
          $profiles = $profileObject->readPost();
          // foreach loop creates a new row for each row in the sql database
          foreach($profiles as $profile){
        ?>
        <!-- each table row retrieves the values for each entry from sql and echoes the data into each cell -->
        <tr>
          <!-- image from: https://cdn.imgbin.com/24/11/17/imgbin-iron-man-captain-america-phil-coulson-marvel-cinematic-universe-s-h-i-e-l-d-iron-man-yEN5pr6Z3H7M18QMxGgsxiUYm.jpg -->
          <td><img src="./img/profile.png" alt="basic profile image of the SHIELD logo"></td>
          <td><?php echo $profile['profileId']; ?></td>
          <td><?php echo $profile['username']; ?></td>
          <td><?php echo $profile['post']; ?></td>
          <td><?php echo $profile['datePosted']; ?></td>
          <!-- cell holds an img anchor that redirects the user to the edit page for the specified profileId -->
          <td>
            <a href="edit.php?profileID=<?php echo $profile['profileId']; ?>">
              <!-- image from: https://cdn-icons-png.flaticon.com/512/1596/1596900.png -->
              <img src="./img/edit.png" alt="Thor's hammer representing an edit button">
            </a>
          </td>
          <!-- cell holds an img anchor that reloads the about page and begins the profile deletion process based on the specified profileId -->
          <td>
            <a href="about.php?deletePost=<?php echo $profile['profileId']; ?>">
              <!-- image from: https://e7.pngegg.com/pngimages/148/212/png-clipart-fist-hand-gesture-bruce-banner-she-hulk-fist-craft-magnets-marvel-comics-she-hulk-marvel-avengers-assemble-comics-thumbnail.png -->
              <img src="./img/delete.png" alt="Hulk's hand representing a delete button">
            </a>
          </td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
    <!-- anchor element lets the user sign out by opening the signout page -->
    <a href="./templates/signout.php" class="aout">Admin Sign-Out</a>
  </section>
</main>
<?php
  // require the global footer
  require './templates/footer.php';
?>
