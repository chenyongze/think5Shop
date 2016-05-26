/**
 * Created by Administrator on 2016/5/26.
 */

/*********************** 菜单表格js **********************************************/
var ajaxRequest = function ($obj) {
    var url = $obj.attr('data-url');
    var tag = url.substring(url.lastIndexOf('/') + 1);
    if($obj.parents('tbody').find('tr[data-tag=' + tag + ']').html()){
        return false;
    }
    var pathName = window.document.location.pathname;
    var projectName = pathName.substring(0, pathName.substr(1).indexOf('/') + 1);
    var path = '/think5shop/';
    var empty = '<tr id="empty"><td colspan="8" align="center">暂无数据</td></tr>';
    var illegal = '<tr id="illegal"><td colspan="8" align="center">未知错误</td></tr>';
    var send = '<tr id="img"><td colspan="8" align="center"><img src="' + projectName + path + 'public/static/images/loaders/loader10.gif" /></td></tr>';
    jQuery.ajax({
        'parentTr': $obj.parents('tr'),
        'url': url,
        'type': 'post',
        'dataType': 'json',
        'data': '',
        'success': function (responseText) {
            var html = responseText ? responseText : empty;
            this.parentTr.after(html);
        },
        'error': function () {
            this.parentTr.after(illegal);
        },
        'complete': function () {
            var self = this;
            alert_time = setTimeout(function () {
                clearTimeout(alert_time);
                self.parentTr.parents('tbody').find('#empty, illegal').fadeOut('fast', function () {
                    this.remove();
                });
            }, 3000);
            this.parentTr.parents('tbody').find('#img').remove();
        },
        'beforeSend': function () {
            this.parentTr.after(send);
        }
    });
};

/*********************** end菜单表格js **********************************************/

(function ($) {
    $('table').each(function (idx, item) {
        $(item).click(function () {
            ajaxRequest($(item).find('a.btn_search'));
        });
    });
})(jQuery);
