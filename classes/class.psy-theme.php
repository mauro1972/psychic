<?php

class Psy_Theme {

    public function __constructor() {

    }

    public function featured_post() {

        if ( empty( $this->_cache['featured_post']) ) {
            $this->_cache['featured_post'] = new WP_Query(
                array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'post_status' => 'publish',
                    'meta_key' => 'post_featured',
                    'meta_value' => 1,
                    'orderby' => 'modified',
                    'order' => 'DESC'                    
                )
            );
        }

        return $this->_cache['featured_post'];
    }

    public function promoted_posts() {

        if ( empty( $this->_cache['promoted_post']) ) {
            $this->_cache['promoted_post'] = new WP_Query(
                array(
                    'post_type' => 'post',
                    'posts_per_page' => 5,
                    'post_status' => 'publish',
                    'meta_key' => 'post_promoted',
                    'meta_value' => 1,
                    'orderby' => 'modified',
                    'order' => 'DESC'                   
                )
            );
        }

        return $this->_cache['promoted_post'];        

    }

    public function psy_videos() {

        if ( empty( $this->_cache['psy_videos']) ) {
            $this->_cache['psy_videos'] = new WP_Query(
                array(
                    'post_type' => 'post',
                    'posts_per_page' => 5,
                    'post_status' => 'publish',
                    'tag' => 'videos',
                    'orderby' => 'modified',
                    'order' => 'DESC'                  
                )
            );
        }

        return $this->_cache['psy_videos'];         
    }

    public function psy_posts_by_category( $term_id ) {

        if ( empty( $this->_cache['psy_posts_by_category'])) {

            $this->_cache['psy_posts_by_category'] = new WP_Query(
                array(
                    'posts_per_page' => 4,
                    'post_type' => array('post'),
                    'category' => $term_id,
                    'meta_query' => array(
                        'relation' => 'AND',
                        array  (
                            'key' => 'post_promoted',
                            'value' => 0,
                            'compare' => '=', 
                        ),
                        array  (
                            'key' => 'post_featured',
                            'value' => 0,
                            'compare' => '=', 
                        ),                        
                    )                  
                )
            );

        }

        return $this->_cache['psy_posts_by_category'];
    }
    
}