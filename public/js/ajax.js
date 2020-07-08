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
                //alert(seenScrape );
                // alert(msg + seenScrape );
                // $(msg).text(seenScrape);
                if (seenScrape == "Undo"){
                    $(msg+"undo").closest('tr').removeClass('red').removeClass('green');                
                    $(msg+"undo").closest('tr').addClass('white');                
                    $(msg+"undo").hide();
                    $(msg+"scrape").closest('td').txt().hide();
                    $(msg+"seen").closest('td').txt().hide();
                    $(msg+"scrape").closest('form').find("input[name='seenScrape']").show();
                    $(msg+"seen").closest('form').find("input[name='seenScrape']").show();

                }
                if (seenScrape == "Seen"){
                    $(msg+"seen").closest('tr').removeClass('white');                
                    $(msg+"seen").closest('tr').addClass('red');                
                    $(msg+"scrape").hide();
                    $(msg+"seen").hide();
                    $(msg+"undo").closest('buttonSeen').show();

                }
                if (seenScrape == "Scrape"){
                    $(msg+"scrape").closest('tr').removeClass('white');                
                    $(msg+"scrape").closest('tr').addClass('green');                
                    $(msg+"scrape").hide();
                    $(msg+"seen").hide();
                    $(msg+"undo").closest('form').find("undo").show();
                }
            }
        });
    });
});
