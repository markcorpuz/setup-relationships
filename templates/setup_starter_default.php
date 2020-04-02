<?php

if ( ! defined( "ABSPATH" ) ) {
    exit; // Exit if accessed directly
}

global $pid; // this is the post ID that's going to be passed from the main file

// WHEN MAKING A TEMPLATE, ALWAYS COPY THE LINES FROM 1 TO HERE AND DO YOUR CHANGES BELOW

?><div class="related-entry"><?php
// NATIVE | FEATURED IMAGE
echo '<p><strong>Featured Image:</strong> <a href="'.get_the_permalink( $pid ).'">'.get_the_post_thumbnail( $pid, 'thumbnail' ).'</a></p>';

// NATIVE | TITLE
echo '<p><strong>Title:</strong> <a href="'.get_the_permalink( $pid ).'">'.get_the_title( $pid ).'</a></p>';
?></div><?php
/*

// NATIVE | WP-CONTENT | show 5 words only
$max_words = 15;
echo '<p><strong>Content:</strong> '.wp_trim_words( do_shortcode( get_the_content( $pid ) ), $max_words ).'</p>';

// NATIVE | AUTHOR
$author_id = get_post_field( 'post_author', $pid );
//<img src="'.get_avatar_url( $author_id ).'" />
echo '<p><strong>Author:</strong> <a href="'.get_author_posts_url( $author_id ).'">'.get_the_author_meta( 'display_name' , $author_id ).'</a></p>';

// NATIVE | DATE PUBLISHED
echo '<p><strong>Date Published:</strong> '.get_the_date( 'M d Y', $pid ).'</p>';

// NATIVE | EXCERPT
echo '<p><strong>Excerpt:</strong> '.wp_trim_words( get_the_excerpt( $pid ), $max_words ).'</p>';

// ============================================================================================================
echo '<p><hr /></p>';
// ============================================================================================================

// CUSTOM | Podcast Title
echo '<p><strong>Podcast Title:</strong> '.get_post_meta( $pid, "podcast_title", TRUE ).'</p>';

// CUSTOM | Podcast Link
echo '<p><strong>Podcast Link:</strong> '.get_post_meta( $pid, "podcast_link", TRUE ).'<p>';

// CUSTOM | Podcast Embed
echo '<p><strong>Podcast Embed:</strong> '.get_post_meta( $pid, "podcast_embed", TRUE ).'</p>';

// CUSTOM | Podcast Icon
echo '<p><strong>Podcast Icon:</strong> '.wp_get_attachment_image( get_post_meta( $pid, "podcast_icon", TRUE ), 'thumbnail' ).'</p>';

// CUSTOM | Podcast Pic
echo '<p><strong>Podcast Pic:</strong> '.wp_get_attachment_image( get_post_meta( $pid, "podcast_pic", TRUE ), 'thumbnail' ).'</p>';

// CUSTOM | Podcast Category
echo '<p><strong>Podcast Category:</strong></p>';
$cat_id = get_post_meta( $pid, "podcast_category", TRUE );
if( $cat_id ) {
    foreach( $cat_id as $cat_val ) {
        $term = get_term( $cat_val );
        echo '<p>'.$term->name.'</p>';
    }
} else {
    echo '<p>No Category selected</p>';
}

// CUSTOM | Podcast Tag
echo '<p><strong>Podcast Tag:</strong></p>';
$tag_id = get_post_meta( $pid, "podcast_tag", TRUE );
if( $tag_id ) {
    foreach( $tag_id as $tag_val ) {
        $term = get_term( $tag_val );
        echo '<p>'.$term->name.'</p>';
    }
} else {
    echo '<p>No Tag selected</p>';
}

// CUSTOM | Podcast Participants
echo '<p><strong>Podcast Participants:</strong></p>';
$pod_parti = get_post_meta( $pid, "podcast_participants", TRUE );
if( $pod_parti ) {
    foreach( $pod_parti as $pod_val ) {
        $term = get_term( $pod_val );
        echo '<p>'.$term->name.'</p>';
    }
} else {
    echo '<p>No Partipants included</p>';
}

// CUSTOM | Podcast Season
echo '<p><strong>Podcast Season:</strong> <a href="'.get_term_link( get_term( get_post_meta( $pid, "podcast_season", TRUE ) )->term_id ).'"> '.get_term( get_post_meta( $pid, "podcast_season", TRUE ) )->name.'</a></p>';

// CUSTOM | Podcast Episode
echo '<p><strong>Podcast Episode:</strong> '.get_post_meta( $pid, "podcast_episode", TRUE ).'</p>';


*/

// EOF