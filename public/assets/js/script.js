$(document).ready(function(){
    $('.select2').select2()

    function disabled(){
        if($('#forma-de-pago').val() == 'Efectivo'){
            $('#cash').prop("disabled", false);
            $('#bank').prop("disabled", true);
        }else if($('#forma-de-pago').val() == 'Transferencia'){
            $('#cash').prop("disabled", true);
            $('#bank').prop("disabled", false);       
        }else{
            $('#cash').prop("disabled", false);
            $('#bank').prop("disabled", false);  
        }
    }

    disabled();

    $('#forma-de-pago').on('input', function(){
        disabled();
    })

    $('#monto').on('input', function(){
        var monto = new Intl.NumberFormat({ style: 'currency', currency: 'USD' }).format($('#monto').val());
        $('#montoFormateado').html('$ ' + monto);
    });

    $('.datatable').DataTable({
        "lengthMenu": [ [10, 25, 50, -1], ["10 Entradas", "25 Entradas", "50 Entradas", "Ver Todos"] ],
        order: [[0, 'desc']],
        dom: 'Bfrtip',
        buttons: ['pageLength',
            {
                extend: 'copy',
                text: '<i class="far fa-copy"></i> Copiar Tabla',
                footer: true
            }, {
                extend: 'excel',
                text: '<i class="far fa-file-excel"></i> Descargar Excel',
                footer: true
            }, {
                extend: 'pdfHtml5',
                text: '<i class="far fa-file-pdf"></i> Descargar PDF',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                footer: true
            }
        ],
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": '<i class="fas fa-angle-right"></i>',
                "previous": '<i class="fas fa-angle-left"></i>'
            }
        },
      });

    $("#checkAll").click(function(){
        $('.checkOne').not(this).prop('checked', this.checked);
    });

    $('.reverse').on('submit', function(e){
        if(confirm('Estás seguro(a) de ejecutar esta acción')){
            return true;
        }else{
            return false;
        }
    });

    const getCashData = async (id) => {
        await fetch(`/api/getCashData`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With' : 'XMLHttpRequest',
            },
            body: JSON.stringify({id})
        })
        .then((res) => res.json())
        .then((res) => {
            console.log(res)
            res.total && $('#totalCash').val(res.total)
        })
        .catch(err => console.log(err))
    }

    $('#cash').on('select2:select', function() {
        var id = $('#cash').val()
        getCashData(id)
    })

    $('.expensesCreate').on('submit', function() {
        totalCaja = parseFloat($('#totalCash').val())
        monto = parseFloat($('#monto').val())

        if(($('#cash').val() || $('#cash').prop('disabled')) && (totalCaja - monto < 0)){
            if(confirm('El monto establecido es mayor al saldo de la caja, estas seguro de ejecutar esta accion?')){
                return true
            }else{
                return false
            }
        }
    })

    $('.closureCreate').on('submit', function()  {
        if(confirm('Estas seguro de ejecutar esta accion? al cerrar esta caja los efectos seran irreversibles, no podras modificar registros anteriores a la fecha establecida')){
            return true
        }else{
            return false
        }
    })

});