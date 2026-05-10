const menuDialog = document.querySelector('#site-menu-dialog');
const openMenuButton = document.querySelector('.js-menu-open');
const closeMenuButton = document.querySelector('.js-menu-close');

if (menuDialog && openMenuButton && closeMenuButton) {
  const openMenu = () => {
    if (typeof menuDialog.showModal === 'function') {
      menuDialog.showModal();
    } else {
      menuDialog.setAttribute('open', '');
    }

    document.body.classList.add('has-open-menu');
  };

  const closeMenu = () => {
    menuDialog.close();
    document.body.classList.remove('has-open-menu');
  };

  openMenuButton.addEventListener('click', openMenu);
  closeMenuButton.addEventListener('click', closeMenu);

  menuDialog.addEventListener('click', (event) => {
    if (event.target === menuDialog) {
      closeMenu();
    }
  });

  menuDialog.addEventListener('close', () => {
    document.body.classList.remove('has-open-menu');
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && menuDialog.open) {
      closeMenu();
    }
  });
}
