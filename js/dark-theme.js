$('#sun').on('click', () => {
    document.getElementById('moon').classList.remove('is-active');
    document.getElementById('sun').classList.add('is-active');
    changeCSS('https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css', 0);
});
$('#moon').on('click', () => {
    document.getElementById('sun').classList.remove('is-active');
    document.getElementById('moon').classList.add('is-active');
    changeCSS('https://jenil.github.io/bulmaswatch/superhero/bulmaswatch.min.css', 0);
});
function changeCSS(cssFile, cssLinkIndex) {

    var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);

    var newlink = document.createElement("link");
    newlink.setAttribute("rel", "stylesheet");
    newlink.setAttribute("type", "text/css");
    newlink.setAttribute("href", cssFile);

    document.getElementsByTagName("head").item(cssLinkIndex).replaceChild(newlink, oldlink);
}