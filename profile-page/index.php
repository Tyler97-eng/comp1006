<?php
  // give local values to the header variables for page title and description
  $title = "Gamer's Paradise | Home";
  $description = "home page for the Gamer's Paradise forum";
  // require the global header
  require './templates/header.php';
?>
<main>
  <section class="masthead">
    <!-- div to hold CSS background image with h1 in foreground -->
    <div>
      <h1>Databases should be easy to use and reliable...</h1>
    </div>
  </section>
  <section class="welcome">
    <div>
      <!-- h2 to welcome customers -->
      <h2>Welcome to HortonSQL</h2>
      <!-- p element to hold a brief description of the service offered -->
      <p>At HortonSQL, we provide an easy-to-use database service to allow users to create, read, and share database content. We know that you don't want to enter information into a database and lose that information forever. That's why HortonSQL is a service you can trust as we make it our top priority to store user database entries inside our 1,000,000 terrabytes of server storage space. Remember: if you have data you can't lose, make sure you trust the elephant blue!</p>
    </div>
  </section>
  <!-- section has three columns -->
  <section class="columns">
    <!-- each column is stored in a div with an h3 and p element -->
    <div>
      <h3>Create</h3>
      <p>On HortonSQL, you can create your own database entries that will be stored forever</p>
    </div>
    <div>
      <h3>Read</h3>
      <p>Browse the diverse HortonSQL database with pre-made and user-made entries</p>
    </div>
    <div>
      <h3>Share</h3>
      <p>Display your HortonSQL database entries with friends and family</p>
    </div>
  </section>
</main>
<?php
  // require the global footer
  require './templates/footer.php';
?>
