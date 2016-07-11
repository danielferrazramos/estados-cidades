<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Teste JSON</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <script type="text/javascript">  
    
    $(document).ready(function () {
    
      $.getJSON('json/estados_cidades.json', function (data) {
        var items = [];
        var options = '<option value="" disabled selected>Escolha seu estado</option>'; 
        $.each(data, function (key, val) {
          options += '<option value="' + val.nome + '">' + val.nome + '</option>';
        });         
        $("#estado").html(options);       
        
        $("#estado").change(function () {       
        
          var options_cidades = '<option value="" disabled selected>Escolha sua cidade</option>';
          var str = "";
          
          $("#estado option:selected").each(function () {
            str += $(this).text();
          });
          
          $.each(data, function (key, val) {
            if(val.nome == str) {             
              $.each(val.cidades, function (key_city, val_city) {
                options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
              });             
            }
          });
          $("#cidade").html(options_cidades);
          
        }).change();    
      
      });
    
    });
    
  </script>

</head>
<body>

  <select name="estado" id="estado">
    <option value="" disabled></option>
  </select>

  <select name="cidade" id="cidade">
    <option value="" disabled></option>
  </select>

</body>
</html>