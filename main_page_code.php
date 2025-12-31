<?php
/**
 * Template Name: Image Caption Search
 */
get_header();
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&family=Playfair+Display&display=swap" rel="stylesheet">

<style>
/* --- 1. RESET & BASIC STYLES --- */
.search-page-outer-container {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #fff;
}

.search-page-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 50px 20px;
}

/* --- 2. HERO HEADER --- */
.hero-header {
    position: relative;
    width: 100%;
    min-height: 600px;
    background-image: url('https://yellow-seahorse-881000.hostingersite.com/wp-content/uploads/2025/12/MM80939_7-07_AB212ASW_MH212_Marina-Militare_GRUPELICOT2_Catania_15-10-2025_Max-Zammit-scaled-1.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: #ffffff;
}

.hero-header .overlay {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1;
}

.hero-header .header-content {
    position: relative;
    z-index: 2;
    padding: 20px;
    max-width: 90%;
}

.hero-header .sub-title {
    font-family: 'Playfair Display', serif;
    font-size: 30px;
    font-weight: 400;
    margin-bottom: 15px;
    color: #fff;
}

.hero-header .main-title {
    font-family: 'Josefin Sans', sans-serif;
    font-size: 80px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin: 0;
    line-height: 1.1;
    color: #fff;
}

/* --- 3. FULL WIDTH SEARCH SECTION --- */
.search-row { margin-bottom: 40px; }
.search-row h2 {
    font-family: 'Josefin Sans', sans-serif;
    font-size: 26px;
    font-weight: 700;
    color: #000;
    margin-bottom: 10px;
}
.search-description { font-size: 16px; color: #666; margin-bottom: 25px; }

.search-form-container {
    display: flex;
    width: 100%;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid #000;
}
.search-form-container input[type="text"] {
    flex: 1;
    padding: 20px 25px;
    border: none;
    font-size: 16px;
    outline: none;
}
.search-form-container button {
    padding: 0 50px;
    background-color: #000;
    color: #fff;
    border: none;
    font-family: 'Josefin Sans', sans-serif;
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    cursor: pointer;
    transition: 0.3s;
}

/* --- 4. SIMPLE INFO BOX --- */
.simple-info-box {
    margin: 40px 0;
    padding: 25px;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    background-color: #f9f9f9;
}
.simple-info-box h5 {
    font-size: 16px;
    font-weight: 700;
    text-transform: uppercase;
    margin-bottom: 15px;
    color: #000;
    border-bottom: 1px solid #000;
    display: inline-block;
}
.simple-info-box ul { list-style: none; padding: 0; }
.simple-info-box ul li {
    font-size: 14px;
    color: #555;
    margin-bottom: 10px;
    padding-left: 20px;
    position: relative;
}
.simple-info-box ul li::before {
    content: "•";
    position: absolute;
    left: 0; color: #000; font-weight: bold;
}

/* --- 5. PHOTOS GRID & CARD CAPTION --- */
.photos-heading {
    font-size: 22px;
    border-bottom: 2px solid #000;
    display: inline-block;
    padding-bottom: 5px;
    margin-bottom: 30px;
    font-weight: 700;
}
.image-results {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 30px;
}
.img-box {
    background: #fff;
    border: 1px solid #eee;
    border-radius: 12px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
}
.img-box:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.1);
}
.img-box img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    display: block;
}
.img-card-caption {
    padding: 15px;
    font-size: 14px;
    color: #333;
    line-height: 1.5;
    background-color: #fff;
    border-top: 1px solid #f0f0f0;
    flex-grow: 1;
    font-weight: 500;
}

/* Lightbox Caption Style - Responsive */
.glightbox-clean .gslide-description {
    background: #000;
    color: #fff;
    padding: 15px;
}
.lb-caption-text {
    font-size: 14px;
    line-height: 1.6;
    color: #fff;
    text-align: left;
    display: block;
}

/* Load More */
.load-more-container { text-align: center; margin-top: 50px; }
#ps-load-btn {
    padding: 15px 45px;
    border: 2px solid #000;
    background: #fff;
    font-weight: 700;
    cursor: pointer;
    transition: 0.3s;
}
#ps-load-btn:hover { background: #000; color: #fff; }

