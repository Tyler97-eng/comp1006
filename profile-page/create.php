<?php
  // give local values to the header variables for page title and description
  $title = "Gamer's Paradise | Create";
  $description = "page to create a new profile on the forum";
  // require the global header
  require './templates/header.php';
  // require the database file
  require 'database.php';
  // new class object created
  $profileObject = new ProfileDatabase();
  // if submit button is pressed, call the create function while passing through the POST data
  if(isset($_POST['submit'])){
    $profileObject->create($_POST);
  }
?>
<main class="create">
  <!-- section holds a background image and the h1 -->
  <section class="ctop">
    <div>
      <h1>Create a Profile</h1>
    </div>
  </section>
  <!-- section holds an explanation of the create page with h2 and p elements -->
  <section class="explanation">
    <div>
      <h2>Creating a Profile is Easy!</h2>
      <p>Use this easy-to-complete form in order to add your profile to the forum! Get started on making connections and discussuing the latest gaming trends in as little as one minute!!*</p>
      <p>*Please note that we are still working on allowing users to upload profile pictures. Until then, just describe what your profile picture is supposed to be.</p>
    </div>
  </section>
  <!-- section holds form to create a new profile -->
  <section class="new">
    <form action="create.php" method="POST">
      <!-- each label and input are placed in individual div elements for easier CSS -->
      <!-- input for profilePicture, required -->
      <div>
        <label class="profilePicture">Profile Picture Description:</label>
        <div>
          <input type="text" name="profilePicture" required>
        </div>
      </div>
      <!-- input for username, required -->
      <div>
        <label class="username">Username:</label>
        <div>
          <input type="text" name="username" required>
        </div>
      </div>
      <!-- input for full name -->
      <div>
        <label class="fullName">Full Name:</label>
        <div>
          <input type="text" name="fullName">
        </div>
      </div>
			<!-- input for email, required -->
      <div>
        <label class="email">Email Address:</label>
        <div>
          <input type="email" name="email" required>
        </div>
      </div>
			<!-- input for bio -->
      <div>
        <label class="bio">Bio(Max. 1000 Characters):</label>
        <div>
          <input type="text" name="bio">
        </div>
      </div>
      <!-- input for favourite game -->
      <div>
        <label class="favouriteGame">Favourite Game:</label>
        <div>
          <input type="text" name="favouriteGame">
        </div>
      </div>
      <!-- submit button begins create process on page reload -->
      <div>
        <input type="submit" class="submit" name="submit" value="Create Profile">
      </div>
      <!-- reset button resets all entered data  -->
      <div>
        <input type="reset" class="reset" value="Reset Values">
      </div>
    </form>
  </section>
</main>
<?php
  // require the global footer
  require './templates/footer.php';
?>
