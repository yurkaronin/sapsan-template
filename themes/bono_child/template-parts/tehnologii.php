<?php
/**
 * Template name: Технологии
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
<main class="main  inner-page inner-page--tehnology">
  <section class="first-screen first-screen--tehnology">
    <div class="wrapper">
      <!-- блок  -->
      <ul class="first-screen__breadcrumbs breadcrumbs">
        <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="">Главная</a></li>
        <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="">Технологии</a></li>
      </ul>
      <h1 class="first-screen__title title"><?php the_title(); ?></h1>
    </div>
  </section>
  <section class="inner-page__info content">
    <div class="wrapper">
    <?php the_content(); ?>
    </div>
  </section>
  <!-- <section class="articles">
    <div class="wrapper">
      <ul class="articles__list">
        <li class="articles__item announcement"><a class="announcement__link" href="#"><img class="announcement__image"
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tehnology/1.jpg" alt="фото статьи">
            <h3 class="announcement__title">Технологии анализа и очистки зерна и круп</h3>
          </a></li>
        <li class="articles__item announcement"><a class="announcement__link" href="#"><img class="announcement__image"
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tehnology/2.jpg" alt="фото статьи">
            <h3 class="announcement__title">Технологии для переработки пластика</h3>
          </a></li>
        <li class="articles__item announcement"><a class="announcement__link" href="#"><img class="announcement__image"
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tehnology/3.jpg" alt="фото статьи">
            <h3 class="announcement__title">Анализатор зерна и круп e-Analyser</h3>
          </a></li>
      </ul>
    </div>
  </section> -->

  <section class="seo-block">
    <div class="wrapper">
      <div class="seo-block__text"><?php the_field('seo-text-area');?></div>
    </div>
  </section>
  <section class="services">
    <div class="wrapper">
      <h2 class="services__title title">Инновационные решения</h2>
      <ul class="services__list">
        <li class="services__item service-card"><img class="service-card__image"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/services/1.jpg" alt="фото услуги">
          <h3 class="service-card__title">Решение проблем сортировки</h3>
          <p class="service-card__text">Уточните какую проблему сортировки требуется решить, и
            ознакомьтесь с подходящим списком оборудования.</p><a href="#" class="service-card__button button b24-web-form-popup-btn-10">Решить
            проблему</a>
        </li>
        <li class="services__item service-card"><img class="service-card__image"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/services/2.jpg" alt="фото услуги">
          <h3 class="service-card__title">Фильтр по характеристикам и опциям</h3>
          <p class="service-card__text">Выберите желаемые опции или характеристики оборудования, для
            поиска подходящего решения.</p><a href="https://fsapsan.ru/catalog/" class="service-card__button button">Смотреть фильтр</a>
        </li>
        <li class="services__item service-card"><img class="service-card__image"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/services/3.jpg" alt="фото услуги">
          <h3 class="service-card__title">Выбор продукта сортировки</h3>
          <p class="service-card__text">Укажите какой продукт требуется очистить/сортировать, что бы
            посмотреть какие модели оборудования подойдут лучше всего.</p><a href="https://fsapsan.ru/produkty-sortirovki/"
            class="service-card__button button">Выбрать продукт</a>
        </li>
        <li class="services__item service-card service-card--light">
          <h3 class="service-card__title service-card__title--big">Ищите конкретную модель?</h3>
          <p class="service-card__text">Воспользуйтесь быстрым поиском по нашему каталогу. Введите номер
            модели или серии оборудования.</p>
          <form class="main-form" action="<?php echo site_url(); ?>" method="get">
            <div class="main-form__items-group">
              <div class="main-form__item"><label class="main-form__label" for="main-form__name">Введите номер
                  модели</label>
                  <input class="main-form__field" type="search" id="main-form__name" name="s"
                  autocomplete="off" required=""></div>
              <div class="main-form__item"><button class="main-form__button button" type="submit">Найти</button></div>
            </div>
          </form>
        </li>
      </ul>
    </div>
  </section>
</main>

<?php get_footer('custom');
