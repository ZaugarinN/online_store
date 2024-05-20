document.getElementById('catalog-link').addEventListener('click', function(event) {
    event.preventDefault(); // Чтобы предотвратить переход по ссылке
    var dropdown = document.getElementById('catalog-dropdown');
    if (dropdown.style.display === 'none' || dropdown.style.display === '') {
        dropdown.style.display = 'block';
    } else {
        dropdown.style.display = 'none';
    }
});