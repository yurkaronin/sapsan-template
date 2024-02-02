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
        Мы первые №1 официальные дистрибьюторы фотосепараторов Meyer на территории Российской Федерации. Наше
        производство зерноочистительной техники и оборудования для транспортировки любых сыпучих продуктов позволяет
        выстраивать полноценные сортировочные линии.
      </p>
      <!-- тут будем выводить рекомендуемые товары -->
      <?php echo do_shortcode('[products class="recommended-items__list" ids="258,256,260,4394,262,281,3303,3190"]'); ?>

      <div class="recommended-items__footer">
        <p class="subtitle">Оставьте заявку прямо сейчас и получите решение задач вашего производства от
          профессиональных инженеров и менеджеров компании «Смарт Грэйд».</p>
        <div class="recommended-items__buttons">
          <a class="button" data-custom-open="modal-callback">Получить консультацию</a>
          <a href="https://fsapsan.ru/catalog/" class="button button--transparent">Перейти в каталог</a>
        </div>
      </div>


    </div>
  </section>

  <section class="product-tabs product-tabs--home">
    <div class="wrapper">
      <h2 class="product-tabs__title title">Сортируемые продукты</h2>

      <div class="tabs">
        <ul class="tabs__list tabs-list">

          <li class="tabs-list__item">
            <a class="tabs__link" href="#tab-1">
              <span class="tabs__icon-wrapper tabs__icon-wrapper-1"></span>Сельское хозяйство</a>
          </li>
          <li class="tabs-list__item">
            <a class="tabs__link" href="#tab-2">
              <span class="tabs__icon-wrapper tabs__icon-wrapper-2"></span>Пищевая промышленность</a>
          </li>
          <li class="tabs-list__item">
            <a class="tabs__link" href="#tab-3">
              <span class="tabs__icon-wrapper tabs__icon-wrapper-3"></span>Непищевое сырьё</a>
          </li>
          <li class="tabs-list__item tabs-list__item--mod">
            <a class="button" href="<?php echo get_home_url(); ?>/produkty-sortirovki/">Все продукты</a>
          </li>
        </ul>

        <ul class="tabs__content">
          <!-- Сельское хозяйство  -->
          <li class="tabs__item" id="tab-1">
            <ul class="tabs__sub-list tabs__sub-list--mod">
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/maslichnye-kultury-semena-i-melkosemyannye/">
                  <h3 class="product-promo__title">Мелкосемянные и масличные культуры</h3><img loading="lazy"
                    class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/1/2.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernovye-kultury/">
                  <h3 class="product-promo__title">Зерновые<br>культуры</h3><img loading="lazy"
                    class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/1/1.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/">
                  <h3 class="product-promo__title">Зернобобовые культуры</h3><img class="product-promo__image"
                    loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/1/3.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/">
                  <h3 class="product-promo__title">Крупы</h3><img class="product-promo__image"
                    loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/new/home/krupi-all.jpg"
                    alt="фото продукта">
                </a>
              </li>
            </ul>
          </li>
          <!-- Пищевая промышленность  -->
          <li class="tabs__item" id="tab-2">
            <ul class="tabs__sub-list tabs__sub-list--two">

              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi-i-suhofrukty/">
                  <h3 class="product-promo__title">Орехи и сухофрукты</h3><img loading="lazy" class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/new/home/orehi-i-suhofrukti-2.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/lekarstvennye-rasteniya/">
                  <h3 class="product-promo__title">Лекарственные растения</h3><img loading="lazy" class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/new/home/lekarstvennye-rasteniya.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/zamorozhennye-ovoschi/">
                  <h3 class="product-promo__title">Замороженные овощи</h3><img loading="lazy" class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/new/home/zamorozhennye-ovoshchi.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushennye-ovoschi-i-frukty/">
                  <h3 class="product-promo__title">Сушенные овощи и фрукты</h3><img loading="lazy" class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/new/home/sushennye-ovoshchi-frukty.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sneki/">
                  <h3 class="product-promo__title">Снэки</h3><img loading="lazy" class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/new/home/sneki.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/yagody/">
                  <h3 class="product-promo__title">Ягоды</h3><img loading="lazy" class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/new/home/yagodi.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/spetsii/">
                  <h3 class="product-promo__title">Специи</h3><img loading="lazy" class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/new/home/specii.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/chay/">
                  <h3 class="product-promo__title">Чай</h3><img loading="lazy" class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/new/home/chay.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/griby/">
                  <h3 class="product-promo__title">Грибы</h3><img loading="lazy" class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/new/home/gribi.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/tabak/">
                  <h3 class="product-promo__title">Табак</h3><img loading="lazy" class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/new/home/tabak.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/kofe/">
                  <h3 class="product-promo__title">Кофе</h3><img loading="lazy" class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/new/home/coffe.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/solod/">
                  <h3 class="product-promo__title">Солод</h3><img loading="lazy" class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/new/home/solod.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/hmel/">
                  <h3 class="product-promo__title">Хмель</h3><img loading="lazy" class="product-promo__image"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/new/home/hmel.jpg"
                    alt="фото продукта">
                </a>
              </li>


              

            </ul>
          </li>
          <!-- Непищевые продукты  -->
          <li class="tabs__item" id="tab-3">
            <ul class="tabs__sub-list tabs__sub-list--two">
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/nepischevoe-syryo/plastik-granuly-hlopya/">
                  <h3 class="product-promo__title">Пластик - гранулы, хлопья</h3><img class="product-promo__image"
                    loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/3/1.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/nepischevoe-syryo/stekloboy/">
                  <h3 class="product-promo__title">Стеклобой</h3><img class="product-promo__image" loading="lazy"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/3/3.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/nepischevoe-syryo/ruda-i-mineraly/">
                  <h3 class="product-promo__title">Руда и минералы</h3><img class="product-promo__image" loading="lazy"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/4/3.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/nepischevoe-syryo/metally-fraktsii/">
                  <h3 class="product-promo__title">Металлические фракции</h3><img class="product-promo__image"
                    loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/4/4.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/nepischevoe-syryo/dragotsennye-kamni/">
                  <h3 class="product-promo__title">Драгоценные камни</h3><img class="product-promo__image"
                    loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/4/1.jpg"
                    alt="фото продукта">
                </a>
              </li>
              <li class="product-promo"><a class="product-promo__link"
                  href="<?php echo get_home_url(); ?>/sorting_products/nepischevoe-syryo/farmatsevticheskioe-syryo/">
                  <h3 class="product-promo__title">Фармацевтическиое сырьё</h3><img class="product-promo__image"
                    loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/new/home/farmacevticheskioe-syriyo.jpg"
                    alt="фото продукта">
                </a>
              </li>
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
          <p class="new-steps__text">Заполните форму на сайте или позвонить по телефону <a href="tel:+78003503387">+7
              800 350 33 87</a></p>
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