var typingTimer;
var doneTypingInterval = 500; // delay in ms between the last keyup event and the moment the ajax query will be sent

$(document).ready(function(){
    // setting the input textarea autosizable with jQuery Autosize (http://www.jacklmoore.com/autosize)
    $("#input").autosize();
    
    $("#input").keyup(function(){
        clearTimeout(typingTimer);
        if ($('#input').val) {
            typingTimer = setTimeout(getResult, doneTypingInterval);
        }
    });
    
    $("a").click(function(e){
        e.preventDefault();
        
        // adding input string in url params
        window.location = $(this).attr("href") + "&input=" + $("#input").val();
    });
    
    getResult();
});

function getResult() {
    $.getJSON("", $("#transcoder").serialize(), function(response){
        $("#message").removeClass("alert-danger");
        $("#message").addClass("alert-info");
                
        if (response.result) {
            $("#result").html(response.result);

            // checking if the response contains red characters. If yes, the message is displayed in red.
            if (response.result.indexOf("<span class=\"unknown\">") != -1) {
                $("#message").removeClass("alert-info");
                $("#message").addClass("alert-danger");
            }
        }else {
            $("#result").html("");
        }
    });
}