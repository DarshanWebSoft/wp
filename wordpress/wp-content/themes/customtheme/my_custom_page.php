<?php

/*Template Name: custom page*/

$args = array(
    'post_type'=> 'movies',
    'post_status' => 'publish',
    'order'    => 'DESC',
    'posts_per_page' => -1 // this will retrive all the post that is published
);
$post = new WP_Query( $args );

//var_dump($post);

//wp_reset_postdata();


$terms = get_terms([
    'taxonomy' => 'book_author',
    'hide_empty' => false,
]);

//print_r($terms['name']);

//foreach($terms as $terms){
//
//    echo $terms->name;
//
//    $args = array(
//        'post_type' => 'book',
//        'post_status' => 'publish',
//        'posts_per_page' => 5,
//        'tax_query' => array(
//            array(
//                'taxonomy' => 'book_author',
//                'field'    => 'slug',
//                'terms'    => $terms->name,
////                'operator' => 'IN'
//            ),
//        ),
//    );
//}
//
//$arr_posts = new WP_Query( $args );

//print_r($arr_posts);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<button onclick="clicked()">Click it</button>

<?php
while (have_posts($post)){
?>

    <img src="<?php the_post_thumbnail('thumbnail'); ?>" alt="">

<?php
} ?>

</body>
</html>