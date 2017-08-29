<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "orchidee");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_REQUEST['term'])){
    // Prepare a select statement
    $sql = "SELECT * FROM `products` WHERE `kleur` LIKE ?";
    //$sql = "SELECT * FROM `products` WHERE `id` LIKE ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);

        // Set parameters
        $param_term = $_REQUEST['term'] . '%';

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<a href='index.php?content=searched-product&id=".$row['id']."'>";
                    echo "<p>" . $row["product_name"] . " - " . $row["price"] . " euro"."</p>";
                    echo"</a>";
                }
            } else{
                echo "<p>Geen producten gevonden</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

// close connection
mysqli_close($link);
?>