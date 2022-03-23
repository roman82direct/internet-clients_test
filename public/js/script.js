document.addEventListener('DOMContentLoaded', function() {

    var modalButtons = document.querySelectorAll('.openModal'),
        overlay      = document.querySelector('#overlay'),
        closeButtons = document.querySelectorAll('.modalClose');

    modalButtons.forEach(function(item){

        item.addEventListener('click', function(e) {
            e.preventDefault();

            var modalId = this.getAttribute('data-modal'),
                modalElem = document.querySelector('.modal[data-modal="' + modalId + '"]');

            modalElem.classList.add('active');
            overlay.classList.add('active');
        });
    });

    closeButtons.forEach(function(item){
        item.addEventListener('click', function(e) {
            var parentModal = this.closest('.modal');

            parentModal.classList.remove('active');
            overlay.classList.remove('active');
        });

    });
});
