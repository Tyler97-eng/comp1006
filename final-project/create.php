<?php
  // session begins
  session_start();
  // give local values to the header variables for page title and description
  $title = "M-See-You | Register";
  $description = "page to register a new profile on the M-See-You website";
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
  // else if submitAdmin button is pressed, call the createAdmin function while passing through the POST data
  else if(isset($_POST['submitAdmin'])){
    $profileObject->createAdmin($_POST);
  }
  // esle if login button is pressed, call the login function with Post data
  else if(isset($_POST['login'])){
    $profileObject->login($_POST);
  }
?>
<main class="create">
  <!-- section holds a background image and the h1 -->
  <section class="ctop">
    <div>
      <h1>Register</h1>
    </div>
  </section>
  <!-- section holds an explanation of the create page with an h2 and p element -->
  <section class="explanation">
    <div>
      <h2>Register Today to Join the Discussion!</h2>
      <p>Do you love the MCU? Are you tired of keeping your fan theories, ships, and thoughts to yourself?! Get started on making connections and discussuing the latest MCU news today in only a few minutes!</p>
    </div>
  </section>
  <!-- section holds form to create a new user profile -->
  <section class="new">
    <form action="create.php" method="POST">
      <!-- each label and input are placed in individual div elements for easier CSS -->
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
        <label class="bio">Bio(Max. 500 Characters):</label>
        <div>
          <input type="text" name="bio">
        </div>
      </div>
      <!-- input for favourite film, required -->
      <div>
        <label class="favouriteFilm">Favourite Film:</label>
        <div>
          <input type="text" name="favouriteFilm" required>
        </div>
      </div>
      <!-- input for favourite character, required -->
      <div>
        <label class="favouriteCharacter">Favourite Character:</label>
        <div>
          <input type="text" name="favouriteCharacter" required>
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
  <!-- section gives explanation for admin creation with h3 and p element -->
  <section class="explanationAdmin">
    <div>
      <h3>Admin Registration</h3>
      <p>Use this form in order to become an M-See-You admin. The admins can update or delete profiles and posts on the M-See-You website. Help us keep this website clean and user-friendly today!</p>
    </div>
  </section>
  <!-- section contains a form to create an admin -->
  <section class="admin">
    <form action="create.php" method="POST">
      <!-- each label and input are placed in individual div elements for easier CSS -->
      <!-- input for full name, required -->
      <div>
        <label class="fullName">Full Name:</label>
        <div>
          <input type="text" name="fullName" required>
        </div>
      </div>
			<!-- input for email, required -->
      <div>
        <label class="email">Email Address:</label>
        <div>
          <input type="email" name="email" required>
        </div>
      </div>
      <!-- input for username, required -->
      <div>
        <label class="username">Username:</label>
        <div>
          <input type="text" name="username" required>
        </div>
      </div>
			<!-- input for password, required -->
      <div>
        <label class="password">Password:</label>
        <div>
          <input type="password" name="password" required>
        </div>
      </div>
      <!-- submitAdmin button begins create process on page reload -->
      <div>
        <input type="submit" class="submit2" name="submitAdmin" value="Create Profile">
      </div>
      <!-- reset button resets all entered data  -->
      <div>
        <input type="reset" class="reset2" value="Reset Values">
      </div>
    </form>
  </section>
  <!-- section allows users to sign in with their admin credentials -->
  <section class="signin">
    <h4>Already Have An Account?</h4>
    <form method="POST" action="create.php">
      <!-- input for loginUsername, required -->
      <div>
        <input name="loginUsername" type="text" placeholder="Username" required>
      </div>
      <!-- input for loginPassword, required -->
      <div>
        <input name="loginPassword" type="password" placeholder="Password" required>
      </div>
      <!-- login button begins login process on page reload -->
      <div>
        <input name="login" class="login" type="submit" value="Login">
      </div>
    </form>
  </section>
</main>
<?php
  // require the global footer
  require './templates/footer.php';
?>
