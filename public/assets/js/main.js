
/* Unico Hospital HMS — Shared JavaScript */

// Theme toggle
const themeBtn = document.getElementById('themeToggle');
const html = document.documentElement;

function applyTheme(dark) {
  html.setAttribute('data-theme', dark ? 'dark' : 'light');
  if (themeBtn) {
    themeBtn.innerHTML = dark ? '<i class="bi bi-sun-fill"></i>' : '<i class="bi bi-moon-fill"></i>';
  }
}

const savedTheme = localStorage.getItem('hms-theme') === 'dark';
applyTheme(savedTheme);

if (themeBtn) {
  themeBtn.addEventListener('click', () => {
    const isDark = html.getAttribute('data-theme') === 'dark';
    localStorage.setItem('hms-theme', isDark ? 'light' : 'dark');
    applyTheme(!isDark);
  });
}

// Sidebar toggle (mobile)
const sidebarToggle = document.getElementById('sidebarToggle');
const sidebar = document.getElementById('sidebar');
if (sidebarToggle && sidebar) {
  sidebarToggle.addEventListener('click', () => sidebar.classList.toggle('open'));
  document.addEventListener('click', (e) => {
    if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
      sidebar.classList.remove('open');
    }
  });
}

// Bootstrap button group toggle
document.querySelectorAll('.btn-group .btn-outline-primary').forEach(btn => {
  btn.addEventListener('click', function () {
    this.closest('.btn-group').querySelectorAll('.btn').forEach(b => b.classList.remove('active'));
    this.classList.add('active');
  });
});
