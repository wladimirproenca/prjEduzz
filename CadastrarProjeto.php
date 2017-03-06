<html>
  <head>
    <title>Projeto Cadastrado</title>
  </head>
<body>

<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "projetozz_db";
$conexao = mysql_connect($host,$user,$pass) or die ("Não foi possível conectar com o banco de dados");
mysql_select_db($database,$conexao) or die ("Não foi possível selecionar o banco");
?>

<?php
      $sqltop1 = 0;
      $nome=$_POST['nomeprojeto'];
      $descprojeto=$_POST['descprojeto'];
      $statusprojeto=$_POST['statusprojeto'];

      $sql = mysql_query("select max(codprojeto) + 1 from tprojetos");

      $sql = mysql_query("Insert into tprojetos values ($sqltop1, '$nome', '$descprojeto','$statusprojeto')");

      $sql = "Select * from tprojetos order by prj_cod asc";

      $rs = mysql_query($sql) or die(mysql_error());

      // pega o número de linhas que a query retornou

      $num_reg = mysql_num_rows($rs);

      echo  "<table border=1 align='center' width='400px'>";
      echo  "<tr height=30><td colspan=4 align='center' >Projeto Cadastrado Com Sucesso!</td></tr>";
      echo  "<tr height=30><td colspan=4 align='center'>Projetos Cadastrados</td></tr>";
      echo  "<tr height=30><td>Código Projeto:</td>";
      echo  "<td>Nome Projeto:</td>";
      echo  "<td>Desc. Projeto:</td>";
      echo  "<td>Status:</td>";
      echo  "</tr>";



      // faz um loop de 0 até o numero de linhas encontradas
      for($i=0;$i<$num_reg;$i++) {
         // busca os campos da query
            $campo = mysql_fetch_array($rs);
            // armazena cada campo do banco em uma variável
            $prj_cod = $campo["prj_cod"];
            $prj_nome = $campo["prj_nome"];
            $prj_descricao = $campo["prj_descricao"];
            $prj_deleted = $campo["prj_deleted"];

           // exibe o resultado
           echo  "<tr height=30><td>".    $prj_cod; 
           echo  "</td>";
           echo  "<td>".                  $prj_nome;
           echo  "</td>";      
           echo  "<td>".                  $prj_descricao;
           echo  "</td>";
           echo  "<td>".                  $prj_deleted;
           echo  "</td></tr>";
    }

           echo  "<tr height=30><td colspan=4 align='center'><a href='projeto.php'>Cadastrar Projeto</a></td></tr>";
           echo  "</table>"; 

?>


</body>
</html>