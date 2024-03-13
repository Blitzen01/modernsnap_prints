document.addEventListener('click', function(e) {
    var sidebar = document.getElementById('sidebar');
    var toggle = document.getElementById('toggle');

    if (!sidebar.contains(e.target) && e.target.id !== 'toggle') {
        sidebar.classList.remove('show');
        toggle.setAttribute('aria-expanded', 'false');
    }
});
