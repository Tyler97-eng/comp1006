<!-- php loads database file on page load -->
<?php
	require_once('database.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- adding the meta data -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>HortonSQL | Database</title>
		<meta name="description" content="view page allows the user to create and read database entries">
    <meta name="robots" content="noindex, nofollow">
    <!-- adding the fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Roboto&display=swap" rel="stylesheet">
    <!-- linking the html document to the css document -->
    <link rel="stylesheet" href="./css/style.css">
		<!-- add Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
		<!-- JavaScript file added -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="database">
    <header class="header">
      <div class="logo">
        <!-- div to hold anchor and PHP logo -->
        <a href="index.php" target="#">
          <!-- image from: https://www.entropywins.wtf/blog/wp-content/uploads/2018/10/php-1.png -->
          <img src="./img/sql-logo.png" alt="HortonSQL logo">
        </a>
      </div>
      <nav>
        <!-- navigation contains a ul with two site pages -->
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="view.php">Database</a></li>
        </ul>
      </nav>
    </header>
    <main>
			<!-- first section holds an h1 and p element in two seperate divs -->
      <section class="intro">
        <div>
          <h1>Welcome to the HortonSQL Database</h1>
        </div>
        <div>
          <p>Below, you may either add items to the current database, or view the current items in the database. This database sample is based on a employee documentation database. Have fun!</p>
        </div>
      </section>
			<!-- second section holds create portion of CRUD -->
      <section>
        <!-- post method appends form data on request -->
        <form method="post" class="create">
					<!-- each label and input are placed in individual div elements for easier CSS -->
					<!-- input for idnum, required -->
          <div>
            <label class="idnum">ID Number:</label>
            <div>
              <input type="text" name="idnum" placeholder="00089" id="input1" required>
            </div>
          </div>
					<!-- input for fname, required -->
          <div>
            <label class="fname">First Name:</label>
            <div>
              <input type="text" name="fname" placeholder="John" id="input2" required>
            </div>
          </div>
					<!-- input for lname, required -->
          <div>
            <label class="lname">Last Name:</label>
            <div>
              <input type="text" name="lname" placeholder="Wick" id="input3" required>
            </div>
          </div>
					<!-- input for email, required -->
          <div>
            <label class="email">Email Address:</label>
            <div>
              <input type="email" name="email" placeholder="hello@email.com" id="input4" required>
            </div>
          </div>
					<!-- input for phone, required -->
          <div>
            <label class="phone">Phone Number:</label>
            <div>
              <input type="tel" name="phone" placeholder="7051234567" id="input5" required>
            </div>
          </div>
					<!-- input for job, required -->
          <div>
            <label class="job">Job Name:</label>
            <div>
              <input type="text" name="job" placeholder="Worker" id="input6" required>
            </div>
          </div>
					<!-- input for salary, required -->
          <div>
            <label class="salary">Salary:</label>
            <div>
              <input type="text" name="salary" placeholder="67745" id="input7" required>
            </div>
          </div>
					<!-- br to add spacing between labelled input data and submit/reset inputs -->
					<br>
					<!-- submit button -->
          <div>
            <input class="submit" type="submit" name="submit" value="Submit Data">
          </div>
					<!-- reset button -->
					<div>
          	<input class="reset" type="reset">
					</div>
        </form>
        <div>
          <?php
          // store user-entered data into the database if data is entered
					if(isset($_POST) && !empty($_POST)){
						// each piece of input data is stored using the sanitize function
            $idnum = $database->sanitize($_POST['idnum']);
						$fname = $database->sanitize($_POST['fname']);
						$lname = $database->sanitize($_POST['lname']);
						$email = $database->sanitize($_POST['email']);
            $phone = $database->sanitize($_POST['phone']);
            $job = $database->sanitize($_POST['job']);
            $salary = $database->sanitize($_POST['salary']);
						// outcome variable creates database entry with input variable data
						$outcome = $database->create($idnum, $fname, $lname, $email, $phone, $job, $salary);
						if($outcome){
							// if an entry is created, a success pop-up appears on-screen
							$database->display(true);
            }else{
							// else a failure pop-up appears on-screen
							$database->display(false);
						}
					}
				 ?>
      </div>
    </section>
		<!-- third section holds read portion of CRUD -->
    <section class="view">
			<!-- div to hold variable value from custom function -->
			<div>
				<?php
					// total variable stores number of database entries
					$total = $database->count();
					// output on screen a p element with $total value
					echo "<p>Number of database entries: $total</p>";
				?>
			</div>
			<!-- table to hold database entries -->
      <table>
				<!-- first table row displays table headers for each column in the table -->
        <tr>
          <th>ID#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Job Title</th>
          <th>Salary</th>
        </tr>
        <?php
				// php opened to call the read function and store it in the outcome variable
				$outcome = $database->read();
				// while loop to retrieve data from SQL database and display stored data in table
        while($data = mysqli_fetch_assoc($outcome)){
        ?>
				<!-- subsequent table rows display stored data for each table column -->
        <tr>
					<!-- each table data cell holds a value stored in SQL based on the column name -->
          <td><?php echo $data['idnum']; ?></td>
          <td><?php echo $data['fname']; ?></td>
          <td><?php echo $data['lname']; ?></td>
          <td><?php echo $data['email'] ?></td>
          <td><?php echo $data['phone'] ?></td>
          <td><?php echo $data['job'] ?></td>
          <td><?php echo $data['salary'] ?></td>
        </tr>
        <?php
        }
        ?>
      </table>
    </section>
  </main>
	<!-- footer section has four columns -->
	<footer>
    <!-- each footer column is stored in a div with h4 and a elements -->
      <div>
        <h4>Resources For</h4>
				<!-- when clicked, each anchor element leads to the current page -->
        <a href="#">Students</a>
				<!-- br element used between anchor elements to make the footer more appealing -->
        <br>
        <a href="#">Teachers</a>
        <br>
        <a href="#">Businesses</a>
        <br>
        <a href="#">Investors</a>
        <br>
        <a href="#">Partners</a>
      </div>
      <div>
        <h4>About HortonSQL</h4>
        <a href="#">Database</a>
        <br>
        <a href="#">Server Storage</a>
        <br>
        <a href="#">Cloud Computing</a>
        <br>
        <a href="#">Reports</a>
        <br>
        <a href="#">Privacy and Security</a>
      </div>
      <div>
        <h4>Learn More</h4>
        <a href="#">MySQL</a>
        <br>
        <a href="#">HTML</a>
        <br>
        <a href="#">PHP</a>
        <br>
        <a href="#">CRUD</a>
        <br>
        <a href="#">CSS</a>
      </div>
      <div class="last">
        <h4>Contact Us</h4>
				<!-- p elements used to display contact info -->
        <p>Email: HortonSQL@email.com</p>
        <p>Phone: (705) 555-DATA</p>
        <p>Address: 2 Clumbo Avenue Atlantis,OH</p>
        <a href="#">FAQ</a>
        <br>
        <a href="#">Events</a>
        <br>
        <br>
        <p>All Rights Reserved, Copyright 2022, HortonSQL</p>
      </div>
  </footer>
  </body>
</html>
