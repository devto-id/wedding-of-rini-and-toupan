function handleClick(selectedClass) {
    var elements = document.querySelectorAll(selectedClass);

    document.querySelectorAll('.line').forEach(function (line) {
        line.classList.remove('w-24');
        line.classList.add('w-0');
    });

    var clickedElement = event.currentTarget;
    var clickedLine = clickedElement.querySelector('.line');
    clickedLine.classList.remove('w-0');
    clickedLine.classList.add('w-24');
};
window.addEventListener('scroll', function () {
    var quotes = document.getElementById('quotes');
    var couple = document.getElementById('couple');
    var jumbotron = document.getElementById('jumbotron');
    var navbar = document.getElementById('myNavbar');
    var isPastJumbotron = window.scrollY > jumbotron.offsetHeight;
    var isPastCouple = window.scrollY > (jumbotron.offsetHeight + quotes.offsetHeight + couple.offsetHeight);
    var isPastGallery = window.scrollY > (jumbotron.offsetHeight + quotes.offsetHeight + couple.offsetHeight + gallery.offsetHeight);
    
    if (isPastGallery) {
        navbar.classList.add('text-white');
    } else if (isPastCouple) {
        navbar.classList.remove('text-white');
    } else if (isPastJumbotron) {
        navbar.classList.add('text-white');
    } else {
        navbar.classList.remove('text-white');
    }
});
window.addEventListener('scroll', function () {
    var jumbotron = document.getElementById('jumbotron');
    var quotes = document.getElementById('quotes');
    var couple = document.getElementById('couple');
    var gallery = document.getElementById('gallery');
    var isPastJumbotron = window.scrollY > jumbotron.offsetHeight;
    var isPastCouple = window.scrollY > (jumbotron.offsetHeight + quotes.offsetHeight + couple.offsetHeight);
    var isPastGallery = window.scrollY > (jumbotron.offsetHeight + quotes.offsetHeight + couple.offsetHeight + gallery.offsetHeight);
    document.querySelectorAll('.line').forEach(function (line) {
        if(isPastGallery) {
            line.classList.remove('bg-cyan-600');
            line.classList.add('bg-white');
        } else if (isPastCouple) {
            line.classList.remove('bg-white');
            line.classList.add('bg-cyan-600');
        } else if (isPastJumbotron) {
            line.classList.remove('bg-cyan-600');
            line.classList.add('bg-white');
        } else {
            line.classList.add('bg-cyan-600');
            line.classList.remove('bg-white');
        }
    });
});

function copyRekening(elementId) {
    const rekElement = document.getElementById(elementId);
    const rekText = rekElement.innerText;
  
    navigator.clipboard.writeText(rekText)
      .then(() => {
        alert('Nomor rekening berhasil disalin!');
      })
      .catch((error) => {
        alert('Gagal menyalin nomor rekening: ' + error);
      });
  };



// window.onscroll = function(){
//     document.querySelectorAll('.line').forEach(function (line) {
//         var isPastJumbotron = document.getElementById('jumbotron');
//         var isPastQuotes = document.getElementById('quotes');
//     if (window.pageYOffset > isPastJumbotron) {
//         line.classList.add('bg-cyan-600');
//         line.classList.remove('bg-white');
//     }
    
//     if (window.pageYOffset > isPastQuotes) {
//         line.classList.remove('bg-cyan-600');
//         line.classList.add('bg-white');
//     }
//     });
// };