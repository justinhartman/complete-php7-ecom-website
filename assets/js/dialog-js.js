	(function() {
        var dlgtrigger = document.querySelector('[data-dialog]'),
            somedialog = document.getElementById(dlgtrigger.getAttribute('data-dialog')),
            dlg = new DialogFx(somedialog);

        dlgtrigger.addEventListener('click', dlg.toggle.bind(dlg));

    })();

	(function() {
        var dlgtrigger = document.querySelector('[data-dialog1]'),
            somedialog1 = document.getElementById(dlgtrigger.getAttribute('data-dialog1')),
            dlg = new DialogFx(somedialog1);

        dlgtrigger.addEventListener('click', dlg.toggle.bind(dlg));

    })();

	(function() {
        var dlgtrigger = document.querySelector('[data-dialog2]'),
            somedialog2 = document.getElementById(dlgtrigger.getAttribute('data-dialog2')),
            dlg = new DialogFx(somedialog2);

        dlgtrigger.addEventListener('click', dlg.toggle.bind(dlg));

    })();
