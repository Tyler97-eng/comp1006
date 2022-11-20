<?php
class ProfileDatabase{
  // private user login info
  private $servername = "172.31.22.43";
  private $username = "Tyler200345596";
  private $password = "YkGaDZCHt5";
  private $database = "Tyler200345596";
  public $connection;
  // connection made with construct function
  public function __construct(){
    $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
    if(mysqli_connect_error()){
      trigger_error("Could not connect to the server: " . mysqli_connect_error());
    }else{
      return $this->connection;
    }
  }
  // create function to add a profile
  public function create($post){
    $profilePicture = $this->connection->real_escape_string($_POST['profilePicture']);
    $username = $this->connection->real_escape_string($_POST['username']);
    $fullName = $this->connection->real_escape_string($_POST['fullName']);
    if($fullName == ''){
      $fullName = 'Anonymous';
    }
    $email = $this->connection->real_escape_string($_POST['email']);
    $bio = $this->connection->real_escape_string($_POST['bio']);
    if($bio == ''){
      $bio = 'Nothing here but crickets...';
    }
    $favouriteGame = $this->connection->real_escape_string($_POST['favouriteGame']);
    if($favouriteGame == ''){
      $favouriteGame = 'Pong';
    }
    $create = "INSERT INTO gamer_profiles(profilePicture, username, fullName, dateJoined, email, bio, favouriteGame) VALUES('$profilePicture', '$username', '$fullName', CURDATE(), '$email', '$bio', '$favouriteGame')";
    $sql = $this->connection->query($create);
    // if INSERT statement works (returns true from query)
    if($sql == true){
      header('Location:read.php');
      //echo "<script>alert('Profile added. Welcome to the forum!')</script>";
    }else{
      echo "Profile could not be added. Please make sure you enter valid values and try again in a few moments.";
    }
  }
  // read function to display profiles
  public function read(){
    $view = "SELECT * FROM gamer_profiles";
    $sql = $this->connection->query($view);
    if($sql == true){
      // creates an array with current profiles
      $profiles = array();
      // returns rows of all profiles
      while($row = $sql->fetch_assoc()){
        $profiles[] = $row;
      }
      // return the profile rows
      return $profiles;
    }else{
      echo "No profiles currently on forum.";
    }
  }
  // function to fetch a specific profile by profile number for updating
  public function fetchProfile($profileNumber){
    $fetch = "SELECT * FROM gamer_profiles WHERE profileNumber = '$profileNumber'";
    $sql = $this->connection->query($fetch);
    if($sql->num_rows > 0){
      $profile = $sql->fetch_assoc();
    }else{
      echo "No record found";
    }
  }
  // update function to change profile values
  public function update($post){
    $profileNumber = $this->connection->real_escape_string($_POST['profileNumber']);
    $profilePicture = $this->connection->real_escape_string($_POST['updatedProfilePicture']);
    $username = $this->connection->real_escape_string($_POST['updatedUsername']);
    $fullName = $this->connection->real_escape_string($_POST['updatedFullName']);
    if($fullName == ''){
      $fullName = 'Anonymous';
    }
    $dateJoined = $this->connection->real_escape_string($_POST['dateJoined']);
    $email = $this->connection->real_escape_string($_POST['updatedEmail']);
    $bio = $this->connection->real_escape_string($_POST['updatedBio']);
    if($bio == ''){
      $bio = 'Nothing here but crickets...';
    }
    $favouriteGame = $this->connection->real_escape_string($_POST['updatedFavouriteGame']);
    if($favouriteGame == ''){
      $favouriteGame = 'Pong';
    }
    if(!empty($post)){
      $update = "UPDATE gamer_profiles SET profilePicture = '$profilePicture', username = '$username', fullName = '$fullName', email = '$email', bio = '$bio', favouriteGame = '$favouriteGame' WHERE profileNumber = '$profileNumber'";
      $sql = $this->connection->query($update);
      if($sql == true){
        header('Location:read.php');
        //echo "<script>alert('Profile successfully updated!')</script>";
      }else{
        echo $profileNumber;
        //echo "Profile could not be updated. Please make sure you enter valid values and try again in a few moments.";
      }
    }
  }
  // delete function to remove a profile
  public function delete($profileNumber){
    $delete = "DELETE FROM gamer_profiles WHERE profileNumber = '$profileNumber'";
    $sql = $this->connection->query($delete);
    if($sql == true){
      echo "<script>alert('Profile successfuly deleted. We're sorry to see you go!')</script>";
    }else{
      echo "Profile could not be deleted. Please try again in a few moments.";
    }
  }
}
?>
