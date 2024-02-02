<?php
/**
 * Template name: Главная страница
 * The template for displaying home-page
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
<style>
.site-footer-container {
  position: relative !important;
}
</style>
<main class="main">

  <!-- новый первый экран  -->
  <section class="sapsan-first-screen">
    <div class="wrapper">
      <h1 class="sapsan-first-screen__title"><?php the_field('home-title');?></h1>

      <div class="sapsan-first-screen__slider  swiper-container-2">
        <div class="swiper-wrapper">

          <div class="swiper-slide  swiper-slide-one">
            <picture>
              <source media="(min-width: 1981px)"
                srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/1-x2.png">
              <img class="swiper-slide__item-pic"
                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/1-min.png" alt="">
            </picture>
            <img class="swiper-slide__bg-pic"
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/bg-1.png" alt="">
          </div>

          <div class="swiper-slide  swiper-slide-two">
            <picture>
              <source media="(min-width: 1981px)"
                srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/2-x2.png">
              <img class="swiper-slide__item-pic"
                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/2-min.png" alt="">
            </picture>
            <img class="swiper-slide__bg-pic"
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/bg-2.png" alt="">
          </div>

          <div class="swiper-slide  swiper-slide-three">
            <picture>
              <source media="(min-width: 1981px)"
                srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/3-x2.png">
              <img class="swiper-slide__item-pic"
                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/3-min.png" alt="">
            </picture>
            <img class="swiper-slide__bg-pic"
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/bg-3.png" alt="">
          </div>

          <div class="swiper-slide  swiper-slide-five">
            <picture>
              <source media="(min-width: 1981px)"
                srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/5-x2.png">
              <img class="swiper-slide__item-pic"
                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/5-min.png" alt="">
            </picture>
            <img class="swiper-slide__bg-pic"
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/bg-2.png" alt="">
          </div>

          <div class="swiper-slide  swiper-slide-six">
            <picture>
              <source media="(min-width: 1981px)"
                srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/6-x2.png">
              <img class="swiper-slide__item-pic"
                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/6-min.png" alt="">
            </picture>
            <img class="swiper-slide__bg-pic"
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/bg-3.png" alt="">
          </div>

          <div class="swiper-slide  swiper-slide-four">
            <picture>
              <source media="(min-width: 1981px)"
                srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/4-x2.png">
              <img class="swiper-slide__item-pic"
                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/4-min.png" alt="">
            </picture>
            <img class="swiper-slide__bg-pic"
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-slider/bg-1.png" alt="">
          </div>

        </div>

        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>

        <div class="sapsan-first-screen__decorate">

          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bg/first-screen-object-tablet.jpg"
            alt="" class="sxj-circle">
        </div>

      </div>
  </section>

  <!-- Анонсы каталога в слайдере  -->
  <section class="catalog-promo">
    <div class="wrapper">

      <h2 class="visually-hidden">Каталог спецоборудования</h2>
      <div class="catalog-promo__slider swiper-container-1">

        <div class="swiper-wrapper">

          <!-- первый слайд -->
          <div class="catalog-promo__lead swiper-slide"
            style="background-image: url(<?php the_field('slider-catalog_bg_1'); ?>);">

            <div class="catalog-promo__wrapper">
              <!-- Подзаголовок -->
              <span class="catalog-promo__subtitle"><?php the_field('slider-catalog__subtitle-1'); ?></span>
              <!-- Заголовок -->
              <h3 class="title catalog-promo__title"><?php the_field('slider-catalog__title-1'); ?></h3>
              <!-- Текстовое описание -->
              <div class="catalog-promo__text"><?php the_field('slider-catalog__text-1'); ?></div>
              <a class="catalog-promo__button button" href="<?php the_field('slider-catalog__link-1'); ?>">Посмотреть
                каталог</a>
            </div>
            <div class="catalog-promo__picture"><img loading="lazy" src="<?php the_field('slider-catalog__image-1'); ?>"
                alt="фотография оборудования">
            </div>
          </div>

          <!-- 2 слайд -->
          <div class="catalog-promo__lead swiper-slide"
            style="background-image: url(<?php the_field('slider-catalog_bg_2'); ?>);">

            <div class="catalog-promo__wrapper">
              <!-- Подзаголовок -->
              <span class="catalog-promo__subtitle"><?php the_field('slider-catalog__subtitle-2'); ?></span>
              <!-- Заголовок -->
              <h3 class="title catalog-promo__title"><?php the_field('slider-catalog__title-2'); ?></h3>
              <!-- Текстовое описание -->
              <div class="catalog-promo__text"><?php the_field('slider-catalog__text-2'); ?></div>
              <a class="catalog-promo__button button" href="<?php the_field('slider-catalog__link-2'); ?>">Посмотреть
                каталог</a>
            </div>
            <div class="catalog-promo__picture"><img loading="lazy" src="<?php the_field('slider-catalog__image-2'); ?>"
                alt="фотография оборудования">
            </div>
          </div>

          <!-- 3 слайд -->
          <div class="catalog-promo__lead swiper-slide"
            style="background-image: url(<?php the_field('slider-catalog_bg_3'); ?>);">

            <div class="catalog-promo__wrapper">
              <!-- Подзаголовок -->
              <span class="catalog-promo__subtitle"><?php the_field('slider-catalog__subtitle-3'); ?></span>
              <!-- Заголовок -->
              <h3 class="title catalog-promo__title"><?php the_field('slider-catalog__title-3'); ?></h3>
              <!-- Текстовое описание -->
              <div class="catalog-promo__text"><?php the_field('slider-catalog__text-3'); ?></div>
              <a class="catalog-promo__button button" href="<?php the_field('slider-catalog__link-3'); ?>">Посмотреть
                каталог</a>
            </div>
            <div class="catalog-promo__picture"><img loading="lazy" src="<?php the_field('slider-catalog__image-3'); ?>"
                alt="фотография оборудования">
            </div>
          </div>

          <!-- 4 слайд -->
          <div class="catalog-promo__lead swiper-slide"
            style="background-image: url(<?php the_field('slider-catalog_bg_4'); ?>);">

            <div class="catalog-promo__wrapper">
              <!-- Подзаголовок -->
              <span class="catalog-promo__subtitle"><?php the_field('slider-catalog__subtitle-4'); ?></span>
              <!-- Заголовок -->
              <h3 class="title catalog-promo__title"><?php the_field('slider-catalog__title-4'); ?></h3>
              <!-- Текстовое описание -->
              <div class="catalog-promo__text"><?php the_field('slider-catalog__text-4'); ?></div>
              <a class="catalog-promo__button button" href="<?php the_field('slider-catalog__link-4'); ?>">Посмотреть
                каталог</a>
            </div>
            <div class="catalog-promo__picture"><img loading="lazy" src="<?php the_field('slider-catalog__image-4'); ?>"
                alt="фотография оборудования">
            </div>
          </div>

          <!-- 5 слайд -->
          <div class="catalog-promo__lead swiper-slide"
            style="background-image: url(<?php the_field('slider-catalog_bg_5'); ?>);">

            <div class="catalog-promo__wrapper">
              <!-- Подзаголовок -->
              <span class="catalog-promo__subtitle"><?php the_field('slider-catalog__subtitle-5'); ?></span>
              <!-- Заголовок -->
              <h3 class="title catalog-promo__title"><?php the_field('slider-catalog__title-5'); ?></h3>
              <!-- Текстовое описание -->
              <div class="catalog-promo__text"><?php the_field('slider-catalog__text-5'); ?></div>
              <a class="catalog-promo__button button" href="<?php the_field('slider-catalog__link-5'); ?>">Подробнее</a>
            </div>
            <div class="catalog-promo__picture"><img loading="lazy" src="<?php the_field('slider-catalog__image-5'); ?>"
                alt="фотография оборудования">
            </div>
          </div>


        </div>

        <div class="catalog-promo__pagination swiper-pagination-1"></div>
      </div>

    </div>
  </section>

  <section class="recommended-items">
    <div class="wrapper">
      <h2 class="title recommended-items__title">Производим лучшие фотосепараторы Сапсан в России</h2>
      <p class="subtitle">
      Мы первые №1 официальные дистрибьюторы фотосепараторов Meyer на территории Российской Федерации. Наше производство зерноочистительной техники и оборудования для транспортировки любых сыпучих продуктов позволяет выстраивать полноценные сортировочные линии.
      </p>
      <!-- тут будем выводить рекомендуемые товары -->
      <?php echo do_shortcode('[products class="recommended-items__list" ids="258,256,260,4394,262,281,3303,3190"]'); ?>

      <div class="recommended-items__footer">
      <p class="subtitle">Оставьте заявку прямо сейчас и получите решение задач вашего производства от профессиональных инженеров и менеджеров компании «Смарт Грэйд».</p>
      <div class="recommended-items__buttons">
        <a class="button" data-custom-open="modal-callback">Получить консультацию</a>
        <a href="https://fsapsan.ru/catalog/" class="button button--transparent">Перейти в каталог</a>
      </div>
      </div>

      
    </div>
  </section>

  <section class="product-tabs">
    <div class="wrapper">
      <h2 class="product-tabs__title title">Сортируемые продукты</h2>
      <div class="tabs">
        <ul class="tabs__list tabs-list">
          <li class="tabs-list__item"><a class="tabs__link" href="#tab-1">
              <div class="tabs__icon-wrapper"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="80"
                  class="tabs__icon">
                  <path
                    d="M49.03 15.44c0 1.8-.9 3.48-2.4 4.48l-1.7 1.13c.31-1.1.51-2.3.51-3.57 0-4.5-2.52-8.23-3.59-9.6V1.83h-3.58v6.05c-1.06 1.37-3.59 5.1-3.59 9.6 0 1.26.2 2.46.5 3.57l-1.69-1.13c-1.5-1-2.4-2.68-2.4-4.48v-2.86h-3.58v45.9c0 3 1.5 5.8 4 7.46l6.72 4.48-.01 6.79h3.58l.01-6.73 6.81-4.54c2.5-1.66 4-4.45 4-7.46v-45.9h-3.6v2.86zm-10.76 2.04c0-2.3.94-4.41 1.8-5.85.84 1.44 1.78 3.55 1.78 5.85s-.94 4.42-1.79 5.86a11.88 11.88 0 01-1.8-5.86zm-7.18 5.13c.3.22-.2-.11 7.18 4.8v6.45l-4.78-3.18c-1.5-1-2.4-2.68-2.4-4.48V22.6zm0 10.76c.3.22-.22-.13 7.17 4.8v6.44l-4.77-3.18c-1.5-1-2.4-2.67-2.4-4.47v-3.59zm7.15 22l-4.75-3.18c-1.5-1-2.4-2.67-2.4-4.47v-3.59c.3.22-.2-.11 7.16 4.79v6.44zm-4.75 7.58c-1.5-1-2.4-2.67-2.4-4.47v-3.59c.3.22-.19-.11 7.15 4.78v6.44l-4.75-3.16zm15.54-4.47c0 1.8-.9 3.47-2.4 4.47l-4.81 3.21v-6.45c7.44-4.96 6.91-4.6 7.2-4.82v3.59zm0-10.76c0 1.8-.9 3.47-2.4 4.47l-4.8 3.2v-6.45c7.44-4.95 6.9-4.59 7.2-4.81v3.59zm0-10.76c0 1.8-.9 3.47-2.4 4.47l-4.8 3.2.01-6.45c7.42-4.95 6.9-4.59 7.19-4.8v3.58zm0-10.76c0 1.8-.9 3.47-2.4 4.47l-4.78 3.2V27.4c7.4-4.93 6.88-4.58 7.18-4.8v3.59z" />
                </svg></div>Сельское хозяйство
            </a></li>
          <li class="tabs-list__item"><a class="tabs__link" href="#tab-2">
              <div class="tabs__icon-wrapper"><svg xmlns="http://www.w3.org/2000/svg" width="62" height="60"
                  class="tabs__icon">
                  <path
                    d="M61.66 31.08A20.8 20.8 0 0040.88 10.3h-34a2.89 2.89 0 010-5.76H34.5V.94H6.9a6.48 6.48 0 00-1.66 12.74c.03.71.09 1.41.17 2.1H.4v3.59h5.62c.34 1.34.77 2.6 1.3 3.78a18.2 18.2 0 005.05 6.62 18.97 18.97 0 009.87 4.12h18.63a7.2 7.2 0 012.64 13.88 8.09 8.09 0 00-7.96-6.73h-8.73v2.74c0 2.54 1.17 4.8 3 6.28a8.06 8.06 0 00-3 6.29v2.74h8.73c4.16 0 7.6-3.17 8.03-7.23h.04v-.18a20.8 20.8 0 0018.03-20.6zM30.5 44.63h5.06a4.5 4.5 0 014.4 3.64H34.9a4.5 4.5 0 01-4.4-3.64zm5.06 10.87H30.5a4.5 4.5 0 014.4-3.64h5.06a4.5 4.5 0 01-4.4 3.64zm3.32-25.2H28.23a17.86 17.86 0 00.33-16.4h10.66a14.6 14.6 0 011.97 4.46c1.02 4 .24 8.01-2.31 11.95zm-16.73-.03c-.97-.12-4.4-.73-7.5-3.27-3.53-2.9-5.49-7.3-5.81-13.1h15.58c.56.83 1.5 2.45 2.02 4.6.95 3.96.16 7.92-2.36 11.8h-1.65c-.05 0-.14 0-.28-.03zm20.77.23a17.9 17.9 0 00.52-16.42 17.2 17.2 0 0111.07 6.53c.08.77.17 2.6-.38 4.67-.9 3.35-3.06 5.85-6.42 7.47-1.36-1.12-3-1.9-4.79-2.25zm7.99 14.53a10.72 10.72 0 00-.79-9.49 14.8 14.8 0 007.36-8.93 17.14 17.14 0 01-6.57 18.42z" />
                  <path d="M18.71 16.3h3.6v3.6h-3.6v-3.6z" />
                </svg></div>Пищевая промышленность
            </a></li>
          <li class="tabs-list__item"><a class="tabs__link" href="#tab-3">
              <div class="tabs__icon-wrapper"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="62"
                  class="tabs__icon">
                  <path
                    d="M21.02 7.94V.18H9.06v7.76A14.38 14.38 0 00.68 21v34.37c0 1.62.67 3.21 1.83 4.35a5.87 5.87 0 004.27 1.71c1.57-.03 3-.68 4.06-1.72a5.96 5.96 0 008.39 0 5.9 5.9 0 008.33 0 6.14 6.14 0 001.83-4.34V21c0-5.64-3.32-10.73-8.37-13.05zm-3.6-4.17v3.59h-4.78v-3.6h4.79zm-6.25 7.17h7.73c4.14 1.6 6.9 5.6 6.9 10.05v.72H4.27V21c0-4.45 2.76-8.45 6.9-10.05zm-6.9 25.13v-3.6H25.8v3.6H4.27zm21.53 3.58v3.6H4.27v-3.6H25.8zM4.27 28.9v-3.6H25.8v3.6H4.27zm20.78 28.26c-.46.44-1.04.69-1.64.69h-.05a2.4 2.4 0 01-2.34-2.4h-3.6a2.4 2.4 0 01-4.78 0H9.06a2.4 2.4 0 01-2.35 2.4h-.04c-.61 0-1.2-.25-1.64-.69a2.53 2.53 0 01-.76-1.79v-8.53H25.8v8.53c0 .67-.27 1.32-.75 1.8z" />
                </svg></div>Переработка вторсырья
            </a></li>
          <li class="tabs-list__item"><a class="tabs__link" href="#tab-4">
              <div class="tabs__icon-wrapper"><svg xmlns="http://www.w3.org/2000/svg" width="56" height="62"
                  class="tabs__icon">
                  <path
                    d="M55 7.93c-1.38-1.03-4.37-3-8.9-4.71A51.18 51.18 0 0028.04.1 51.18 51.18 0 009.98 3.22a36.74 36.74 0 00-8.91 4.7l-.73.55v3.47l1.98-.2c2.14-.23 9.55-.94 19.21-1.18v10.2h1.5v40.58h10V20.77h1.51V10.56c9.66.24 17.07.95 19.2 1.17l1.99.21V8.47L55 7.93zM29.46 57.75h-2.83V20.77h2.83v36.98zm3.33-50.82l-1.83-.03v10.28h-5.83V6.9l-1.83.03c-5.67.1-10.62.37-14.44.64 4.27-1.93 10.7-3.89 19.19-3.89 8.48 0 14.9 1.96 19.18 3.9-3.82-.28-8.77-.54-14.44-.65z" />
                </svg></div>Горнорудная промышленность
            </a></li>
        </ul>
        <ul class="tabs__content">
          <li class="tabs__item" id="tab-1">
            <ul class="tabs__sub-list">
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernovye-kultury/">
                  <h3 class="product-promo__title">Зерновые<br>культуры</h3><img loading="lazy"
                    class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/1/1.jpg"
                    alt="фото продукта">
                </a></li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/">
                  <h3 class="product-promo__title">Мелкосемянные и масличные культуры</h3><img loading="lazy"
                    class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/1/2.jpg"
                    alt="фото продукта">
                </a></li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/">
                  <h3 class="product-promo__title">Зернобобовые культуры</h3><img class="product-promo__image"
                    loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/1/3.jpg"
                    alt="фото продукта">
                </a></li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/">
                  <h3 class="product-promo__title">Крупы</h3><img class="product-promo__image" loading="lazy"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/1/4.jpg"
                    alt="фото продукта">
                </a></li>
            </ul>
          </li>
          <li class="tabs__item" id="tab-2">
            <ul class="tabs__sub-list">
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi/">
                  <h3 class="product-promo__title">Орехи</h3><img class="product-promo__image" loading="lazy"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/2/1.jpg"
                    alt="фото продукта">
                </a></li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/zamorozhennye-produkty/">
                  <h3 class="product-promo__title">Замороженные продукты</h3><img class="product-promo__image"
                    loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/2/2.jpg"
                    alt="фото продукта">
                </a></li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushenye-ovoschi-i-frukty/">
                  <h3 class="product-promo__title">Сушеные овощи и фрукты</h3><img class="product-promo__image"
                    loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/2/3.jpg"
                    alt="фото продукта">
                </a></li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/moreprodukty/">
                  <h3 class="product-promo__title">Морепродукты</h3><img class="product-promo__image" loading="lazy"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/2/4.jpg"
                    alt="фото продукта">
                </a></li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/konservy-i-polufabrikaty/">
                  <h3 class="product-promo__title">Консервы и полуфабрикаты</h3><img class="product-promo__image"
                    loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/2/5.jpg"
                    alt="фото продукта">
                </a></li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/kofe-chay/">
                  <h3 class="product-promo__title">Кофе, Чай</h3><img class="product-promo__image" loading="lazy"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/2/6.jpg"
                    alt="фото продукта">
                </a></li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/spetsii/">
                  <h3 class="product-promo__title">Специи</h3><img class="product-promo__image" loading="lazy"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/2/7.jpg"
                    alt="фото продукта">
                </a></li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sneki/">
                  <h3 class="product-promo__title">Снэки</h3><img class="product-promo__image" loading="lazy"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/2/8.jpg"
                    alt="фото продукта">
                </a></li>
            </ul>
          </li>
          <li class="tabs__item" id="tab-3">
            <ul class="tabs__sub-list">
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/plastik/">
                  <h3 class="product-promo__title">Пластик</h3><img class="product-promo__image" loading="lazy"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/3/1.jpg"
                    alt="фото продукта">
                </a></li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/plastmassy/">
                  <h3 class="product-promo__title">Пластмассы</h3><img class="product-promo__image" loading="lazy"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/3/2.jpg"
                    alt="фото продукта">
                </a></li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/stekloboy/">
                  <h3 class="product-promo__title">Стеклобой</h3><img class="product-promo__image" loading="lazy"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/3/3.jpg"
                    alt="фото продукта">
                </a></li>
              <!-- <li class="product-promo"><a class="product-promo__link" href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/bumaga-karton/">
                  <h3 class="product-promo__title">Бумага, картон</h3><img class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/3/4.jpg"
                    alt="фото продукта">
                </a></li> -->
            </ul>
          </li>
          <li class="tabs__item" id="tab-4">
            <ul class="tabs__sub-list">
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/dragotsennye-kamni/">
                  <h3 class="product-promo__title">Драгоценные камни</h3><img class="product-promo__image"
                    loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/4/1.jpg"
                    alt="фото продукта">
                </a></li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/poludragotsennye-kamni/">
                  <h3 class="product-promo__title">Полудрагоценные камни</h3><img class="product-promo__image"
                    loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/4/2.jpg"
                    alt="фото продукта">
                </a></li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/mineraly/">
                  <h3 class="product-promo__title">Минералы</h3><img class="product-promo__image" loading="lazy"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/4/3.jpg"
                    alt="фото продукта">
                </a></li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/metally-fraktsii/">
                  <h3 class="product-promo__title">Металлы (фракции)</h3><img class="product-promo__image"
                    loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/4/4.jpg"
                    alt="фото продукта">
                </a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="advantages">
    <div class="advantages__wrapper wrapper">
      <h2 class="title">Наши фотосепараторы это</h2>
      <h2 class="visually-hidden">Список преимуществ нашего оборудования</h2>
      <ul class="advantages__list">
        <li class="advantages__item advantages__item--1"><span
            class="advantages__title"><?php the_field('title-1');?></span>
          <p class="advantages__text"><?php the_field('desc-1');?></p>
          <img class="advantages__image" loading="lazy"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/advantages/1.png"
            alt="картинка преимущества">
        </li>
        <li class="advantages__item advantages__item--2"><span
            class="advantages__title"><?php the_field('title-2');?></span>
          <p class="advantages__text"><?php the_field('desc-2');?></p>
          <img class="advantages__image" loading="lazy"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/advantages/2.png"
            alt="картинка преимущества">
        </li>
        <li class="advantages__item advantages__item--3"><span class="advantages__title"><?php the_field('title-3');?>
          </span>
          <p class="advantages__text"><?php the_field('desc-3');?></p><img loading="lazy"
            class="advantages__image  advantages__image--marketolog"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/advantages/3.png"
            alt="картинка преимущества">
        </li>
        <li class="advantages__item advantages__item--4"><span
            class="advantages__title"><?php the_field('title-4');?></span>
          <p class="advantages__text"><?php the_field('desc-4');?></p>
          <img class="advantages__image" loading="lazy"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/advantages/4.png"
            alt="картинка преимущества">
        </li>
      </ul>
    </div>
  </section>

  <section class="new-steps">
    <div class="wrapper">
      <h2 class="title">Этапы реализации проекта</h2>

      <ol>
        <li>
          <span class="new-steps__number">01</span>
          <h3 class="new-steps__name">Оставьте заявку</h3>
          <p class="new-steps__text">Заполните форму на сайте или позвонить по телефону <a href="tel:+78003503387">+7 800 350 33 87</a></p>
        </li>
        <li>
          <span class="new-steps__number">02</span>
          <h3 class="new-steps__name">Тест-драйв</h3>
          <p class="new-steps__text">Проводим демонстарцию работы оборудования на вашем материале</p>
        </li>
        <li>
          <span class="new-steps__number">03</span>
          <h3 class="new-steps__name">Заказ</h3>
          <p class="new-steps__text">Согласовываем все условия и заключаем контракт</p>
        </li>
        <li>
          <span class="new-steps__number">04</span>
          <h3 class="new-steps__name">Установка</h3>
          <p class="new-steps__text">Монтаж, наладка и запуск оборудования</p>
        </li>
      </ol>
    </div>
  </section>

  <section class="test-drive">
    <div class="wrapper">
      <h2 class="title">Оставьте заявку сейчас
        и получите сортировочное решение для ваших задач</h2>
      <div class="test-drive__body">
        <div class="test-drive__image">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/test-drive/test-drive-separator-2.png"
            alt="фотосепаратор для тестдрайва" width="506" loading="lazy">
        </div>

        <div class="test-drive__form">
          <?php echo do_shortcode('[contact-form-7 id="6204" title="get-solution"]'); ?>
        </div>
      </div>

    </div>
  </section>

  <section class="services">
    <div class="wrapper">
      <!-- Заголовок блок-секции  -->
      <h2 class="services__title title"><?php the_field('home-services-header');?></h2>
      <!-- Краткое описание секции  -->
      <div class="services__text"><?php the_field('home-short-description-services');?></div>
      <?php
      $args = array(
        'post_type' => 'services',
        'posts_per_page' => 6
      );
      $query = new WP_Query( $args);
      if($query->have_posts( ) ) :
        ?>
      <ul class="services__list">
        <?php while ($query->have_posts() ) : $query->the_post(); ?>
        <li class="services__item service-card">
          <a class="service-card__link" href="<?php the_permalink() ?>">
            <?php the_post_thumbnail() ?>
            <h3 class="service-card__title"><?php the_title() ?></h3>
            <div class="service-card__text"><?php the_excerpt() ?></div>
          </a>
        </li>
        <?php endwhile; ?>
      </ul>
      <?php endif;
      wp_reset_postdata(); ?>
    </div>
  </section>

  <section class="choose-us">
    <div class="wrapper">
      <h2 class="choose-us__title title"><?php the_field('reason-title');?></h2>
      <ul class="choose-us__list">
        <li class="choose-us__item choose-us__item--1"><?php the_field('reason-1');?></li>
        <li class="choose-us__item choose-us__item--2"><?php the_field('reason-2');?></li>
        <li class="choose-us__item choose-us__item--3"><?php the_field('reason-3');?></li>
        <li class="choose-us__item choose-us__item--4"><?php the_field('reason-4');?></li>
        <li class="choose-us__item choose-us__item--5"><?php the_field('reason-5');?></li>
        <li class="choose-us__item choose-us__item--6"><?php the_field('reason-6');?></li>
        <li class="choose-us__item choose-us__item--7"><?php the_field('reason-7');?></li>
        <li class="choose-us__item choose-us__item--8"><?php the_field('reason-9');?></li>
        <li class="choose-us__item choose-us__item--9"><?php the_field('reason-10');?></li>
      </ul>
    </div>
  </section>

  <section class="reviews">
    <?php
      $args = array(
        'posts_per_page' => 9,
        'post_type' => 'sapsan_reviews'
      );
      $query = new WP_Query( $args);
      if($query->have_posts( ) ) :
        ?>
    <div class="wrapper">
      <h2 class="reviews__title title">Что говорят о нас клиенты</h2>
      <div class="reviews__wrapper swiper-container-6">
        <ul class="reviews__list swiper-wrapper">
          <?php while ($query->have_posts() ) : $query->the_post(); ?>
          <li class="reviews__item swiper-slide">
            <a data-fancybox="gallery" href="<?php the_post_thumbnail_url('full') ?>">
              <img src="<?php the_post_thumbnail_url('full') ?>" loading="lazy">
            </a>
          </li>
          <?php endwhile; ?>
        </ul>

        <div class="reviews__pagination swiper-pagination-6"></div>
      </div>

      <a class="reviews__button  button" href="/vse-otzyvy/">Смотреть все отзывы</a>
    </div>
    <?php endif;
      wp_reset_postdata(); ?>
  </section>

  <section class="advantages  marketolog-advantages">
    <div class="advantages__wrapper wrapper">
      <h2 class="title">Высокие стандарты качества от Российского производителя!</h2>
      <div class="marketolog-advantages__wrapper">

        <div class="marketolog-advantages__image">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/8uYSYAfXpRY" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        </div>
        <script>
        document.addEventListener("scroll", function() {
          if (window.scrollY + window.get_window_height() - 10 >= document.getElementsByClassName('iframeLazy')[0]
            .offsetTop && document.getElementsByClassName('iframeLazy')[0].src == "") {
            setTimeout(() => {
              document.getElementsByClassName('iframeLazy')[0].src = document.getElementsByClassName(
                'iframeLazy')[0].getAttribute('srcLazy');
            }, 10);
          }
        });
        </script>

        <div class="marketolog-advantages__text">
          <p>Наша компания ООО «Смарт Грэйд» оказывает услуги по внедрению фотосепараторов и разработке комплекса мер с
            целью оптимизации производственного цикла в промышленных предприятиях. Мы предлагаем новейшее
            высококачественное оборудование собственного изготовления бренда «Сапсан» и являемся представителями других
            ведущих мировых поставщиков, поэтому можем предложить вам полноценные технологические линии
            индивидуально под каждый сегмент производственного рынка и уже не только России! </p>
          <p>Наш бренд положительно зарекомендовал себя на рынках ближнего зарубежья в странах СНГ (Казахстан,
            Беларусь, Латвия).</p>
        </div>
      </div>

    </div>
  </section>

  <section class="articles">
    <?php
      $args = array(
        'posts_per_page' => 3
      );
      $query = new WP_Query( $args);
      if($query->have_posts( ) ) :
        ?>
    <div class="wrapper">
      <h2 class="articles__title title"><?php the_field('home-last-news');?></h2>
      <ul class="articles__list">
        <?php while ($query->have_posts() ) : $query->the_post(); ?>
        <li class="articles__item announcement">
          <div class="announcement__image"><?php the_post_thumbnail() ?></div>
          <span class="announcement__data"><?php the_time('j F Y'); ?></span>
          <h3 class="announcement__title"><?php the_title() ?></h3>
          <div class="announcement__text"><?php the_excerpt() ?></div>
          <a class="announcement__button button" href="<?php the_permalink() ?>">Читать подробнее</a>
        </li>
        <?php endwhile; ?>
      </ul>
    </div>
    <?php endif;
      wp_reset_postdata(); ?>
  </section>

  

  

</main>
<?php get_footer('custom');