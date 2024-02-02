<?php
/*
Template Name: Мелкосемянные и масличные культуры
*/
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
    <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
    <?php endif; ?>

    <section class="product-sublist">
        <h2 class="title">Выберите интересующую вас группу продуктов сортировки</h2>

        <div class="product-sublist__wrapper">
            <ul class="product-sublist__list list-reset">
                <li class="product-promo"><a class="product-promo__link"
                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/amarant/"><span
                            class="product-promo__title">Амарант</span> <img class="product-promo__image"
                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/2/1.jpg"></a>
                </li>
                <li class="product-promo"><a class="product-promo__link"
                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/gorchitsa/"><span
                            class="product-promo__title">Горчица</span> <img class="product-promo__image"
                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/2/4.jpg"></a>
                </li>
                <li class="product-promo"><a class="product-promo__link"
                        href="https://fsapsan.ru/sorting_products/selskoe-hozyaystvo/maslichnye-kultury-semena-i-melkosemyannye/konoplya/"><span
                            class="product-promo__title">Конопля</span> <img class="product-promo__image"
                            src="https://fsapsan.ru/wp-content/uploads/konoplya.jpg"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/kunzhut/"><span
                            class="product-promo__title">Кунжут</span> <img class="product-promo__image"
                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/2/6.jpg"></a>
                </li>
                <li class="product-promo"><a class="product-promo__link"
                        href="https://fsapsan.ru/sorting_products/selskoe-hozyaystvo/maslichnye-kultury-semena-i-melkosemyannye/mak/"><span
                            class="product-promo__title">Мак</span> <img class="product-promo__image"
                            src="https://fsapsan.ru/wp-content/uploads/mak.jpg"></a>
                </li>
                <li class="product-promo"><a class="product-promo__link"
                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/raps/"><span
                            class="product-promo__title">Рапс</span> <img class="product-promo__image"
                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/2/2.jpg"></a>
                </li>
                <li class="product-promo"><a class="product-promo__link"
                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/ryzhik/"><span
                            class="product-promo__title">Рыжик</span> <img class="product-promo__image"
                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/2/7.jpg"></a>
                </li>
                <li class="product-promo"><a class="product-promo__link"
                        href="https://fsapsan.ru/sorting_products/selskoe-hozyaystvo/maslichnye-kultury-semena-i-melkosemyannye/saflor/"><span
                            class="product-promo__title">Сафлор</span> <img class="product-promo__image"
                            src="https://fsapsan.ru/wp-content/uploads/saflor.jpg"></a>
                </li>
                <li class="product-promo"><a class="product-promo__link"
                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/timofeevka/"><span
                            class="product-promo__title">Тимофеевка</span> <img class="product-promo__image"
                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/2/8.jpg"></a>
                </li>
                <li class="product-promo"><a class="product-promo__link"
                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/sorgo/"><span
                            class="product-promo__title">Сорго</span> <img class="product-promo__image"
                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/2/3.jpg"></a>
                </li>

                <li class="product-promo"><a class="product-promo__link"
                        href="https://fsapsan.ru/sorting_products/selskoe-hozyaystvo/maslichnye-kultury-semena-i-melkosemyannye/semena-bahchevyh-kultur/"><span
                            class="product-promo__title">Семена бахчевых культур</span> <img
                            class="product-promo__image"
                            src="https://fsapsan.ru/wp-content/uploads/semena-bahchevyh-kultur.jpg"></a>
                </li>
                <li class="product-promo"><a class="product-promo__link"
                        href="https://fsapsan.ru/sorting_products/selskoe-hozyaystvo/maslichnye-kultury-semena-i-melkosemyannye/semena-ovoschnyh-kultur/"><span
                            class="product-promo__title">Семена овощных культур</span> <img class="product-promo__image"
                            src="https://fsapsan.ru/wp-content/uploads/semena-ovoschnyh-kultur.jpg"></a>
                </li>
                <li class="product-promo"><a class="product-promo__link"
                        href="https://fsapsan.ru/sorting_products/selskoe-hozyaystvo/maslichnye-kultury-semena-i-melkosemyannye/semena-tykvy/"><span
                            class="product-promo__title">Семена тыквы</span> <img class="product-promo__image"
                            src="https://fsapsan.ru/wp-content/uploads/semena-tykvy.jpg"></a>
                </li>
                <li class="product-promo"><a class="product-promo__link"
                        href="https://fsapsan.ru/sorting_products/selskoe-hozyaystvo/maslichnye-kultury-semena-i-melkosemyannye/semena-podsolnechnika/"><span
                            class="product-promo__title">Семена подсолнечника</span> <img class="product-promo__image"
                            src="https://fsapsan.ru/wp-content/uploads/semena-podsolnechnika.jpg"></a>
                </li>
                <li class="product-promo"><a class="product-promo__link"
                        href="https://fsapsan.ru/sorting_products/selskoe-hozyaystvo/maslichnye-kultury-semena-i-melkosemyannye/semena-risa/"><span
                            class="product-promo__title">Семена риса</span> <img class="product-promo__image"
                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/5.jpg"></a>
                </li>

                <li class="product-promo"><a class="product-promo__link"
                        href="https://fsapsan.ru/sorting_products/selskoe-hozyaystvo/maslichnye-kultury-semena-i-melkosemyannye/lyutserna/"><span
                            class="product-promo__title">Люцерна </span> <img class="product-promo__image"
                            src="https://fsapsan.ru/wp-content/uploads/lyutserna-1.jpg"></a>
                </li>



            </ul>
        </div>
    </section>

    <h2 class="title">Оборудование подходящее для сортировки выбранных групп продуктов</h2>
    <p class="subtitle">Предлагаем вам ознакомься с подборкой оборудования для сортировки выбранных продуктовых групп.</p>
    
    <?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	//do_action( 'woocommerce_archive_description' );
	?>
</header>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );
	woocommerce_product_loop_start();
	echo '</div><div class="shop-grid shop-grid--columns-3 products-in-catalog">';
	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );