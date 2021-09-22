/**
 * Example:
 *
 * If you want to exclude admin-bars height from the calculation
 * data-intersects="admin-bar"
 *
 * If you just want to go from the top of the viewport
 * data-intersects
 *
 * To specify a margin
 * data-intersects="top right bottom left"
 */
(function(){
    document.querySelectorAll('[data-intersects]')
        .forEach((element) => {

            let rootMargin = '0px';
            if(element.dataset.intersects !== ''){

                //If the data attribute is set to admin-bar we're taking the variable containing the admin bar height
                rootMargin = element.dataset.intersects === 'admin-bar'
                    ? `-${getComputedStyle(element).getPropertyValue('--admin-bar-height')} 0px 0px 0px`
                    : element.dataset.intersects;
            }

            //intersection observer is used to see if elements are intersecting
            //@see https://developer.mozilla.org/en-US/docs/Web/API/Intersection_Observer_API
            const observer = new window.IntersectionObserver((entries) => {

                //entries is an array of observed dom nodes
                //we're only interested in the first one at [0]
                if (entries[0].isIntersecting) {
                    element.classList.add('intersecting')
                } else {
                    element.classList.remove('intersecting')
                }

            }, {
                //if null this is assumed to be the viewport element
                root: null,

                //offset from the edge of the container to where it should intersect
                rootMargin: rootMargin,

                //how much of the element must be visible for it to be intersecting
                threshold: 1
            })

            // give the observer some dom nodes to keep an eye on
            observer.observe(element)
        })
})();