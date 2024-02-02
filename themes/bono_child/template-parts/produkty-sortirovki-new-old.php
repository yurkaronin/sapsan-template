<?php
/**
 * Template name: Все продукты сортировки
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bono
 */
use Wpshop\Core\Core;
use Wpshop\TheTheme\Features\Favorite;
use Wpshop\TheTheme\HomeConstructor;
$core             = theme_container()->get( Core::class );
$favorite         = theme_container()->get( Favorite::class );
get_header('custom'); ?>
<main class="main  inner-page inner-page--products">
    <section class="first-screen">
        <div class="wrapper">
            <!-- блок  -->
            <ul class="first-screen__breadcrumbs breadcrumbs">
                <li class="breadcrumbs__item"><a class="breadcrumbs__link breadcrumbs__link--black" href="/">Главная</a>
                </li>
                <li class="breadcrumbs__item"><a class="breadcrumbs__link breadcrumbs__link--black" href="">Продукты
                        сортировки</a></li>
            </ul>
            <h1 class="first-screen__title title">Продукты сортировки</h1>
        </div>
    </section>

    <section class="catalog-capabilities">
        <div class="wrapper">

            <div class="catalog-capabilities__tabs tabs">

                <ul class="tabs__list tabs-list">
                    <li class="tabs-list__item">
                        <a class="tabs__link" href="#tab-1">
                            <div class="tabs__icon-wrapper">
                                <div class="tabs-icon tabs-icon--one"></div>
                            </div>
                            <span>Сельское хозяйство</span>
                        </a>
                    </li>
                    <li class="tabs-list__item">
                        <a class="tabs__link" href="#tab-2">
                            <div class="tabs__icon-wrapper">
                                <div class="tabs-icon tabs-icon--two"></div>
                            </div>
                            <span>Пищевая промышленность</span>
                        </a>
                    </li>
                    <li class="tabs-list__item">
                        <a class="tabs__link" href="#tab-3">
                            <div class="tabs__icon-wrapper">
                                <div class="tabs-icon tabs-icon--three"></div>
                            </div>
                            <span>Непищевое сырьё</span>
                        </a>
                    </li>

                </ul>

                <ul class="tabs__content">

                    <li class="tabs__item product-group" id="tab-1">
                        <h3 class="product-group__title title">Сельское хозяйство</h3>

                        <div class="product-group__wrapper">
                            <h4 class="product-group__subtitle title">Мелкосемянные и масличные культуры</h4>
                            <ul class="tabs__sub-list">
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/amarant/"><span
                                            class="product-promo__title">Амарант</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/2/1.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/gorchitsa/"><span
                                            class="product-promo__title">Горчица</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/2/4.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/selskoe-hozyaystvo/maslichnye-kultury-semena-i-melkosemyannye/konoplya/"><span
                                            class="product-promo__title">Конопля</span> <img
                                            class="product-promo__image"
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
                                            class="product-promo__title">Тимофеевка</span> <img
                                            class="product-promo__image"
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
                                            class="product-promo__title">Семена овощных культур</span> <img
                                            class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/semena-ovoschnyh-kultur.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/selskoe-hozyaystvo/maslichnye-kultury-semena-i-melkosemyannye/semena-tykvy/"><span
                                            class="product-promo__title">Семена тыквы</span> <img
                                            class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/semena-tykvy.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/selskoe-hozyaystvo/maslichnye-kultury-semena-i-melkosemyannye/semena-podsolnechnika/"><span
                                            class="product-promo__title">Семена подсолнечника</span> <img
                                            class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/semena-podsolnechnika.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/selskoe-hozyaystvo/maslichnye-kultury-semena-i-melkosemyannye/semena-risa/"><span
                                            class="product-promo__title">Семена риса</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/5.jpg"></a>
                                </li>

                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/selskoe-hozyaystvo/maslichnye-kultury-semena-i-melkosemyannye/lyutserna/"><span
                                            class="product-promo__title">Люцерна </span> <img
                                            class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/lyutserna-1.jpg"></a>
                                </li>



                            </ul>
                        </div>

                        <div class="product-group__wrapper">
                            <h4 class="product-group__subtitle title">Зерновые культуры</h4>
                            <ul class="tabs__sub-list">
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernovye-kultury/pshenitsa/"><span
                                            class="product-promo__title">Пшеница</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/1.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernovye-kultury/yachmen/"><span
                                            class="product-promo__title">Ячмень</span> <img class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/3.jpg"></a>
                                </li>

                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/selskoe-hozyaystvo/zernovye-kultury/proso/"><span
                                            class="product-promo__title">Просо</span> <img class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/proso-1.jpg"></a></li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernovye-kultury/kukuruza/"><span
                                            class="product-promo__title">Кукуруза</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/4.jpg"></a>
                                </li>

                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernovye-kultury/ovyos/"><span
                                            class="product-promo__title">Овес</span> <img class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/2.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernovye-kultury/ris/"><span
                                            class="product-promo__title">Семена риса</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/5.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernovye-kultury/rozh/"><span
                                            class="product-promo__title">Рожь</span> <img class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/8.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernovye-kultury/polba/"><span
                                            class="product-promo__title">Полба</span> <img class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/7.jpg"></a>
                                </li>

                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernovye-kultury/tritikale/"><span
                                            class="product-promo__title">Тритикале</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/6.jpg"></a>
                                </li>

                            </ul>
                        </div>



                        <div class="product-group__wrapper">
                            <h4 class="product-group__subtitle title">Зернобобовые культуры</h4>
                            <ul class="tabs__sub-list">
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/fasol/"><span
                                            class="product-promo__title">Фасоль</span> <img class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/3/1.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/chechevitsa/"><span
                                            class="product-promo__title">Чечевица</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/3/2.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/goroh/"><span
                                            class="product-promo__title">Горох</span> <img class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/3/3.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/soya/"><span
                                            class="product-promo__title">Соя</span> <img class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/3/4.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/vika/"><span
                                            class="product-promo__title">Вика</span> <img class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/3/5.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/lyupin/"><span
                                            class="product-promo__title">Люпин</span> <img class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/3/6.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/nut/"><span
                                            class="product-promo__title">Нут</span> <img class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/3/7.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/mash/"><span
                                            class="product-promo__title">Маш</span> <img class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/3/8.jpg"></a>
                                </li>
                            </ul>
                        </div>

                        <div class="product-group__wrapper">
                            <h4 class="product-group__subtitle title">Крупы</h4>
                            <ul class="tabs__sub-list">
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/grechnevaya/"><span
                                            class="product-promo__title">Гречневая</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/4/1.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/perlovaya/"><span
                                            class="product-promo__title">Перловая</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/4/2.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/yachmennaya/"><span
                                            class="product-promo__title">Ячменная</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/4/3.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/pshenichnaya/"><span
                                            class="product-promo__title">Пшеничная</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/4/4.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/pshyonnaya/"><span
                                            class="product-promo__title">Пшенная</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/4/5.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/risovaya/"><span
                                            class="product-promo__title">Рисовая</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/4/6.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/kukuruznaya/"><span
                                            class="product-promo__title">Кукурузная</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/4/7.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/ovsyanaya/"><span
                                            class="product-promo__title">Овсяная</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/4/8.jpg"></a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="tabs__item" id="tab-2">
                        <h3 class="product-group__title title">Пищевая промышленность</h3>
                        <div class="product-group__wrapper">
                            <h4 class="product-group__subtitle title">Орехи и сухофрукты</h4>
                            <ul class="tabs__sub-list">
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi/mindal/"><span
                                            class="product-promo__title">Миндаль</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/1/2.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi/funduk/"><span
                                            class="product-promo__title">Фундук</span> <img class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/1/1.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi/arahis/"><span
                                            class="product-promo__title">Арахис</span> <img class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/1/4.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi/fistashka/"><span
                                            class="product-promo__title">Фисташка</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/1/3.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi/gretskiy-oreh/"><span
                                            class="product-promo__title">Грецкий орех</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/1/6.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi/keshyu/"><span
                                            class="product-promo__title">Кешью</span> <img class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/1/5.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi/kedrovyy-oreh/"><span
                                            class="product-promo__title">Кедровый орех</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/1/8.jpg"></a>
                                </li>

                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushenye-ovoschi-i-frukty/kuraga/"><span
                                            class="product-promo__title">Курага</span> <img class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/3/2.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushenye-ovoschi-i-frukty/chernosliv/"><span
                                            class="product-promo__title">Чернослив</span> <img
                                            class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/3/3.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushenye-ovoschi-i-frukty/izyum/"><span
                                            class="product-promo__title">Изюм</span> <img class="product-promo__image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/3/4.jpg"></a>
                                </li>

                            </ul>
                        </div>
                        <div class="product-group__wrapper">
                            <h4 class="product-group__subtitle title">Прочие продукты</h4>
                            <ul class="tabs__sub-list">
                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/pischevaya-promyshlennost/lekarstvennye-rasteniya/"><span
                                            class="product-promo__title">Лекарственные растения</span> <img
                                            class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/lekarstvennye-rasteniya.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/pischevaya-promyshlennost/zamorozhennye-ovoschi/"><span
                                            class="product-promo__title">Замороженные овощи</span> <img
                                            class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/zamorozhennye-ovoschi.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/pischevaya-promyshlennost/sushennye-ovoschi-i-frukty/"><span
                                            class="product-promo__title">Сушенные овощи и фрукты</span> <img
                                            class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/sushennye-ovoschi-i-frukty.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/pischevaya-promyshlennost/sneki/"><span
                                            class="product-promo__title">Снэки</span> <img class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/sneki.jpg"></a></li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/pischevaya-promyshlennost/yagody/"><span
                                            class="product-promo__title">Ягоды</span> <img class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/yagody.jpg"></a></li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/pischevaya-promyshlennost/spetsii/"><span
                                            class="product-promo__title">Специи</span> <img class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/spetsii.jpg"></a></li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/pischevaya-promyshlennost/chay/"><span
                                            class="product-promo__title">Чай</span> <img class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/chay.jpg"></a></li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/pischevaya-promyshlennost/griby/"><span
                                            class="product-promo__title">Грибы</span> <img class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/griby.jpg"></a></li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/pischevaya-promyshlennost/tabak/"><span
                                            class="product-promo__title">Табак</span> <img class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/tabak.jpg"></a></li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/pischevaya-promyshlennost/kofe/"><span
                                            class="product-promo__title">Кофе</span> <img class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/kofe.jpg"></a></li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/pischevaya-promyshlennost/solod/"><span
                                            class="product-promo__title">Солод</span> <img class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/solod.jpg"></a></li>
                                <li class="product-promo"><a class="product-promo__link"
                                        href="https://fsapsan.ru/sorting_products/pischevaya-promyshlennost/hmel/"><span
                                            class="product-promo__title">Хмель</span> <img class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/hmel.jpg"></a></li>

                            </ul>
                        </div>
                    </li>

                    <li class="tabs__item" id="tab-3">
                        <h3 class="product-group__title title">Непищевое сырьё</h3>
                        <div class="product-group__wrapper">
                            <!-- <h4 class="product-group__subtitle title">Пластик</h4> -->
                            <ul class="tabs__sub-list">
                                <li class="product-promo"><a class="product-promo__link" href="https://fsapsan.ru/sorting_products/nepischevoe-syryo/plastik-granuly-hlopya/"><span
                                            class="product-promo__title">Пластик - гранулы, хлопья</span> <img class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/plastik-granuly-hlopya-1.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link" href="https://fsapsan.ru/sorting_products/nepischevoe-syryo/stekloboy/"><span
                                            class="product-promo__title">Стеклобой</span> <img class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/stekloboy-1.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link" href="https://fsapsan.ru/sorting_products/nepischevoe-syryo/ruda-i-mineraly/"><span
                                            class="product-promo__title">Руда и минералы</span> <img class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/ruda-i-mineraly-1.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link" href="https://fsapsan.ru/sorting_products/nepischevoe-syryo/metally-fraktsii/"><span
                                            class="product-promo__title">Металлические фракции</span> <img class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/metallicheskie-fraktsii-1.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link" href="https://fsapsan.ru/sorting_products/nepischevoe-syryo/dragotsennye-kamni/"><span
                                            class="product-promo__title">Драгоценные камни</span> <img class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/dragotsennye-kamni-1.jpg"></a>
                                </li>
                                <li class="product-promo"><a class="product-promo__link" href="https://fsapsan.ru/sorting_products/nepischevoe-syryo/farmatsevticheskioe-syryo/"><span
                                            class="product-promo__title">Фармацевтическое сырьё</span> <img class="product-promo__image"
                                            src="https://fsapsan.ru/wp-content/uploads/farmatsevticheskioe-syryo-1.jpg"></a>
                                </li>

                            </ul>
                        </div>

                    </li>

                </ul>
            </div>
        </div>
    </section>

    <section class="consultant">
        <div class="wrapper">
            <h2 class="visually-hidden">Бесплатная консультация инженера</h2>
            <div class="consultant__wrapper">
                <div class="consultant__image-wrapper">
                    <!-- изображение -->
                    <img class="consultant__picture" src="<?php the_field('plumber_photography');?>"
                        alt="Фото сантехника">

                    <!-- заголовок -->
                    <strong class="consultant__title"><?php the_field('plumber_title');?></strong>
                </div>
                <!-- текстовый блок -->
                <div class="consultant__text-wrapper">
                    <div class="consultant__text"><?php the_field('plumber_text');?></div>
                    <!-- ссылка -->
                    <a href="#" class="consultant__button button  b24-web-form-popup-btn-10">консультация инженера</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer('custom');