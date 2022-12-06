<?php
  // session begins
  session_start();
  // give local values to the header variables for page title and description
  $title = "M-See-You | Update Post";
  $description = "page to update a post on the M-See-You forum";
  // require the global header
  require './templates/header.php';
  // if session admin_id is not equal to 1, the user is not signed in as an admin so they are redirected to the create page
  if($_SESSION['admin_id'] != 1){
    echo "<script>alert('Only admins can edit a post. Please sign-in as an admin.'); window.location.href='create.php';</script>";
    // exits the page if the echo fails
    exit();
  }else{
    // require the database file
    require 'database.php';
    // new class object created
    $profileObject = new ProfileDatabase();
    // if profileID is set with a value and is not empty
    if(isset($_GET['profileID']) && !empty($_GET['profileID'])){
      // profileID variable stores value from profileID
      $profileID = $_GET['profileID'];
      // profile variable holds array data from specific row based on profileID
      $profile = $profileObject->fetchPost($profileID);
    }
  }
  // if edit is set, values in profileObject are updated with updatePost function
  if(isset($_POST['edit'])){
    $profileObject->updatePost($_POST);
  }
?>
<main class="edit">
  <!-- section holds introductory h1 and p elements in seperate divs -->
  <section class="etop">
    <div>
      <h1>Update Profile</h1>
    </div>
    <div>
      <p>On this page, you may update the post of an M-See-You user. When done, click on the 'Update Profile' button to finalize your changes.</p>
    </div>
  </section>
  <!-- section holds form to update post data -->
  <section class="postForm">
    <form action="edit.php" method="POST">
      <!-- each label and input are placed in individual div elements for easier CSS -->
      <!-- input for profileId -->
      <div>
        <!-- input type is hidden for profileId to not allow user to update value -->
        <input type="hidden" name="updatedProfileId" value="<?php echo $profile['profileId']; ?>">
      </div>
      <!-- br element for better looking page as profileId input does not appear, messing up the appeal of the form -->
      <br>
      <!-- input for forumPost, required -->
      <div>
        <label for="forumPost">Post:</label>
        <div>
          <input type="text" class="forumPost" name="updatedForumPost" value="<?php echo $profile['post']; ?>" required>
        </div>
      </div>
      <!-- edit button; clicking reloads page and begins process for updating post -->
      <div>
        <input class="edit" type="submit" name="edit" value="Edit Post">
      </div>
    </form>
  </section>
</main>
<?php
  // require the global footer
  require './templates/footer.php';
?>
