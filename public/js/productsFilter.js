const cards = document.querySelectorAll('.prod');
const products = document.querySelectorAll('.productName');
const msg = document.querySelector('#not-found');
const container = document.querySelectorAll('#prods prod');


function toggleState(elem) {
    var display = elem.style.display;
    if (display == "none") {
        elem.style.display = 'block';
    } else {
        elem.style.display = 'none';
    }
}

function isAllHide(elem) {
    elem.forEach((e) => {
        if(e.style.display == 'block'){
            return false
        }
    });

    return true
}

function productsFilter() {
    text = document.querySelector('#inputFilter').value;
    size = document.querySelectorAll('.prod').length;

    if(isAllHide(cards)){
        msg.style.display = 'block';
    }

    cards.forEach((elem) => {
        elem.style.display = 'none';
    });

    products.forEach((elem, index) => {
        if (elem.innerText.indexOf(text) !== -1) {
            toggleState(cards[index]);
            msg.style.display = 'none';
        }
    });
}