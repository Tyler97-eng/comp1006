<?php
class ProfileDatabase{
  // private user login info
  private $servername = "172.31.22.43";
  private $username = "Tyler200345596";
  private $password = "YkGaDZCHt5";
  private $database = "Tyler200345596";
  // connection variable used to store sql login information
  public $connection;
  // connection made with construct function
  public function __construct(){
    // store sql connection info
    $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
    // if sql connection error occurs, echo out a message with error info
    if(mysqli_connect_error()){
      trigger_error("Could not connect to the server: " . mysqli_connect_error());
      // die terminates the current script
      $this->$connection->die();
    // else return the connection
    }else{
      return $this->connection;
    }
  }
  // create function to add a profile using post data
  public function create($post){
    // variables store local information from post data
    $username = $this->connection->real_escape_string($_POST['username']);
    $fullName = $this->connection->real_escape_string($_POST['fullName']);
    // full name not required, so if value is empty, 'True Believer' is stored
    if($fullName == ''){
      $fullName = 'True Believer';
    }
    $email = $this->connection->real_escape_string($_POST['email']);
    // emailCheck stores a SELECT clause for the email value from POST
    $emailCheck = "SELECT * FROM fan_profiles WHERE email = '$email'";
    $query = $this->connection->query($emailCheck);
    // if the query returns any rows, the email has already been used so the user is notified and the account is not created
    if($query->num_rows > 0){
      echo "<script>alert('Email is already in use by another member. Please register with a different email address.'); window.location.href='create.php';</script>";
    }
    $bio = $this->connection->real_escape_string($_POST['bio']);
    // bio not required, so if value is empty, message is stored
    if($bio == ''){
      $bio = 'Actions are stronger than words.';
    }
    $favouriteFilm = $this->connection->real_escape_string($_POST['favouriteFilm']);
    $favouriteCharacter = $this->connection->real_escape_string($_POST['favouriteCharacter']);
    // INSERT statement stored into variable; uses stored variable information for values; dateJoined uses CURDATE() sql function
    $create = "INSERT INTO fan_profiles(username, fullName, dateJoined, email, bio, favouriteFilm, favouriteCharacter) VALUES('$username', '$fullName', CURDATE(), '$email', '$bio', '$favouriteFilm', '$favouriteCharacter')";
    // create variable calls the INSERT statement in an sql query
    $sql = $this->connection->query($create);
    // if INSERT statement works (returns true from query)
    if($sql == true){
      // displays alert message then redirects user to the content page
      echo "<script>alert('Profile added. Welcome to the forum!'); window.location.href='about.php';</script>";
    // else the profile is not added and a message is displayed
    }else{
      echo "<script>alert('Profile could not be added. Please make sure you enter valid values and try again in a few moments.'); window.location.href='create.php';</script>";
    }
  }
  // create function to create an admin
  public function createAdmin($post){
    // variables store local information from post data
    $fullName = $this->connection->real_escape_string($_POST['fullName']);
    $email = $this->connection->real_escape_string($_POST['email']);
    $emailCheck = "SELECT * FROM admins WHERE email = '$email'";
    $query = $this->connection->query($emailCheck);
    // email query checks if email is already in use (returns a row); if it is, the account is not created
    if($query->num_rows > 0){
      echo "<script>alert('Email is already in use by another admin. Please register with a different email address.'); window.location.href='create.php';</script>";
    }
    $username = $this->connection->real_escape_string($_POST['username']);
    // password is hashed with sha512
    $password = hash('sha512', $_POST['password']);
    // INSERT statement creates new admin with variable data
    $create = "INSERT INTO admins(fullName, email, username, pword) VALUES ('$fullName', '$email', '$username', '$password')";
    // create variable calls the INSERT statement in an sql query
    $sql = $this->connection->query($create);
    // if INSERT statement works (returns true from query)
    if($sql == true){
      // displays alert message then redirects user to create page to sign in
      echo "<script>alert('Admin added. Welcome to the forum!'); window.location.href='create.php';</script>";
    // else the profile is not added and a message is displayed
    }else{
      echo "<script>alert('Profile could not be added. Please make sure you enter valid values and try again in a few moments.'); window.location.href='create.php';</script>";
    }
  }
  // read function to display profiles
  public function read(){
    // variable to store SELECT all statement
    $view = "SELECT * FROM fan_profiles";
    // view variable calls the SELECT statement in an sql query
    $sql = $this->connection->query($view);
    // if sql statement works (returns true)
    if($sql == true){
      // create an array with current profiles
      $profiles = array();
      // returns rows of all profiles
      while($row = $sql->fetch_assoc()){
        $profiles[] = $row;
      }
      // return the profile rows
      return $profiles;
    // else a message is echoed out
    }else{
      echo "No profiles currently on forum.";
    }
  }
  // read function to display profiles
  public function readPost(){
    // variable to store SELECT all statement
    $view = "SELECT * FROM fan_post";
    // view variable calls the SELECT statement in an sql query
    $sql = $this->connection->query($view);
    // if sql statement works (returns true)
    if($sql == true){
      // create an array with current posts
      $posts = array();
      // returns rows of all posts
      while($row = $sql->fetch_assoc()){
        $posts[] = $row;
      }
      // return the post rows
      return $posts;
    // else a message is echoed out
    }else{
      echo "No posts currently on forum.";
    }
  }
  // function to fetch a specific profile by profileID for updating
  public function fetchProfile($profileID){
    // SELECT statement selects row data for row where profileId matches profileID
    $fetch = "SELECT * FROM fan_profiles WHERE profileId = '$profileID'";
    // fetch variable calls SELECT statement in an sql query
    $sql = $this->connection->query($fetch);
    // if row data is present, return the row values from the array
    if($sql->num_rows > 0){
      return $sql->fetch_assoc();
    // else display a message
    }else{
      echo "No record found";
    }
  }
  // function to fetch a specific post by profileID for updating
  public function fetchPost($profileID){
    // SELECT statement selects row data for row where profileId matches profileID
    $fetch = "SELECT * FROM fan_post WHERE profileId = '$profileID'";
    // fetch variable calls SELECT statement in an sql query
    $sql = $this->connection->query($fetch);
    // if row data is present, return the row values from the array
    if($sql->num_rows > 0){
      return $sql->fetch_assoc();
    // else display a message
    }else{
      echo "No record found";
    }
  }
  // update function to change profile values with post data
  public function update($post){
    // variable store local post data
    $profileId = $this->connection->real_escape_string($_POST['updatedProfileId']);
    $username = $this->connection->real_escape_string($_POST['updatedUsername']);
    $fullName = $this->connection->real_escape_string($_POST['updatedFullName']);
    if($fullName == ''){
      $fullName = 'True Believer';
    }
    $email = $this->connection->real_escape_string($_POST['updatedEmail']);
    $bio = $this->connection->real_escape_string($_POST['updatedBio']);
    if($bio == ''){
      $bio = 'Actions are stronger than words.';
    }
    $favouriteFilm = $this->connection->real_escape_string($_POST['updatedFavouriteFilm']);
    $favouriteCharacter = $this->connection->real_escape_string($_POST['updatedFavouriteCharacter']);
    // if post data is not empty
    if(!empty($post)){
      // variable stores UPDATE statement where each stored value is replaced with the local value where profileId matches the profileId from the fetch function
      $update = "UPDATE fan_profiles SET username = '$username', fullName = '$fullName', email = '$email', bio = '$bio', favouriteFilm = '$favouriteFilm', favouriteCharacter = '$favouriteCharacter' WHERE profileId = '$profileId'";
      $sql = $this->connection->query($update);
      // if sql query returns true (update statement worked)
      if($sql == true){
        // displays alert then redirects user to the read page
        echo "<script>alert('Profile successfully updated!'); window.location.href='read.php';</script>";
      // else a message is echoed out
      }else{
        echo "<script>alert('Profile could not be updated. Please make sure you enter valid values and try again in a few moments.'); window.location.href='read.php';</script>";
      }
    }
  }
  // update function to change post values with post data
  public function updatePost($post){
    // variables store local post data
    $profileId = $this->connection->real_escape_string($_POST['updatedProfileId']);
    $forumPost = $this->connection->real_escape_string($_POST['updatedForumPost']);
    // if post data is not empty
    if(!empty($post)){
      // variable stores UPDATE statement where each stored value is replaced with the local value where profileId matches the profileId from the fetch function
      $update = "UPDATE fan_post SET post = '$forumPost' WHERE profileId = '$profileId'";
      $sql = $this->connection->query($update);
      // if sql query returns true (update statement worked)
      if($sql == true){
        // displays alert then redirects user to the content page
        echo "<script>alert('Post successfully updated!'); window.location.href='about.php';</script>";
      // else a message is echoed out
      }else{
        echo "<script>alert('Post could not be updated. Please make sure you enter valid values and try again in a few moments.'); window.location.href='about.php';</script>";
      }
    }
  }
  // delete function to remove a profile based on profileId
  public function delete($profileId){
    // variable stores DELETE statement where a row is deleted where profileId matches specified argument profileId
    $delete = "DELETE FROM fan_profiles WHERE profileId = '$profileId'";
    $sql = $this->connection->query($delete);
    // if sql query returns true (delete statement worked)
    if($sql == true){
      // alert message displayed on screen
      echo "<script>alert('Profile successfully deleted. We are sorry to see you go!')</script>";
    // else display a message
    }else{
      echo "<script>alert('Profile could not be deleted. Please try again in a few moments.')</script>";
    }
  }
  // delete function to remove a post based on profileId
  public function deletePost($profileId){
    // variable stores DELETE statement where a row is deleted where profileId matches specified argument profileId
    $delete = "DELETE FROM fan_post WHERE profileId = '$profileId'";
    $sql = $this->connection->query($delete);
    // if sql query returns true (delete statement worked)
    if($sql == true){
      // alert message displayed on screen
      echo "<script>alert('Post successfully deleted!')</script>";
    // else display a message
    }else{
      echo "<script>alert('Post could not be deleted. Please try again in a few moments.')</script>";
    }
  }
  public function login($post){
    // variables store data from post data
    $username = $_POST['loginUsername'];
    // password hashed with sha512
    $password = hash('sha512', $_POST['loginPassword']);
    // store SELECT clause where username and hashed password match stored username and hashed password
    $check = "SELECT * FROM admins WHERE username = '$username' AND pword = '$password'";
    $sql = $this->connection->query($check);
    // if query returns a row
    if($sql->num_rows > 0){
      // session starts
      session_start();
      // session admin_id set to a value of 1
      $_SESSION['admin_id'] = 1;
      // displays alert message then redirects user to the about page
      echo "<script>alert('Admin signed in successfully!'); window.location.href='about.php';</script>";
    }else{
      echo "<script>alert('Could not sign in. Please re-check your information and try again, or contact us to reset your credentials.'); window.location.href='create.php';</script>";
    }
  }
}
?>
