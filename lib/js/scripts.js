$(function () {

    $(document).ready(function () {

        //$('.nombre').editable();
        $.fn.editable.defaults.mode = 'popup';
        $.fn.editable.defaults.placement = 'bottom';

        bind_editable_to_column('#table-reservas', 'tr td a.nombre', site_url + 'setReserva', 'Reserva Nombre');
        bind_editable_to_column('#table-reservas', 'tr td a.apellido', site_url + 'setReserva', 'Reserva Apellido');
        var situacion_names = [
            {value: 'Aprobado', text: 'Aprobado'},
            {value: 'Rechazado', text: 'Rechazado'},
            {value: 'En Espera', text: 'En Espera'},
            {value: '-', text: '-'}
        ];
        bind_editable_to_column('#table-reservas', 'tr td a.situacion', site_url + 'setReserva', 'Reserva Situacion', situacion_names);
        bind_editable_to_column('#table-reservas', 'tr td a.telefono', site_url + 'setReserva', 'Reserva Teléfono');
    });

    function bind_editable_to_column(table_selector, column_selector, ajax_url, title, options) {
        options = typeof options !== 'undefined' ? options : ''; //assigning source to empty when not specified. source is only used for select.
        $(table_selector).editable({
            selector: column_selector,
            url: ajax_url,
            title: title,
            ajaxOptions: {
                type: 'POST',
                dataType: 'json'
            },
            source: options
        });
    }

});

