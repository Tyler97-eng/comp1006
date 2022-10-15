<?php
  // define name of class
  class HortonSQLDatabase{
    // connection variable created
    private $connection;
    // rowCount keeps track of number of rows (entries in database); original value is 5 as there are 5 SQL sample entries in the table
    public $rowCount = 5;
    // function to initialize object properties
    function __construct(){
      $this->connect_db();
    }
    // function to connect to SQL
    public function connect_db(){
      // using my login credentials to connect to Georgian server
      $this->connection = mysqli_connect('172.31.22.43', 'Tyler200345596', 'YkGaDZCHt5', 'Tyler200345596');
      // if an error is detected, the connection is killed
      if(mysqli_connect_error()){
        die("Connection to HortonSQL has failed. Please try again in a few moments." . mysqli_connect_error());
      }
    }
    // public function to create (first part of CRUD) database entries with user input
    public function create($idnum, $fname, $lname, $email, $phone, $job, $salary){
      // variable to hold user input
      $input = "INSERT INTO newEmployee (idnum, fname, lname, email, phone, job, salary) VALUES ('$idnum', '$fname', '$lname', '$email', '$phone', '$job', '$salary')";
      // variable to check stored input data
      $outcome = mysqli_query($this->connection, $input);
      if($outcome){
        // if the SQL query works, rowCount is incremented by 1 and create returns true
        $this->rowCount++;
        return true;
      }else{
        // else the SQL query did not work, and the create function returns false
        return false;
      }
    }
    // public function to read (second part of CRUD) database entries
    public function read(){
      // input variable holds select all statement in SQL
      $input = "SELECT * FROM newEmployee";
      // outcome variable holds connection and input
      $outcome = mysqli_query($this->connection, $input);
      // outcome is returned
      return $outcome;
    }
    // sanitize function to return stored form data in an array
    public function sanitize($variable){
      // return variable holds legal SQL string of current connection and $variable (e.g., idnum)
      $return = mysqli_real_escape_string($this->connection, $variable);
      return $return;
    }
    // custom function to display a congratulations pop-up when adding an employee
    public function display($check){
      // if check is true, a success message is output using the JavaScript alert function
      if($check == true){
        echo "<script>alert('Successful addition to database!! Congrats!')</script>";
      // else a failure message is output using the JavaScript alert function
      }else{
        echo "<script>alert('Failure to add to database. Please ensure you entered data into all fields correctly.')</script>";
      }
    }
    // custom function counts number of entries in database
    public function count(){
      // rowCount variable is the value of this rowCount
      $rowCount = $this->rowCount;
      // rowCount value returned
      return $rowCount;
    }
  }
  // object created based on class
  $database = new HortonSQLDatabase();
?>
