// 1. Assets (GLightbox) - No Change
function ps_enqueue_scripts() {
    wp_enqueue_style( 'glightbox-css', 'https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css' );
    wp_enqueue_script( 'glightbox-js', 'https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'ps_enqueue_scripts' );

// 2. Advanced Search Filter (Har word ko alag dhoondne ke liye)
function ps_search_by_caption_only( $where, $query ) {
    global $wpdb;
    if ( !is_admin() && $query->is_main_query() == false && $query->get('post_type') == 'attachment' ) {
        $s = $query->get('s');
        if ( !empty($s) ) {
            // Search string ko words mein split karna (space ki bunyaad par)
            $words = explode(' ', $s);
            $search_query = "";

            foreach ($words as $word) {
                $word = trim($word);
                if (!empty($word)) {
                    // Har word ke liye alag AND condition taake sequence zaroori na rahe
                    $search_query .= " AND {$wpdb->posts}.post_excerpt LIKE '%" . esc_sql( $wpdb->esc_like( $word ) ) . "%'";
                }
            }
            $where .= $search_query;
        }
    }
    return $where;
}

// 3. AJAX Load More Engine (Same as main logic)
function ps_ajax_load_images() {
    // Advanced filter apply karein
    add_filter( 'posts_where', 'ps_search_by_caption_only', 10, 2 );
    
    $keyword = isset($_POST['keyword']) ? sanitize_text_field($_POST['keyword']) : '';
    $page = isset($_POST['page']) ? intval($_POST['page']) + 1 : 1;

    $args = array(
        'post_type'      => 'attachment',
        'post_status'    => 'inherit',
        'posts_per_page' => 20,
        'paged'          => $page,
        's'              => $keyword,
    );

    $query = new WP_Query($args);

    if($query->have_posts()) {
        while($query->have_posts()) {
            $query->the_post();
            $id    = get_the_ID();
            $thumb = wp_get_attachment_image_url($id, 'medium');
            $full  = wp_get_attachment_image_url($id, 'full');
            $cap   = wp_get_attachment_caption($id);
            
            // Lightbox content: Only Caption
            $lb_desc = $cap ? "<span class='lb-caption-text'>".esc_html($cap)."</span>" : "";
            ?>
            <div class="img-box">
                <a href="<?php echo esc_url($full); ?>" class="glightbox" data-title="<?php echo esc_attr($lb_desc); ?>">
                    <img src="<?php echo esc_url($thumb); ?>" alt="Archivio VMAS">
                </a>
                <?php if($cap): ?>
                    <div class="img-card-caption">
                        <?php echo esc_html($cap); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php
        }
    }
    remove_filter( 'posts_where', 'ps_search_by_caption_only', 10, 2 );
    wp_die();
}
add_action('wp_ajax_ps_load_more', 'ps_ajax_load_images');
add_action('wp_ajax_nopriv_ps_load_more', 'ps_ajax_load_images');


