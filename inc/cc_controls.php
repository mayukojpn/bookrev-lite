<?php

class book_rev_lite_Theme_Support extends WP_Customize_Control
{
    public function render_content()
    {

    }

}
/**
 * A class to create a dropdown for all categories in your wordpress site
 */
 class Category_Dropdown_Custom_Control extends WP_Customize_Control
 {
    private $cats = false;

    public function __construct($manager, $id, $args = array(), $options = array("hide_empty" => 0))
    {
        $this->cats = get_categories($options);
        parent::__construct( $manager, $id, $args );
    }

    /**
    * Render the content of the category dropdown
    *
    * @return HTML
    */
    public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <span class="customize-category-select-control"><b><?php echo esc_html( $this->label ); ?></b></span>
                      <select <?php $this->link(); ?>>
                           <?php
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($this->value(), $cat->term_id, false), $cat->name);
                                }
                           ?>
                      </select>
                    </label>
                <?php
            }
       }
 }

/**
 * A class to create a dropdown for all google fonts
 */
 class Google_Font_Dropdown_Custom_Control extends WP_Customize_Control
 {
    private $fonts = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->fonts = $this->get_fonts();
        parent::__construct( $manager, $id, $args );
    }

    /**
    * Render the content of the category dropdown
    *
    * @return HTML
    */
    public function render_content()
    {
        if(!empty($this->fonts))
        {
            ?>
                <label>
                    <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
                    <select <?php $this->link(); ?>>
                        <?php
                            foreach ( $this->fonts as $k => $v )
                            {
                                printf('<option value="%s" %s>%s</option>', $k, selected($this->value(), $k, false), $v->family);
                            }
                        ?>
                    </select>
                </label>
            <?php
        }
    }

    /**
     * Get the google fonts from the API or in the cache
     * @param  integer $amount
     * @return String
     */
    public function get_fonts( $amount = 50 )
    {
        //delete_transient("book_rev_lite_gfonts_transient");
        $fontTransient = get_transient("book_rev_lite_gfonts_transient");

        //Total time the file will be cached in seconds, set to a week
        $cachetime = 86400 * 7;

        if($fontTransient != "")
        {
            $content = json_decode($fontTransient);
        } else {
            $googleApi = 'https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=AIzaSyB7Oz38FT-PvPLYCvqf7Zh2Lt1fqiRH2q8';
            $fontContent = wp_remote_get( $googleApi, array('sslverify'   => false) );
            $fontTransient .= $fontContent['body'];
            set_transient("book_rev_lite_gfonts_transient", $fontTransient, $cachetime);
            $content = json_decode($fontContent['body']);
        }

        if($amount == 'all')
        {
            return $content->items;
        } else {
            return array_slice($content->items, 0, $amount);
        }
    }
 }