/**
 * Created by lenovo on 2016/5/15.
 */

$(function (e) {
    $('#test').click(function () {
        alert('');
        $.post($(this).attr('data-url'), function (re) {
            console.log(re);
        })
    });
});