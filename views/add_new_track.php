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
            <div class="add-track">
                <?php
                    require_once('appvars.php');
                    require_once('connectvars.php');

                    if (isset($_POST['submit'])) {
                        // Connect to the database
                        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

                        // Grab the score data from the POST
                        $title = mysqli_real_escape_string($dbc, trim($_POST['title']));
                        $artist = mysqli_real_escape_string($dbc, trim($_POST['artist']));
                        $album = mysqli_real_escape_string($dbc, trim($_POST['album']));
                        $genre = mysqli_real_escape_string($dbc, trim($_POST['genre']));
                        $bpm = mysqli_real_escape_string($dbc, trim($_POST['bpm']));
                        $rating = mysqli_real_escape_string($dbc, trim($_POST['rating']));
                        $coverart = mysqli_real_escape_string($dbc, trim($_FILES['coverart']['name']));
                        $coverart_type = $_FILES['coverart']['type'];
                        $coverart_size = $_FILES['coverart']['size']; 

                        if (!empty($title) && !empty($artist) && !empty($album) && !empty($genre) && is_numeric($bpm) && is_numeric($rating) && !empty($coverart)) {
                            if ((($coverart_type == 'image/gif') || ($coverart_type == 'image/jpeg') || ($coverart_type == 'image/pjpeg') || ($coverart_type == 'image/png')) 
                                && ($coverart_size > 0) && ($coverart_size <= GW_MAXFILESIZE)) {
                                if ($_FILES['coverart']['error'] == 0) {
                                    // Move the file to the target upload folder
                                    $target = GW_UPLOADPATH . $coverart;
                                    if (move_uploaded_file($_FILES['coverart']['tmp_name'], $target)) {
                                        // Write the data to the database
                                        $query = "INSERT INTO tracks (id, date, title, artist, album, genre, bpm, rating, coverart) VALUES (0, NOW(), '$title','$artist','$album','$genre','$bpm', '$rating', '$coverart')";
                                        mysqli_query($dbc, $query);

                                        // Confirm success with the user
                                        echo '<h2>Thanks for adding your new track! </h2>';
                                        echo '<h3>It will be reviewed A.S.A.P.</h3>';

                                        echo '<div class="confirm">';
                                            echo '<img src="' . GW_UPLOADPATH . $coverart . '" alt="cover art" />';
                                            echo '<p><strong>Title:</strong> ' . $title . '</p>';
                                            echo '<p><strong>Artist:</strong> ' . $artist . '</p>';
                                            echo '<p><strong>Album:</strong> ' . $album . '</p>';
                                            echo '<p><strong>Genre:</strong> ' . $genre . '</p>';
                                            echo '<p><strong>BPM:</strong> ' . $bpm . '</p>';
                                            echo '<p><strong>Rating:</strong> ' . $rating . '</p>';
                                            echo '<p><a href="index.php"><i class="fa fa-angle-left"></i> Back to Tracks</a></p>';
                                        echo '</div>';

                                        // Clear the rating data to clear the form
                                        $title = "";
                                        $artist = "";
                                        $album = "";
                                        $genre = "";
                                        $bpm = "";
                                        $rating = "";
                                        $coverart = "";

                                        mysqli_close($dbc);
                                    }else{
                                        echo '<h2 class="error">Sorry, there was a problem uploading your cover art image.</h2>';
                                    }
                                }
                            }else{
                                echo '<h2 class="error">The cover art must be a GIF, JPEG, or PNG image file no greater than ' . (GW_MAXFILESIZE / 1024) . ' KB in size.</h2>';
                            }

                            // Try to delete the temporary screen shot image file
                            @unlink($_FILES['coverart']['tmp_name']);
                        }else{
                            echo '<h2 class="error">Please enter all of the information.</h2>';
                        }
                    }
                ?>

                <h3>Add New Tracks</h3>

                <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo GW_MAXFILESIZE; ?>" />
                
                    <input type="text" id="title" name="title" placeholder="Title:" value="<?php if (!empty($title)) echo $title; ?>" /><br />

                    <input type="text" id="artist" name="artist" placeholder="Artist:" value="<?php if (!empty($artist)) echo $artist; ?>" /><br />

                    <input type="text" id="album" name="album" placeholder="Album:" value="<?php if (!empty($album)) echo $album; ?>" /><br />

                    <input type="text" id="genre" name="genre" placeholder="Genre:" value="<?php if (!empty($genre)) echo $genre; ?>" /><br />

                    <input type="number" id="bpm" name="bpm" placeholder="BPM:" min="50" max="200" value="<?php if (!empty($bpm)) echo $bpm; ?>" /><br />
                    
                    <input type="number" id="rating" name="rating" placeholder="Rating: 1-5 " min="1" max="5" value="<?php if (!empty($rating)) echo $rating; ?>" /><br />
                    
                    <label class="coverart-label" for="coverart">Upload Cover Art:</label>
                    <input type="file" id="coverart" name="coverart" />

                    <hr />
                    <input type="submit" value="Add" name="submit" />
                </form>
            </div><!-- /add-track -->
        </section>
    </div><!-- end/content-->
</div><!-- end/wrapper-->