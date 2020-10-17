;
(function ($) {
    $(document).ready(function () {
        $("#send-message").on("click", function (e) {
            e.preventDefault();

            $.post(mealurl.ajaxurl, {
                action: 'contact',
                cn: $("#contact").val(),
                name: $("#cname").val(),
                email: $("#cemail").val(),
                phone: $("#cphone").val(),
                message: $("#cmessage").val(),
            }, function (data) {
                console.log(data);
            })
        });
    });
})(jQuery);