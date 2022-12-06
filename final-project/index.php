<?php
  // begin session
  session_start();
  // give local values to the header variables for page title and description
  $title = "M-See-You | Home";
  $description = "home page for the M-See-You fan forum";
  // require the global header
  require './templates/header.php';
  // require the database file
  require 'database.php';
  // new class object created
  $profileObject = new ProfileDatabase();
  // if login button is pressed while data is stored, attempts to log the user in
  if(isset($_POST['login'])){
    $profileObject->login($_POST);
  }
?>
<main class="home">
  <!-- section to hold background image; h1 and h2 elements seperated by divs -->
  <section class="masthead">
    <div>
      <h1>Welcome to the #1 Marvel Forum</h1>
    </div>
    <div>
      <h2>For Marvel Fans...</h2>
    </div>
    <div>
      <h2>...By Marvel Fans</h2>
    </div>
  </section>
  <!-- section to hold introductory information -->
  <section class="welcome">
    <div>
      <!-- h2 to introduce users -->
      <h3>M-See-You is THE destination for MCU fans!</h3>
      <!-- p elements to hold a brief description of the service offered; lorem ipsum used -->
      <p>Join thousands of others in creating an account to discuss the hottest MCU related topics. Faucibus vitae aliquet nec ullamcorper sit amet risus. Id donec ultrices tincidunt arcu. Cursus mattis molestie a iaculis at erat pellentesque.
      </p>
      <p>Morbi tristique senectus et netus et malesuada fames. Sodales ut eu sem integer vitae justo eget. Eget duis at tellus at urna condimentum mattis pellentesque id. Dolor magna eget est lorem ipsum dolor sit. Ipsum nunc aliquet bibendum enim facilisis gravida neque convallis a. Aliquam nulla facilisi cras fermentum odio. So, what are you waiting for? Use our easy profile-making process to make some new friends today!
      </p>
      <p>Morbi tristique senectus et netus et malesuada fames. Sodales ut eu sem integer vitae justo eget. Eget duis at tellus at urna condimentum mattis pellentesque id. Dolor magna eget est lorem ipsum dolor sit. Ipsum nunc aliquet bibendum enim facilisis gravida neque convallis a. Aliquam nulla facilisi cras fermentum odio. So, what are you waiting for? Use our easy profile-making process to make some new friends today!
      </p>
      <!-- h3 element to describe next section -->
      <h3>The M-See-You Fan Forum Allows Users To...</h3>
    </div>
  </section>
  <!-- section has four columns to explain service -->
  <section class="columns">
    <!-- each column is stored in a div with an h4 and p element -->
    <div>
      <h4>Create a Profile</h4>
      <p>Sed cras ornare arcu dui. Pellentesque massa placerat duis ultricies lacus sed turpis tincidunt. Sit amet facilisis magna etiam tempor orci eu. Morbi tristique senectus et netus et malesuada fames. Sodales ut eu sem integer vitae justo eget. Eget duis at tellus at urna condimentum mattis pellentesque id.</p>
    </div>
    <div>
      <h4>Join the Discussion</h4>
      <p>Sed cras ornare arcu dui. Pellentesque massa placerat duis ultricies lacus sed turpis tincidunt. Sit amet facilisis magna etiam tempor orci eu. Morbi tristique senectus et netus et malesuada fames. Sodales ut eu sem integer vitae justo eget. Eget duis at tellus at urna condimentum mattis pellentesque id.</p>
    </div>
    <div>
      <h4>Become an Admin</h4>
      <p>Sed cras ornare arcu dui. Pellentesque massa placerat duis ultricies lacus sed turpis tincidunt. Sit amet facilisis magna etiam tempor orci eu. Morbi tristique senectus et netus et malesuada fames. Sodales ut eu sem integer vitae justo eget. Eget duis at tellus at urna condimentum mattis pellentesque id.</p>
    </div>
    <div>
      <h4>Read, Update, and Delete Profiles/Posts (Admins Only)</h4>
      <p>Sed cras ornare arcu dui. Pellentesque massa placerat duis ultricies lacus sed turpis tincidunt. Sit amet facilisis magna etiam tempor orci eu. Morbi tristique senectus et netus et malesuada fames. Sodales ut eu sem integer vitae justo eget. Eget duis at tellus at urna condimentum mattis pellentesque id.</p>
    </div>
  </section>
  <!-- final section implores user to join with two columns -->
  <section class="join">
    <!-- first div holds an anchor element to implore the user to create an account -->
    <div class="join1">
      <h5>Join the M-See-You Fandom Today!</h5>
      <p>Click on the link below to head over to the register page where you can create a FREE profile in minutes!</p>
      <a href="create.php">Create an Account</a>
    </div>
    <!-- second div holds a form to allow the user to log in with their credentials -->
    <div class="join2">
      <h5>Already Have An Account?</h5>
      <p>Enter your admin username and password credentials below to sign-in!</p>
      <form method="POST" action="index.php">
        <!-- username text input, required -->
        <div>
          <input name="loginUsername" type="text" placeholder="Username" required>
        </div>
        <!-- password input, required -->
        <div>
          <input name="loginPassword" type="password" placeholder="Password" required>
        </div>
        <!-- login button -->
        <div>
          <input name="login" type="submit" value="Login">
        </div>
      </form>
    </div>
  </section>
</main>
<?php
  // require the global footer
  require './templates/footer.php';
?>
