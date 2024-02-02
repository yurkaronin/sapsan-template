<?php

use Wpshop\Core\Advertising;
use Wpshop\Core\Core;

$core        = theme_container()->get( Core::class );
$advertising = theme_container()->get( Advertising::class );

?>

<script>
console.log('Это КАСТОМНЫЙ подвал');
</script>

<div class="block-after-site <?php echo apply_filters( 'bono_site_content_classes', 'fixed' ) ?>">
  <?php echo $advertising->show_ad( 'after_site_content' ); ?>
</div>

<?php do_action( THEME_SLUG . '_after_site_content' ) ?>

<?php get_template_part( 'template-parts/footer/footer' ) ?>
<?php if ( $core->get_option( 'arrow_display' ) ): ?>
<button type="button" class="scrolltop js-scrolltop"
  <?php echo $core->get_option( 'arrow_mob_display' ) ? ' data-mob="on"' : '' ?>></button>
<?php endif ?>


</div><!-- #page -->

<?php wp_footer(); ?>
<?php $core->the_option( 'code_body' ) ?>

<?php do_action( THEME_SLUG . '_before_body' ) ?>

<?php get_template_part( 'template-parts/footer/init-slider' ) ?>

<script>
// табы с анонсами каталога на главной страницы
document.querySelectorAll('.tabs__link').forEach((item) =>
  item.addEventListener('click', function(e) {
    e.preventDefault();
    const id = e.target.getAttribute('href').replace('#', '');
    document.querySelectorAll('.tabs__link').forEach(
      (child) => child.classList.remove('tabs__link--active')
    );
    document.querySelectorAll('.tabs__item').forEach(
      (child) => child.classList.remove('tabs__item--active')
    );
    item.classList.add('tabs__link--active');
    document.getElementById(id).classList.add('tabs__item--active');
  })
);
document.querySelector('.tabs__link').click();

//Модалка
$('.show_popup').click(function() {
  var popup_id = $('#' + $(this).attr('rel'));
  $(popup_id).show();
  $(popup_id).find('.my-modal').addClass('modal-open');
  $('html').addClass('none-scroll');
  return false;
});

$('.close-popup').click(function() {
  $(this).closest('.my-modal').removeClass('modal-open');
  $(this).closest('.modal-container').hide();
  $('html').removeClass('none-scroll');
});

$(document).mouseup(function(e) {
  // событие клика по веб-документу
  var modalOpen = $('.modal-open'); // тут указываем ID элемента
  if (!modalOpen.is(e.target) && // если клик был не по нашему блоку
    modalOpen.has(e.target).length === 0
  ) {
    // и не по его дочерним элементам
    modalOpen.closest('.modal-container').hide();
    $('html').removeClass('none-scroll');
  }
});
</script>

<script id="bx24_form_button" data-skip-moving="true">
(function(w, d, u, b) {
  w['Bitrix24FormObject'] = b;
  w[b] = w[b] || function() {
    arguments[0].ref = u;
    (w[b].forms = w[b].forms || []).push(arguments[0])
  };
  if (w[b]['forms']) return;
  var s = d.createElement('script');
  s.async = 1;
  s.src = u + '?' + (1 * new Date());
  var h = d.getElementsByTagName('script')[0];
  h.parentNode.insertBefore(s, h);
})(window, document, 'https://smartgrade.bitrix24.ru/bitrix/js/crm/form_loader.js', 'b24form');
b24form({
  "id": "10",
  "lang": "ru",
  "sec": "51bnxs",
  "type": "button",
  "click": ""
});
</script>
<script>
(function(w, d, u) {
  var s = d.createElement('script');
  s.async = true;
  s.src = u + '?' + (Date.now() / 60000 | 0);
  var h = d.getElementsByTagName('script')[0];
  h.parentNode.insertBefore(s, h);
})(window, document, 'https://cdn-ru.bitrix24.ru/b9154043/crm/site_button/loader_2_h42iu3.js');
</script>

<script>
(function(w, d, s, h, id) {
  w.roistatProjectId = id;
  w.roistatHost = h;
  var p = d.location.protocol == "https:" ? "https://" : "http://";
  var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/" + id +
    "/init?referrer=" + encodeURIComponent(d.location.href);
  var js = d.createElement(s);
  js.charset = "UTF-8";
  js.async = 1;
  js.src = p + h + u;
  var js2 = d.getElementsByTagName(s)[0];
  js2.parentNode.insertBefore(js, js2);
})(window, document, 'script', 'cloud.roistat.com', '928f0b18bbf65275094b2cc2dd4d80dc');
</script>

