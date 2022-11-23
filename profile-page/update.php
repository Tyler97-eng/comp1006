<?php
  // give local values to the header variables for page title and description
  $title = "Gamer's Paradise | Update Profile";
  $description = "page to update a profile on Gamer's Paradise";
  // require the global header
  require './templates/header.php';
  // require the database file
  require 'database.php';
  // new class object created
  $profileObject = new ProfileDatabase();
  // if profileID is set with a value and is not empty
  if(isset($_GET['profileID']) && !empty($_GET['profileID'])){
    // profileID variable stores value from profileNumber
    $profileID = $_GET['profileID'];
    // profile variable holds array data from specific row based on profileID
    $profile = $profileObject->fetchProfile($profileID);
  }
  // if update is set, values in profileObject are updated with update function
  if(isset($_POST['update'])){
    $profileObject->update($_POST);
  }
?>
<main class="update">
  <!-- section holds introductory h1 and p elements -->
  <section class="utop">
    <div>
      <h1>Update Profile</h1>
    </div>
    <div>
      <p>On this page, you may update your profile information. When done, click on the 'Update Profile' button to finalize your profile changes.</p>
    </div>
  </section>
  <!-- section holds form to update profile data -->
  <section class="data">
    <form action="update.php" method="POST">
      <!-- each label and input are placed in individual div elements for easier CSS -->
      <!-- input for profileNumber -->
      <div>
        <!-- input type is hidden for profile number to not allow user to update value -->
        <input type="hidden" name="updatedProfileNumber" value="<?php echo $profile['profileNumber']; ?>">
      </div>
      <!-- br element for better looking page as profileNumber input does not appear, messing up the appeal of the form -->
      <br>
      <!-- input for profilePicture, required -->
      <div>
        <label for="profilePicture">Profile Picture Description:</label>
        <div>
          <input type="text" name="updatedProfilePicture" value="<?php echo $profile['profilePicture']; ?>" required>
        </div>
      </div>
      <!-- input for username, required -->
      <div>
        <label for="username">Username:</label>
        <div>
          <input type="text" name="updatedUsername" value="<?php echo $profile['username']; ?>" required>
        </div>
      </div>
      <!-- input for fullName -->
      <div>
        <label for="fullName">Full Name:</label>
        <div>
          <input type="text" name="updatedFullName" value="<?php echo $profile['fullName']; ?>">
        </div>
      </div>
      <!-- input for email, required -->
      <div>
        <label for="email">Email Address:</label>
        <div>
          <input type="email" name="updatedEmail" value="<?php echo $profile['email']; ?>" required>
        </div>
      </div>
      <!-- input for bio -->
      <div>
        <label for="bio">Profile Bio(Max. 1000 Characters):</label>
        <div>
          <input type="text" name="updatedBio" value="<?php echo $profile['bio']; ?>">
        </div>
      </div>
      <!-- input for favouriteGame -->
      <div>
        <label for="favouriteGame">Favourite Game:</label>
        <div>
          <input type="text" name="updatedFavouriteGame" value="<?php echo $profile['favouriteGame']; ?>">
        </div>
      </div>
      <!-- submit button; clicking reloads page and begins process for updating profile -->
      <div>
        <input class="submit2" type="submit" name="update" value="Update Profile">
      </div>
      <!-- reset button resets all entered data -->
      <div>
        <input class="reset2" type="reset" value="Reset Values">
      </div>
    </form>
  </section>
</main>
<?php
  // require the global footer
  require './templates/footer.php';
?>
