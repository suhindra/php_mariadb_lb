(function($) {

	$.fn.easyCircleSkill = function(options){  

    // default configuration properties
    var defaults = {      
      percent:    50,
      speed:      7,
      colorline:  '#4c7737',
	  startcolorline:  '#f2f2f2',
      skillName:  'Skill Name',
      linesize:   1
    }; 

    var options = $.extend(defaults, options);

    this.each(function() {
      var obj = $(this);
      // This object
      var context = $(this).get(0).getContext('2d');
      // How many percent draw a line
      var percent = options.percent;
      // Start draw line
      var start = 0;

     

      $(this).wrap('<div class="skill-wrap" />');
      $(this).parent().append('<div class="skill-percent" style="color:'+options.colorline+'">' + start + '%</div>');
      $(this).parent().append('<div class="skill-name">' + options.skillName + '</div>');

      // First Circle 
      context.beginPath();
      context.lineWidth = options.linesize;
      context.strokeStyle = options.startcolorline;
      context.arc( 75, 75, 70, 0, 2 * Math.PI, false );
      context.stroke();

      var interval = setInterval( function() {
        
        context.clearRect(0, 0, 150, 150);
        context.beginPath();
        context.lineWidth = options.linesize;
        context.strokeStyle = options.startcolorline;
        context.arc( 75, 75, 70, 0, 2 * Math.PI, false );
        context.stroke();
          
         
        var rad = ( Math.PI * (start / 100)) * 2;
        context.beginPath();
        context.lineWidth = options.linesize;
        context.strokeStyle = options.colorline;
        context.arc( 75, 75, 70, -(Math.PI / 2), rad - ((Math.PI / 2) * 2) / 2  , false);
        context.stroke();
        
        
        context.save();

        var translateX= 75+(1/2);
        var translateY= 5+(140/2);

        context.translate(translateX,translateY);
        context.rotate(rad);
        context.translate(-translateX,-translateY); 

        context.beginPath();
        context.fillStyle = options.colorline;
        context.arc(75,5,3.5,0,2*Math.PI);
        context.fill(); 
        
        
      context.restore();
        
        if (start == percent) {
          clearInterval(interval);
          
        } else {
          start++;
          // $(".skill-percent").html(start)
          obj.parent().find('.skill-percent').html(start+'%')
        }
      }, options.speed )

      })
    
	};

})(jQuery);
