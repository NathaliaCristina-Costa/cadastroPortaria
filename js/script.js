$(document).ready(function() {
    $('#dataTable').DataTable();

    $('#rg').hide();
    $('#cpf').hide();
    $('#matricula').hide();

    $('#documento').change(function(){
        var valorEscolhido = $('#documento option:selected').text();

        if(valorEscolhido == 'RG'){
            $('#rg').show();
            $('#cpf').hide();
            $('#matricula').hide();
        }else if(valorEscolhido == 'CPF'){
            $('#rg').hide();
            $('#cpf').show();
            $('#matricula').hide();
        }else{
            $('#rg').hide();
            $('#cpf').hide();
            $('#matricula').show();
        }
    });

    
});