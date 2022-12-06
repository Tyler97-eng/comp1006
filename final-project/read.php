<?php
  // session begins
  session_start();
  // give local values to the header variables for page title and description
  $title = "M-See-You | Profiles";
  $description = "read page to view currently registered members on the M-See-You forum";
  // require the global header
  require './templates/header.php';
  // if session admin_id is not equal to 1, user is not logged in so the user is redirected to the create page
  if($_SESSION['admin_id'] != 1){
    echo "<script>alert('Only admins can view registered profiles. Please sign-in as an admin.'); window.location.href='create.php';</script>";
    //exits the page if the echo fails
    exit();
  }else{
    // require the database file
    require 'database.php';
    // new class object created
    $profileObject = new ProfileDatabase();
    // if deleteProfile button is pressed and the value is not empty
    if(isset($_GET['deleteProfile']) && !empty($_GET['deleteProfile'])){
      // profileID variable stores value from deleteProfile
      $profileID = $_GET['deleteProfile'];
      // delete function is called while passing in the profileID
      $profileObject->delete($profileID);
    }
  }
?>
<main class="read">
  <!-- section holds background image and h1 -->
  <section class="rtop">
    <div>
      <h1>Registered Users</h1>
    </div>
  </section>
  <!-- section holds explanation of page and retrieved sql data in table rows -->
  <section class="profiles">
    <!-- div holds h2 and p elements to explain page -->
    <div>
      <h2>Users</h2>
      <p>Listed below are the current profiles for active users on the M-See-You forum. Admins may update or delete profiles by clicking on the update or delete icons beside each profile.</p>
      <p>Vel orci porta non pulvinar neque laoreet suspendisse interdum. Pellentesque habitant morbi tristique senectus et netus et. Ut porttitor leo a diam sollicitudin tempor id eu. Interdum varius sit amet mattis. In mollis nunc sed id semper. Vitae purus faucibus ornare suspendisse sed nisi lacus sed viverra. Nullam ac tortor vitae purus faucibus ornare suspendisse sed. Urna neque viverra justo nec.</p>
    </div>
    <!-- table element holds sql data -->
    <table>
      <!-- table head holds header cells that explain each column in the table -->
      <thead>
        <tr>
          <th>Profile#</th>
          <th>Username</th>
          <th>Full Name</th>
          <th>Date Joined</th>
          <th>Email</th>
          <th>Bio</th>
          <th>Favourite Film</th>
          <th>Favourite Character</th>
          <th>Update Profile</th>
          <th>Delete Profile</th>
        </tr>
      </thead>
      <!-- table body contains sql data in table cells -->
      <tbody>
        <?php
          // php opened up to store array values from read function
          $profiles = $profileObject->read();
          // foreach loop creates a new row for each row in the sql database
          foreach($profiles as $profile){
        ?>
        <!-- each table row retrieves the values for each entry from sql and echoes the data into each cell -->
        <tr>
          <td><?php echo $profile['profileId']; ?></td>
          <td><?php echo $profile['username']; ?></td>
          <td><?php echo $profile['fullName']; ?></td>
          <td><?php echo $profile['dateJoined']; ?></td>
          <td><?php echo $profile['email']; ?></td>
          <td><?php echo $profile['bio']; ?></td>
          <td><?php echo $profile['favouriteFilm']; ?></td>
          <td><?php echo $profile['favouriteCharacter']; ?></td>
          <!-- cell holds an img anchor that redirects the user to the update page for the specified profileId -->
          <td>
            <a href="update.php?profileID=<?php echo $profile['profileId']; ?>">
              <!-- image from: https://cdn-icons-png.flaticon.com/512/1596/1596900.png -->
              <img src="./img/edit.png" alt="Thor's hammer representing an edit button">
            </a>
          </td>
          <!-- cell holds an img anchor that reloads the read page and begins the profile deletion process based on the specified profileId -->
          <td>
            <a href="read.php?deleteProfile=<?php echo $profile['profileId']; ?>">
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
    <a href="./templates/signout.php" class="rout">Admin Sign-Out</a>
  </section>
</main>
<?php
  // require the global footer
  require './templates/footer.php';
?>
