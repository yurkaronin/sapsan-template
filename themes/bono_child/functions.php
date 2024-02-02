<?php
/**
 * Child theme of Bono
 * https://wpshop.ru/themes/bono
 *
 * @package Bono
 */
/**
 * Enqueue child styles
 *
 * НЕ УДАЛЯЙТЕ ДАННЫЙ КОД
 */
add_action( 'wp_enqueue_scripts', 'custom_theme_styles_and_scripts' );
function custom_theme_styles_and_scripts() {
    wp_enqueue_style( 'bono-style-child', get_stylesheet_uri(), array('bono-style'), '1.0.0' );

    wp_enqueue_style( 'animate', get_stylesheet_directory_uri() . '/assets/css/animate.min.css', array('bono-style-child'), '1.0.0' );
    wp_enqueue_style( 'fancybox-css', '', array('https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.cs'), '1.0.0' );
    wp_enqueue_style( 'swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(''), '1.0.0' );
    wp_enqueue_style( 'style-css', get_stylesheet_directory_uri() . '/assets/css/style.css', array(''), '1.0.0' );
    wp_enqueue_style( 'custom2-css', get_stylesheet_directory_uri() . '/assets/css/custom.css', array(''), '1.0.0' );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'micromodal-js', get_stylesheet_directory_uri() . '/assets/js/micromodal.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'jquery-mask-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js', array('jquery'), '1.14.16', true );
    wp_enqueue_script( 'swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'jquery-fancybox-js', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array('jquery'), '3.5.7', true );
    wp_enqueue_script( 'jquery-validate-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js', array('jquery'), '1.19.1', true );
    wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0.0', true );

}



add_filter( 'woocommerce_product_upsells_products_heading', function () {
    return 'Рекомендуемое сопутствующее оборудование';
} );

add_action( 'before_woocommerce_init', function() {
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
} );

// Добавляем оформление админки css 
// add_action('admin_head', 'moi_novii_style');
// function moi_novii_style() {
// print '<style>
// /*Стили в админку*/
// .postbox-header {
//   background-color: #d4af5e !important;
//   color: #000000 !important;
//   font-weight: 700 !important;
//   font-family: cursive !important;
// }

// .custom-equipment-performance .wp-block-column {
//   max-width: 250px;
//   width: 100%;
// }

// .wp-block-media-text figure {
//   margin: 0;
//   margin-bottom: 25px;
//   padding-right: 20px;
//   display: flex;
//   align-items: center;
// }



// .wp-block-media-text .has-large-font-size {
//   margin: 0;
//   margin-bottom: 10px;
//   font-size: 14px !important;
//   line-height: 130%;
//   color: #d4af5e;
//   font-weight: 700;
//   text-transform: uppercase;
// }

// .wp-block-media-text .equipment-performance__text {
//   font-size: 12px;
//   color: #000000;
//   line-height: 120%;
// }
// </style>';
// }

add_action( 'init', 'register_post_types' );

function register_post_types(){
	register_post_type( 'sapsan_reviews', [
		'label'  => null,
		'labels' => [
			'name'               => 'Отзывы', // основное название для типа записи
			'singular_name'      => 'Отзыв', // название для одной записи этого типа
			'add_new'            => 'Добавить отзыв', // для добавления новой записи
			'add_new_item'       => 'Добавление отзыва', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование отзыва', // для редактирования типа записи
			'new_item'           => 'Новый отзыв', // текст новой записи
			'view_item'          => 'Смотреть отзыв', // для просмотра записи этого типа.
			'search_items'       => 'Искать отзыв', // для поиска по этим типам записи
			'not_found'          => 'Отзывов не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Отзывов в корзине не найдено', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Отзывы', // название меню
		],
		'description'         => 'Галерея сканов отзывов и благодарственных писем от клиентов',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню админки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title','editor','thumbnail','excerpt','revisions','page-attributes','post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'sapsan_people_cards', [
		'label'  => null,
		'labels' => [
			'name'               => 'Карточки сотрудников', // основное название для типа записи
			'singular_name'      => 'Карточка сотрудника', // название для одной записи этого типа
			'add_new'            => 'Добавить карточку', // для добавления новой записи
			'add_new_item'       => 'Добавление карточки', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование карточки', // для редактирования типа записи
			'new_item'           => 'Новая карточка', // текст новой записи
			'view_item'          => 'Смотреть карточку', // для просмотра записи этого типа.
			'search_items'       => 'Искать карточку', // для поиска по этим типам записи
			'not_found'          => 'Не найдено карточки', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'В корзине нет карточек', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Сотрудники', // название меню
		],
		'description'         => 'Контактная информация в виде небольших карточек сотрудников.',
		'public'              => false,
		'publicly_queryable'  => false, // зависит от public
		'exclude_from_search' => false, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-buddicons-buddypress-logo',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title','thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['sapsan_status_group'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'sapsan_status_group', [ 'sapsan_people_cards' ], [ 
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Должностные группы',
			'singular_name'     => 'Должностная группа',
			'search_items'      => 'Поиск группы',
			'all_items'         => 'Все группы',
			'view_item '        => 'Смотреть группу',
			'parent_item'       => 'Родительская группа',
			'parent_item_colon' => 'Родительская группа:',
			'edit_item'         => 'Редактировать группу',
			'update_item'       => 'Обновить группу',
			'add_new_item'      => 'Добавить новую группу',
			'new_item_name'     => 'Новая группа',
			'menu_name'         => 'Должностные группы',
		],
		'description'           => 'Должностные группы сотрудников компании.', // описание таксономии
		'public'                => false,
		'publicly_queryable'    => true, // равен аргументу public
		'show_in_nav_menus'     => false, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_in_menu'          => true, // равен аргументу show_ui
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => false,
	] );
}

//вывод стандартной формы поиска шорткодом start
function wph_display_search_form() {
    return get_search_form(false);
}
add_shortcode('search_form', 'wph_display_search_form');
                

//вывод стандартной формы поиска шорткодом end
add_action( 'bono_metabox_hide_elements_post_type', function() {
    return [ 'services' ];
   } );
add_action( 'bono_metabox_thumbnail_post_type', function() {
    return [ 'services', 'post', 'page'];
	 } );
	 
add_filter( 'woocommerce_product_subcategories_hide_empty', function() { return false; }, 10, 1 );

function wplook_activate_gutenberg_products($can_edit, $post_type){
	if($post_type == 'product'){
		$can_edit = true;
	}
	
	return $can_edit;
}
add_filter('use_block_editor_for_post_type', 'wplook_activate_gutenberg_products', 10, 2);

foreach ( array( 'pre_term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_filter_kses' );
	}
	foreach ( array( 'term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_kses_data' );
	}

add_filter('woocommerce_product_add_to_cart_text', 'woo_custom_cart_button_text');
	function woo_custom_cart_button_text() {
		return "Подробнее";
	}

// обработка первой страницы пагинации (дубля)
add_filter('paginate_links', function($link) {
    $pos = strpos($link, 'page/1/');
    if($pos !== false) {
        $link = substr($link, 0, $pos);
    }
    return $link;
});

// удаление стандартных значений из сортировки
add_filter( 'woocommerce_default_catalog_orderby_options', 'truemisha_remove_orderby_options' );
add_filter( 'woocommerce_catalog_orderby', 'truemisha_remove_orderby_options' );
function truemisha_remove_orderby_options( $sortby ) {
  unset( $sortby[ 'popularity' ] ); // по популярности
  unset( $sortby[ 'rating' ] ); // по рейтингу
   $sortby[ 'menu_order' ] = 'По умолчанию';
  unset( $sortby[ 'date' ] ); // Сортировка по более позднему
  //unset( $sortby[ 'price' ] ); // Цены: по возрастанию
  //unset( $sortby[ 'price-desc' ] ); // Цены: по убыванию
 
  return $sortby;
 
}
// добавление сортировки по цене
add_filter( 'woocommerce_get_catalog_ordering_args', 'woocommerce_get_catalog_ordering_name_args' );
function woocommerce_get_catalog_ordering_name_args( $args ) {
    if (isset($_GET['orderby'])) {
        switch ($_GET['orderby']) :
            case 'name_list_asc' :
                $args['orderby'] = 'title';
                $args['order'] = 'ASC';
                $args['meta_key'] = '';
            break;
            case 'name_list_desc' :
                $args['orderby'] = 'title';
                $args['order'] = 'DESC';
                $args['meta_key'] = '';               
            break;
        endswitch;
    }
 
  return $args;
}

// Добавляем условия в стандартный вывод сортировки WP (выпадающий список)
function woocommerce_catalog_name_orderby( $sortby ) {
    $sortby['name_list_asc'] = 'По алфавиту: по возрастанию';
    $sortby['name_list_desc'] = 'По алфавиту: по убыванию';
  return $sortby;
}
add_filter( 'woocommerce_catalog_orderby', 'woocommerce_catalog_name_orderby', 1 );

// Добавляем от для цены 
add_filter( 'woocommerce_get_price_html', 'bbloomer_add_price_prefix', 99, 2 );
function bbloomer_add_price_prefix( $price, $product ){
    $price = 'от ' . $price;
    return $price;
}

add_filter( 'woocommerce_breadcrumb_defaults', 'my_breadcrumbs_delimiter');
function my_breadcrumbs_delimiter($args) {
	$args['delimiter'] = ' | ';
	$args['wrap_before'] = '<div class="woocommerce-breadcrumb">';
	$args[	'wrap_after'] = '</div>';
  return $args;

}

// Добавление новых полей цены на странице товара 
add_action('woocommerce_product_options_pricing', function() {
	woocommerce_wp_text_input([
					'id' => '_base_price_usd',
					'label' => 'Базовая цена ($)',
					'data_type' => 'price'
	]);
	woocommerce_wp_text_input([
					'id' => '_sale_price_usd',
					'label' => 'Акционная цена ($)',
					'data_type' => 'price'
	]);
});

// Сохранение новых полей 
add_action('woocommerce_admin_process_product_object', function($product) {
	if (isset($_POST['_base_price_usd'])) {
			$product->update_meta_data('_base_price_usd', sanitize_text_field($_POST['_base_price_usd']));
	}
	if (isset($_POST['_sale_price_usd'])) {
			$product->update_meta_data('_sale_price_usd', sanitize_text_field($_POST['_sale_price_usd']));
	}
});

// Если поля стоимости товара в $ заполнены - игнорировать значение из поля стоимости в рублях 
add_filter('woocommerce_product_get_price', 'my_custom_get_price', 10, 2);

function my_custom_get_price($price, $product) {
	// Удалите эту строку после завершения отладки
	// error_log(print_r($_POST, true));

	// Получаем текущий курс
	$current_rate = get_option('current_usd_to_rub', 75);

	// Проверяем, что $current_rate действительно является числом
	if (!is_numeric($current_rate)) {
		error_log('current_usd_to_rub option is not a number');
		return $price; // Возвращаем оригинальную цену, если курс не установлен
	}

	// Получаем цены в USD
	$price_usd = get_post_meta($product->get_id(), '_base_price_usd', true);
	$sale_price_usd = get_post_meta($product->get_id(), '_sale_price_usd', true);

	// Проверяем, являются ли полученные значения числами
	if (is_numeric($sale_price_usd)) {
		return floatval($sale_price_usd) * floatval($current_rate);
	} elseif (is_numeric($price_usd)) {
		return floatval($price_usd) * floatval($current_rate);
	} else {
		// Возвращаем оригинальную цену, если ни одна из цен не установлена
		return $price;
	}
}


add_action( 'save_post', 'recalc_price_meta' );

if ( !function_exists('recalc_price_meta') ) {
	function recalc_price_meta($post_id) {
		$msg = [];
		// пробуем получить данные из кэша
		// если в кэше нету или дата в кэше старше 1 часа то получаем данные с api cdr 
		$data = false;
		$json = get_option( 'cbr_daily_json' );
		if ( $data = json_decode($json, true) ) {
			if ( strtotime($data['_last_update']) < time() - 60 * 60 ) {
				$data = get_cbr_daily();	
			}
		} else {
			$data = get_cbr_daily();
		}
		// 
		// извлекаем актуальные данные для usd
		$usd_value = 0;
		if ($data) {
			$usd_value = $data['Valute']['USD']['Value'];
		}

		if ($usd_value) {

			$msg[] = "Курс: ".$usd_value;
			$msg[] = "Дата cdr: ".date('Y-m-d H:i:s', strtotime($data['Date']));
			$msg[] = "Дата изения в кэше: ".$data['_last_update'];
			$msg[] = "==========================";

			$_regular_price = get_field( "_regular_price", $post_id );
			$_sale_price = get_field( "_sale_price", $post_id );
			$_base_price_usd = get_field( "_base_price_usd", $post_id );
			$_sale_price_usd = get_field( "_sale_price_usd", $post_id );

			$meta_input = [];

			if ($_base_price_usd) {
				$_new_regular_price = round($_base_price_usd * $usd_value / 100) * 100;
				$meta_input['_regular_price'] = $_new_regular_price;
			}
			if ($_sale_price_usd) {
				$_new_sale_price = round($_sale_price_usd * $usd_value / 100) * 100;
				$meta_input['_sale_price'] = $_new_sale_price;
			}

			if (count($meta_input) > 0 ) {
				$_msg = [];
				if (!@$meta_input['_sale_price']) {
					$meta_input['_price'] = $meta_input['_regular_price'];
				} else {
					$meta_input['_price'] = $meta_input['_sale_price'];
				}
				foreach ($meta_input as $key => $value) {
					$_res = update_post_meta($post_id, $key, $value);
					$_msg[] = $_res;	
					if ($_res) {
						$_msg[] = "Set $key for id: $post_id";	
					}
				}

				$msg = array_merge($msg, $_msg);
				$msg[] = "==========================";

			}
		}

	}	
}

if (!function_exists('get_cbr_daily')) {
	// полуачаем курс по api cdr
	function get_cbr_daily() {
		$json = file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js');
		if ( $data = json_decode($json, true) ) {
			$data['_last_update'] = date('Y-m-d H:i:s');
			update_option( 'cbr_daily_json', json_encode($data) );
			return $data;
		}
		return false;
	}
}

add_action( 'update_price_cron', 'update_price_cron_func' );

if (!function_exists('update_price_cron_func')) {
	function update_price_cron_func() {
		$msg = [];
		// пробуем получить данные из кэша
		// если в кэше нету или дата в кэше старше 1 часа то получаем данные с api cdr 
		$data = false;
		$json = get_option( 'cbr_daily_json' );
		if ( $data = json_decode($json, true) ) {
			if ( strtotime($data['_last_update']) < time() - 60 * 60 ) {
				$data = get_cbr_daily();	
			}
		} else {
			$data = get_cbr_daily();
		}
		// 
		// извлекаем актуальные данные для usd
		$usd_value = 0;
		if ($data) {
			$usd_value = $data['Valute']['USD']['Value'];
		}
		if ( $usd_value ) {
			$msg[] = "Курс: ".$usd_value;
			$msg[] = "Дата cdr: ".date('Y-m-d H:i:s', strtotime($data['Date']));
			$msg[] = "Дата изения в кэше: ".$data['_last_update'];
			$msg[] = "==========================";
			// получаем все товары
			$ids = get_posts( array(
				'posts_per_page' => -1,
				'post_type'   => 'product',
				'fields' => 'ids'
			));

			foreach ($ids as $id) {

				$_regular_price = get_field( "_regular_price", $id );
				$_sale_price = get_field( "_sale_price", $id );
				$_base_price_usd = get_field( "_base_price_usd", $id );
				$_sale_price_usd = get_field( "_sale_price_usd", $id );

				if ( $_base_price_usd || $_sale_price_usd) {
					$_msg = [];
					$meta_input = [];
					if ($_base_price_usd) {
						$_new_regular_price = round($_base_price_usd * $usd_value / 100) * 100;
						if ( $_new_regular_price != $_regular_price ) {
							$meta_input['_regular_price'] = $_new_regular_price;	
						}
					}
					if ($_sale_price_usd) {
						$_new_sale_price = round($_sale_price_usd * $usd_value / 100) * 100;
						if ( $_new_sale_price != $_sale_price ) {
							$meta_input['_sale_price'] = $_new_sale_price;	
						}
					}

					if (count($meta_input) > 0 ) {
						if (!@$meta_input['_sale_price']) {
							$meta_input['_price'] = $meta_input['_regular_price'];
						} else {
							$meta_input['_price'] = $meta_input['_sale_price'];
						}

						$my_post = [
							'ID' => $id,
							'meta_input' => $meta_input
						];
						// Обновляем
						if (wp_update_post( wp_slash($my_post), true)) {
							foreach ($meta_input as $key => $value) {
								$_msg[] = "Set $key for id: $id";
							}
						}
					}

					$msg = array_merge($msg, $_msg);
					$msg[] = "==========================";
				}

			}
		}

		echo implode("<br>\n", $msg);
	}
}

add_filter('woocommerce_get_breadcrumb', function($crumbs, $breadcrumb) {
    if (is_product() || is_product_category() || is_product_tag()) {
        $current_page_title = get_the_title();
        // Здесь устанавливаем URL в null для последнего элемента
        $crumbs[] = array($current_page_title, null);
    }
    return $crumbs;
}, 10, 2);

function remove_woocommerce_tracking_script() {
	wp_dequeue_script( 'woo-tracks' );
}
add_action( 'wp_enqueue_scripts', 'remove_woocommerce_tracking_script', 20 );
add_action( 'admin_enqueue_scripts', 'remove_woocommerce_tracking_script', 20 );