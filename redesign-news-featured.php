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
            'numberposts' => 4,
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
            if ($i < 1) {

                $news_string .= '<a href="' . get_permalink($post['ID']) . '">
                    <div class="row">
                        <div class="columns">
                            <figure>' . get_the_post_thumbnail( $post['ID'], 'thumbnail') . '</figure>
                            <p>' . $post['post_title'] . '</p>
                        </div>
                    </div>
                </a>';
            }
            else {
                $news_string .= '<a href = "' . get_permalink($post['ID']) . '">
                    <div class = "row">
                        <div class = "columns medium-12 large-4">
                            <figure>' . get_the_post_thumbnail( $post['ID'], 'thumbnail') . '</figure>
                        </div>
                        <div class = "columns medium-12 large-8">
                            <p>' . $post['post_title'] . '</p>
                        </div>
                    </div>
                </a>';
            }

            $i++;
        }

        return $news_string;
    }

}

New Homepage_News();