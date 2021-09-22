(function(){
    document.querySelectorAll('[data-toggle]')
        .forEach((element) => {

            let toggleElement = document.querySelector(element.dataset.toggle);

            element.addEventListener('click', (event) => {

                if(toggleElement.classList.contains('active')){
                    element.classList.remove('active');
                    toggleElement.classList.remove('active');
                } else {
                    element.classList.add('active');
                    toggleElement.classList.add('active');
                }

            })

        })
})();
