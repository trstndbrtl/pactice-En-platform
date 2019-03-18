// Add link element
var wrapper = document.getElementById('een-main');
// Add load before load
var loadVerb = axios.create({
    method: 'get',
    responseType: 'stream',
    data: 'request-verb',
});
// add interceptors for callback function
loadVerb.interceptors.request.use(function (config) {
    if (config.data = "request-verb") {
        wrapper.removeChild(wrapper.firstChild);
        wrapper.innerHTML = '<div class="uk-width-1-1 uk-height-1-1 uk-inline"><div class="uk-position-center uk-overlay"><div uk-spinner></div></div></div>';
    }
    return config;
}, function (error) {
    return Promise.reject(error);
});

// Add fonction to sidebar link verb
document.body.addEventListener('click', function (evt) {
    if (evt.target.parentElement.classList.contains('mm-load-page')) {
        evt.preventDefault();
        let url = evt.target.parentElement.attributes.dataurl.nodeValue;
        let name = evt.target.parentElement.attributes.dataname.nodeValue;
        loadVerb.get(url)
            .then(function (response) {
                wrapper.innerHTML = response.data;
                var stateObj = { foo: name };
                document.title = name + " Verb | eEnglish";
                history.pushState(stateObj, name, name);
            })
            .catch(function (error) {
                console.log('error');
            });
    }
}, false);