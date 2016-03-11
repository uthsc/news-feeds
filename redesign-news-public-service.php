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
            'category' => 62, // public-service
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
                    <div class = "row collapse">
                        <div class = "columns small-4 medium-12">
                            <figure>' . get_the_post_thumbnail( $post['ID'], 'thumbnail') . '</figure>
                        </div>
                        <div class = "columns small-12 small-centered">
                            <p><span class="anchortext">' . $post['post_title'] . '</span></p>
                        </div>
                    </div>
                </a>';
                }
                else {
                    $news_string .= '<a href = "' . get_permalink($post['ID']) . '">
                    <div class = "row collapse">
                        <div class = "columns small-4 medium-12 large-5">
                            <figure>' . get_the_post_thumbnail( $post['ID'], 'thumbnail') . '</figure>
                        </div>
                        <div class = "columns small-12 small-centered medium-12 medium-uncentered large-7 large-push-1">
                            <p><span class="anchortext">' . $post['post_title'] . '</span></p>
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