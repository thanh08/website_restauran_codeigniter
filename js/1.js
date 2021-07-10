$(function () {
    $('.col-sm-6.allmeal').isotope({
      itemSelector: '.row.mot',
      layoutMode: 'masonry'
    });
    $('.optionmenu span').click(function (e) { 
      tendanhmuc = $(this).data('meal');
      $('.col-sm-6.allmeal').isotope({ filter: tendanhmuc });
      $('.optionmenu span a').removeClass('active-menu1');
      $(this).children("a").addClass('active-menu1');
      return false;
    });
    //catalog mobile
    $('.contentcatalog').slideUp();
    $('.catalog-mobile .title').click(function () { 
        $(this).next().slideToggle();
        $(this).children().toggleClass('hieuung');
    });
    //end catlog mobile
  
  });
  