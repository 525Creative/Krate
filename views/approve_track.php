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
            <div class="approve-track">
                <?php
                  require_once('appvars.php');
                  require_once('connectvars.php');

                  if (isset($_GET['id']) && isset($_GET['date']) && isset($_GET['title']) && isset($_GET['rating'])) {
                    // Grab the score data from the GET
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
                    echo '<h2 class="error">Sorry, no high rating was specified for approval.</h2>';
                  }

                  if (isset($_POST['submit'])) {
                    if ($_POST['confirm'] == 'Yes') {
                      // Connect to the database
                      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

                      // Approve the rating by setting the approved column in the database
                      $query = "UPDATE tracks SET approved = 1 WHERE id = $id";
                      mysqli_query($dbc, $query);
                      mysqli_close($dbc);

                      // Confirm success with the user
                      echo '<h2 class="success">The high rating of ' . $rating . ' for ' . $title . ' was successfully approved.</h2>';
                    }
                    else {
                      echo '<h2 class="error">Sorry, there was a problem approving the high rating.</h2>';
                    }
                  }
                  else if (isset($id) && isset($title) && isset($date) && isset($rating)) {

                    echo '<h2>Are you sure you want to approve?</h2>';
                    echo '<div class="confirm-approve">';
                        echo '<img src="' . GW_UPLOADPATH . $coverart . '"  alt="cover art" />';
                        echo '<p><strong>Title: </strong>' . $title . '</p>';
                        echo '<p><strong>Rating: </strong>' . $rating . '</p>';
                        echo '<p><strong>Date: </strong>' . date('l jS\, F Y', strtotime($date)) . '</p>';

                        echo '<form method="post" action="approve-track.php">';
                            echo '<span class="radio-buttons">';
                                echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
                                echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
                            echo '</span>';
                            echo '<input type="submit" value="Approve" name="submit" />';
                            echo '<input type="hidden" name="id" value="' . $id . '" />';
                            echo '<input type="hidden" name="title" value="' . $title . '" />';
                            echo '<input type="hidden" name="rating" value="' . $rating . '" />';
                        echo '</form>';

                        echo '<p class="back-home"><a href="index.php"><i class="fa fa-angle-left"></i> Back to home page</a></p>';

                    echo '</div><!--  end/approve -->';
                  }
                ?>
            </div><!-- /approve-track -->

        </section>
    </div><!-- end/content-->
</div><!-- end/wrapper-->