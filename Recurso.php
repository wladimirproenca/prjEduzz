<html>
  <head>
    <title>Cadastrar Recurso</title>
  </head>

  <body>
    <form name="CadastrarRecursos" method="post" action="CadastrarRecurso.php">
     <table border=1>
      <tr>Cadastrar Recursos</tr>
      <tr><td>Cod Recurso: <input type="text" name="codrecurso" /></td></tr>
      <tr><td>Nome Recurso: <input type="text" name="nomerecurso" /></td></tr>
      <tr><td>Email: <input type="text" name="emailrecurso" /></td>
      <tr><td>Fone: <input type="text" name="fonerecurso" /></td></tr>
      <tr><td>Tipo Recurso: 
              <select name="tiporecurso">
              <option value=" ">Selecione...</option>
              <option value="1">Desenvolvedor</option>
              <option value="2">Analista</option>
              <option value="3">Tester</option>
              <option value="4">StakeHolder</option>
              </select>
     </td></tr>
     <tr><td><input type="submit" value="Cadastrar Recurso"></td></tr>
     </table>
    </form>
  </body>
</html>
