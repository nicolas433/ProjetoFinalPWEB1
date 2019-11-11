const cards = document.querySelectorAll('.prod');
const products = document.querySelectorAll('.productName');

function toggleState(elem) {
    var display = elem.style.display;
    if (display == "none") {
        elem.style.display = 'block';
    } else {
        elem.style.display = 'none';
    }
}

function productsFilter() {
    text = document.querySelector('#inputFilter').value;

    cards.forEach((elem) => {
        toggleState(elem);
    });

    products.forEach((elem, index) => {
        if (elem.innerText.indexOf(text) !== -1) {
            toggleState(cards[index]);
        }
    });
}