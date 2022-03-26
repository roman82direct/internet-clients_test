document.addEventListener('DOMContentLoaded', function() {

    let modalButtons = document.querySelectorAll('.openModal'),
        overlay      = document.querySelector('#overlay'),
        closeButtons = document.querySelectorAll('.modalClose');

    modalButtons.forEach(function(item){

        item.addEventListener('click', function(e) {
            e.preventDefault();

            let modalId = this.getAttribute('data-modal'),
                modalElem = document.querySelector('.modal[data-modal="' + modalId + '"]');

            modalElem.classList.add('active');
            overlay.classList.add('active');
        });
    });

    closeButtons.forEach(function(item){
        item.addEventListener('click', function(e) {
            let parentModal = this.closest('.modal');

            parentModal.classList.remove('active');
            overlay.classList.remove('active');
        });
    });

    overlay.addEventListener('click', function() {
        document.querySelector('.modal.active').classList.remove('active');
        this.classList.remove('active');
    });

    // Show tree of etinities

    let mainPlus = document.querySelectorAll('.mainPlus')
    let secondPlus = document.querySelectorAll('.secondPlus')

    mainPlus.forEach(function(item){

        item.addEventListener('click', function(e) {
            e.preventDefault();

            let id = this.getAttribute('data-id')
            let secondList = document.querySelectorAll('.secondList[data-target=second_' + id + ']');

                secondList.forEach(function (item){
                    item.classList.remove('hidden')
                    item.classList.add('show');
                })
       });
    });

    secondPlus.forEach(function (item) {
        item.addEventListener('click', function(e) {
            e.preventDefault();

            let id = this.getAttribute('data-id')
            let goodList = document.querySelectorAll('.goodList[data-target=good_' + id + ']');

            goodList.forEach(function (item){
                item.classList.remove('hidden')
                item.classList.add('show');
            })
        });
    })

    // Show descriptions
    let mainListName = document.querySelectorAll('.mainListName')
    let secondListName = document.querySelectorAll('.secondListName')
    let goodName = document.querySelectorAll('.goodName')

    function addShow(item, blockName){
        return item.forEach(function (item) {
                item.addEventListener('click', function(e) {
                e.preventDefault();

                let id = this.getAttribute('data-id')
                let descr = document.querySelector(blockName + id);
                descr.classList.remove('hidden')
                descr.classList.add('show');
            });
        })
    }

    addShow(mainListName, '#descrMainBlock_')
    addShow(secondListName, '#descrSecondBlock_')
    addShow(goodName, '#descrGoodBlock_')
});

document.body.addEventListener('keyup', function (e) {
    var key = e.keyCode;

    if (key == 27) {
        document.querySelector('.modal.active').classList.remove('active');
        document.querySelector('#overlay.active').classList.remove('active');
    };
}, false);
