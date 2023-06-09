
// ______suggetion_____________________________________________________

 
var swiper = new Swiper(".slide-content", {

  slidesPerView: 4,
  spaceBetween: 45,
  loop: true,
  centerSlide: 'true',
  fade: 'true',
  grabCursor: 'true',
 
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints:{
      0: {
          slidesPerView: 1,
      },
      520: {
          slidesPerView: 2,
      },
      950: {
          slidesPerView: 4,
      },
  },
});



// ____________Filtre____________________
const optionMenu = document.querySelector(".filter-menu");
       filterBtn = optionMenu.querySelector(".filter-btn");
       options = optionMenu.querySelectorAll(".option");
       filter = optionMenu.querySelector(".filter");

 filterBtn.addEventListener("click", () => optionMenu.classList.toggle("active"))

options.forEach(option =>{
   option.addEventListener("click", () =>{
    let selectedOption = option.querySelector(".option-text").innerText;
    filter.innerText  = selectedOption; 
    console.log(selectedOption)
   
    })
}); 


// ______________LIKES______________________________________
const posts = document.querySelectorAll('.block-post');

posts.forEach(post => {
  const heartIcon = post.querySelector('.likes i');
  let isRed = false;
  let previousCount = startCount;
  const counterEl = post.querySelector('.count');
  var startCount = Math.floor(Math.random() * (0 + 1298 + 1)) + 18;
  counterEl.textContent = startCount;

  function incrementCounter(event) {
    if (event.target === heartIcon) {
    if (isRed) {
      previousCount = startCount;
      startCount++;
    } else {
      previousCount = startCount;
      startCount--;
    }
    counterEl.textContent = startCount;
  }
  }

  if (heartIcon) {
    heartIcon.addEventListener('click', function() {
      if (isRed) {
        heartIcon.style.color = '#adadad';
        counterEl.textContent = previousCount;
        isRed = false;
      } else {
        heartIcon.style.color = '#ff0000';
        isRed = true;
      }
    });
  }
  post.addEventListener('click', incrementCounter);

});

// ____________________________________________________________________________________________


// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
var btn = document.getElementById("myBtn");
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}




