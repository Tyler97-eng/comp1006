<?php
  // give local values to the header variables for page title and description
  $title = "Gamer's Paradise | Profiles";
  $description = "read page to create, read, update, and delete profiles on the forum";
  // require the global header
  require './templates/header.php';
  // require the database file
  require 'database.php';
  $profileObject = new ProfileDatabase();
  // delete function
  if(isset($_GET['deleteProfile']) && !empty($_GET['deleteProfile'])){
    $profileID = $_GET['deleteProfile'];
    $profileObject->delete($profileID);
  }
?>
<main>
  <section class="read">
    <h2>Profiles</h2>
    <table>
      <thead>
        <tr>
          <th>Profile #</th>
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
      <tbody>
        <?php
          $profiles = $profileObject->read();
          foreach($profiles as $profile){
        ?>
        <tr>
          <td><?php echo $profile['profileNumber']; ?></td>
          <td><?php echo $profile['profilePicture']; ?></td>
          <td><?php echo $profile['username']; ?></td>
          <td><?php echo $profile['fullName']; ?></td>
          <td><?php echo $profile['dateJoined']; ?></td>
          <td><?php echo $profile['email']; ?></td>
          <td><?php echo $profile['bio']; ?></td>
          <td><?php echo $profile['favouriteGame']; ?></td>
          <td>
            <button>
              <a href="update.php?profileID=<?php echo $profile['profileNumber']; ?>">
                <p>Update</p>
              </a>
            </button>
            <button>
              <a href="read.php?deleteProfile=<?php echo $profile['profileNumber']; ?>">
                <p>Delete</p>
              </a>
            </button>
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
