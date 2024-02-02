<?php

use Wpshop\Core\AdminNotices;
use Wpshop\Core\Advertising;
use Wpshop\Core\Core;
use Wpshop\Core\Fonts;
use Wpshop\Core\Helper;
use Wpshop\Core\Shortcodes;
use Wpshop\Core\Social;
use Wpshop\Core\StarRating;
use Wpshop\Core\Template;
use Wpshop\Core\ViewsCounter;
use Wpshop\SettingApi\SettingsManager;
use Wpshop\TheTheme\DefaultHooks;
use Wpshop\TheTheme\Features\CategoriesTile;
use Wpshop\TheTheme\Features\CompareProducts;
use Wpshop\TheTheme\Features\FloatingCart;
use Wpshop\TheTheme\Features\I18n;
use Wpshop\TheTheme\Features\MinOrderAmount;
use Wpshop\TheTheme\Features\OneClickBuy;
use Wpshop\TheTheme\Features\ProductBadges;
use Wpshop\TheTheme\Features\ProductMicroData;
use Wpshop\TheTheme\Features\HomeConstructor;
use Wpshop\TheTheme\Features\ProductSecondImage;
use Wpshop\TheTheme\Features\SaleFlash;
use Wpshop\TheTheme\Features\Search;
use Wpshop\TheTheme\Features\Seo;
use Wpshop\TheTheme\Features\ShopGrid;
use Wpshop\TheTheme\Features\SuperHeader;
use Wpshop\TheTheme\Features\TagsTile;
use Wpshop\TheTheme\MetaBox\HomepageConstructElements;
use Wpshop\TheTheme\MetaBox\ProductHideElements;
use Wpshop\TheTheme\PluginsIntegration;
use Wpshop\TheTheme\Setup\DataSetup;
use Wpshop\TheTheme\Support\CatalogModeSupport;
use Wpshop\TheTheme\Support\GoogleCaptchaSupport;
use Wpshop\TheTheme\Support\MaxMegaMenuSupport;
use Wpshop\TheTheme\Support\ProductGallerySupport;
use Wpshop\TheTheme\Support\ProductVariationSwatchesSupport;
use Wpshop\TheTheme\Support\YoastSupport;
use Wpshop\TheTheme\ThemeProvider;
use Wpshop\TheTheme\Features\AjaxAddToCart;
use Wpshop\TheTheme\Features\Favorite;
use Wpshop\TheTheme\Features\ImageManagement;
use Wpshop\TheTheme\Features\QuickView;
use Wpshop\TheTheme\MetaBox\PageHideElements;
use Wpshop\TheTheme\MetaBox\PostHideElements;
use Wpshop\TheTheme\MetaBox\PostSettings;
use Wpshop\TheTheme\MetaBox\PostThumbnails;
use Wpshop\TheTheme\Settings\ResetSettingsAction;
use Wpshop\TheTheme\Setup\CustomizerSetup;
use Wpshop\TheTheme\Setup\ThemeSetup;
use Wpshop\TheTheme\Setup\WoocommerceSetup;
use Wpshop\TheTheme\TinyMce;
use Wpshop\TheTheme\WoocommerceBlocks;

if ( ! defined( 'WPINC' ) ) {
    die;
}

do_action( THEME_SLUG . '_init_before' );

theme_container()->get( Core::class )->minimum_php_version( '5.6' );

//add_action( 'after_setup_theme', function () {
load_theme_textdomain( THEME_TEXTDOMAIN, get_template_directory() . '/languages' );
//} );

theme_container()->get( SettingsManager::class )->init();
theme_container()->get( ThemeProvider::class )->init();
theme_container()->get( ThemeSetup::class )->init();
theme_container()->get( WoocommerceSetup::class )->init();
theme_container()->get( AdminNotices::class )->init( true );
theme_container()->get( DataSetup::class )->init();
theme_container()->get( CustomizerSetup::class )->init(
    [ theme_container()->get( SaleFlash::class ), 'init' ],
    [ theme_container()->get( ProductBadges::class ), 'init' ],
    [ theme_container()->get( FloatingCart::class ), 'init' ]
);
theme_container()->get( TinyMce::class )->init();

theme_container()->get( Template::class )->init( apply_filters( 'bono_init_template_args', [
    'remove_hentry',
    'remove_h_tag_from_navigation',
    'remove_label_archive_title',
    'microformat_image',
    'remove_style_tag',
    'remove_script_tag',
] ) );
if ( ! theme_container()->get( MaxMegaMenuSupport::class )->enabled() ) {
    theme_container()->get( Template::class )->init( [ 'remove_current_links_from_menu' ] );
}
theme_container()->get( Template::class )->body_class_customizer();

theme_container()->get( Shortcodes::class )->init_shortcode( 'spoiler' );
theme_container()->get( Shortcodes::class )->init_shortcode( 'mask_link' );
theme_container()->get( Shortcodes::class )->init_shortcode( 'button' );

// @todo refactor Shortcodes class to prevent use globals
$wpshop_social = theme_container()->get( Social::class );
$wpshop_core   = theme_container()->get( Core::class );
$wpshop_helper = theme_container()->get( Helper::class );
theme_container()->get( Shortcodes::class )->init_shortcode( 'social_profiles' );
theme_container()->get( Advertising::class )->init();

theme_container()->get( CategoriesTile::class )->init();
theme_container()->get( CompareProducts::class )->init();
theme_container()->get( Favorite::class )->init();
theme_container()->get( ImageManagement::class )->init();
theme_container()->get( I18n::class )->init();
theme_container()->get( OneClickBuy::class )->init();
theme_container()->get( MinOrderAmount::class )->init();
theme_container()->get( ProductSecondImage::class )->init();
theme_container()->get( ProductMicroData::class )->init();
theme_container()->get( QuickView::class )->init();
theme_container()->get( ViewsCounter::class )->init();
theme_container()->get( AjaxAddToCart::class )->init();
theme_container()->get( ResetSettingsAction::class )->init();
theme_container()->get( Search::class )->init();
theme_container()->get( Seo::class )->init();
theme_container()->get( ShopGrid::class )->init();
theme_container()->get( TagsTile::class )->init();
theme_container()->get( SuperHeader::class )->init();

theme_container()->get( HomepageConstructElements::class );
theme_container()->get( PageHideElements::class );
theme_container()->get( PostHideElements::class );
//theme_container()->get( PostSettings::class );
theme_container()->get( PostThumbnails::class );
theme_container()->get( ProductHideElements::class );
theme_container()->get( PluginsIntegration::class )->init();
theme_container()->get( HomeConstructor::class )->init();

theme_container()->get( CatalogModeSupport::class )->init();
theme_container()->get( GoogleCaptchaSupport::class )->init();
theme_container()->get( MaxMegaMenuSupport::class )->init();
theme_container()->get( ProductGallerySupport::class )->init();
theme_container()->get( ProductVariationSwatchesSupport::class )->init();
theme_container()->get( YoastSupport::class )->init();
theme_container()->get( WoocommerceBlocks::class )->init();
theme_container()->get( DefaultHooks::class )->init();

theme_container()->get( Fonts::class )->preloading_fonts( get_template_directory_uri() . '/assets/fonts/wpshop-core.ttf' );

if ( defined( 'DOING_AJAX' ) ) {
    theme_container()->get( StarRating::class )->ajax_actions();
}

do_action( THEME_SLUG . '_init_after' );
