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
    var empty = '<tr id="empty"><td colspan="8" align="center">暂无数据</td></tr>';
    var illegal = '<tr id="illegal"><td colspan="8" align="center">未知错误</td></tr>';
    var send = '<tr id="img"><td colspan="8" align="center"><i class="icon-spinner icon-spin orange bigger-125"></i></td></tr>';
    jQuery.ajax({
        'parentTr': $obj.parents('tr'),
        'url': url,
        'type': 'post',
        'dataType': 'html',
        'data': '',
        'success': function (responseText) {
            var html = responseText ? responseText : empty;
            this.parentTr.parent('tbody').html(html);
            tableInit();
            replaceUrl(url);
        },
        'error': function () {
            this.parentTr.after(illegal);
        },
        'complete': function () {
            var self = this;
            alert_time = setTimeout(function () {
                clearTimeout(alert_time);
                self.parentTr.parents('tbody').find('#empty, #illegal').fadeOut('fast', function () {
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

/*********************** 添加菜单 **********************************************/

/*********************** end添加菜单 **********************************************/
var tableInit = function () {
    jQuery('table').each(function (idx, item) {
        jQuery(item).find('.selectMenu').click(function () {
            ajaxRequest($(this));
        });
    });
};

var replaceUrl = function (url) {
    history.pushState({}, document.title, url);
};
(function ($) {
    tableInit();
})(jQuery);
