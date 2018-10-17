function init() {
    $("#bookingForm").show().submit(submitForm2).addClass("positioned"), $('a[href="#bookingForm"]').click(function() {
        return $("#bookingForm").fadeTo("slow", .2), $("#bookingForm").fadeIn("slow", function() {
            $("#senderName2").focus()
        }), !1
    })
}

function submitForm2() {
    var e = $(this);
    return $("#senderName2").val() && $("#senderEmail2").val() && $("#message2").val() ? ($("#sendingMessage2").fadeIn(), e.fadeOut(), $.ajax({
        url: e.attr("action") + "?ajax=true",
        type: e.attr("method"),
        data: e.serialize(),
        success: submitFinished
    })) : ($("#incompleteMessage2").fadeIn().delay(messageDelay2).fadeOut(), e.fadeOut().delay(messageDelay2).fadeIn()), !1
}

function submitFinished(e) {
    e = $.trim(e), $("#sendingMessage2").fadeOut(), "success" == e ? ($("#successMessage2").fadeIn().delay(messageDelay2).fadeOut(), $("#senderName2").val(""), $("#senderEmail2").val(""), $("#message2").val(""), $("#bookingForm").delay(messageDelay2 + 500).fadeIn()) : ($("#failureMessage2").fadeIn().delay(messageDelay2).fadeOut(), $("#bookingForm").delay(messageDelay2 + 500).fadeIn())
}
var messageDelay2 = 2e3;
$(init);