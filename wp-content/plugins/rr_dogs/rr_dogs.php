<?php
/*
Plugin Name: Custom Dogs Custom Post Types 
Plugin URI: http://earlybirddigital.com.au/
Description: Declares a plugin that will create a custom post type displaying dogs for adoption and already adopted dogs.
Version: 1.0
Author: Rebecca Cronin-Dixon
Author URI: http://earlybirddigital.com.au
License: GPLv2

Copyright (C) 2014 Rebecca Cronin-Dixon

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

/*** Register post_types for dogs for adoption, adopted dogs & events ***/
add_action( 'init', 'rr_post_types' );

function rr_post_types() {
    //Dogs For Adoption Post Type
    $adopt_labels = array(
            'name' => 'Dogs For Adoption',
            'singular_name' => 'Dog For Adoption',
            'add_new' => 'Add New Dog',
            'add_new_item' => 'Add New Dog',
            'edit' => 'Edit Dog Information',
            'edit_item' => 'Edit Dog Information',
            'new_item' => 'New Dog',
            'view' => 'View Dog',
            'view_item' => 'View Dog',
            'search_items' => 'Search Dogs',
            'not_found' => 'No Dogs Found',
            'not_found_in_trash' => 'No Dogs Found in Trash',
        );
    
    $adopt_args = array(
            'labels' => $adopt_labels,
            'public' => true,
            'menu_position' => 5,
            'supports' => array( 'title', 'editor','excerpt', 'thumbnail' ),
            'taxonomies' => array( 'category' ),
            'menu_icon' => plugins_url( 'img/paw.png', __FILE__ ),
            'has_archive' => true,
    );    
        
    register_post_type( 'dog_adoption', $adopt_args );
    
    //events post types
     $event_labels = array(
            'name' => 'Events',
            'singular_name' => 'Event',
            'add_new' => 'Add New Event',
            'add_new_item' => 'Add New Event',
            'edit' => 'Edit Event Information',
            'edit_item' => 'Edit Event Information',
            'new_item' => 'New Eventg',
            'view' => 'View Event',
            'view_item' => 'View Event',
            'search_items' => 'Search Events',
            'not_found' => 'No Events Found',
            'not_found_in_trash' => 'No Events Found in Trash',
        );
    
    $event_args = array(
            'labels' => $event_labels, 
            'public' => true,
            'menu_position' => 5,
            'supports' => array( 'title', 'editor', 'comments', 'excerpt', 'thumbnail' ),
            'taxonomies' => array( '' ),
            'menu_icon' => plugins_url( 'img/paw.png', __FILE__ ),
            'has_archive' => true,
    );    
        
    register_post_type( 'events', $event_args );
};

/* META BOXES */

//Add meta boxes for dog_adoption posts, events posts
add_action( 'add_meta_boxes', 'rr_adopt_box' );

//dog_adoption meta box
function rr_adopt_box(){
add_meta_box( 
    'rr_adopt_box',         //#id  
    'Doggie Details',       //title
    'rr_adopt_box_content',       //callback fn - content for meta box
    'dog_adoption',         //post_type
    'side',                 //context
    'core'                  //priority 
    );
    
add_meta_box(
    'rr_event_box',             //#id  
    'Event Details',            //title
    'rr_event_box_content',     //callback fn - content for meta box
    'events',                   //post_type
    'side',                     //context
    'core'                      //priority 
    );

}


//render meta box
//dog_adoption meta box
function rr_adopt_box_content($post) {
    // $post is already set, and contains an object: the WordPress post
    global $post;

    $values = get_post_custom( $post -> ID );
    $age = isset( $values['adopt_age'] ) ? absint( $values['adopt_age'][0] ) : '' ;
    $breed = isset( $values['adopt_breed'] ) ? esc_attr( $values['adopt_breed'][0] ) : '';
    $contact_p = isset( $values['adopt_contact_p'] ) ? esc_attr( $values['adopt_contact_p'][0] ) : '';
    $contact_e = isset( $values['adopt_contact_e'] ) ? esc_attr( $values['adopt_contact_e'][0] ) : '';
    
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'adopt_meta_box_nonce', 'adopt_meta_box_nonce' );

    ?>
    <p>
    <label for="adopt_age">Age</label>
    <?php echo '<input type="text" name="adopt_age" id="adopt_age" value= "'.$age.'" />'?>
    </p>
    <label for="adopt_breed">Breed</label>
    <?php echo '<input type="text" name="adopt_breed" id="adopt_breed" value="'.$breed.'" />' ?>
    </p>
    <label for="adoptcontact_p">Contact Name</label>
    <?php echo '<input type="text" name="adopt_contact_p" id="adopt_contact_p" value="'.$contact_p.'" />' ?>
    </p>
    <label for="adoptcontact_e">Contact Email</label>
    <?php echo '<input type="text" name="adopt_contact_e" id="adopt_contact_e" value="'.$contact_e.'" />' ?>
    </p>
    <?php
}

