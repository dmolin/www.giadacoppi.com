(function($){
    var lastWindowWidth,
        lastColumnHeight,
        globals = getGlobals();

    function onReady() {
        //console.log("READY!");
        var $column = $('.column-single'),
            baseColWidth;  //col width before alterations

        //give proper width to the column
        $('.column-single').removeClass('column-single-loading');
        baseColWidth = $column.width();  //col width before alterations

        $('.ready').remove();
        //signal ready state
        $('body').append('<div style="" class="ready"></div>');

        rebuildColumns();


        //When the document has finished loading, let's build the columns..
        function rebuildColumns() {
            var $parent = $column.parent(),
                $container = $('.project-thumbs'),
                colWidth = baseColWidth,
                colWidthWithGutter,
                containerWidth = $container.width(),
                cols,
                colHeight,
                colIndex = 0,
                column,
                gutter = 15;  //width of gutter between columns in pixels

            //console.log("window.width:" + $(window).width() + '. last:' + lastWindowWidth);

            if($(window).width() === lastWindowWidth && lastColumnHeight === $column.height()) {
                return;
            }
            lastWindowWidth = $(window).width();
            lastColumnHeight = $column.height();

            //remove old columns and temp wrapper
            $('.column-cloned, .measurement-div').remove();

            //each column is counted with the gutter.
            //because the last column won't have any gutter, this is accounted for, adding its size to the container
            cols = parseInt( (containerWidth+gutter) / (colWidth+gutter) );


            //if cols > x.5, shrink the colums and makes space for one more..
            //if( (containerWidth+gutter) - (colWidth+gutter)*cols > ((colWidth+gutter)/2) ) {
            if( ((containerWidth+gutter) / (colWidth+gutter)) % 1 > globals.maxThumbRatio ) {
                //let's make room for another additional column..
                //increment cols by 1 and determine the size of each column (gutter included)
                cols = cols + 1;
                //recalculate with of each column (gutter included)
                colWidthWithGutter = (containerWidth+gutter) / cols;
            } else {
                //fit columns perfectly inside their space
                colWidthWithGutter = (containerWidth+gutter) / cols;
            }

            //change colWidth (useful when calculating column heights)
            $column.width(colWidthWithGutter-gutter);

            //$column.css('position', 'absolute');

            thumbs = $column.children();
            $column.hide();

            if (cols > 1) {
                var $current = $column;

                //create the additional columns
                for( var i = 0 ; i < cols; i=i+1 ) {
                    column = $('<div class="column column-cloned column-' + (i) +'">');
                    //if it's not the last one, add the gutter
                    if(i < cols-1) column.css('margin-right', gutter + 'px');
                    //set colWidth (it could've been recalculated)
                    if(colWidthWithGutter) {
                        column.width(colWidthWithGutter-gutter);
                        column.css('max-width', '100%');
                    }
                    $current.after( column );
                    $current = $current.next();
                }

                //thumbs = $column.children();

                //1. compute the total vertical size of each column (+-)
                colHeight = $column.height() / cols;

                //now we've all the columns
                //2. lay down elements in each column until we get to the right height (+-)
                colIndex = 0;
                var $col = $('.column-' + colIndex);

                _.each( thumbs, function( thumb ) {
                    var thumbHeight = $(thumb).height();

                    $col.append($(thumb).clone(true));
                    if( $col.height() > colHeight ) {
                        colIndex++;
                        $col = $('.column-' + colIndex);
                    }
                });
            } else {
                column = $('<div class="column column-cloned column-0">');
                column.css('max-width', '100%');
                _.each( thumbs, function( thumb ) { column.append($(thumb).clone(true)); });
                $column.after( column );
            }

            $column.width(baseColWidth);
        }
    }

    function getGlobals() {
        var search = document.location.search;
        var matcher = search.match(/maxratio=(\d*\.*\d*)/);
        return {
            maxThumbRatio: matcher && matcher.length > 1 ? matcher[1] : 0.1
        };
    }

    $(document).ready(onReady);
    $(window).load(onReady);
    $(window).resize(onReady);

}(jQuery));