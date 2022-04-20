<?php

    // Template Name: Blog Page

get_header();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Clcik it</title>
</head>


<body>

    <button style="display: flex;
    justify-content: center;
    top: 319px;
    position: relative;" onclick="clickedit()">Click</button>

</body>
</html>

<?php

    $query = array(

        'post_type'=>'book',
        'post_status'=>'publish',

    );

    $loop = new WP_Query($query);
    //var_dump($loop);
//    echo count($loop->have_posts());
    //var_dump(have_posts());

        wp_reset_postdata();

?>


<?php

get_footer();

?>
