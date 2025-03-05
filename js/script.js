window.onload = function() {

  gsap.registerPlugin(ScrollTrigger);
   let mm = gsap.matchMedia();
   
   
   mm.add("(max-width: 800px) and (min-width: 501px)", () => {
     gsap.fromTo(
       " .card-item-animate ",
       {
         y: 20,
       },
       {
         scrollTrigger: {
           trigger: ".card-item",
           start: "top 90%",
   
           toggleClass: "animated",
         },
   
         duration: 0.6,
         y: 0,
         ease: "none",
       }
     );
     // gsap.fromTo(
     //   " .card-item-animate ",
     //   {},
     //   {
     //     scrollTrigger: {
     //       trigger: ".card-item",
     //       start: "top 90%",
   
     //       toggleClass: "animated",
     //     },
     //     delay: 0.6,
     //     duration: 0.6,
     //     y: 0,
     //     ease: "none",
     //   }
     // );
     gsap.fromTo(
       " .card-item-animate2 ",
       {
         y: 20,
       },
       {
         scrollTrigger: {
           trigger: ".card-item2",
           start: "top 90%",
   
           toggleClass: "animated",
         },
   
         duration: 0.6,
         y: 0,
         ease: "none",
       }
     );
     // gsap.fromTo(
     //   " .card-item-animate2 ",
     //   {},
     //   {
     //     scrollTrigger: {
     //       trigger: ".card-item2",
     //       start: "top 90%",
   
     //       toggleClass: "animated",
     //     },
     //     delay: 0.6,
     //     duration: 0.6,
     //     y: 0,
     //     ease: "none",
     //   }
     // );
     gsap.fromTo(
       ".description-text ",
       {
         opacity: 0,
         y: 140,
       },
       {
         scrollTrigger: {
           trigger: ".description-text ",
           start: "top 120%",
           end: "top 65%",
           toggleClass: "animated",
         },
         duration: 0.6,
         opacity: 1,
         x: 0,
         y: 0,
       }
     );
     gsap.fromTo(
       ".description-text2 ",
       {
         opacity: 0,
         y: 140,
       },
       {
         scrollTrigger: {
           trigger: ".description-text2 ",
           start: "top 120%",
           end: "top 65%",
           toggleClass: "animated",
         },
         duration: 0.6,
         opacity: 1,
         x: 0,
         y: 0,
       }
     );
     gsap.fromTo(
       ".description-text3 ",
       {
         opacity: 0,
         y: 140,
         //  x: -120,
       },
       {
         scrollTrigger: {
           trigger: ".description-text3 ",
           start: "top 120%",
           end: "top 70%",
           toggleClass: "animated",
         },
         duration: 0.6,
         opacity: 1,
         x: 0,
         y: 0,
       }
     );
    
     gsap.fromTo(
       " .business-decision-box1 ",
       {
         opacity: 0,
   
         x: -50,
       },
       {
         scrollTrigger: {
           trigger: ".business-decision-boxs",
           start: "top 60%",
   
           toggleClass: "animated",
         },
         opacity: 1,
         duration: 0.6,
         x: 0,
       }
     );
     gsap.fromTo(
       " .business-decision-box2 ",
       {
         opacity: 0,
   
         y: 90,
       },
       {
         scrollTrigger: {
           trigger: ".business-decision-boxs",
           start: "top 60%",
   
           toggleClass: "animated",
         },
         opacity: 1,
         duration: 0.6,
         y: 0,
       }
     );
   
     gsap.fromTo(
       " .business-decision-double-box2",
       {
         marginRight: 0,
       },
       {
         scrollTrigger: {
           trigger: ".business-decision-boxs",
           start: "top 60%",
   
           toggleClass: "animated",
         },
         marginRight: 20,
         duration: 0.6,
       }
     );
     gsap.fromTo(
       " .business-decision-box3 ",
       {
         opacity: 0,
   
         y: -20,
       },
       {
         scrollTrigger: {
           trigger: ".business-decision-boxs",
           start: "top 60%",
   
           toggleClass: "animated",
         },
         opacity: 1,
         duration: 0.6,
         y: 0,
       }
     );
     gsap.fromTo(
       " .business-decision-double-box3",
       {
         marginTop: 0,
       },
       {
         scrollTrigger: {
           trigger: ".business-decision-boxs",
           start: "top 70%",
   
           toggleClass: "animated",
         },
         marginTop: 20,
         duration: 0.6,
       }
     );
     gsap.fromTo(
       " .popular-image ",
       {
         
       },
       {
         scrollTrigger: {
           trigger: ".popular-image",
           start: "top 70%",
           end: "top 40%",
           toggleClass: "animated",
           scrub: true,
         },
   
         duration: 0.3,
         scale: 1.1,
       }
     );
     
     gsap.fromTo(
       " .company-image ",
       {
         
       },
       {
         scrollTrigger: {
           trigger: ".company-image",
           start: "top 70%",
           end: "top 40%",
           toggleClass: "animated",
           scrub: true,
         },
   
         duration: 0.3,
         scale: 1.1,
       }
     );
     gsap.fromTo(
       " .short-image ",
       {
         
       },
       {
         scrollTrigger: {
           trigger: ".short-image",
           start: "top 70%",
           end: "top 40%",
           toggleClass: "animated",
           scrub: true,
         },
   
         duration: 0.3,
         scale: 1.1,
       }
     );
     gsap.fromTo(
       " .craftsman-image ",
       {
         
       },
       {
         scrollTrigger: {
           trigger: ".craftsman-image",
           start: "top 70%",
           end: "top 40%",
           toggleClass: "animated",
           scrub: true,
         },
   
         duration: 0.3,
         scale: 1.1,
       }
     );
     gsap.fromTo(
       " .development-example-img ",
       {
         
       },
       {
         scrollTrigger: {
           trigger: ".development-example-img",
           start: "top 70%",
           end: "top 40%",
           toggleClass: "animated",
           scrub: true,
         },
   
         x: -5,
   
         duration: 0.3,
         rotation: 0,
       }
     );
     gsap.fromTo(
       " .develop-image-index-adapt ",
       {
         
       },
       {
         scrollTrigger: {
           trigger: ".development-example-img",
           start: "top 60%",
           end: "top 10%",
           toggleClass: "animated",
           scrub: true,
         },
   
         x: 30,
         
         rotation: 0,
       }
     );
     gsap.fromTo(
       ".logo-animation-main ",
       {
         y: 0,
         x: 0,
         
       },
       {
         scrollTrigger: {
           trigger: ".logo-animation-main ",
           start: "top 20%",
           end: "top 5%",
           toggleClass: "animated",
           scrub: true,
         },
         width: 70,
         height: 17.2,
         x: -200,
         y: -30,
       }
     );
     gsap.fromTo(
       ".logo-animate-header ",
       {
    opacity:0,
           y:20,
         x: 20,
         width: 80,
         height: 25,
       },
       {
         scrollTrigger: {
           trigger: ".business-decision ",
           start: "top 32%",
          end:"top 29%",
           toggleClass: "animated",
           scrub: true,
         },
         opacity:1,
         width: 70,
         height: 17.2,
         x: 0,
         y: 0,
       }
     );
   
   });
   mm.add("(max-width: 500px)", () => {
     gsap.fromTo(
       ".logo-animation-main ",
       {
         y: 0,
         x: 0,
         
       },
       {
         scrollTrigger: {
           trigger: ".logo-animation-main ",
           start: "top 20%",
           end: "top 5%",
           toggleClass: "animated",
           scrub: true,
         },
         width: 70,
         height: 17.2,
         x: -100,
         y: -25,
       }
     );
     
     gsap.fromTo(
       ".logo-animate-header ",
       {
    opacity:0,
           y:20,
         x: 20,
         width: 80,
         height: 25,
       },
       {
         scrollTrigger: {
           trigger: ".business-decision ",
           start: "top 32%",
          end:"top 29%",
           toggleClass: "animated",
           scrub: true,
         },
         opacity:1,
         width: 70,
         height: 17.2,
         x: 0,
         y: 0,
        
         // duration: 2,
         // ease: "power1.inOut",
       }
     );
   });
   
   mm.add("(min-width: 900px)", () => {
     gsap.fromTo(
       ".description-text ",
       {
         opacity: 0,
         y: 140,
       },
       {
         scrollTrigger: {
           trigger: ".description-text ",
           start: "top 95%",
           end: "top 65%",
           toggleClass: "animated",
         },
         duration: 0.6,
         opacity: 1,
         x: 0,
         y: 0,
       }
     );
     gsap.fromTo(
       ".description-text2 ",
       {
         opacity: 0,
         y: 140,
       },
       {
         scrollTrigger: {
           trigger: ".description-text2 ",
           start: "top 95%",
           end: "top 65%",
           toggleClass: "animated",
         },
         duration: 0.6,
         opacity: 1,
         x: 0,
         y: 0,
       }
     );
     gsap.fromTo(
       ".description-text3 ",
       {
         opacity: 0,
         y: 140,
         //  x: -120,
       },
       {
         scrollTrigger: {
           trigger: ".description-text3 ",
           start: "top 100%",
           end: "top 70%",
           toggleClass: "animated",
         },
         duration: 0.6,
         opacity: 1,
         x: 0,
         y: 0,
       }
     );
     gsap.fromTo(
       ".logo-animation-main ",
       {
         y: 0,
         x: 0,
         
       },
       {
         scrollTrigger: {
           trigger: ".logo-animation-main ",
           start: "top 27%",
           end: "top 0.5%",
           toggleClass: "animated",
           scrub: true,
         },
         width: 83,
         height: 20.4,
         x: -500,
         y: -75,
       }
     );
     gsap.fromTo(
       ".logo-animate-header ",
       {
    opacity:0,
           y:20,
         x: 110,
         width: 100,
         height: 25,
       },
       {
         scrollTrigger: {
           trigger: ".business-decision ",
           start: "top 55%",
          end:"top 40%",
           toggleClass: "animated",
           scrub: true,
         },
         opacity:1,
         width: 83,
         height: 20.4,
         x: 0,
         y: 0,
        
         // duration: 2,
         // ease: "power1.inOut",
       }
     );
     gsap.fromTo(
       " .business-decision-box1 ",
       {
         opacity: 0,
   
         x: -90,
       },
       {
         scrollTrigger: {
           trigger: ".business-decision-boxs",
           start: "top 40%",
   
           toggleClass: "animated",
         },
         opacity: 1,
         duration: 0.6,
         x: 0,
       }
     );
     gsap.fromTo(
       " .business-decision-box2 ",
       {
         opacity: 0,
   
         y: 90,
       },
       {
         scrollTrigger: {
           trigger: ".business-decision-boxs",
           start: "top 40%",
   
           toggleClass: "animated",
         },
         opacity: 1,
         duration: 0.6,
         y: 0,
       }
     );
   
     gsap.fromTo(
       " .business-decision-double-box2",
       {
         marginRight: 0,
       },
       {
         scrollTrigger: {
           trigger: ".business-decision-boxs",
           start: "top 40%",
   
           toggleClass: "animated",
         },
         marginRight: 40,
         duration: 0.6,
       }
     );
     gsap.fromTo(
       " .business-decision-box3 ",
       {
         opacity: 0,
   
         y: -90,
       },
       {
         scrollTrigger: {
           trigger: ".business-decision-boxs",
           start: "top 40%",
   
           toggleClass: "animated",
         },
         opacity: 1,
         duration: 0.6,
         y: 0,
       }
     );
     gsap.fromTo(
       " .business-decision-double-box3",
       {
         marginTop: 0,
         
       },
       {
         scrollTrigger: {
           trigger: ".business-decision-boxs",
           start: "top 40%",
   
           toggleClass: "animated",
         },
         marginTop: 40,
         duration: 0.6,
       }
     );
     gsap.fromTo(
       " .card-item-animate ",
       {
         y: 20,
       },
       {
         scrollTrigger: {
           trigger: ".card-item",
           start: "top 40%",
   
           toggleClass: "animated",
         },
   
         duration: 0.6,
         y: 0,
         ease: "none",
       }
     );
     // gsap.fromTo(
     //   " .card-item-animate ",
     //   {},
     //   {
     //     scrollTrigger: {
     //       trigger: ".card-item",
     //       start: "top 40%",
   
     //       toggleClass: "animated",
     //     },
     //     delay: 0.6,
     //     duration: 0.6,
     //     y: 0,
     //     ease: "none",
     //   }
     // );
     gsap.fromTo(
       " .card-item-animate2 ",
       {
         y: 20,
       },
       {
         scrollTrigger: {
           trigger: ".card-item2",
           start: "top 40%",
   
           toggleClass: "animated",
         },
   
         duration: 0.6,
         y: 0,
         ease: "none",
       }
     );
     // gsap.fromTo(
     //   " .card-item-animate2 ",
     //   {},
     //   {
     //     scrollTrigger: {
     //       trigger: ".card-item2",
     //       start: "top 40%",
   
     //       toggleClass: "animated",
     //     },
     //     delay: 0.6,
     //     duration: 0.6,
     //     y: 0,
     //     ease: "none",
     //   }
     // );
     const pop = document.querySelector(".popular-example");
     const popImg = document.querySelector(".popular-image");
   
     // Анимация при наведении
     pop.addEventListener("mouseenter", () => {
       gsap.fromTo(
         popImg,
         {},
         {
           y: 80,
           x: -20,
           scale: 1.2,
           duration: 0.3,
         }
       );
     });
   
     pop.addEventListener("mouseleave", () => {
       gsap.to(popImg, {
         y: 5,
         x: 0,
         duration: 0.3,
        
         scale: 1,
       });
     });
   
     const popELipse = document.querySelector(".popular-elipse");
     pop.addEventListener("mouseenter", () => {
       gsap.fromTo(
         popELipse,
         {},
         {
           x: -450,
           y: 130,
           duration: 0.3,
         }
       );
     });
   
     pop.addEventListener("mouseleave", () => {
       gsap.to(popELipse, {
         duration: 0.3,
         x: 0,
         y: 0,
       });
     });
   
     const company = document.querySelector(".company-example");
     const companyImg = document.querySelector(".company-image");
   
     // Анимация при наведении
     company.addEventListener("mouseenter", () => {
       gsap.fromTo(
         companyImg,
         {},
         {
           y: 80,
           x: -20,
           scale: 1.2,
           duration: 0.3,
         }
       );
     });
   
     company.addEventListener("mouseleave", () => {
       gsap.to(companyImg, {
         y: 5,
         x: 0,
         duration: 0.3,
   
         scale: 1,
       });
     });
   
     const companyELipse = document.querySelector(".company-elipse");
     company.addEventListener("mouseenter", () => {
       gsap.fromTo(
         companyELipse,
         {},
         {
           x: -100,
   
           duration: 0.3,
         }
       );
     });
   
     company.addEventListener("mouseleave", () => {
       gsap.to(companyELipse, {
         duration: 0.3,
         x: 0,
       });
     });
   
     const short = document.querySelector(".short-example");
     const shortImg = document.querySelector(".short-image");
   
     // Анимация при наведении
     short.addEventListener("mouseenter", () => {
       gsap.fromTo(
         shortImg,
         {},
         {
           y: 80,
           x: -20,
           scale: 1.2,
           duration: 0.3,
         }
       );
     });
   
     short.addEventListener("mouseleave", () => {
       gsap.to(shortImg, {
         y: 5,
         x: 0,
         duration: 0.3,
   
         scale: 1,
       });
     });
   
     const shortELipse = document.querySelector(".short-elipse");
     short.addEventListener("mouseenter", () => {
       gsap.fromTo(
         shortELipse,
         {},
         {
           x: -100,
   
           duration: 0.3,
         }
       );
     });
   
     short.addEventListener("mouseleave", () => {
       gsap.to(shortELipse, {
         duration: 0.3,
         x: 0,
       });
     });
   
     const craftsman = document.querySelector(".craftsman-example");
     const craftsmanImg = document.querySelector(".craftsman-image");
   
     // Анимация при наведении
     craftsman.addEventListener("mouseenter", () => {
       gsap.fromTo(
         craftsmanImg,
         {},
         {
           y: 80,
           x: -20,
           scale: 1.2,
           duration: 0.3,
         }
       );
     });
   
     craftsman.addEventListener("mouseleave", () => {
       gsap.to(craftsmanImg, {
         y: 5,
         x: 0,
         duration: 0.3,
   
         scale: 1,
       });
     });
   
     const craftsmanELipse = document.querySelector(".craftsman-elipse1");
     const craftsmanELipse2 = document.querySelector(".craftsman-elipse2");
     craftsman.addEventListener("mouseenter", () => {
       gsap.fromTo(
         craftsmanELipse,
         {},
         {
           x: -170,
           y: 40,
           duration: 0.3,
         }
       );
     });
   
     craftsman.addEventListener("mouseleave", () => {
       gsap.to(craftsmanELipse, {
         duration: 0.3,
         x: 0,
         y: 0,
       });
     });
     craftsman.addEventListener("mouseenter", () => {
       gsap.fromTo(
         craftsmanELipse2,
         {},
         {
           x: -120,
   
           duration: 0.3,
         }
       );
     });
   
     craftsman.addEventListener("mouseleave", () => {
       gsap.to(craftsmanELipse2, {
         duration: 0.3,
         x: 0,
       });
     });
   
     const development = document.querySelector(".development-example");
     const developmentImg = document.querySelector(".development-example-img");
     const developmentImg2 = document.querySelector(".develop-image-index");
   
     // Анимация при наведении
     development.addEventListener("mouseenter", () => {
       gsap.fromTo(
         developmentImg,
         {},
         {
           x: -20,
   
           duration: 0.3,
           rotation: 0,
         }
       );
     });
   
     development.addEventListener("mouseleave", () => {
       gsap.to(developmentImg, {
         x: 0,
         duration: 0.3,
         rotation: 5,
       });
     });
   
     development.addEventListener("mouseenter", () => {
       gsap.fromTo(
         developmentImg2,
         {},
         {
           bottom: -6,
           right: -160,
   
           duration: 0.3,
           rotation: 0,
         }
       );
     });
   
     development.addEventListener("mouseleave", () => {
       gsap.to(developmentImg2, {
         right: -80,
         x: 0,
         duration: 0.3,
         rotation: -6,
       });
     });
   
     const developmentELipse = document.querySelector(".development-elipse1");
     const developmentELipse2 = document.querySelector(".development-elipse2");
     development.addEventListener("mouseenter", () => {
       gsap.fromTo(
         developmentELipse,
         {
           x: -120,
           y: 40,
         },
         {
           x: 0,
           y: 0,
   
           duration: 0.3,
         }
       );
     });
   
     development.addEventListener("mouseleave", () => {
       gsap.to(developmentELipse, {
         duration: 0.3,
         x: -120,
         y: 40,
       });
     });
     development.addEventListener("mouseenter", () => {
       gsap.fromTo(
         developmentELipse2,
         { x: -90 },
         {
           x: 0,
           duration: 0.3,
         }
       );
     });
   
     development.addEventListener("mouseleave", () => {
       gsap.to(developmentELipse2, {
         duration: 0.3,
         x: -90,
       });
     });
   
   
   });
   mm.add("(min-width: 900px) and (max-width: 1600px)", () => {
     gsap.fromTo(
       ".logo-animation-main ",
       {
         y: 0,
         x: 0,
         
       },
       {
         scrollTrigger: {
           trigger: ".logo-animation-main ",
           start: "top 27%",
           end: "top 0.5%",
           toggleClass: "animated",
           scrub: true,
         },
         width: 83,
         height: 20.4,
         x: -430,
         y: -65,
       }
     );
     gsap.fromTo(
       ".logo-animate-header ",
       {
    opacity:0,
           y:20,
         x: 110,
         width: 100,
         height: 25,
       },
       {
         scrollTrigger: {
           trigger: ".business-decision ",
           start: "top 70%",
          end:"top 40%",
           toggleClass: "animated",
           scrub: true,
         },
         opacity:1,
         width: 83,
         height: 20.4,
         x: 0,
         y: 0,
        
         // duration: 2,
         // ease: "power1.inOut",
       }
     );
   });
   const burgerDropdown = document.querySelector(".burger-nav-image");
   const shortImg = document.querySelector(".burger-Dropdown");
   const blockDown = document.querySelector(".animation-down");
   
   
   let isAnimated = false;
   
   // Анимация при клике
   burgerDropdown.addEventListener("click", () => {
     if (!isAnimated) {
       gsap.fromTo(
         shortImg,
         {},
         {
           y: -25,
           x: 120,
           opacity: 1,
           duration: 0.3,
         }
       );
       gsap.fromTo(
         blockDown,
         {},
         {
           y: 185,
           x: 0,
       
           duration: 0.3,
         }
       );
     }
   
      else {
       gsap.to(shortImg, {
         y: -50,
         x: -500,
         duration: 0.3,
         
         opacity: 0,
       });
       gsap.to(blockDown, {
         y: 0,
         x: 0,
         duration: 0.3,
         
        
       });
     }
     
     
     isAnimated = !isAnimated;
   });
   function dropdownNavBurger() {
     const navLink = document.querySelector(".burger-mobile");
     const navLinkBurger = document.querySelector(".burger-menu-button");
     const navLinkLi = document.querySelectorAll(".NavLink");
     const navMenu = document.querySelector(".burger-menu");
     const header = document.querySelector("header");
     const body = document.querySelector("body");
     navLink.addEventListener("click", () => {
       navMenu.classList.add("active");
       header.classList.add("hidden"); 
       document.body.style.overflow = 'hidden';
       document.documentElement.style.overflow = 'hidden';
   
     });
     navLinkBurger.addEventListener("click", () => {
       navMenu.classList.remove("active");
       header.classList.remove("hidden");
       // navMenu.classList.add("hidden"); 
       document.body.style.overflow = '';
       document.documentElement.style.overflow = '';
     });
     navLinkLi.forEach(NavLink => {
       NavLink.addEventListener("click", () => {
       navMenu.classList.remove("active");
       header.classList.remove("hidden");
       // navMenu.classList.add("hidden"); 
       document.body.style.overflow = '';
       document.documentElement.style.overflow = '';
     });
   });
   }
   dropdownNavBurger();
   function dropdownNav() {
     const navLink = document.querySelector(".dropdown-nav");
     const navMenu = document.querySelector(".nav-buttonMenu");
     const navImage = document.querySelector(".nav-menu-image");
     const Navbuttonlinks = document.querySelectorAll(".Navbuttonlink");
     
     navLink.addEventListener("click", () => {
       
       navMenu.classList.toggle("active");
       navImage.classList.toggle("active");
       
     });
     Navbuttonlinks.forEach(Navbuttonlink => {
       Navbuttonlink.addEventListener("click", () => {
       navMenu.classList.remove("active");
       navImage.classList.remove("active");
       });
     });
   }
   
   if (window.innerWidth > 800) {
     // console.log("success");
     dropdownNav();
   }
   
   window.addEventListener("resize", () => {
     if (window.innerWidth > 800) {
       // console.log("adaptive success");
       dropdownNav();
     }
   });
   function notificationMenu() {
   const inputs = form.querySelectorAll('.input-required');
   const button = document.querySelector(".submit-button");
   const feedback = document.querySelector(".form-container");
   const notification = document.querySelector(".notification");
   var checkbox = document.querySelector('checkbox-polit');
     let allFilled = true;
     inputs.forEach((input) => {
       if (input.value.trim() === "") {
         allFilled = false; // Если поле пустое, устанавливаем флаг
         input.classList.add("error"); // Добавляем класс для визуального указания на ошибку
       } else {
         input.classList.remove("error"); // Убираем класс ошибки, если поле заполнено
       }
     });
     if (allFilled) {
       if (checkbox.checked) {
         feedback.style.display = 'none';
         notification.style.display = 'block';
     }
   }
   }
   
     button.addEventListener('click', function() {
       notificationMenu();
     });
   if (window.innerWidth > 800) {
     // console.log("success");
     dropdownNav();
   }
   
   window.addEventListener("resize", () => {
     if (window.innerWidth > 800) {
       // console.log("adaptive success");
       dropdownNav();
     }
   });
   };