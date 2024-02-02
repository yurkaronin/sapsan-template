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
          <li class="tabs-list__item"><a class="tabs__link" href="#tab-1">
              <div class="tabs__icon-wrapper"><svg class="tabs__icon" width="80" height="80" viewBox="0 0 80 80"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M49.0271 15.4391C49.0271 17.2419 48.1318 18.9153 46.6314 19.9154L44.9339 21.0471C45.2422 19.9426 45.4404 18.7437 45.4405 17.4849C45.4405 12.9876 42.9153 9.25206 41.854 7.88057L41.8541 1.82501L38.2677 1.82509L38.2677 7.88065C37.2063 9.25206 34.6812 12.9877 34.6811 17.4849C34.6811 18.7438 34.8794 19.9428 35.1877 21.0473L33.4902 19.9156C31.9901 18.9155 31.0946 17.2421 31.0946 15.4392L31.0946 12.5847L27.5081 12.5847C27.5081 13.8889 27.508 57.1981 27.5081 58.4772C27.5081 61.4819 29.0007 64.2709 31.5008 65.9376L38.2278 70.4223L38.2167 77.2079L41.8032 77.2111L41.8143 70.4754L48.6209 65.9376C51.1141 64.2756 52.6136 61.49 52.6136 58.4773L52.6136 12.5846L49.0272 12.5846L49.0271 15.4391ZM38.2676 17.4849C38.2676 15.1808 39.2101 13.0655 40.0607 11.6253C40.912 13.0659 41.854 15.1811 41.854 17.4849C41.854 19.789 40.9116 21.9044 40.0609 23.3445C39.2097 21.9038 38.2676 19.7886 38.2676 17.4849ZM31.0946 22.6115C31.3893 22.8324 30.8983 22.498 38.2667 27.4103L38.2609 33.8554L33.4902 30.675C31.9901 29.6749 31.0946 28.0015 31.0946 26.1987L31.0946 22.6115ZM31.0946 33.3709C31.3886 33.5913 30.8744 33.2416 38.2569 38.1632L38.2511 44.6084L33.49 41.4344C31.99 40.4344 31.0945 38.7609 31.0945 36.9581L31.0946 33.3709ZM38.2415 55.3614L33.4902 52.194C31.9902 51.194 31.0945 49.5206 31.0945 47.7178V44.1305C31.3892 44.3512 30.8969 44.016 38.2473 48.9164L38.2415 55.3614ZM33.4901 62.9535C31.9901 61.9534 31.0946 60.28 31.0946 58.4772L31.0946 54.8899C31.3894 55.1109 30.8996 54.7772 38.2375 59.6692L38.2317 66.1144L33.4901 62.9535ZM49.0271 58.4772C49.0271 60.2802 48.1314 61.9535 46.6315 62.9534L41.8181 66.1623L41.824 59.7093C49.2597 54.7521 48.7308 55.1115 49.027 54.8895L49.0271 58.4772ZM49.0272 47.7177C49.0273 49.5206 48.1314 51.1942 46.6315 52.194L41.8279 55.3963L41.8337 48.9434C49.2695 43.9861 48.7309 44.352 49.0271 44.13L49.0272 47.7177ZM49.0271 36.9582C49.0271 38.761 48.1315 40.4345 46.6314 41.4345L41.8376 44.6304L41.8434 38.1775C49.2649 33.2297 48.7309 33.5926 49.0271 33.3706L49.0271 36.9582ZM49.0271 26.1986C49.0271 28.0014 48.1317 29.6749 46.6314 30.6749L41.8473 33.8643L41.8531 27.4114C49.2494 22.4805 48.7303 22.8333 49.0271 22.611L49.0271 26.1986Z" />
                </svg></div>Сельское хозяйство
            </a></li>
          <li class="tabs-list__item"><a class="tabs__link" href="#tab-2">
              <div class="tabs__icon-wrapper"><svg class="tabs__icon" width="62" height="60" viewBox="0 0 62 60"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M61.6586 31.0808C61.6586 19.6246 52.3383 10.3044 40.8817 10.3044H6.88525C5.29465 10.3044 4.00077 9.01005 4.00077 7.41992C4.00077 5.82932 5.29465 4.53544 6.88525 4.53544H34.5044V0.946777H6.88525C3.31575 0.946777 0.412109 3.85041 0.412109 7.41992C0.412109 10.4179 2.4611 12.9454 5.23203 13.6781C5.26428 14.3944 5.31941 15.0949 5.39558 15.7799H0.412109V19.3686H6.03201C6.36751 20.7096 6.80347 21.9717 7.33897 23.1502C8.53659 25.7847 10.2328 28.0136 12.3813 29.7743C16.1088 32.8302 20.1353 33.6307 21.6931 33.8325C22.0165 33.8746 22.2146 33.8881 22.2511 33.8905L22.3067 33.8938H40.8817C44.8451 33.8938 48.0693 37.1184 48.0693 41.0814C48.0693 44.114 46.1806 46.7115 43.5185 47.7657C42.8746 43.9523 39.5509 41.0379 35.5571 41.0379H26.8266V43.7813C26.8266 46.3167 28.0018 48.5816 29.8354 50.0633C28.0018 51.5455 26.8266 53.8103 26.8266 56.3458V59.0891H35.5571C39.7248 59.0891 43.1648 55.9154 43.5891 51.8576H43.6335V51.6754C53.7939 50.3245 61.6586 41.6047 61.6586 31.0808V31.0808ZM30.4952 44.6266H35.5571C37.7426 44.6266 39.5687 46.1971 39.9649 48.269H34.9034C32.7175 48.269 30.8919 46.6984 30.4952 44.6266V44.6266ZM35.5571 55.5H30.4952C30.8919 53.4281 32.7175 51.8576 34.9034 51.8576H39.9649C39.5687 53.9295 37.7426 55.5 35.5571 55.5ZM38.8757 30.3051H28.2303C30.9036 25.1389 30.6667 20.5793 29.8821 17.4784C29.5298 16.0864 29.0433 14.8795 28.5565 13.8931H39.2164C39.7617 14.7066 40.6672 16.2738 41.1948 18.3588C42.206 22.3563 41.4256 26.3711 38.8757 30.3051V30.3051ZM22.1548 30.2738C21.1782 30.1472 17.7517 29.5369 14.6565 26.9991C11.1169 24.0978 9.16274 19.6947 8.83518 13.8931H24.4239C24.9832 14.7281 25.9182 16.3495 26.4392 18.505C27.3939 22.4554 26.6014 26.4211 24.0842 30.3051H22.4333C22.3814 30.3004 22.2861 30.2911 22.1548 30.2738ZM42.9209 30.4995C45.7012 25.2529 45.468 20.6181 44.6736 17.4784C44.3437 16.1752 43.8961 15.0337 43.4405 14.0837C47.9287 14.7566 51.8538 17.171 54.506 20.6148C54.5859 21.3844 54.6812 23.2124 54.1252 25.2838C53.2271 28.6271 51.0701 31.134 47.7081 32.7494C46.3488 31.6336 44.7129 30.8443 42.9209 30.4995ZM50.9071 45.035C51.3916 43.8102 51.658 42.4766 51.658 41.0814C51.658 39.0571 51.0968 37.1619 50.1221 35.5418C54.6565 33.0643 56.6288 29.4682 57.4783 26.6085C57.8634 28.0351 58.0699 29.5341 58.0699 31.0808C58.0699 36.8203 55.2424 41.9117 50.9071 45.035Z" />
                  <path d="M18.7139 16.3081H22.3025V19.8968H18.7139V16.3081Z" />
                </svg></div>Пищевая промышленность
            </a></li>
          <li class="tabs-list__item"><a class="tabs__link" href="#tab-3">
              <div class="tabs__icon-wrapper"><svg class="tabs__icon" width="30" height="62" viewBox="0 0 30 62"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M21.0173 7.94309V0.178711H9.05513V7.94309C3.99778 10.2616 0.681641 15.3549 0.681641 20.9947V55.361C0.681641 56.9848 1.34949 58.5712 2.51376 59.7136C3.66894 60.8469 5.18215 61.4595 6.7785 61.4236C8.35499 61.3935 9.78793 60.7408 10.843 59.7049C11.9232 60.768 13.4044 61.4248 15.0362 61.4248C16.6679 61.4248 18.1491 60.768 19.2294 59.7049C20.2843 60.7408 21.7174 61.3935 23.2938 61.4236C24.8867 61.4515 26.4034 60.8469 27.5586 59.7136C28.7229 58.5712 29.3908 56.9848 29.3908 55.361V20.9948C29.3908 15.3549 26.0747 10.2616 21.0173 7.94309ZM17.4286 3.76735V7.35599H12.6438V3.76735H17.4286ZM11.1746 10.9446H18.8978C23.0391 12.5361 25.8021 16.5372 25.8021 20.9948V21.7105H4.27028V20.9948C4.27028 16.5372 7.03329 12.5361 11.1746 10.9446ZM4.27028 36.0651V32.4765H25.8021V36.0651H4.27028ZM25.8021 39.6537V43.2424H4.27028V39.6537H25.8021ZM4.27028 28.8878V25.2992H25.8021V28.8878H4.27028ZM25.0455 57.1518C24.5945 57.5941 24.0141 57.8361 23.4062 57.8361C23.3916 57.8361 23.377 57.8359 23.3623 57.8357C22.0692 57.8109 21.0173 56.7379 21.0173 55.4437H17.4286C17.4286 56.7629 16.3554 57.8362 15.0362 57.8362C13.717 57.8362 12.6438 56.7629 12.6438 55.4437H9.05513C9.05513 56.7379 8.00318 57.8109 6.71007 57.8357C6.69536 57.8359 6.68077 57.8361 6.66617 57.8361C6.0585 57.8361 5.47774 57.5942 5.027 57.1518C4.54612 56.6802 4.2704 56.0274 4.2704 55.361V46.831H25.8022V55.3611C25.8021 56.0274 25.5264 56.6802 25.0455 57.1518Z" />
                </svg></div>Переработка вторсырья
            </a></li>
          <li class="tabs-list__item"><a class="tabs__link" href="#tab-4">
              <div class="tabs__icon-wrapper"><svg class="tabs__icon" width="56" height="62" viewBox="0 0 56 62"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M55.0058 7.92867C53.6247 6.90052 50.6305 4.92113 46.0957 3.217C40.5832 1.14574 34.5072 0.0957031 28.0356 0.0957031C21.5641 0.0957031 15.488 1.14574 9.97593 3.217C5.44058 4.92113 2.44668 6.90052 1.06553 7.92879L0.342773 8.46685V11.9417L2.32347 11.735C4.45861 11.5123 11.8693 10.8016 21.5312 10.5602V20.7687H23.0343V61.3422H33.037V20.7687H34.5402V10.5602C44.2023 10.8018 51.6129 11.5123 53.7479 11.735L55.7286 11.9417V8.46685L55.0058 7.92867ZM29.4482 57.7534H26.6232V20.7687H29.4482V57.7534ZM32.7782 6.93258L30.9513 6.89968V17.1799H25.1201V6.89968L23.2932 6.93258C17.6215 7.03497 12.6668 7.30077 8.85471 7.57136C13.1246 5.64245 19.5496 3.68448 28.0356 3.68448C36.5212 3.68448 42.9465 5.64245 47.2164 7.57124C43.4044 7.30077 38.4492 7.03509 32.7782 6.93258Z" />
                </svg></div>Горнорудная промышленность
            </a></li>
        </ul>
        <ul class="tabs__content">
          <li class="tabs__item product-group" id="tab-1">
            <h3 class="product-group__title title">Сельское хозяйство</h3>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Зерновые культуры</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="https://fsapsan.ru/sorting-product-item/selskoe-hozyaystvo/zernovye-kultury/pshenitsa/"><span
                      class="product-promo__title">Пшеница</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/1.jpg"
                      alt="фото продукта"></a></li>

                <li class="product-promo"><a class="product-promo__link"
                    href="https://fsapsan.ru/sorting-product-item/selskoe-hozyaystvo/zernovye-kultury/oves/"><span
                      class="product-promo__title">Овес</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/2.jpg"
                      alt="фото продукта"></a></li>

                <li class="product-promo"><a class="product-promo__link"
                    href="https://fsapsan.ru/sorting-product-item/selskoe-hozyaystvo/zernovye-kultury/yachmen-2/"><span
                      class="product-promo__title">Ячмень</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/3.jpg"
                      alt="фото продукта"></a></li>

                <li class="product-promo"><a class="product-promo__link"
                    href="https://fsapsan.ru/sorting-product-item/selskoe-hozyaystvo/zernovye-kultury/kukuruza/"><span
                      class="product-promo__title">Кукуруза</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/4.jpg"
                      alt="фото продукта"></a></li>

                <li class="product-promo"><a class="product-promo__link"
                    href="https://fsapsan.ru/sorting-product-item/selskoe-hozyaystvo/zernovye-kultury/semena-risa/"><span
                      class="product-promo__title">Семена риса</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/5.jpg"
                      alt="фото продукта"></a></li>

                <li class="product-promo"><a class="product-promo__link"
                    href="https://fsapsan.ru/sorting-product-item/selskoe-hozyaystvo/zernovye-kultury/tritikale/"><span
                      class="product-promo__title">Тритикале</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/6.jpg"
                      alt="фото продукта"></a></li>

                <li class="product-promo"><a class="product-promo__link"
                    href="https://fsapsan.ru/sorting-product-item/selskoe-hozyaystvo/zernovye-kultury/polba-2/"><span
                      class="product-promo__title">Полба</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/7.jpg"
                      alt="фото продукта"></a></li>

                <li class="product-promo"><a class="product-promo__link"
                    href="https://fsapsan.ru/sorting-product-item/selskoe-hozyaystvo/zernovye-kultury/rozh/"><span
                      class="product-promo__title">Рожь</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/1/8.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Мелкосемянные и масличные культуры</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="https://fsapsan.ru/sorting-product-item/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/amarant-2/"><span
                      class="product-promo__title">Амарант</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/2/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="https://fsapsan.ru/sorting-product-item/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/raps/"><span
                      class="product-promo__title">Рапс</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/2/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="https://fsapsan.ru/sorting-product-item/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/sorgo/"><span
                      class="product-promo__title">Сорго</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/2/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="https://fsapsan.ru/sorting-product-item/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/gorchitsa/"><span
                      class="product-promo__title">Горчица</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/2/4.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="https://fsapsan.ru/sorting-product-item/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/len/"><span
                      class="product-promo__title">Лен</span> <img class="product-promo__image"
                      src="https://fsapsan.ru/wp-content/uploads/lyon.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="https://fsapsan.ru/sorting_products/selskoe-hozyaystvo/maslichnye-kultury-semena-i-melkosemyannye/kunzhut/"><span
                      class="product-promo__title">Кунжут</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/2/6.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/ryzhik/"><span
                      class="product-promo__title">Рыжик</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/2/7.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/melkosemyannye-i-maslichnye-kultury/timofeevka/"><span
                      class="product-promo__title">Тимофеевка</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/2/8.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Зернобобовые культуры</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/fasol/"><span
                      class="product-promo__title">Фасоль</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/3/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/chechevitsa/"><span
                      class="product-promo__title">Чечевица</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/3/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/goroh/"><span
                      class="product-promo__title">Горох</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/3/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/soya/"><span
                      class="product-promo__title">Соя</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/3/4.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/vika/"><span
                      class="product-promo__title">Вика</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/3/5.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/lyupin/"><span
                      class="product-promo__title">Люпин</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/3/6.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/nut/"><span
                      class="product-promo__title">Нут</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/3/7.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/zernobobovye-kultury/mash/"><span
                      class="product-promo__title">Маш</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/3/8.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Крупы</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/grechnevaya/"><span
                      class="product-promo__title">Гречневая</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/4/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/perlovaya/"><span
                      class="product-promo__title">Перловая</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/4/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/yachmennaya/"><span
                      class="product-promo__title">Ячменная</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/4/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/pshenichnaya/"><span
                      class="product-promo__title">Пшеничная</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/4/4.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/pshyonnaya/"><span
                      class="product-promo__title">Пшенная</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/4/5.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/risovaya/"><span
                      class="product-promo__title">Рисовая</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/4/6.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/kukuruznaya/"><span
                      class="product-promo__title">Кукурузная</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/4/7.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/selskoe-hozyaystvo/krupy/ovsyanaya/"><span
                      class="product-promo__title">Овсяная</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/1/4/8.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>
          </li>
          <li class="tabs__item" id="tab-2">
            <h3 class="product-group__title title">Пищевая промышленность</h3>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Орехи</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi/funduk/"><span
                      class="product-promo__title">Фундук</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/1/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi/mindal/"><span
                      class="product-promo__title">Миндаль</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/1/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi/fistashka/"><span
                      class="product-promo__title">Фисташка</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/1/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi/arahis/"><span
                      class="product-promo__title">Арахис</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/1/4.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi/keshyu/"><span
                      class="product-promo__title">Кешью</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/1/5.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi/gretskiy-oreh/"><span
                      class="product-promo__title">Грецкий орех</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/1/6.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi/pekan/"><span
                      class="product-promo__title">Пекан</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/1/7.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/orehi/kedrovyy-oreh/"><span
                      class="product-promo__title">Кедровый орех</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/1/8.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Замороженные продукты</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/zamorozhennye-produkty/klyukva/"><span
                      class="product-promo__title">Клюква</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/2/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/zamorozhennye-produkty/chernika/"><span
                      class="product-promo__title">Черника</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/2/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/zamorozhennye-produkty/malina/"><span
                      class="product-promo__title">Малина</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/2/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/zamorozhennye-produkty/ezhevika/"><span
                      class="product-promo__title">Ежевика</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/2/4.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/zamorozhennye-produkty/smorodina/"><span
                      class="product-promo__title">Смородина</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/2/5.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/zamorozhennye-produkty/klubnika/"><span
                      class="product-promo__title">Клубника</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/2/6.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/zamorozhennye-produkty/goroshek/"><span
                      class="product-promo__title">Горошек</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/2/7.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/zamorozhennye-produkty/kukuruza-zamorozhennye-produkty/"><span
                      class="product-promo__title">Кукуруза</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/2/8.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Сушеные овощи и фрукты</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushenye-ovoschi-i-frukty/yabloki/"><span
                      class="product-promo__title">Яблоки</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/3/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushenye-ovoschi-i-frukty/kuraga/"><span
                      class="product-promo__title">Курага</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/3/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushenye-ovoschi-i-frukty/chernosliv/"><span
                      class="product-promo__title">Чернослив</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/3/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushenye-ovoschi-i-frukty/izyum/"><span
                      class="product-promo__title">Изюм</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/3/4.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushenye-ovoschi-i-frukty/inzhir/"><span
                      class="product-promo__title">Инжир</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/3/5.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushenye-ovoschi-i-frukty/finiki/"><span
                      class="product-promo__title">Финики</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/3/6.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushenye-ovoschi-i-frukty/shipovnik/"><span
                      class="product-promo__title">Шиповник</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/3/7.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushenye-ovoschi-i-frukty/vishnya/"><span
                      class="product-promo__title">Вишня</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/3/8.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushenye-ovoschi-i-frukty/svekla/"><span
                      class="product-promo__title">Свекла</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/3/9.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushenye-ovoschi-i-frukty/perets/"><span
                      class="product-promo__title">Перец</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/3/10.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushenye-ovoschi-i-frukty/morkov/"><span
                      class="product-promo__title">Морковь</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/3/11.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sushenye-ovoschi-i-frukty/tomaty/"><span
                      class="product-promo__title">Томаты</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/3/12.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Морепродукты</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/moreprodukty/krivetki/"><span
                      class="product-promo__title">Креветки</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/4/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/moreprodukty/midii/"><span
                      class="product-promo__title">Мидии</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/4/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/moreprodukty/kalmary/"><span
                      class="product-promo__title">Кальмары</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/4/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/moreprodukty/zamorozhennaya-ryba/"><span
                      class="product-promo__title">Замороженная рыба</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/4/4.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>

            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Консервы и полуфабрикаты</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/konservy-i-polufabrikaty/pelmeni/"><span
                      class="product-promo__title">Пельмени</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/5/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/konservy-i-polufabrikaty/vareniki/"><span
                      class="product-promo__title">Вареники</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/5/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/konservy-i-polufabrikaty/rybnye-i-myasnye-konservy/"><span
                      class="product-promo__title">Рыбные и мясные консервы</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/5/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/konservy-i-polufabrikaty/poroshkovoe-moloko-i-detskoe-pitanie/"><span
                      class="product-promo__title">Порошковое молоко и детское питание</span> <img
                      class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/5/4.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>


            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Кофе, чай, какао бобы</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/kofe-chay/zelyonyy-kofe/"><span
                      class="product-promo__title">Зеленый кофе</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/6/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/kofe-chay/obzharennyy-kofe/"><span
                      class="product-promo__title">Обжаренный кофе</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/6/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/kofe-chay/zelyonyy-chay/"><span
                      class="product-promo__title">Зеленый чай</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/6/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/kofe-chay/chyornyy-chay/"><span
                      class="product-promo__title">Черный чай</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/6/4.jpg"
                      alt="фото продукта"></a></li>
                      <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/kofe-chay/kakao-boby/"><span
                      class="product-promo__title">Какао бобы</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/6/5.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Специи</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/spetsii/mayoran/"><span
                      class="product-promo__title">Майоран</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/7/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/spetsii/lavrovyy-list/"><span
                      class="product-promo__title">Лавровый лист</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/7/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/spetsii/rozmarin/"><span
                      class="product-promo__title">Розмарин</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/7/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/spetsii/shafran/"><span
                      class="product-promo__title">Шафран</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/7/4.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/spetsii/oregano/"><span
                      class="product-promo__title">Орегано</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/7/5.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/spetsii/tmin/"><span
                      class="product-promo__title">Тмин</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/7/6.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/spetsii/gvozdika/"><span
                      class="product-promo__title">Гвоздика</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/7/7.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/spetsii/perets-molotyy/"><span
                      class="product-promo__title">Перец молотый</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/7/8.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Снэки</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sneki/semechki/"><span
                      class="product-promo__title">Семечки</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/8/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sneki/suhariki/"><span
                      class="product-promo__title">Сухарики</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/8/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sneki/chipsy/"><span
                      class="product-promo__title">Чипсы</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/8/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sneki/popkorn/"><span
                      class="product-promo__title">Попкорн</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/8/4.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sneki/hlopya-i-gotovye-zavtraki/"><span
                      class="product-promo__title">Хлопья и готовые завтраки</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/8/5.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sneki/kartoshka-fri/"><span
                      class="product-promo__title">Картошка фри</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/8/6.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sneki/kukuruznye-palochki/"><span
                      class="product-promo__title">Кукурузные палочки</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/8/7.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pischevaya-promyshlennost/sneki/kashtany/"><span
                      class="product-promo__title">Каштаны</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/2/8/8.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>
          </li>
          <li class="tabs__item" id="tab-3">
            <h3 class="product-group__title title">Переработка вторсырья</h3>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Пластик</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/plastik/pet-fleks-i-granuly/"><span
                      class="product-promo__title">ПЭТ
                      флекс и гранулы</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/1/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/plastik/pvh/"><span
                      class="product-promo__title">ПВХ</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/1/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/plastik/polipropilen/"><span
                      class="product-promo__title">Полипропилен</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/1/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/plastik/polistirol/"><span
                      class="product-promo__title">Полистирол</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/1/4.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/plastik/abs/"><span
                      class="product-promo__title">АБС</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/1/5.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/plastik/polietilen-nizkoy-i-vysokoy-plotnosti/"><span
                      class="product-promo__title">Полиэтилен низкой и высокой
                      плотности</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/1/6.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Пластмассы</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/plastmassy/polikarbonat/"><span
                      class="product-promo__title">Поликарбонат</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/2/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/plastmassy/poliamid/"><span
                      class="product-promo__title">Полиамид</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/2/2.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Стеклобой</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/stekloboy/tsvetnoe-steklo/"><span
                      class="product-promo__title">Цветное стекло</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/3/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/stekloboy/mutnoe-i-prozrachnoe-steklo/"><span
                      class="product-promo__title">Мутное и прозрачное стекло</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/3/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/stekloboy/krupnye-i-melkie-fraktsii/"><span
                      class="product-promo__title">Крупные и мелкие фракции</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/3/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/stekloboy/steklo-i-keramika/"><span
                      class="product-promo__title">Стекло и керамика</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/3/4.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/stekloboy/steklo-i-kamni/"><span
                      class="product-promo__title">Стекло и камни</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/3/5.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>
            <!-- <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Бумага, картон</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/bumaga-karton/gazetnaya/"><span
                      class="product-promo__title">Газетная бумага</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/4/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/bumaga-karton/ofsetnaya/"><span
                      class="product-promo__title">Офсетная бумага</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/4/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/bumaga-karton/karton/"><span
                      class="product-promo__title">Картон</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/4/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/bumaga-karton/tsvetnaya/"><span
                      class="product-promo__title">Цветная бумага</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/4/4.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/pererabotka-vtorsyrya/bumaga-karton/belaya/"><span
                      class="product-promo__title">Белая бумага</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/3/4/5.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div> -->
          </li>
          <li class="tabs__item" id="tab-4">
            <h3 class="product-group__title title">Горнорудная промышленность</h3>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Драгоценные камни</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/dragotsennye-kamni/yantar/"><span
                      class="product-promo__title">Янтарь</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/4/1/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/dragotsennye-kamni/almaz/"><span
                      class="product-promo__title">Алмаз</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/4/1/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/dragotsennye-kamni/rubin/"><span
                      class="product-promo__title">Рубин</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/4/1/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/dragotsennye-kamni/izumrud/"><span
                      class="product-promo__title">Изумруд</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/4/1/4.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Полудрагоценные камни</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/poludragotsennye-kamni/granat/"><span
                      class="product-promo__title">Гранат</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/4/2/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/poludragotsennye-kamni/akvamarin/"><span
                      class="product-promo__title">Аквамарин</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/4/2/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/poludragotsennye-kamni/ametist/"><span
                      class="product-promo__title">Аметист</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/4/2/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/poludragotsennye-kamni/topaz/"><span
                      class="product-promo__title">Топаз</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/4/2/4.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Минералы</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/mineraly/berilly/"><span
                      class="product-promo__title">Бериллы</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/4/3/1.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/mineraly/kvarts/"><span
                      class="product-promo__title">Кварц</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/4/3/2.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/mineraly/korund/"><span
                      class="product-promo__title">Корунд</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/4/3/3.jpg"
                      alt="фото продукта"></a></li>
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/mineraly/gornyy-hrustal/"><span
                      class="product-promo__title">Горный хрусталь</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/4/3/4.jpg"
                      alt="фото продукта"></a></li>
              </ul>
            </div>
            <div class="product-group__wrapper">
              <h4 class="product-group__subtitle title">Металлы (фракции)</h4>
              <ul class="tabs__sub-list">
                <li class="product-promo"><a class="product-promo__link"
                    href="<?php echo get_home_url(); ?>/sorting_products/gornorudnaya-promyshlennost/metally-fraktsii/metally/"><span
                      class="product-promo__title">Металлы</span> <img class="product-promo__image"
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/products/catalog/4/4/1.jpg"
                      alt="фото продукта"></a></li>
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
          <img class="consultant__picture" src="<?php the_field('plumber_photography');?>" alt="Фото сантехника">

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