<!-- BEGIN BITRIX24 WIDGET INTEGRATION WITH ROISTAT -->
<script>
(function(w, d, s, h) {
  w.roistatLanguage = '';
  var p = d.location.protocol == "https:" ? "https://" : "http://";
  var u = "/static/marketplace/Bitrix24Widget/script.js";
  var js = d.createElement(s);
  js.async = 1;
  js.src = p + h + u;
  var js2 = d.getElementsByTagName(s)[0];
  js2.parentNode.insertBefore(js, js2);
})(window, document, 'script', 'cloud.roistat.com');
</script>
<!-- END BITRIX24 WIDGET INTEGRATION WITH ROISTAT -->

<!-- запись на тестовую сотрировку  -->
<div class="modal micromodal-slide" id="modal-test-sorting">
  <div class="modal__overlay" data-custom-close>
    <div class="modal__container">
      <header class="modal__header">
        <h3 class="title">Запись на тестовую сортировку</h3>
        <button class="modal__close" title="Закрыть окно" data-custom-close>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 30 31">
            <path fill="#D4AF5E" d="m26.214.909 3.535 3.536L4.035 30.158.5 26.623z" />
            <path fill="#D4AF5E" d="M.5 4.444 4.035.91 29.75 26.623l-3.535 3.535z" />
          </svg>
        </button>
      </header>
      <div class="modal__body">
        <div class="modal__text">
          <?php echo do_shortcode('[contact-form-7 id="6079" title="test-sorting"]'); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Заказ обратного звонка -->
<div class="modal micromodal-slide" id="modal-callback">
  <div class="modal__overlay" data-custom-close>
    <div class="modal__container">
      <header class="modal__header">
        <h3 class="title">Заказ обратного звонка</h3>
        <button class="modal__close" title="Закрыть окно" data-custom-close>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 30 31">
            <path fill="#D4AF5E" d="m26.214.909 3.535 3.536L4.035 30.158.5 26.623z" />
            <path fill="#D4AF5E" d="M.5 4.444 4.035.91 29.75 26.623l-3.535 3.535z" />
          </svg>
        </button>
      </header>
      <div class="modal__body">
        <div class="modal__text">
          <?php echo do_shortcode('[contact-form-7 id="6119" title="modal-callback"]'); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- поиск по сайту -->
<div class="modal micromodal-slide" id="modal-search">
  <div class="modal__overlay" data-custom-close>
    <div class="modal__container">
      <header class="modal__header">
        <h3 class="title">Поиск по сайту</h3>
        <button class="modal__close" title="Закрыть окно" data-custom-close>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 30 31">
            <path fill="#D4AF5E" d="m26.214.909 3.535 3.536L4.035 30.158.5 26.623z" />
            <path fill="#D4AF5E" d="M.5 4.444 4.035.91 29.75 26.623l-3.535 3.535z" />
          </svg>
        </button>
      </header>
      <div class="modal__body">
        <form role="search" method="get" action="https://fsapsan.ru/"
          class="wp-block-search__button-outside wp-block-search__text-button search-page__item wp-block-search"><label
            class="wp-block-search__label screen-reader-text" for="wp-block-search__input-1">Поиск</label>
          <div class="wp-block-search__inside-wrapper "><input class="wp-block-search__input"
              id="wp-block-search__input-1" placeholder="" value="" type="search" name="s" required=""><button
              aria-label="Поиск" class="wp-block-search__button wp-element-button" type="submit">Поиск</button></div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  var sidebar = document.getElementById("secondary"); // Проверяем наличие бокового меню
  if (!sidebar) {
    console.log("Боковое меню (id='secondary') не найдено.");
    return; // Если боковое меню отсутствует, прекращаем выполнение скрипта
  }

  var currentUrl = window.location.href; // Получаем текущий URL
  var menuLinks = sidebar.querySelectorAll("a.iksm-term__link"); // Находим все ссылки в боковом меню

  menuLinks.forEach(function(link) {
    if (link.href === currentUrl) {
      link.removeAttribute("href"); // Удаляем атрибут href, если он совпадает с текущим URL
      console.log("Удален атрибут href у ссылки:", link);
    }
  });
});
</script>
</body>

</html>