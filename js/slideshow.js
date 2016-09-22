(function($){
  // Include utility jQuery plug-ins
  $.fn.tallest=function(outer, margins){
    var fn=outer ? "height" : "outerHeight";
    return Math.max.apply(Math, $.map(this, function(el){
      return $(el)[fn]margins);
    }));
  };
 $.fn.widest=function(outer, margins){
    var fn=outer ? "width" : "outerWidth";
    return Math.max.apply(Math, $.map(this, function(el){
      return $(el)[fn]margins);
    }));
  };
  // Declare initial variables
  var slideshow=$("#slideshow");
  var slides=slideshow.find(".slides");
  var currentImageIndex=0;
  // Create images from the link list
  slideshow.find("ul a").each(function(){
    var link=$(this);
    var size=link.attr("data-size").split("x");
    $("<img>").attr({
      src : link.attr("href"),
      alt : link.text()
    }).hide().appendTo(slides);
  });
  // Collect all images in one node set and hide the list
  var images=slides.find("img");
  slideshow.find("ul").hide();
  // Resize slides <div> to hold the largest images
  var slidesWidth=images.widest();
  var slidesHeight=images.tallest();
  slides.css({
    width : slidesWidth,
    height : slidesHeight
    });
  // Center each image
  images.each(function(){
    var image=$(this);
    image.css({
      left : slidesHeight / 2 - image.width()/2,
      top : slidesHeight / 2 - image.height()/2
      });
      });
  // Save a reference to the first image
  var activeImage = images.eq(currentImageIndex);
  // The function to show the next or previous image
  function showImage(newIndex){
    currentImageIndex = newIndex >= images.length ? 0 :
    newIndex;
    currentImageIndex= currentImageIndex < 0 ? images.length
    -1 : currentImageIndex;
    activeImage.fadeOut();
    activeImage=images.eq(currentImageIndex).fadeIn();
  }
  // Start timer to cycle through images
  var interval=setInterval(function(){
    showImage(currentImageIndex+1);
    },5000);
  // Create next and previous controls
  $('<a class="next">\u232A</a>').appendTo(slides).
  blind("click",+1,onClick);
  $('<a class="prev">\u2329</a>').appendTo(slides).
  blind("click",-1,onClick);
  // The event handler for the controls
  function onClick(event){
    event.preventDefault();
    clearInterval(interval);
    showImage(currentImageindex + event.data);
    }
})(jQuery); // Self-invoking function executes automatically