<?php
  // give local values to the header variables for page title and description
  $title = "Gamer's Paradise | Create";
  $description = "page to create a new profile on the forum";
  // require the global header
  require './templates/header.php';
  // require the database file
  require 'database.php';
  $profileObject = new ProfileDatabase();
  // create the customer
  if(isset($_POST['submit'])){
    $profileObject->create($_POST);
  }
?>
<main>
  <section class="create">
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
      <!-- br to add spacing between labelled input data and submit/reset inputs -->
      <br>
      <!-- submit button -->
      <div>
        <input type="submit" name="submit" value="Create Profile">
      </div>
      <!-- reset button -->
      <div>
        <input type="reset" value="Reset Values">
      </div>
    </form>
  </section>
</main>
<?php
  // require the global footer
  require './templates/footer.php';
?>
