/**
 * eidtorEnhancement.js by Mr.Raindrop 2015-02-04
 * use keyboard shortcuts for typecho post & page editor.
 * ctrl+s : save draft
 * ctrl+Enter : publish post
 *
 **/
$(function() {
    var _lock = false,
        _lockTime = 0.1,  // lock for 0.1 second
        _btnSave = $('#btn-save'),
        _btnSubmit = $('#btn-submit'),
        SKEYCODE_SAVE = 83,  // keyCode of 's'
        SKEYCODE_POST = 13;     // keyCode of 'Enter'
    $(document).on('keydown', function(e) {
        var key = e.keyCode || e.which;
        if (e.ctrlKey && (key === SKEYCODE_SAVE || key === SKEYCODE_POST)) {
            if (_lock) return;
            _lock = true;
            e.preventDefault();
            e.stopPropagation();
            switch(key) {
                case SKEYCODE_SAVE:
                    _btnSave.trigger('click');
                    break;
                case SKEYCODE_POST:
                    _btnSubmit.trigger('click');
                    break;
                default:
                    break;
            }
            setTimeout(function() {
                _lock = false;
            }, _lockTime * 1000);
        }
    });
});