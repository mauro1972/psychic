<?php

class Psy_Theme {

    public function __constructor() {

    }

    public function category_sections() {
        
        if ( empty( $this->_cache['category_sections']) ) {

            $cat_section = array();

            $categories = get_the_category();
            $category_id = $categories[0]->cat_ID;
            $sections = get_field('category_sections', 'category_'. $category_id);

            if ( is_array($sections) && !empty($sections)) {
                foreach ( $sections as $key => $section_term_id ) {
                    $section_term = get_term( $section_term_id );
                    //print_r($section_term);
                    $section_title = get_field('section_title', 'post_tag_'. $section_term_id );
                    $query = $this->get_post_by_cat_and_tag($category_id, $section_term_id);
                    echo $section_title .'test<br>';
                    $cat_section[] = array(
                        'section_title' => $section_title,
                        'section_description' => $section_term->description,
                        'tag_posts' => $query,
                    );
                }   
            };

            

            $this->_cache['category_sections'] = $cat_section;
        }

        return $this->_cache['category_sections'];
    }

    private function get_post_by_cat_and_tag($cat_id, $tag_id) {
        
        $query = new WP_Query(array(
            'posts_per_page' => 10,
            'post_type' => array('post'),
            'post_status' => 'publish',
            'tax_query' => array(
                'relation' => 'AND',
                array(
                   'taxonomy' => 'post_tag',
                   'field' => 'term_id',
                   'terms' => array($tag_id), 
                ),
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => array($cat_id), 
                ),                
            ),
        ));

        return $query;
    }

    public function featured_post() {

        if ( empty( $this->_cache['featured_post']) ) {
            $this->_cache['featured_post'] = new WP_Query(
                array(
                    'post_type' => array('post','page'),
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
                    'post_type' => array('post','page'),
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
                    'post_type' => array('post','page'),
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
                    'post_type' => array('post','page'),
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
                                       
                    ),
                    /*'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'category',
                            'field' => 'term_id',
                            'terms' => array($term_id), 
                         ),                        
                        array(
                            'taxonomy' => 'post_tag',
                            'field' => 'slug',
                            'terms' => array('videos'), 
                            'operator' => 'NOT IN'
                         ),                        
                    ),  */                
                )
            );

        }

        return $this->_cache['psy_posts_by_category'];
    }
    
}