/* --- 6. MOBILE RESPONSIVE --- */
@media (max-width: 768px) {
    .hero-header { min-height: 450px; }
    .hero-header .sub-title { font-size: 20px; }
    .hero-header .main-title { font-size: 38px; }
    
    .search-form-container { flex-direction: column; border: none; box-shadow: none; }
    .search-form-container input[type="text"] { border: 1px solid #000; border-radius: 6px; margin-bottom: 10px; width: 100%; }
    .search-form-container button { width: 100%; padding: 18px; border-radius: 6px; }
    
    .image-results { grid-template-columns: 1fr; }
    .lb-caption-text { font-size: 12px; }
}
</style>

<div class="search-page-outer-container">
    <header class="hero-header">
        <div class="overlay"></div>
        <div class="header-content">
            <h2 class="sub-title">Motore di ricerca semantico sull‘archivio completo</h2>
            <h1 class="main-title">ARCHIVIO IMMAGINI VMAS</h1>
        </div>
    </header>

    <div class="search-page-wrapper">
        <div class="search-row">
            <h2>RICERCA AVANZATA ARCHIVIO VMAS</h2>
            <p class="search-description">Digita qui il modello, le marche, il luogo o qualsiasi elemento utile per la ricerca...</p>
            <form class="search-form-container" method="get" action="">
                <input type="text" name="img_search" placeholder="Cerca nell'archivio..." value="<?php echo isset($_GET['img_search']) ? esc_attr($_GET['img_search']) : ''; ?>" required>
                <button type="submit">Cerca</button>
            </form>
        </div>

        <div class="simple-info-box">
            <h5>Come funziona:</h5>
            <ul>
                <li>Ricerca per valore specifico: <b>“G91“</b>.</li> 
                <li>Combina parametri: <b>“G91 Istrana MM6434“</b>.</li>
                <li>Escludi parametri con <b>-</b>.</li> 
            </ul>
        </div>

        <div class="photos-row">
            <h3 class="photos-heading">PHOTOS</h3>
            <div class="image-results" id="ps-container">
                <?php
                $keyword = isset($_GET['img_search']) ? sanitize_text_field($_GET['img_search']) : '';
                if(!empty($keyword)) {
                    add_filter( 'posts_where', 'ps_search_by_caption_only', 10, 2 );
                    $query = new WP_Query(array(
                        'post_type' => 'attachment',
                        'post_status' => 'inherit',
                        'posts_per_page' => 20,
                        's' => $keyword
                    ));
                    if($query->have_posts()) {
                        while($query->have_posts()) {
                            $query->the_post();
                            $id    = get_the_ID();
                            $thumb = wp_get_attachment_image_url($id, 'medium');
                            $full  = wp_get_attachment_image_url($id, 'full');
                            $cap   = wp_get_attachment_caption($id);
                            
                            // Lightbox content: ONLY Caption text
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
                        $max = $query->max_num_pages;
                    } else {
                        echo '<p>Nessun risultato trovato.</p>';
                    }
                    remove_filter( 'posts_where', 'ps_search_by_caption_only', 10, 2 );
                }
                ?>
            </div>

            <?php if(isset($max) && $max > 1): ?>
                <div class="load-more-container">
                    <button id="ps-load-btn" data-page="1" data-max="<?php echo $max; ?>" data-keyword="<?php echo esc_attr($keyword); ?>">LOAD MORE</button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let lb = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
        moreLength: 200 // Caption lambi ho sakti hai
    });

    const btn = document.getElementById('ps-load-btn');
    const container = document.getElementById('ps-container');

    if (btn) {
        btn.addEventListener('click', function() {
            let page = parseInt(this.getAttribute('data-page'));
            const max = parseInt(this.getAttribute('data-max'));
            const keyword = this.getAttribute('data-keyword');
            this.disabled = true;
            this.innerText = 'LOADING...';

            const fd = new FormData();
            fd.append('action', 'ps_load_more');
            fd.append('keyword', keyword);
            fd.append('page', page);

            fetch('<?php echo admin_url('admin-ajax.php'); ?>', { method: 'POST', body: fd })
            .then(res => res.text())
            .then(html => {
                if(html.trim() !== '') {
                    container.insertAdjacentHTML('beforeend', html);
                    page++;
                    this.setAttribute('data-page', page);
                    this.disabled = false;
                    this.innerText = 'LOAD MORE';
                    lb.reload();
                    if(page >= max) this.remove();
                }
            });
        });
    }
});
</script>

<?php get_footer(); ?>