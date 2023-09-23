<div class="wrapper">
    <?php
        include("views/aside.php");
    ?>

    <div class="content">
        <header>
            <h3>KRATE</h3>
        </header>

        <div class="open isClosed">
            <i class="fa fa-bars font rotate"></i>
        </div>

        <section>
            <div class="remove-track">
                <?php
                  require_once('appvars.php');
                  require_once('connectvars.php');

                  if (isset($_GET['id']) && isset($_GET['date']) && isset($_GET['title']) && isset($_GET['rating']) && isset($_GET['coverart'])) {
                    // Grab the rating data from the GET
                    $id = $_GET['id'];
                    $date = $_GET['date'];
                    $title = $_GET['title'];
                    $rating = $_GET['rating'];
                    $coverart = $_GET['coverart'];
                  }
                  else if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['rating'])) {
                    // Grab the rating data from the POST
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $rating = $_POST['rating'];
                  }
                  else {
                    echo '<h2 class="error">Sorry, no tracks were specified for removal.</h2>';
                  }

                  if (isset($_POST['submit'])) {
                    if ($_POST['confirm'] == 'Yes') {
                      // Delete the screen shot image file from the server
                      @unlink(GW_UPLOADPATH . $coverart);

                      // Connect to the database
                      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

                      // Delete the rating data from the database
                      $query = "DELETE FROM billboard WHERE id = $id LIMIT 1";
                      mysqli_query($dbc, $query);
                      mysqli_close($dbc);

                      // Confirm success with the user
                      echo '<h2 class="success">' . $title . ' was successfully removed.</h2>';
                      echo '<p><a href="index.php"><span class="back-home">&lt;&lt;</span> Back to home page</a></p>';
                    }
                    else {
                      echo '<h2 class="error">The high rating was not removed.</h2>';
                    }
                  }
                  else if (isset($id) && isset($coverart) && isset($title) && isset($date) && isset($rating)) {
                   
                    echo '<h2 class="confirm-h2">Are you sure you want to delete?</h2>';
                    echo '<div class="confirm-removal">';

                      echo '<img src="' . GW_UPLOADPATH . $coverart . '" width="280" alt="Score image" />';
                      echo '<p><strong>Title: </strong>' . $title . '</p>';
                      echo '<p><strong>Date: </strong>' . date('l jS\, F Y', strtotime($date)) . '</p>';
                      echo '<p><strong>Rating: </strong>' . $rating . '</p>';

                      echo '<form method="post" action="confirm-remove-track.php">';
                        echo '<span class="radio-buttons">';
                          echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
                          echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
                        echo '</span>';
                        echo '<input type="submit" value="Remove" name="submit" />';
                        echo '<input type="hidden" name="id" value="' . $id . '" />';
                        echo '<input type="hidden" name="title" value="' . $title . '" />';
                        echo '<input type="hidden" name="rating" value="' . $rating . '" />';
                      echo '</form>';

                      echo '<p><a href="index.php"><span class="back-home">&lt;&lt;</span> Back to home page</a></p>';

                   echo '</div>';
                  }
                ?>
                
            </div><!-- /remove-track -->

        </section>
    </div><!-- end/content-->
</div><!-- end/wrapper-->