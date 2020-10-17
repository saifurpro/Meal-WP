;(function($){
    $(document).ready(function(){
        $("#load_more").on("click", function(e){
            e.preventDefault();

            var nexturl = $(this).attr("href");
            $.get(nexturl, {}, function(data){
                var posts = $(data).find(".post-container").html();
                 console.log(posts);

                $(".post-container").append(posts);

                var newpagelink = $(data).find("#load_more").attr("href");

                if(newpagelink){
                    $("#load_more").attr("href", newpagelink);
                }else {
                    $("#load_more").addClass("disabled");
                }
            })
        });

         var newpagelink = $("#load_more").attr("href");
         if(! newpagelink){
             $("#load_more").hide();
         }
    });
})(jQuery);