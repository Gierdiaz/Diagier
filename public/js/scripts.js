var usernameToggle = document.getElementById('usernameToggle');
var dropdownMenu = document.getElementById('dropdownMenu');

usernameToggle.addEventListener('click', function (event) {
    dropdownMenu.style.display = 'block';
    event.stopPropagation();
});

document.addEventListener('click', function (event) {
    var isClickInside = usernameToggle.contains(event.target) || dropdownMenu.contains(event.target);
    if (!isClickInside) {
        dropdownMenu.style.display = 'none';
    }
});