//events meta box
function rr_event_box_content(){
    global $post;
    // Enqueue Datepicker + jQuery UI CSS - for datepicker
    wp_enqueue_script( 'jquery-ui-datepicker' );
    wp_enqueue_style( 'jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/smoothness/jquery-ui.css', true);


    $values = get_post_custom( $post -> ID );
    $location = isset( $values[ 'event_location' ] ) ? esc_attr( $values[ 'event_location' ][0] ): '';
    $cost = isset( $values[ 'event_cost' ] ) ? absint( $values[ 'event_cost' ][0]) : '';
    $date = isset( $values[ 'event_date' ] ) ? esc_attr( $values[ 'event_date' ][0]) : '';
    ?>
    <!--datepicker-->
    <script>
    jQuery(document).ready(function(){
    jQuery('#event_date').datepicker({
    dateFormat : 'mm-dd-yy'
    });
    });
    </script>
    <!--make datepicker background visible when hovering -->
    <style>
    #ui-datepicker-div:hover {
        background: white;
    }
    </style>
    <?php
    //nonce field
    wp_nonce_field( 'event_meta_box_nonce', 'event_meta_box_nonce' ); 
    ?>
    <p>
    <label for="event_location">Location </label>
    <?php echo '<input type="text" name="event_location" id="event_location" value= "'.$location.'" />'?>
    </p>
    <p>
    <label for="event_cost">Cost </label>
    <?php echo '<input type="text" name="event_cost" id="event_cost" value="'.$cost.'" />' ?>
    </p>
    <p>
    <label for="event_date">Date </label>
    <?php echo '<input type="text" name="event_date" id="event_date" value="'.$date.'" />' ?>
    </p>
    <?php
}

//Saving meta box data for all custom post types
add_action( 'save_post', 'rr_box_save' ); 

function rr_box_save( $post_id )
{
    if( get_post_type() == 'dog_adoption' || 'events') {
        // Bail if we're doing an auto save
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
        
        if ( get_post_type() == 'dog_adoption' ) { 
            // if our nonce isn't there, or we can't verify it, bail
            if( !isset( $_POST['adopt_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['adopt_meta_box_nonce'], 'adopt_meta_box_nonce' ) ) return;
        }
        
        if ( get_post_type() == 'events' ) {
             if( !isset( $_POST['event_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['event_meta_box_nonce'], 'event_meta_box_nonce' ) ) return;
        }
        
        // if our current user can't edit this post, bail
        if( !current_user_can( 'edit_post' ) ) return;
    
         
        // Make sure your data is set before trying to save it
        //dog_adoption posts
        if( isset( $_POST['adopt_age'] ) )
            update_post_meta( $post_id, 'adopt_age', wp_kses( $_POST['adopt_age'] ) );
         if( isset( $_POST['adopt_breed'] ) )
            update_post_meta( $post_id, 'adopt_breed', wp_kses( $_POST['adopt_breed'] ) );
        if( isset( $_POST['adopt_contact_p'] ) )
            update_post_meta( $post_id, 'adopt_contact_p', wp_kses( $_POST['adopt_contact_p'] ) );
        if( isset( $_POST['adopt_contact_e'] ) )
            update_post_meta( $post_id, 'adopt_contact_e', wp_kses( $_POST['adopt_contact_e'] ) );
        //events posts
        if( isset( $_POST['event_location'] ) )
            update_post_meta( $post_id, 'event_location', wp_kses( $_POST['event_location'] ) );
         if( isset( $_POST['event_cost'] ) )
            update_post_meta( $post_id, 'event_cost', wp_kses( $_POST['event_cost'] ) );
         if( isset( $_POST['event_date'] ) )
            update_post_meta( $post_id, 'event_date', wp_kses( $_POST['event_date'] ) );
    }
    else{
        return;
    }
}





