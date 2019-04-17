//bootstrap validate
$(function () {
    // validate form
    $('form').bootstrapValidator({
        excluded: [':disabled'],
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
    }).on('err.field.fv', function (e, data) {
        var $invalidFields = data.fv.getInvalidFields().eq(0);
        var $tabPane = $invalidFields.parents('.tab-pane'),
            invalidTabId = $tabPane.attr('id');
        if (!$tabPane.hasClass('active')) {
            $invalidFields.focus();
        }
    }).on('keyup keypress', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13 && !$(e.target).is("textarea") && $(e.target).closest('form').attr('id') != 'search-form' && $(e.target).closest('form').attr('id') != 'filter-form') {
            e.preventDefault();
            return false;
        }
    });
    $.fn.bootstrapValidator.i18n = $.extend(true, $.fn.bootstrapValidator.i18n, {
        notEmpty: {
            'default': 'Vui lòng nhập giá trị'
        },
    }(window.jQuery))
});
