function changeBackground(imageName) {
    document.body.style.backgroundImage = 'url(' + imageName + ')';
    document.body.style.backgroundSize = 'cover';
}

function restoreBackground() {
    document.body.style.backgroundImage = '';
    document.body.style.backgroundSize = '';
}