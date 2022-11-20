<?php
  // give local values to the header variables for page title and description
  $title = "Gamer's Paradise | Edit Profile";
  $description = "page to edit a profile on Gamer's Paradise";
  // require the global header
  require './templates/header.php';
  // require the database file
  require 'database.php';
  $profileObject = new ProfileDatabase();
  // if profileID is set with a value, return the data from that row
  if(isset($_GET['profileID']) && !empty($_GET['profileID'])){
    $profileID = $_GET['profileID'];
    $profile = $profileObject->fetchProfile($profileID);
  }
  // if update is set, values in profileObject are updated
  if(isset($_POST['update'])){
    $profileObject->update($_POST);
  }
?>
<main>
  <section>
    <div>
      <h2>Update Profile</h2>
    </div>
    <div>
      <p>Here you can update your profile...</p>
    </div>
  </section>
  <section>
    <form action="update.php" method="POST">
      <div>
        <!-- input type is hidden for profile number to not allow user to update value -->
        <input type="hidden" name="profileNumber" value="<?php $profile['profileNumber']; ?>">
      </div>
      <div>
        <label for="profilePicture">Profile Picture Description:</label>
        <input type="text" name="updatedProfilePicture" value="<?php echo $profile['profilePicture']; ?>" required>
      </div>
      <div>
        <label for="username">Username:</label>
        <input type="text" name="updatedUsername" value="<?php echo $profile['username']; ?>" required>
      </div>
      <div>
        <label for="fullName">Full Name:</label>
        <input type="text" name="updatedFullName" value="<?php echo $profile['fullName']; ?>">
      </div>
      <div>
        <!-- input type is hidden for profile number to not allow user to update value -->
        <input type="hidden" name="dateJoined" value="<?php echo $profile['dateJoined']; ?>">
      </div>
      <div>
        <label for="email">Email Address:</label>
        <input type="email" name="updatedEmail" value="<?php echo $profile['email']; ?>" required>
      </div>
      <div>
        <label for="bio">Profile Bio:</label>
        <input type="text" name="updatedBio" value="<?php echo $profile['bio']; ?>">
      </div>
      <div>
        <label for="favouriteGame">Favourite Game:</label>
        <input type="text" name="updatedFavouriteGame" value="<?php echo $profile['favouriteGame']; ?>">
      </div>
      <div>
        <input type="submit" name="update" value="Update Profile">
      </div>
      <!-- reset button -->
      <div>
        <input class="reset" type="reset" value="Reset Values">
      </div>
    </form>
  </section>
</main>
<?php
  // require the global footer
  require './templates/footer.php';
?>
