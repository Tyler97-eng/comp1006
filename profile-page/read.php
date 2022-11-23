<?php
  // give local values to the header variables for page title and description
  $title = "Gamer's Paradise | Profiles";
  $description = "read page to create, read, update, and delete profiles on the forum";
  // require the global header
  require './templates/header.php';
  // require the database file
  require 'database.php';
  // new class object created
  $profileObject = new ProfileDatabase();
  // if deleteProfile button is pressed value is not empty
  if(isset($_GET['deleteProfile']) && !empty($_GET['deleteProfile'])){
    // profileID variable stores value from profileNumber
    $profileID = $_GET['deleteProfile'];
    // delete function is called while passing in the profileID
    $profileObject->delete($profileID);
  }
?>
<main class="read">
  <!-- section holds background image and h1 -->
  <section class="rtop">
    <div>
      <h1>Active Profiles</h1>
    </div>
  </section>
  <!-- section holds explanation of page and retrieved sql data in table rows -->
  <section class="profiles">
    <!-- div holds h2 and p element to explain page -->
    <div>
      <h2>Profiles</h2>
      <p>Listed below are the current profiles for active users on the Gamer's Paradise forum. Users may also update or delete their profiles by clicking on the update or delete icons beside each profile.</p>
    </div>
    <!-- table element holds sql data -->
    <table>
      <!-- table head holds header cells that explain each column in the table -->
      <thead>
        <tr>
          <th>Profile#</th>
          <th>Profile Picture</th>
          <th>Username</th>
          <th>Full Name</th>
          <th>Date Joined</th>
          <th>Email</th>
          <th>Bio</th>
          <th>Favourite Game</th>
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
          <td><?php echo $profile['profileNumber']; ?></td>
          <td><?php echo $profile['profilePicture']; ?></td>
          <td><?php echo $profile['username']; ?></td>
          <td><?php echo $profile['fullName']; ?></td>
          <td><?php echo $profile['dateJoined']; ?></td>
          <td><?php echo $profile['email']; ?></td>
          <td><?php echo $profile['bio']; ?></td>
          <td><?php echo $profile['favouriteGame']; ?></td>
          <!-- cell holds an img anchor that redirects the user to the update page for the specified profileNumber -->
          <td>
            <a href="update.php?profileID=<?php echo $profile['profileNumber']; ?>">
              <!-- image from: https://cdn4.iconfinder.com/data/icons/meBaze-Freebies/512/edit-user.png -->
              <img src="./img/edit.png" alt="edit user icon">
            </a>
          </td>
          <!-- cell holds an img anchor that reloads the read page and begins the profile deletion process based on the specified profileNumber -->
          <td>
            <a href="read.php?deleteProfile=<?php echo $profile['profileNumber']; ?>">
              <!-- image from: https://cdn4.iconfinder.com/data/icons/meBaze-Freebies/512/delete-user.png -->
              <img src="./img/delete.png" alt="delete user icon">
            </a>
          </td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </section>
</main>
<?php
  // require the global footer
  require './templates/footer.php';
?>
