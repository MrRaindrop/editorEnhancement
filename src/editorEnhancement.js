$(function() {
    var _lock = false,
        _lockTime = 0.1,  // lock for 0.1 second
        //_btnSave = $('#btn-save'),
        //_btnSubmit = $('#btn-submit'),
        KEYCODES = {
            'keySave': { // keyCode of 's'
                name: 'keySave',
                keyCode: 83,
                btn: $('#btn-save')
            },
            'keySubmit': { // keyCode of 'Enter'
                name: 'keySubmit',
                keyCode: 13,
                btn: $('#btn-submit')
            }
        };

    if (!window._rdp_) {
        window._rdp_ = {};
    }

    window._rdp_.EditorEnhancement = {
        enableShortcuts: function(shortcuts) {
            var _keyCodes = {}, _shortcut;
            for (var i = 0, l = shortcuts.length; i < l; i++) {
                _shortcut = shortcuts[i];
                if (KEYCODES.hasOwnProperty(_shortcut)) {
                    _keyCodes[KEYCODES[_shortcut].keyCode] = KEYCODES[_shortcut];
                }
            }
            $(document).on('keydown', function(e) {
                var key = e.keyCode || e.which;
                if (e.ctrlKey && (_keyCodes.hasOwnProperty(key))) {
                    if (_lock) return;
                    _lock = true;
                    e.preventDefault();
                    e.stopPropagation();
                    _keyCodes[key].btn.trigger('click');
                    setTimeout(function() {
                        _lock = false;
                    }, _lockTime * 1000);
                }
            });
        }
    };
});