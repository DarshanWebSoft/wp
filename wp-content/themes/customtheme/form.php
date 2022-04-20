<?php
// Template Name: Form

get_header();

wp_head();
?>

<!DOCTYPE html>
<html>
<head>
    <?php  wp_enqueue_style('Font_Awesome'); ?>
</head>
<body>


<form action="" method="post" align="center">
    <h2>wp crud operation</h2>
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" required><br>

    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname" required><br><br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>

<?php

    if(isset($_POST['submit'])){

        global $wpdb;

        $name  = $_POST['fname'];
        $lname = $_POST['lname'];

       $insert = $wpdb->insert(
            'form',array('name'=>$name,'lname'=>$lname)
        );

       if ($insert == true){

            echo "<script>alert('inserted..');</script>";
       }
    }

    echo do_shortcode('[myshortcode]');

    echo get_option('option');

    get_footer();

    wp_footer();
?>