<html>
  <head>
    <title>Relacionar Projeto e Recurso</title>
  </head>

  <body>
    <form name="RelacionarProjetoRecursos" method="post" action="ProjetoRecurso.php">
     <table border=1>
      <tr>Relacionar Projeto e Recursos</tr>

      <tr><td>Nome Projeto: 
              <select name="projeto">
              <option value=" ">Selecione...</option>

              <?php
                 echo "carregar com while as opçoes da base projeto"
              ?>

              </select>


      <tr><td>Nome Recurso: 
              <select name="projeto">
              <option value=" ">Selecione...</option>

              <?php
                 echo "carregar com while as opçoes da base recurso"
              ?>

              </select>
     </td></tr>
     <tr><td><input type="submit" value="Relacionar"></td></tr>
     </table>
    </form>
  </body>
</html>