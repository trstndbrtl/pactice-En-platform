var loadMore = axios.create({
    method: 'get',
    responseType: 'stream',
    data: 'request-load-more-lis-verb',
});

document.body.addEventListener('click', function (evt) {
    if (evt.target.classList.contains('load-more-verb')) {
        evt.preventDefault();
        let one = evt.target.attributes.dataregular.nodeValue;;
        let wrapper = document.getElementById('mm-sidebar-' + one + '-wrapper-element');
        let url = evt.target.attributes.dataurl.nodeValue;
        evt.target.remove();
        wrapper.insertAdjacentHTML('beforeend', '<div id="load-data-space" style="min-height:45px;">');
        loadMore.get(url)
            .then(function (response) {
                wrapper.insertAdjacentHTML('beforeend', response.data);
                let loader = document.getElementById('load-data-space');
                loader.remove();
            })
            .catch(function (error) {
                console.log('error');
            });
    }
}, false);