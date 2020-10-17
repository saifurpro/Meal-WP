;
(function ($) {
    $(document).ready(function () {
        $('#reservenow').on('click', function (e) {
            e.preventDefault();

            $.post(mealurl.ajaxurl, {
                action: 'reservation',
                name: $("#name").val(),
                email: $("#email").val(),
                phone: $("#phone").val(),
                persons: $("#persons").val(),
                date: $("#date").val(),
                time: $("#time").val(),
                rn: $("#rn").val(),
            }, function (data) {
                if (data == 'Successful') {
                    alert("Your reservation request has been placed.");
                } else if (data == 'Duplicate') {
                    alert("You already reserved your request. No need to submit again.");
                }
            });
        });
    });
})(jQuery);