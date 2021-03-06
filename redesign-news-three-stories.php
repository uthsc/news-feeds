<?php
require_once("../wp-load.php");

/*ini_set('display_errors',1); 
 error_reporting(E_ALL);*/

class Homepage_News {

    public function __construct() {
        echo $this-> get_latest_news_stories_ps();
    }

    private function get_latest_news_stories_ps() {

        // Returns posts as arrays instead of get_posts' objects
        $recent_posts = wp_get_recent_posts(array(
            'numberposts' => 3,
            'category' => 10,
            'post_status' => 'publish',
            'meta_key' => '_thumbnail_id'
        ));

        /*
         * Set incrementer
         */
        $i = 0;

        $news_string = '';

        foreach($recent_posts as $post) {
                $news_string .= '<a href = "' . get_permalink($post['ID']) . '">
                    <div class = "row">
                        <div class = "columns medium-12 large-3">
                            ' . get_the_post_thumbnail( $post['ID'], 'thumbnail') . '
                        </div>
                        <div class = "columns medium-12 large-9">
                            <p>' . $post['post_title'] . '</p>
                        </div>
                    </div>
                </a>';


            $i++;
        }

        return $news_string;
    }

}

New Homepage_News();