<?php
/**
 * Template name: Наша команда
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
<main class="main  inner-page inner-page--details">
  <section class="first-screen first-screen--about">
    <div class="wrapper">
      <!-- блок  -->
      <ul class="first-screen__breadcrumbs breadcrumbs">
        <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="">Главная</a></li>
        <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="">О компании</a></li>
      </ul>
      <h1 class="first-screen__title title" style="margin-bottom: 20px;">Страница о нашей компании</h1>
      <div class="first-screen__description">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab repellat aliquam in voluptatum dolorum
        explicabo voluptas eius omnis repellendus sint? Obcaecati numquam saepe quod eligendi officia
        temporibus, magnam dolore. Aut, nostrum incidunt. Repellat mollitia rerum dolorem id explicabo
        distinctio earum eius illum facilis accusamus, possimus ad nobis? Facere obcaecati ipsam est vero
        quibusdam atque soluta incidunt dolores dolorum
      </div>
    </div>
  </section>
  <section class="introduction">
    <div class="wrapper">
      <div class="introduction__cite">
        <p>Недавно обновили <cite>нашу презентацию</cite> для корпоративного сегмента и там есть цитата,
          которая хорошо вписывается на эту страницу:</p>
        <blockquote class="cite">«Мы производим и продаём фотосепараторы, чтобы люди по всему миру могли
          просто, быстро и качественно обрабатывать огромный объем агрокультур, входящих в основные
          продукты питания и сырье для многих отраслей промышленности.<br>Предлагаем к приобретению только
          лучшие решения для вашего бизнеса!»</blockquote>
      </div>
    </div>
  </section><!-- блок  -->
  <section class="seo-block seo-block--about">
    <div class="wrapper"><img class="seo-block__picture"
        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/services/2.jpg" alt="Фото услуги">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et perspiciatis a maiores, harum veritatis
        voluptatibus eveniet minima, cum tenetur quam reiciendis modi laborum exercitationem ab ad? Maiores
        tenetur tempore fuga suscipit! Harum culpa laboriosam error cumque voluptatem distinctio eos
        suscipit doloremque tempore! Deserunt, consequuntur? Nobis illum, veritatis cupiditate natus
        corrupti, a quia fugit, sequi provident nisi debitis fugiat earum! Vitae, suscipit similique!
        Mollitia dolore veniam facilis corporis, ea laudantium perferendis omnis ad voluptate quos possimus
        numquam ducimus rerum tempora, pariatur similique, odit totam temporibus porro quibusdam provident
        rem recusandae? Fugiat, atque totam soluta velit neque itaque odit aliquam quibusdam porro iste
        inventore optio doloremque eius eum est delectus debitis. Atque mollitia officia, sed officiis
        distinctio ex doloribus at. Porro cumque ullam neque iste repellat fuga repudiandae exercitationem,
        inventore nemo modi id, adipisci dolorem maiores enim iusto, facere amet deleniti non quisquam harum
        est! Odio explicabo, blanditiis aspernatur tempora doloribus quo.</p>
      <h3 class="title">Заголовок для примера</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et perspiciatis a maiores, harum veritatis
        voluptatibus eveniet minima, cum tenetur quam reiciendis modi laborum exercitationem ab ad? Maiores
        tenetur tempore fuga suscipit! Harum culpa laboriosam error cumque voluptatem distinctio eos
        suscipit doloremque tempore! Deserunt, consequuntur? Nobis illum, veritatis cupiditate natus
        corrupti, a quia fugit, sequi provident nisi debitis fugiat earum! Vitae, suscipit similique!
        Mollitia dolore veniam facilis corporis, ea laudantium perferendis omnis ad voluptate quos possimus
        numquam ducimus rerum tempora, pariatur similique, odit totam temporibus porro quibusdam provident
        rem recusandae? Fugiat, atque totam soluta velit neque itaque odit aliquam quibusdam porro iste
        inventore optio doloremque eius eum est delectus debitis. Atque mollitia officia, sed officiis
        distinctio ex doloribus at. Porro cumque ullam neque iste repellat fuga repudiandae exercitationem,
        inventore nemo modi id, adipisci dolorem maiores enim iusto, facere amet deleniti non quisquam harum
        est! Odio explicabo, blanditiis aspernatur tempora doloribus quo.</p><iframe width="560" height="315"
        src="https://www.youtube.com/embed/5S5QRCv2lG0" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen
        style="width: 100%;"></iframe>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et perspiciatis a maiores, harum veritatis
        voluptatibus eveniet minima, cum tenetur quam reiciendis modi laborum exercitationem ab ad? Maiores
        tenetur tempore fuga suscipit! Harum culpa laboriosam error cumque voluptatem distinctio eos
        suscipit doloremque tempore! Deserunt, consequuntur? Nobis illum, veritatis cupiditate natus
        corrupti, a quia fugit, sequi provident nisi debitis fugiat earum! Vitae, suscipit similique!
        Mollitia dolore veniam facilis corporis, ea laudantium perferendis omnis ad voluptate quos possimus
        numquam ducimus rerum tempora, pariatur similique, odit totam temporibus porro quibusdam provident
        rem recusandae? Fugiat, atque totam soluta velit neque itaque odit aliquam quibusdam porro iste
        inventore optio doloremque eius eum est delectus debitis. Atque mollitia officia, sed officiis
        distinctio ex doloribus at. Porro cumque ullam neque iste repellat fuga repudiandae exercitationem,
        inventore nemo modi id, adipisci dolorem maiores enim iusto, facere amet deleniti non quisquam harum
        est! Odio explicabo, blanditiis aspernatur tempora doloribus quo.</p>
    </div>
  </section>
  <section class="choose-us choose-us--mini">
    <h2 class="visually-hidden">Наши преимущества</h2>
    <div class="wrapper">
      <p class="choose-us__intro">К вашему услугам комплексный подход к решению любых задач:</p>
      <ul class="choose-us__list">
        <li class="choose-us__item choose-us__item--1">Сельское хозяйство</li>
        <li class="choose-us__item choose-us__item--2">Пищевая промышленность</li>
        <li class="choose-us__item choose-us__item--3">Переработка вторсырья</li>
        <li class="choose-us__item choose-us__item--4">Горнорудная промышленность</li>
      </ul>
    </div>
  </section>
  <section class="choose-us choose-us--gray">
    <div class="wrapper">
      <h2 class="choose-us__title title">Минимум 6 причин, почему вам стоит купить оборудование у нас</h2>
      <ul class="choose-us__list">
        <li class="choose-us__item choose-us__item--1">Постоянное наличие запасных частей и расходных
          материалов на основном складе.</li>
        <li class="choose-us__item choose-us__item--2">Поддержка работы оборудования на протяжении всего
          срока эксплуатации.</li>
        <li class="choose-us__item choose-us__item--3">Оперативный выезд сервисного инженера на объект
          заказчика.</li>
        <li class="choose-us__item choose-us__item--4">Удаленный контроль и диагностика фотосепаратора.</li>
        <li class="choose-us__item choose-us__item--5">Бесплатная горячая линия технической поддержки.</li>
        <li class="choose-us__item choose-us__item--6">Дистанционная настройка.</li>
      </ul>
    </div>
  </section>
  <section class="team">
    <div class="wrapper">
      <h2 class="team__title title">Руководство</h2>
      <ul class="team__list">
        <li class="team__item"><img class="team__photo"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/team/2.jpg" alt="Фотография сотрудника">
          <div class="team__wrapper"><span class="team__status">Руководитель<br>по региональным
              продажам</span>
            <p class="team__name">Завьялов Артем Викторович</p>
            <ul class="team__contacts-list">
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--mail"
                  href="mailto:zav@fsapsan.ru">zav@fsapsan.ru</a></li>
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--tel"
                  href="tel:89030253854">+7 (903) 025 38 54</a></li>
            </ul>
          </div>
        </li>
        <li class="team__item"><img class="team__photo"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/team/2.jpg" alt="Фотография сотрудника">
          <div class="team__wrapper"><span class="team__status">Руководитель<br>по региональным
              продажам</span>
            <p class="team__name">Завьялов Артем Викторович</p>
            <ul class="team__contacts-list">
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--mail"
                  href="mailto:zav@fsapsan.ru">zav@fsapsan.ru</a></li>
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--tel"
                  href="tel:89030253854">+7 (903) 025 38 54</a></li>
            </ul>
          </div>
        </li>
        <li class="team__item"><img class="team__photo"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/team/2.jpg" alt="Фотография сотрудника">
          <div class="team__wrapper"><span class="team__status">Руководитель<br>по региональным
              продажам</span>
            <p class="team__name">Завьялов Артем Викторович</p>
            <ul class="team__contacts-list">
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--mail"
                  href="mailto:zav@fsapsan.ru">zav@fsapsan.ru</a></li>
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--tel"
                  href="tel:89030253854">+7 (903) 025 38 54</a></li>
            </ul>
          </div>
        </li>
        <li class="team__item"><img class="team__photo"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/team/2.jpg" alt="Фотография сотрудника">
          <div class="team__wrapper"><span class="team__status">Руководитель<br>по региональным
              продажам</span>
            <p class="team__name">Завьялов Артем Викторович</p>
            <ul class="team__contacts-list">
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--mail"
                  href="mailto:zav@fsapsan.ru">zav@fsapsan.ru</a></li>
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--tel"
                  href="tel:89030253854">+7 (903) 025 38 54</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </section>
  <section class="team">
    <div class="wrapper">
      <h2 class="team__title title">Наша команда</h2>
      <ul class="team__list">
        <li class="team__item"><img class="team__photo"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/team/2.jpg" alt="Фотография сотрудника">
          <div class="team__wrapper"><span class="team__status">Руководитель<br>по региональным
              продажам</span>
            <p class="team__name">Завьялов Артем Викторович</p>
            <ul class="team__contacts-list">
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--mail"
                  href="mailto:zav@fsapsan.ru">zav@fsapsan.ru</a></li>
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--tel"
                  href="tel:89030253854">+7 (903) 025 38 54</a></li>
            </ul>
          </div>
        </li>
        <li class="team__item"><img class="team__photo"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/team/2.jpg" alt="Фотография сотрудника">
          <div class="team__wrapper"><span class="team__status">Руководитель<br>по региональным
              продажам</span>
            <p class="team__name">Завьялов Артем Викторович</p>
            <ul class="team__contacts-list">
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--mail"
                  href="mailto:zav@fsapsan.ru">zav@fsapsan.ru</a></li>
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--tel"
                  href="tel:89030253854">+7 (903) 025 38 54</a></li>
            </ul>
          </div>
        </li>
        <li class="team__item"><img class="team__photo"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/team/2.jpg" alt="Фотография сотрудника">
          <div class="team__wrapper"><span class="team__status">Руководитель<br>по региональным
              продажам</span>
            <p class="team__name">Завьялов Артем Викторович</p>
            <ul class="team__contacts-list">
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--mail"
                  href="mailto:zav@fsapsan.ru">zav@fsapsan.ru</a></li>
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--tel"
                  href="tel:89030253854">+7 (903) 025 38 54</a></li>
            </ul>
          </div>
        </li>
        <li class="team__item"><img class="team__photo"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/team/2.jpg" alt="Фотография сотрудника">
          <div class="team__wrapper"><span class="team__status">Руководитель<br>по региональным
              продажам</span>
            <p class="team__name">Завьялов Артем Викторович</p>
            <ul class="team__contacts-list">
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--mail"
                  href="mailto:zav@fsapsan.ru">zav@fsapsan.ru</a></li>
              <li class="team__contacts-item"><a class="team__contacts-link team__contacts-link--tel"
                  href="tel:89030253854">+7 (903) 025 38 54</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </section>
  <section class="reviews">
    <div class="wrapper">
      <h2 class="reviews__title title">Отзывы</h2>
      <div class="reviews__wrapper swiper-container-2">
        <ul class="reviews__list swiper-wrapper">
          <li class="reviews__item swiper-slide"><a class="reviews__link"><img class="reviews__image"
                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/reviews/1-min.jpg"
                alt="Скриншот отзыва"></a></li>
          <li class="reviews__item swiper-slide"><a class="reviews__link"><img class="reviews__image"
                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/reviews/1-min.jpg"
                alt="Скриншот отзыва"></a></li>
          <li class="reviews__item swiper-slide"><a class="reviews__link"><img class="reviews__image"
                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/reviews/1-min.jpg"
                alt="Скриншот отзыва"></a></li>
          <li class="reviews__item swiper-slide"><a class="reviews__link"><img class="reviews__image"
                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/reviews/1-min.jpg"
                alt="Скриншот отзыва"></a></li>
          <li class="reviews__item swiper-slide"><a class="reviews__link"><img class="reviews__image"
                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/reviews/1-min.jpg"
                alt="Скриншот отзыва"></a></li>
        </ul>
        <div class="reviews__pagination swiper-pagination-2"></div>
      </div>
    </div>
  </section>
</main>

<?php get_footer('custom');
