jQuery(document).ready(function($) {
  $('.ht-mask__money').mask('#.##0,00', {reverse: true, placeholder : "0,00"});
  $('.ht-mask__date').mask("00/00/0000", {placeholder: "__/__/____"});
  $('.ht-mask__cnpj').mask('00.000.000/0000-00');
  $('.ht-mask__cpf').mask('000.000.000-00');
  $('.ht-mask__cep').mask("00000-000", {placeholder: "_____-___"});
  var optionsPhone = {onKeyPress : function(val){}}
  var SPMaskBehavior = function (val) { return val.replace(/\D/g, '').length === 11 ? '(00) 0 0000-0000' : '(00) 0000-00009'; }, spOptions = { placeholder: "(XX) X XXXX-XXXX", onKeyPress: function(val, e, field, options) { field.mask(SPMaskBehavior.apply({}, arguments), options); } };
  $('.ht-mask__cel').mask(SPMaskBehavior, spOptions);

  $(".service__gallery").lightGallery({
    thumbnail:false
  });

  $(".ht-header__control--js").on("click", function(){
    $("body").toggleClass("ht-header__nav--active");
  });

  $(".home-slider--js").slick({
    prevArrow : "<div class='home-slider__nav home-slider__nav--prev'><i class='fas fa-chevron-left'></i></div>",
    nextArrow : "<div class='home-slider__nav home-slider__nav--next'><i class='fas fa-chevron-right'></i></div>",
  });

  $(".testimony__items--js").slick({
    prevArrow: "<span class='testimony__control testimony__control--prev'>Prev</span>",
    nextArrow: "<span class='testimony__control testimony__control--next'>Next</span>",
  })

  $(".service__item--js").on("click", function(e){
    e.preventDefault();
    var item = $(this).attr("data-service");
    $(item).css({
      opacity : 1,
      transform : "translateX(0)",
    });
    $("body").css({
      overflow : "hidden",
    });
    // console.log($(item));
  });

  $(".service__close--js").on("click", function(e){
    e.preventDefault();
    var item = $(this).attr("data-close");
    $(item).css({
      opacity : 0,
      transform : "translateX(-150%)",
    });
    $("body").css({
      overflow : "auto",
    });
  });
  //console.log("teste");
  $(window).scroll(function(){
    var credit = $(".footer__items").offset().top;
    var pageTop = $(window).scrollTop();
    var pageBottom = pageTop + $(window).height();

    if(pageBottom >= credit){
      $("body").addClass("ht-wpp__hide");
    }else{
      $("body").removeClass("ht-wpp__hide");
    }

    //console.log("Credito: "+ credit +"\nTela: "+ pageBottom);
  });
  $(".ht-mobile__subitem").hide();
  $(".ht-nav__mobile--js").on("click", function(){
    $("html").toggleClass("ht-nav__mobile--active");
  })
  $(".ht-nav__mobile--dropdown").on("click", function(e){
    e.preventDefault();
    $(this).find(".ht-mobile__subitem").slideToggle();
    $(this).toggleClass("ht-mobile__subitem--active");
  });
  $(".home-banner--js").slick({
    prevArrow : null,
    nextArrow : null,
    dots : true,
    autoplay : true,
    pauseOnHover : true,
  });
  $('.parceiros__list--home').slick({
    infinite: true,
    centerPadding: '60px',
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    prevArrow: '.prev_arrow',
    nextArrow: '.next_arrow',
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          centerPadding: "60px",
          dots : true,
        }
      },
    ]
  });
  $('.cortes-carrossel').slick({
    infinite: true,
    centerPadding: '60px',
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    prevArrow: '.prev_arrow',
    nextArrow: '.next_arrow',
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          centerPadding: "60px",
          dots : true,
        }
      },
    ]
  });

  $('.ht_services_carroussel_card').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    nextArrow: false,
    prevArrow: false,
    responsive: [
      {
        breakpoint: 1025,
        settings: {
          autoplay: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          dots : true,
        }
      },
    ]
  });

  $('.ht__list-carroussel').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    responsive: [
      {
        breakpoint: 3600,
        settings: "unslick",
      },
      {
        breakpoint: 768,
        settings: {
          infinite: true,
          autoplay: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          dots : false,
          nextArrow: $('.next'),
          prevArrow: $('.prev'),
        }
      },
    ]
  });

  $('.ht__list-carroussel-benefits').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    nextArrow: $('.next'),
    prevArrow: $('.prev'),
    responsive: [
      {
        breakpoint: 3600,
        settings: "unslick",
      },
      {
        breakpoint: 768,
        settings: {
          infinite: true,
          autoplay: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          dots : false,
          nextArrow: $('.next-benefits'),
          prevArrow: $('.prev-benefits'),
        }
      },
    ]
  });






  $(".modal__wrapper").hide();
  // $(".modal__wrapper").on("click",function(){
  //   $(this).fadeOut();
  //   $("body").css({
  //     overflow : "auto",
  //   });
  // })
  $(".modal__show").on("click", function(e){
    e.preventDefault();
    var modal = "."+ $(this).attr("data-id");
    $(modal).fadeIn();
    $("body").css({
      overflow : "hidden",
    });
  });
  $(".modal__close").on("click", function(e){
    e.preventDefault();
    var modal = "."+ $(this).attr("data-id");
    $(modal).fadeOut();
    $("body").css({
      overflow : "auto",
    });
  });
  $(".parceiro__combo").on("change",function(){
    var tipo = $(this).val();
    $(".parceiro__item").hide();
    if(tipo == "1"){
      $(".parceiro__item").show();
    }else{
      $("."+ tipo).show();
    }
  });

  $(".image__wrapper").lightGallery({
    thumbnail : false,
  });
  if ($(window).width() < 1000){
    $(".blog__list--home").slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      nextArrow : null ,
      prevArrow : null ,
      dots: true,
    });
  }

});
