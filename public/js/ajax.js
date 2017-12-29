$(document).ready(function() {
    $('.seenScrape').on('submit', function (e) {
        e.preventDefault();
        id = $(this).closest("form").find("input[name='id']").val();
        seenScrape = $(this).closest("form").find("input[name='seenScrape']").val();
        // alert (seenScrape);
        var that = $(this);
        $.ajax({
            type: "POST",
            url: "/planes/ajax",
            data: $(this).serialize(),
            success: function(msg) {
                // alert(msg + seenScrape );
                $(msg).text(seenScrape);
                $(msg+"scrape").text("");
                if (seenScrape == "Seen"){
                     $(msg).closest('tr').addClass('red');                
                }
                else {
                     $(msg).closest('tr').addClass('green');                
                }
            }
        });
    });
});
