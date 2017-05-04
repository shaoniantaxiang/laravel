jQuery(function($) {
    var $topBn = $('#J_topBn'),
        $counter = $('.J_counter'),
        $closeBnTrigger = $('.J_closeBn'),
        timeoutTopBn,
        bnCounter = 5;

    function countDown() {
        bnCounter -= 1;
        if (bnCounter < 1) {
            closeBn();
        }
        else {
            $counter.text(bnCounter + '秒');
        }
    }

    function closeBn() {
        var expireDate = 7;

        window.clearInterval(timeoutTopBn);
        $counter.remove();
        $topBn.animate({
            'top': -$topBn.height()
        }, 500, function() {
            $topBn.hide();
        });
        $.cookie('indexTopBn', '1', {
            expires: expireDate
        });
    }

    function closeBnBar() {
        $(".site-bn-bar").remove();
    }

    function initTopBar() {
        $topBn.show();

        timeoutTopBn = window.setInterval(function() {
            countDown();
        }, 1000);

        $closeBnTrigger.on('click', function(e) {
            e.preventDefault();
            closeBn();
        });
    }

    if (!$.cookie('indexTopBn')) {
        //initTopBar();
    }
});