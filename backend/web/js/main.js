// listen click, open modal and .load content
$('#modalButton').click(function () {
    $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
});

// serialize form, render response and close modal
//function submitForm($form) {
//    $.post(
//            $form.attr("action"), // serialize Yii2 form
//            $form.serialize()
//            )
//            .done(function (result) {
//                $form.parent().html(result.message);
//                $('#modal').modal('hide');
//            })
//            .fail(function () {
//                console.log("server error");
//                $form.replaceWith('<button class="newType">Fail</button>').fadeOut()
//            });
//    return false;
//}
function submitform(id) {
    // get the form id and set the event handler
    $('form#' + id).on('beforeSubmit', function(e) {
        var form = $(this);
        $.post(
            form.attr("action"),
            form.serialize()
        )
        .done(function(result) {
            form.parent().html(result);
        })
        .fail(function() {
            console.log("server error");
        });
        return false;
    }).on('submit', function(e){
        e.preventDefault();
    });
}
