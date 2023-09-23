<div class="wrapper">
    <?php
        include("views/aside.php");
    ?>
    
    <div class="content">
        <header>
            <h3>KRATES</h3>
        </header>
        <div class="open isClosed">
            <i class="fa fa-bars font rotate"></i>
        </div>
        <section>
            <div class="billboard">
                <?php
                    require_once('./appvars.php');
//                    require_once('../connectvars.php');

                    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                    // Connect to the database 
                    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

                    // Retrieve the score data from MySQL
                    $query = "SELECT * FROM tracks WHERE approved = 1 ORDER BY date DESC";
//                    $query = "SELECT * FROM tracks";
                    $data = mysqli_query($dbc, $query);

                    // Loop through the array of score data, formatting it as HTML 
                    $i = 0;
                    while ($row = mysqli_fetch_array($data)) { 
                        // Display the score data
                        // if ($i == 0) {
                        //     echo '<h2 id="top-score">Top Score: ' . $row['rating'] . '</h2>';
                        // }

                        // This is the image
                        if (is_file(GW_UPLOADPATH . $row['coverart']) && filesize(GW_UPLOADPATH . $row['coverart']) > 0) {
                            echo '<div class="table">';
                                echo '<img class="coverart" src="' . GW_UPLOADPATH . $row['coverart'] . '" alt="Score image" />';
                            }else{
                                echo '<img class="coverart" src="' . GW_UPLOADPATH . 'unverified.gif' . '" alt="Unverified score" />';
                            }
                            // This is the info
                            echo '<div class ="track-info">';
                                echo '<h1>' . $row['title'] . '</h1>';
                                echo '<h3>Artist: ' . $row['artist'] . '</h3>';
                                echo '<h3>Album: ' . $row['album'] . '</h3>';
                                echo '<h3>Genre: ' . $row['genre'] . '</h3>';
                                echo '<h3>BPM: ' . $row['bpm'] . '</h3>';
                            echo '</div><!-- /track-info -->';

                            $i++;
                        }    
                    echo '</div><!-- /table -->';

                    mysqli_close($dbc);
                ?>
            </div><!-- /billboard -->
        </section>
    </div><!-- end/content-->
    
</div>