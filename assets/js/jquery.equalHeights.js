$.fn.equalHeights = function(px) {
    var grid = 16;
    var heights = new Array ();

    Array.max = function ( array ){
        return Math.max.apply( Math, array );
    };

    $(this).each(function(index){
        heights.push($(this).height());
    });

    var height = Array.max(heights),
        diff = height % grid;

    $(this).height(height + diff);
}
