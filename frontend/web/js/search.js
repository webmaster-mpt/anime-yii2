let searchInput = document.querySelector('.searchInput')
    formItem = document.querySelectorAll('.m-card');

searchInput.oninput = function () {
    $('.group-block').animate({
        'top':'-250px'
    }, 500,function () {
        let val = searchInput.value.trim().toLowerCase();
        if (val != '') {
            formItem.forEach(function (elC) {
                if (elC.innerText.toLowerCase().search(val) != -1) {
                    elC.classList.remove('hidden');
                } else {
                    elC.classList.add('hidden');
                }
            });
        } else {
            formItem.forEach(function (el) {
                el.classList.add('hidden');
            });
            $('.group-block').animate({
                'top':'0'
            },500);
        }
    });
}