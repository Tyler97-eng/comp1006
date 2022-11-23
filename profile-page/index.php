<?php
  // give local values to the header variables for page title and description
  $title = "Gamer's Paradise | Home";
  $description = "home page for the Gamer's Paradise forum";
  // require the global header
  require './templates/header.php';
?>
<main class="home">
  <!-- section to hold background image and h1 -->
  <section class="masthead">
    <div>
      <h1>Welcome to the Best Forum to Talk About Games</h1>
    </div>
  </section>
  <!-- section to hold introductory information -->
  <section class="welcome">
    <div>
      <!-- h2 to introduce users -->
      <h2>Gamer's Paradise is...</h2>
      <!-- p elements to hold a brief description of the service offered; lorem ipsum used -->
      <p>every gamer's destination to find like minded people to talk about the hottest gaming news! We provide users with an opportunity to join millions of others in creating a profile on our site. Faucibus vitae aliquet nec ullamcorper sit amet risus. Id donec ultrices tincidunt arcu. Cursus mattis molestie a iaculis at erat pellentesque.
      </p>
      <p>Morbi tristique senectus et netus et malesuada fames. Sodales ut eu sem integer vitae justo eget. Eget duis at tellus at urna condimentum mattis pellentesque id. Dolor magna eget est lorem ipsum dolor sit. Ipsum nunc aliquet bibendum enim facilisis gravida neque convallis a. Aliquam nulla facilisi cras fermentum odio. So, what are you waiting for? Use our easy profile-making process to make some new friends today!
      </p>
    </div>
  </section>
  <!-- section has four columns to explain service -->
  <section class="columns">
    <!-- each column is stored in a div with an h3 and p element -->
    <div>
      <h3>Create a Profile</h3>
      <p>Sed cras ornare arcu dui. Pellentesque massa placerat duis ultricies lacus sed turpis tincidunt. Sit amet facilisis magna etiam tempor orci eu. Morbi tristique senectus et netus et malesuada fames. Sodales ut eu sem integer vitae justo eget. Eget duis at tellus at urna condimentum mattis pellentesque id.</p>
    </div>
    <div>
      <h3>Read Other Profiles</h3>
      <p>Sed cras ornare arcu dui. Pellentesque massa placerat duis ultricies lacus sed turpis tincidunt. Sit amet facilisis magna etiam tempor orci eu. Morbi tristique senectus et netus et malesuada fames. Sodales ut eu sem integer vitae justo eget. Eget duis at tellus at urna condimentum mattis pellentesque id.</p>
    </div>
    <div>
      <h3>Update Your Profile</h3>
      <p>Sed cras ornare arcu dui. Pellentesque massa placerat duis ultricies lacus sed turpis tincidunt. Sit amet facilisis magna etiam tempor orci eu. Morbi tristique senectus et netus et malesuada fames. Sodales ut eu sem integer vitae justo eget. Eget duis at tellus at urna condimentum mattis pellentesque id.</p>
    </div>
    <div>
      <h3>Delete Your Profile</h3>
      <p>Sed cras ornare arcu dui. Pellentesque massa placerat duis ultricies lacus sed turpis tincidunt. Sit amet facilisis magna etiam tempor orci eu. Morbi tristique senectus et netus et malesuada fames. Sodales ut eu sem integer vitae justo eget. Eget duis at tellus at urna condimentum mattis pellentesque id.</p>
    </div>
  </section>
  <!-- final section implores user to join with a h4 and p element -->
  <section class="join">
    <div>
      <h4>Join the Discussion Today!</h4>
      <p>Sed cras ornare arcu dui. Pellentesque massa placerat duis ultricies lacus sed turpis tincidunt. Sit amet facilisis magna etiam tempor orci eu. Morbi tristique senectus et netus et malesuada fames. Sodales ut eu sem integer vitae justo eget. Eget duis at tellus at urna condimentum mattis.</p>
    </div>
  </section>
</main>
<?php
  // require the global footer
  require './templates/footer.php';
?>
