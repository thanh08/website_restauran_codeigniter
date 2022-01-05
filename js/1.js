$(function () {

     $('.row.mot').isotope({
      itemSelector: '.onemeal.col-sm-6',
      layoutMode: 'masonry'
    });
    $('.optionmenu span').click(function (e) { 
      tendanhmuc = $(this).data('meal');
      $('.row.mot').isotope({ filter: tendanhmuc });
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
    //new WOW().init();
    $('.noidungan').slideUp(0);
    $('.textsmallservice1').click(function (e) {
      $(this).prev().children().slideToggle('.noidungan');
      //console.log('da kich');
      if ($(this).text() == "Xem Thêm") {
                $(this).text("Thu gọn");
        }
        else {
             $(this).text("Xem Thêm");        
        }
    });
    $('.noidungan1').slideUp();
   
  });
  