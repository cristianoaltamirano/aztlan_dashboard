$(function () {

    $(document).ready(function () {

        //$('.nombre').editable();
        $.fn.editable.defaults.mode = 'popup';
        $.fn.editable.defaults.placement = 'bottom';

        bind_editable_to_column('#table-reservas', 'tr td a.nombre', site_url + 'setReserva', 'Reserva Nombre');
        bind_editable_to_column('#table-reservas', 'tr td a.apellido', site_url + 'setReserva', 'Reserva Apellido');
        var situacion_names = [
            {value: 'Confirmó', text: 'Confirmó'},
            {value: 'Envíe Whats app', text: 'Envíe Whats app'},
            {value: 'Rellamar', text: 'Rellamar'},
            {value: 'Entrevista', text: 'Entrevista'},
            {value: 'Dudas', text: 'Dudas'},
            {value: 'Enviar mail', text: 'Enviar mail'},
            {value: 'Canceló - reprogramar', text: 'Canceló - reprogramar'},
            {value: 'Mal el número', text: 'Mal el número'},
            {value: 'Se anotó', text: 'Se anotó'},
            {value: 'Vino, no se anotó', text: 'Vino, no se anotó'},
            {value: 'No le interesa', text: 'No le interesa'},
            {value: 'No llamar', text: 'No llamar'},
            {value: 'Rechazado', text: 'Rechazado'},
            {value: 'En espera', text: 'En espera'},
            {value: 'Aprobado', text: 'Aprobado'},
            {value: '-', text: '-'}
        ];

        bind_editable_to_column('#table-reservas', 'tr td a.situacion', site_url + 'setReserva', 'Reserva Situacion', situacion_names);
        bind_editable_to_column('#table-reservas', 'tr td a.motivo', site_url + 'setReserva', 'Reserva Motivo');
        bind_editable_to_column('#table-reservas', 'tr td a.telefono', site_url + 'setReserva', 'Reserva Teléfono');
        bind_editable_to_column('#table-reservas', 'tr td a.dni', site_url + 'setReserva', 'Reserva dni');
        bind_editable_to_column('#table-reservas', 'tr td a.email', site_url + 'setReserva', 'Reserva email');
        bind_editable_to_column('#table-reservas', 'tr td a.facebook', site_url + 'setReserva', 'Reserva facebook');
        bind_editable_to_column('#table-reservas', 'tr td a.linkfacebook', site_url + 'setReserva', 'Reserva linkfacebook');
        bind_editable_to_column('#table-reservas', 'tr td a.ok', site_url + 'setReserva', 'Reserva ok');
        bind_editable_to_column('#table-reservas', 'tr td a.interes', site_url + 'setReserva', 'Reserva interes');
        bind_editable_to_column('#table-reservas', 'tr td a.quien', site_url + 'setReserva', 'Reserva quien');
        bind_editable_to_column('#table-reservas', 'tr td a.hora', site_url + 'setReserva', 'Reserva hora');
        bind_editable_to_column('#table-reservas', 'tr td a.consulta', site_url + 'setReserva', 'Reserva consulta');
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

    $('.situacion').on('save', function(e, params) {
        //alert('Saved value: ' + params.newValue);
        var colorRow = '';
        switch (params.newValue)
        {
            case 'Confirmó':
                colorRow = '#FFFFFF';
                break;
            case 'Envíe Whats app':
                colorRow = '#ffb7b5';
                break;
            case 'Rellamar':
                colorRow = '#c1ccff';
                break;
            case 'Entrevista':
                colorRow = '#FFFFFF';
                break;
            case 'Dudas':
                colorRow = '#FFFFFF';
                break;
            case 'Enviar mail':
                colorRow = '#FFFFFF';
                break;
            case 'Canceló - reprogramar':
                colorRow = '#FFFFFF';
                break;
            case 'Mal el número':
                colorRow = '#FFFFFF';
                break;
            case 'Se anotó':
                colorRow = '#62ff5b';
                break;
            case 'Vino, no se anotó':
                colorRow = '#FFFFFF';
                break;
            case 'No le interesa':
                colorRow = '#FFFFFF';
                break;
            case 'No llamar':
                colorRow = '#FFFFFF';
                break;
            case 'Rechazado':
                colorRow = '#d7b3da';
                break;
            case 'En espera':
                colorRow = '#faff57';
                break;
            case 'Aprobado':
                colorRow = '#ffb7b5';
                break;
        }

        $(this).parent().parent().css('background-color', colorRow);
        $(this).parent().parent().closest('a:hover').css('color', 'white');
    });

});

