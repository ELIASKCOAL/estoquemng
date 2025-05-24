// Theme management
const themeSwitch = document.getElementById('theme-switch');
const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');

// Function to set theme
function setTheme(isDark) {
    document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'light');
    themeSwitch.checked = isDark;
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
}

// Initialize theme
function initTheme() {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        setTheme(savedTheme === 'dark');
    } else {
        setTheme(prefersDarkScheme.matches);
    }
}

// Event listeners
themeSwitch.addEventListener('change', (e) => setTheme(e.target.checked));
prefersDarkScheme.addEventListener('change', (e) => {
    if (!localStorage.getItem('theme')) {
        setTheme(e.matches);
    }
});

// Initialize on load
document.addEventListener('DOMContentLoaded', initTheme); 