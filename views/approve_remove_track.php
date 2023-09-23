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
            <div class="admin">
                <?php
                require_once('appvars.php');
                require_once('connectvars.php');

                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                // Connect to the database
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

                // Retrieve the score data from MySQL
                //                    $query = "SELECT * FROM billboard ORDER BY rating DESC, date ASC";
                $query = "SELECT * FROM tracks ORDER BY rating DESC, date ASC";
                $data = mysqli_query($dbc, $query);

                // Loop through the array of score data, formatting it as HTML
                echo '<h1>Admin</h1>';
                echo '<table id="data-table">';
                echo '<tr><th>Track</th><th>Date Posted</th><th>Rating</th><th>Action</th></tr>';
                while ($row = mysqli_fetch_array($data)) {
                    // Display the score data
                    echo '<tr><td><strong>' . $row['title'] . '</strong></td>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td>' . $row['rating'] . '</td>';
                    echo '<td><a class="remove" href="confirm-remove-track.php?id=' . $row['id'] . '&amp;date=' . $row['date'] .
                        '&amp;title=' . $row['title'] . '&amp;rating=' . $row['rating'] .
                        '&amp;coverart=' . $row['coverart'] . '"><i class="fa fa-minus-square-o remove"></i>Remove</a>';
                    if ($row['approved'] == '0') {
                        echo '<span class="divider">|</span><a class="approve" href="approve-track.php?id=' . $row['id'] . '&amp;date=' . $row['date'] .
                            '&amp;title=' . $row['title'] . '&amp;rating=' . $row['rating'] . '&amp;coverart=' .
                            $row['coverart'] . '"><i class="fa fa-check-square-o"></i>Approve</a>';
                    }
                    echo '</td></tr>';
                }
                echo '</table>';

                mysqli_close($dbc);
                ?>
            </div><!-- /admin -->
        </section>
    </div><!-- end/content-->
</div><!-- end/wrapper-->