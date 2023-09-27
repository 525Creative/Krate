<div class="wrapper">
    <?php include("views/aside.php"); ?>
    
    <div class="content">
        <header>
            <div>Vinyl Web App</div>
        </header>
        <div class="open isClosed">
            <i class="fa fa-bars font rotate"></i>
        </div>
        <section>
            <div class="billboard">
                <?php
                    require_once('./appvars.php');

                    echo '<div class="table">';
                    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                    // Connect to the database
                    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

                    // Retrieve the score data from MySQL
                    $query = "SELECT * FROM tracks WHERE approved = 1 ORDER BY date DESC";
                    $data = mysqli_query($dbc, $query);

                    // Loop through the array of score data, formatting it as HTML
                    $i = 0;
                    while ($row = mysqli_fetch_array($data)) {
                        // Display the score data
                        // if ($i == 0) {
                        //     echo '<h2 id="top-score">Top Score: ' . $row['rating'] . '</h2>';
                        // }
                        echo '<div class="track">';
                        // This is the image
                        if ( is_file(GW_UPLOADPATH . $row['coverart']) && filesize(GW_UPLOADPATH . $row['coverart']) > 0 ) {
                            echo '<img class="coverart" src="' . GW_UPLOADPATH . $row['coverart'] . '" alt="Score image" />';
                        } else {
                            echo '<img class="coverart" src="' . GW_UPLOADPATH . 'unverified.gif' . '" alt="Unverified score" />';
                        }
                        // This is the info
                        echo '<div class ="track-info">';
                            echo '<div class="title font-weight-bold">' . $row['title'] . '</div>';
                            echo '<div class="artist">Artist: ' . $row['artist'] . '</div>';
                            echo '<div class="album">Album: ' . $row['album'] . '</div>';
                            echo '<div class="genre">Genre: ' . $row['genre'] . '</div>';
                            echo '<div class="bpm">BPM: ' . $row['bpm'] . '</div>';
                        echo '</div><!-- /track-info -->';

                        $i++;
                        echo '</div><!-- /track -->';
                    }

                    mysqli_close($dbc);
                    echo '</div><!-- /table -->';
                ?>
            </div><!-- /billboard -->
        </section>
    </div><!-- end/content-->
    
</div>