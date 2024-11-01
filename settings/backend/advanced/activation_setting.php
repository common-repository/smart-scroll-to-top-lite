<?php defined('ABSPATH') or die('No Scripts for you');

if (is_multisite()) {
    global $wpdb;
    $current_blog = $wpdb->blogid;
   /** Create New Table For Storing Menu detail Datas on Activation* */
        $blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
        foreach ($blog_ids as $blog_id) {
        switch_to_blog($blog_id);

            $charset_collate = $wpdb->get_charset_collate();
            $table_name = $wpdb->prefix . "sstt_settings";

            $sql = "CREATE TABLE $table_name (
                  id int NOT NULL AUTO_INCREMENT,
                    name varchar(255),
                    sstt_settings varchar(5000),
                    PRIMARY KEY (id)
                ) $charset_collate;";

            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

            dbDelta($sql);


    } //End of Blog loop
} // end of multisite condition
else{

            global $wpdb;
        
            $charset_collate = $wpdb->get_charset_collate();
            $table_name = $wpdb->prefix . "sstt_settings";

            $sql = "CREATE TABLE $table_name (
                  id int NOT NULL AUTO_INCREMENT,
                    name varchar(255),
                    sstt_settings varchar(5000),
                    PRIMARY KEY (id)
                ) $charset_collate;";

            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

            dbDelta($sql);
}