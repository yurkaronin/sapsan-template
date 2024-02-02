document.addEventListener('DOMContentLoaded', function () {

  // Инициализация MicroModal и предотвращение стандартного поведения для data-custom-open
  MicroModal.init({
    openTrigger: 'data-custom-open',
    closeTrigger: 'data-custom-close',
    disableScroll: true,
    disableFocus: true,
    awaitOpenAnimation: true,
    awaitCloseAnimation: true
  });

  document.querySelectorAll('[data-custom-open="modal-search"]').forEach(element => {
    element.addEventListener('click', event => event.preventDefault());
  });

  // Применение маски к телефонным номерам (если jQuery доступен)
  if (window.jQuery) {
    jQuery('input[type="tel"]').mask('+7 (999) 999-99-99');
  }

  // Скрытие пустых SEO-блоков
  document.querySelectorAll('.seo-block__text').forEach(block => {
    if (block.textContent.trim() === "") {
      const parentSeoBlock = block.closest('.seo-block');
      if (parentSeoBlock) parentSeoBlock.style.display = 'none';
    }
  });

  // Добавление ссылки в меню, если ширина окна больше 991px
  if (window.innerWidth > 991) {
    const menuLink = document.querySelector('.js-catalog-menu-link');
    if (menuLink) {
      const newLink = document.createElement('a');
      newLink.className = 'custom__search-link';
      newLink.href = '/poisk-po-saytu/';
      newLink.setAttribute('data-custom-open', 'modal-search');
      menuLink.insertAdjacentElement('afterend', newLink);
    }
  }

  // Обработка клика на кнопку викторины
  const quizButton = document.querySelector('.cust-llink-quize');
  if (quizButton && typeof Marquiz !== 'undefined') {
    quizButton.addEventListener('click', () => Marquiz.showModal('5fe1e49c48c41b004c11a1a0'));
  }

  MicroModal.init({
    openTrigger: 'data-custom-open',
    closeTrigger: 'data-custom-close',
    disableScroll: true,
    disableFocus: true,
    awaitOpenAnimation: true,
    awaitCloseAnimation: true
  });

  console.log(MicroModal);

});
