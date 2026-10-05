import './bootstrap';

const setTheme = (dark) => {
    document.documentElement.classList.toggle('dark', dark);
    document.querySelectorAll('[data-theme-icon]').forEach((icon) => {
        icon.classList.toggle('hidden', icon.dataset.themeIcon !== (dark ? 'dark' : 'light'));
    });
    document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
        button.setAttribute('aria-label', dark ? 'Activar modo claro' : 'Activar modo oscuro');
        button.setAttribute('title', dark ? 'Activar modo claro' : 'Activar modo oscuro');
    });
    document.querySelectorAll('[data-theme-image-light]').forEach((image) => {
        image.src = dark ? image.dataset.themeImageDark : image.dataset.themeImageLight;
    });
    document.querySelectorAll('[data-theme-background-light]').forEach((section) => {
        const background = dark ? section.dataset.themeBackgroundDark : section.dataset.themeBackgroundLight;
        section.style.backgroundImage = `url("${background}")`;
    });
};

let darkTheme = document.documentElement.classList.contains('dark');
try {
    darkTheme = localStorage.getItem('theme') === 'dark';
} catch (error) {}
setTheme(darkTheme);

document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
    button.addEventListener('click', () => {
        darkTheme = !darkTheme;
        setTheme(darkTheme);
        try {
            localStorage.setItem('theme', darkTheme ? 'dark' : 'light');
        } catch (error) {}
    });
});

document.querySelectorAll('[data-mobile-menu-toggle]').forEach((button) => {
    const menu = document.getElementById(button.getAttribute('aria-controls'));
    if (!menu) return;

    button.addEventListener('click', () => {
        const isOpen = button.getAttribute('aria-expanded') !== 'true';
        button.setAttribute('aria-expanded', String(isOpen));
        button.setAttribute('aria-label', isOpen ? 'Cerrar menú' : 'Abrir menú');
        menu.classList.toggle('hidden', !isOpen);
        button.querySelector('[data-menu-icon="open"]').classList.toggle('hidden', isOpen);
        button.querySelector('[data-menu-icon="close"]').classList.toggle('hidden', !isOpen);
    });
});
