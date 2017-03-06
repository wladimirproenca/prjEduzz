<html>
 </head>
  <body>
    <form name="CadastrarProjetos" method="post" action="CadastrarProjeto.php">
     <table border=1 align="center" width="400px">
      <tr height=30><td colspan=2 align="center">Cadastro de Projetos</td></tr>
      <tr height=30><td>Nome Projeto:</td><td><input type="text" name="nomeprojeto" /></td></tr>
      <tr height=50><td>Desc. Projeto:</td><td><textarea name="descprojeto"></textarea></td>
      <tr height=30><td>Status:</td>
              <td> 
              <select name="statusprojeto">
              <option value="0">Selecione...</option>
              <option value="1">Ativo</option>
              <option value="2">Inativo</option>
              </select>
              </td>
      <tr height=30><td colspan=2 align="center"><input type="submit" value="Cadastrar Projeto"></td></tr>

      <tr height=30><td colspan=2 align="center"><a href="index.php">Menu do Sistema</a></td></tr>


     </table>
    </form>
  </body>
</html>


