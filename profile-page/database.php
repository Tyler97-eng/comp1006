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
    // else return the connection
    }else{
      return $this->connection;
    }
  }
  // create function to add a profile using post data
  public function create($post){
    // variables store local information from post data
    $profilePicture = $this->connection->real_escape_string($_POST['profilePicture']);
    $username = $this->connection->real_escape_string($_POST['username']);
    $fullName = $this->connection->real_escape_string($_POST['fullName']);
    // full name not required, so if value is empty, Anonymous is stored
    if($fullName == ''){
      $fullName = 'Anonymous';
    }
    $email = $this->connection->real_escape_string($_POST['email']);
    $bio = $this->connection->real_escape_string($_POST['bio']);
    // bio not required, so if value is empty, message is stored
    if($bio == ''){
      $bio = 'Nothing here but crickets...';
    }
    $favouriteGame = $this->connection->real_escape_string($_POST['favouriteGame']);
    // favourite game not required, so if value is empty, Pong is stored
    if($favouriteGame == ''){
      $favouriteGame = 'Pong';
    }
    // INSERT statement stored into variable; uses stored variable information for values; dateJoined uses CURDATE() sql function
    $create = "INSERT INTO gamer_profiles(profilePicture, username, fullName, dateJoined, email, bio, favouriteGame) VALUES('$profilePicture', '$username', '$fullName', CURDATE(), '$email', '$bio', '$favouriteGame')";
    // create variable calls the INSERT statement in an sql query
    $sql = $this->connection->query($create);
    // if INSERT statement works (returns true from query)
    if($sql == true){
      // displays alert message then redirects user to the read page
      echo "<script>alert('Profile added. Welcome to the forum!'); window.location.href='read.php';</script>";
    // else the profile is not added and a message is displayed
    }else{
      echo "Profile could not be added. Please make sure you enter valid values and try again in a few moments.";
    }
  }
  // read function to display profiles
  public function read(){
    // variable to store SELECT all statement
    $view = "SELECT * FROM gamer_profiles";
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
  // function to fetch a specific profile by profileID for updating
  public function fetchProfile($profileID){
    // SELECT statement selects row data for row where profileNumber matches profileID
    $fetch = "SELECT * FROM gamer_profiles WHERE profileNumber = '$profileID'";
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
    $profileNumber = $this->connection->real_escape_string($_POST['updatedProfileNumber']);
    $profilePicture = $this->connection->real_escape_string($_POST['updatedProfilePicture']);
    $username = $this->connection->real_escape_string($_POST['updatedUsername']);
    $fullName = $this->connection->real_escape_string($_POST['updatedFullName']);
    if($fullName == ''){
      $fullName = 'Anonymous';
    }
    $email = $this->connection->real_escape_string($_POST['updatedEmail']);
    $bio = $this->connection->real_escape_string($_POST['updatedBio']);
    if($bio == ''){
      $bio = 'Nothing here but crickets...';
    }
    $favouriteGame = $this->connection->real_escape_string($_POST['updatedFavouriteGame']);
    if($favouriteGame == ''){
      $favouriteGame = 'Pong';
    }
    // if post data is not empty
    if(!empty($post)){
      // variable stores UPDATE statement where each stored value is replaced with the local value where profileNumber matches the profileNumber from the fetch function
      $update = "UPDATE gamer_profiles SET profilePicture = '$profilePicture', username = '$username', fullName = '$fullName', email = '$email', bio = '$bio', favouriteGame = '$favouriteGame' WHERE profileNumber = '$profileNumber'";
      $sql = $this->connection->query($update);
      // if sql query returns true (update statement worked)
      if($sql == true){
        // displays alert then redirects user to the read page
        echo "<script>alert('Profile successfully updated!'); window.location.href='read.php';</script>";
      // else a message is echoed out
      }else{
        echo "Profile could not be updated. Please make sure you enter valid values and try again in a few moments.";
      }
    }
  }
  // delete function to remove a profile based on profileNumber
  public function delete($profileNumber){
    // variable stores DELETE statement where a row is deleted where profileNumber matches specified argument profileNumber
    $delete = "DELETE FROM gamer_profiles WHERE profileNumber = '$profileNumber'";
    $sql = $this->connection->query($delete);
    // if sql query returns true (delete statement worked)
    if($sql == true){
      // alert message displayed on screen
      echo "<script>alert('Profile successfully deleted. We are sorry to see you go!')</script>";
    // else display a message
    }else{
      echo "Profile could not be deleted. Please try again in a few moments.";
    }
  }
}
?>
