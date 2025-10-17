const hamburger = document.querySelector(".ri-menu-line");
const menu = document.querySelector(".menu");

hamburger.addEventListener("click", function () {
  menu.classList.toggle("menu-active");
});

window.addEventListener("scroll", function () {
  menu.classList.remove("menu-active");
});


const listProduct = document.querySelectorAll(".product-box ul li");
const imageProduct = document.querySelectorAll(".product-list img");

listProduct.forEach((data) => {
  data.onclick = () => {
    listProduct.forEach((data) => {
      data.classList.remove("active");
    });
    data.classList.add("active");

    // Filter Image
    const filter = data.textContent.toLowerCase().replace(" ", "");

    imageProduct.forEach((dataImg) => {
      const ImgFilter = dataImg.dataset.filter.toLowerCase();

      if (filter === "allproduct") {
        dataImg.parentElement.style.display = "inline-block";
      } else if (ImgFilter === filter) {
        dataImg.parentElement.style.display = "inline-block"; 
      } else {
        dataImg.parentElement.style.display = "none"; 
      }
    });
    // console.log(filter);
  };
});
