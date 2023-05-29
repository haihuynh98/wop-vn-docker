<?php

/**
 * Register page class
 */
class RegisterPage
{
    public function __construct() {
        var_dump('asdasd');

        $this->run_hook();
    }

    /**
     * Run hook
     **/
    private function run_hook()
    {
        add_action('init', 'create_about_us_page');
    }

    /**
     * Create about us page
     **/
    public function create_about_us_page()
    {
        $about_us = get_page_by_path('about-us');

        if (!$about_us) {
            // The "about-us" page doesn't exist, create a new one
            $new_page = array(
                'post_title'    => 'About Us',
                'post_content'  => 'This is the content of the About Us page.',
                'post_name'     => 'about-us',
                'post_status'   => 'publish',
                'post_type'     => 'page',
                'page_template' => 'about-us-template.php' // Replace with the actual template filename
            );
        
            // Insert the new page into the database
            $page_id = wp_insert_post($new_page);
        
            if ($page_id) {
                echo "The About Us page has been created successfully!";
            } else {
                echo "An error occurred while creating the page.";
            }
        } else {
            // The "about-us" page already exists
            echo "The About Us page already exists.";
        }
            
    }
    
}

$register_page = new RegisterPage();