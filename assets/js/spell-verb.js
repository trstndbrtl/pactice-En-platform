// Add link element
// var wrapper = document.getElementById('een-main');
// Add fonction to sidebar link verb
document.body.addEventListener('click', function (evt) {
    if (evt.target.parentElement.classList.contains('speech-synth')) {
        evt.preventDefault();
        var el = evt.target.parentNode;
        var elTarget = evt.target.parentNode.getAttribute("data-temps");
        var loop = evt.target.parentNode.getAttribute("data-loop");
        var text = evt.target.parentElement.innerText;
        // Run process
        drawTextInPanel(el, text, 'en-US', elTarget, loop);
    }
    if (evt.target.parentElement.classList.contains('speech-synth-all')) {
        evt.preventDefault();
        var el = evt.target.parentNode;
        var elTarget = evt.target.parentNode.getAttribute("data-temps");
        var loop = evt.target.parentNode.getAttribute("data-loop");
        var text = evt.target.parentElement.innerText;
        // Run process
        drawTextInPanel(el, text, 'en-US', elTarget, loop);
    }
}, false);

function drawTextInPanel(el, text, locale, elTarget, loop) {
    // prepare SpeechSynthesisUtterance
    var msg = new SpeechSynthesisUtterance();
    // Store the voice and config
    var voices = window.speechSynthesis.getVoices();
    msg.voice = voices[voices];
    msg.rate = 6 / 10;
    msg.pitch = 1;
    msg.text = text;
    msg.lang = locale;

    // process all world
    msg.onboundary = function (event) {

        let word = text
        str = String(word);
        pos = Number(event.charIndex) >>> 0;

        // Search for the word's beginning and end.
        var left = str.slice(0, pos + 1).search(/\S+$/),
            right = str.slice(pos).search(/\s/);

        // The last word in the string is a special case.
        if (right < 0) {
            word = str.slice(left);
        } else {
            word = str.slice(left, right + pos);
        }

        if (el) {
            // Run all world to find highlighted element
            for (i = 0; i < el.children.length; i++) {
                let heighlightTed = el.children[i].dataset.elword.toLowerCase();
                let ItemDataAttr = word.toLowerCase() + '-' + loop;
                if (heighlightTed === ItemDataAttr) {
                    el.children[i].classList.add("world-hightlight");
                } else {
                    el.children[i].classList.remove("world-hightlight");
                }
            }
        }
    }
    // Remove class hightlighted on finish 
    msg.onend = function (ep) {
        var n = el.innerText.split(" ");
        el.children[n.length - 1].classList.remove("world-hightlight");
    };
    // Run the speak
    speechSynthesis.speak(msg);
}