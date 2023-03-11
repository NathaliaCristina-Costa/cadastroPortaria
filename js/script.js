$(document).ready(function() {
    $('#dataTable').DataTable();

 
    $('#documento').change(function(){
        var valorEscolhido = $('#documento option:selected').text();

        if(valorEscolhido == 'RG'){
            $('#identificacao').mask('00.000.000-0');
        }else if(valorEscolhido == 'CPF'){
            $('#identificacao').mask('000.000.000-00');
        }else{
            $('#identificacao').mask('000.000.000');
        }
    });

    
});