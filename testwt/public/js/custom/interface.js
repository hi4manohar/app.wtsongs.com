$(document).ready(function() {

  $('html').click(function() {
  })

  $(document.body).on('click', '#nav_button', function(e) {
  	e.stopPropagation();
    $('.menu').toggle('slide', {direction : 'left'}, 300);
    $('#fa-bars').toggleClass('fa-bars fa-arrow-left');
  });

  //No action onclick menu buttons
  $(document.body).on('click', '.menu', function(e) {
    $(this).toggle('slide', {direction : 'left'}, 300);
    $('#fa-bars').toggleClass('fa-bars fa-arrow-left');
  })

  $(document.body).on('click', '.search_box_icon', function() {
  	$('#drs_search, .logo').toggleClass('none block');
  	$('#fa-search-box').toggleClass('fa-search fa-close');
  })

  //for sell page js start
  $('.searchButton').on('click', function() {
    alert('You clicked search button');
  });

  //gallery grid js
  function grid() {
    minigrid({
      container: '.cards',
      item: '.card',
      gutter: 6
    });
  }
  window.addEventListener('resize', function(){
    grid();
  });

  grid();
  //gallery grid js end

  window.wiselinks = new Wiselinks($('#main') );

  $(document).off('page:loading').on('page:loading', function(event, $target, render, url) {
    $('.modal').show();
  });
  $(document).off('page:redirected').on('page:redirected', function(event, $target, render, url) {
    $('.modal').fadeOut();
  });
  $(document).off('page:always').on('page:always', function(event, xhr, settings) {
    $('.modal').fadeOut();
  });
  $(document).off('page:done').on('page:done', function(event, $target, status, url, data) {
    $('.modal').fadeOut();
    //if page is loading via ajax then it will scroll page to top
    document.body.scrollTop = document.documentElement.scrollTop = 0;
  })
  $(document).off('page:fail').on('page:fail', function(event, $target, status, url, error, code) {
    //alert("Sorry! Page could't be loaded");
  });

});


var is = {
  isJson: function(e) {
    if (/^[\],:{}\s]*$/.test(e.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
      return true;
    } else{
      return false;
    }
  },
  isNumeric: function(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
  },
  isString: function(s) {
    return s.length == 0 ? false : true;
  },
  isPopupBlocked: function(windowStatus) {
    return !windowStatus || windowStatus.closed || typeof windowStatus.closed=='undefined';
  },
  is_tag: function(elem, t) {
    return $(elem).is(t) ? true : false;
  },
  is_visible: function(e) {
    /* return true if element is not visible */
    return $(e).is(':not(:visible)') ? true : false;
  },
  is_exists: function(e) {
    /* check element exist */
    return $(e).length > 0 ? "exists" : "notExist!";
  },
  type_of: function(v) {
    /* check type */
    return typeof v;
  },
  is_str_length: function(str, strln) {
    return str.length > strln ? true : false;
  }
}

var cm = {
  parseJSON: function(n) {
    return is.isJson(n) ? JSON.parse(n) : "Invalid JSON";
  },
  urlText: function(s) {
    return is.isString(s) ? s.replace(" ", "+").toLowerCase() : "Invalid String";
  },
  getLocation: function(href) {
    var l = document.createElement("a");
    l.href = href;
    return l;
  }
}