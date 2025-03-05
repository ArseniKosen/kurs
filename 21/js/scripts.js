function adModal() {
  const adModal = document.querySelector('.ad-modal')
  const modalCloseButton = document.querySelector('.close-btn')

  setTimeout(() => {
    adModal.classList.add('active')
  }, 3000)

  modalCloseButton.addEventListener('click', () => {
    adModal.classList.remove('active')
  })
}

function heroSlider() {
  const nextButton = document.querySelector('.hero-next-button')
  const prevButton = document.querySelector('.hero-prev-button')
  const namesList = document.querySelectorAll('.third-block-text span')
  const priceList = document.querySelectorAll('.hero-price span')
  const imagesList = document.querySelectorAll('.hero-item-image')

  function incrementCounter() {
    if (namesList.length - 1 > currentItem) {
      namesList[currentItem].classList.remove('active')
      priceList[currentItem].classList.remove('active')
      imagesList[currentItem].classList.remove('active')
      currentItem++
      namesList[currentItem].classList.add('active')
      priceList[currentItem].classList.add('active')
      imagesList[currentItem].classList.add('active')
    }
  }

  function decrementCounter() {
    if (currentItem > 0) {
      namesList[currentItem].classList.remove('active')
      priceList[currentItem].classList.remove('active')
      imagesList[currentItem].classList.remove('active')
      currentItem--
      namesList[currentItem].classList.add('active')
      priceList[currentItem].classList.add('active')
      imagesList[currentItem].classList.add('active')
    }
  }

  let currentItem = 0

  nextButton.addEventListener('click', incrementCounter)

  prevButton.addEventListener('click', decrementCounter)
}

function scrollButton() {
  const scrollButton = document.querySelector('.scroll-top-button')

  scrollButton.addEventListener('click', () => {
    window.scrollTo({ top: 0, left: 0, behavior: 'smooth' })
  })
}

function mobileNav() {
  const siteNav = document.querySelector('.site-nav')
  const burgerButton = document.querySelector('.burger-button')

  burgerButton.addEventListener('click', () => {
    siteNav.classList.toggle('active')
  })
}

window.addEventListener('load', () => {
  adModal()
  heroSlider()
  scrollButton()
  mobileNav()
})


