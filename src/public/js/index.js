const imgDisplay = document.getElementById('display_poarta');
const imgOptions = document.getElementById('select_poarta');

function updateImage(e) {
    imgDisplay.src = `src/public/assets/${e.target.value}.jpg`
}

//onchange of the img options update the img display src to the selected image
imgOptions.addEventListener('change', updateImage)