/**
 * Created by lenovo on 2016/5/14.
 * 检查表单输入
 */

/**
 * ajax验证
 * @param $option
 * @returns {{}}
 */
var ajaxValid = function ($option) {
    if (!$option.attr('remote')) {
        return false;
    }
    var url = $option.attr('remote');
    var data = {value: $option.val()};
    var result = {};
    $.post(url, data, function (re) {
        console.log(re);
        if (re.error) {
            result = {result: 'error'}
        } else if (re.success) {
            result = {result: re.success};
        }
    }, 'json');
    return result;
};

/**
 * 正则检查
 * @param $option
 * @returns {boolean}
 */
var preg = function ($option) {
    var type = $option.attr('validType');
    if (!type) {
        return;
    }
    var regex = {
        'number': '',
        'email': '',
        'mobile': ''
    };
    return regex[type].test($option.val());
};

/**
 * 表单非空检查
 * @param $option
 * @returns {boolean}
 */
var required = function ($option) {
    if (!$option.attr('required')) {
        return;
    }
    if ($option.val().trim()) {
        return true;
    }
    return false;
};

(function (e) {
    var $options = $('[validData="true"]').find('input, select, textarea');
    $.each($options, function (idx, item) {
        $(item).change(function () {
            preg($(this));
            required($(this));
            ajaxValid($(this));
        });
    });
})();
