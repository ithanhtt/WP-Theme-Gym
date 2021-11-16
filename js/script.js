//Nav Responsive
jQuery(document).ready(function ($) {
    $('.navbar-menu-res').hide();
    $('.navbar-icon').click(function (e) { 
        e.preventDefault();
        $('.navbar-menu-res').toggle('');
    });
    //Seach
    $('#search').hide();
    $('.fa-search').click(function (e) { 
        e.preventDefault();
        $('#search').toggle('');
    });
    //About Us
  $('.about-us').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 5000,
  });
});

//Tab
function openCity(evt, productName) {
    var i, titlep, product;
    titlep = document.getElementsByClassName("product");
    for (i = 0; i < titlep.length; i++) {
      titlep[i].style.display = "none";
    }
    product = document.getElementsByClassName("title-p");
    for (i = 0; i < product.length; i++) {
      product[i].className = product[i].className.replace(" active", "");
    }
    document.getElementById(productName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click($);