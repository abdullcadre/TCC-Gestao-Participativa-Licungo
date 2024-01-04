<?php
$host = "localhost";  
$user = "root";
$pass = "";
$db = "cms";
//ini_set('display_errors',0);
header('Content-Type: text/html; charset=UTF-8');
ini_set('mbstring.internal_encoding','UTF-8');
ini_set('mbstring.func_overload',7);
header('Content-Type: text/html; charset=UTF-8');
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);
mysqli_set_charset($mysqli,"utf8");
if (!ini_set('default_charset', 'utf-8')) {
echo "could not set default_charset to utf-8<br>";
}
$action = $_GET["action"];
switch ($action) 

{


case "PegaTodasManifestacoesUser":
$subcategory= $_GET["subcategory"];
$sql = "SELECT * FROM `complaints` WHERE id='$subcategory' or id_file='$subcategory' or user_name like '%$subcategory%' LIMIT 1";
$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;







case "PegaTodasManifestacoes":
$subcategory= $_GET["subcategory"];
$ord= $_GET["ord"];
if ($ord=="n") {
   $ord='complaintNumber';
}
$sql = "SELECT * FROM `complaints` WHERE dept_id like '%$subcategory%'  or description like '%$subcategory%' or subject like '%$subcategory%' ORDER BY id DESC ";
$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;






case "PegaUmaManifestacoes":
$id= $_GET["id"];
$sql = "SELECT * FROM `tblcomplaints` WHERE complaintNumber = '$id' LIMIT 1 ";
$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;



case "PegaCom":
$id= $_GET["id"];
$sql = "SELECT * FROM  complaintremark WHERE complaintNumber='$id'  ORDER BY id DESC;";
$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;

case "logarDep":
$usuario=$_GET["usuario"];
$senha=md5($_GET["senha"]);
$sql = "SELECT * FROM users WHERE email='$usuario' and password='$senha' LIMIT 1";
$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
	 
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
          

            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;



case "PegaTodosUser":
$id= $_GET["id"];
$sql = "SELECT * FROM  users WHERE id='$id'  ORDER BY id DESC LIMIT 1;";
$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;




case "PegaFiles4":
$Arquivo= $_GET["Arquivo"];
$sql = "SELECT * FROM  ficheiros WHERE Arquivo='$Arquivo'  ORDER BY id DESC LIMIT 1;";

$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;



case "PegaFiles":
$Arquivo= $_GET["Arquivo"];
$sql = "SELECT * FROM  ficheiros WHERE Arquivo='$Arquivo'  ORDER BY id DESC;";
$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;

case "PegaCat":
$sql = "SELECT * FROM  category ORDER BY id DESC";
$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;

case "PegaDep":
$sql = "SELECT * FROM `departments` ORDER BY `id` DESC ";
$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;




case "PegaCat2Uma":
$chave= $_GET["chave"];
$sql = "SELECT * FROM  category where id = '$chave' ORDER BY id DESC LIMIT 1";
$result = $mysqli->query($sql); 
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;

case "PegaCat2":
$chave= $_GET["chave"];
$sql = "SELECT * FROM  category where categoryName like '%$chave%' or categoryDescription like '%$chave%' ORDER BY id DESC";
$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;

case "pesquisaPorFiles":
$chave= $_GET["chave"];
$sql = "SELECT * FROM  obra WHERE files = '$chave' ORDER BY data DESC LIMIT 1;";
$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;




case "pesquisaObra":
$chave= $_GET["chave"];
$sql = "SELECT * FROM  obra WHERE autor like '%$chave%' or id='$chave' or categoria like '%$chave%'  or tema like '%$chave%'  ORDER BY data DESC;";
$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;

case "PegaInfinito":
$sql = "SELECT * FROM `obra` ORDER BY `obra`.`data` DESC;";

$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;


case "PegaInfinitoId":
$categoria= $_GET["categoria"];
$sql = "SELECT * FROM  obra WHERE id='$categoria' or categoria='$categoria' ORDER BY data DESC;";
$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;


case "AddFile":
$Arquivo=$_GET["Arquivo"];
$NomeFile=$_GET["NomeFile"];
$Dir=$_GET["Dir"];
$Tipo=$_GET["Tipo"];
$data=date("m/d/Y");
$hora=date("H:m");
$sql1 = "INSERT INTO `ficheiros` (`id`, `NomeFile`, `Dir`, `Tipo`,`Arquivo`,`data`,`hora`) VALUES (NULL, '$NomeFile', '$Dir', '$Tipo','$Arquivo','$data','$hora');
";

$result = $mysqli->query($sql1);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
//echo $sql1.'\n';
echo $mysqli->error;
}
else
{
echo "Sucesso";
}
break;


case "AddMan":
$subject=$_GET['subject'];
$description=$_GET['description'];
$dept_id=$_GET['dept_id'];
$user_name=$_GET['user_name'];
$id_file=$_GET["id_file"];
$Type_id=$_GET["Type_id"];
if ($description="nulo" or $description=null ){
$description="NULL";
}
$sql1 = "INSERT INTO `complaints` (`id`, `subject`, `description`, `dept_id`,`Type_id`,`user_name`, `status`, `id_file`, `created_at`) VALUES (NULL, '$subject', '$description', '$dept_id','$Type_id', '$user_name', 'Pendente', '$id_file', CURRENT_TIMESTAMP);";

$result = $mysqli->query($sql1);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
//echo $sql1.'\n';
echo $mysqli->error;
}
else
{
echo "Sucesso";
}
break;


case "ApagarMan":
$id=$_GET["id"];
$sql2 ="DELETE FROM `tblcomplaints` WHERE `protocolo` = '$id'";
$result2 = $mysqli->query($sql2);

if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $mysqli->error;
}
else
{

}
break;


case "ApagarCat":
$id=$_GET["id"];
$sql2 ="DELETE FROM `category` WHERE `id` = '$id'";
$result2 = $mysqli->query($sql2);

if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $mysqli->error;
}
else
{

}
break;

case "AddCatg":
$categoryName=$_GET["categoryName"];
$categoryDescription=$_GET["categoryDescription"];
$dep=$_GET["dep"];
$sql2 ="INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`, `dep`) VALUES (NULL, '$categoryName', '$categoryDescription', CURRENT_TIMESTAMP, NULL,'$dep');";
$result2 = $mysqli->query($sql2);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $mysqli->error;
}
else
{

}
break;



case "actualizaCat":
$idm=$_GET["idm"];
$categoryName=$_GET["categoryName"];
$categoryDescription=$_GET["categoryDescription"];

$sql2 ="UPDATE `category` SET `categoryName` = '$categoryName', `categoryDescription` = '$categoryDescription' WHERE `category`.`id`='$idm'";
$result2 = $mysqli->query($sql2);

if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $mysqli->error;
}
else
{

}
break;

case "actualizamanifestacaoUser":
$idm=$_GET["idm"];
$status=$_GET["status"];
$nota=$_GET["nota"];
$autor=$_GET["autor"];
if ($nota=="") {
echo "Sucesso 002";
}
else{
$sql1 ="insert IGNORE into complaintremark(complaintNumber,remark,autor) values('$idm','$nota','$autor')";
$result = $mysqli->query($sql1);
echo "Sucesso 1";
}
//$sql2 ="update tblcomplaints set status='$status' where complaintNumber='$idm'";
//$result2 = $mysqli->query($sql2);

if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $mysqli->error;
}
else
{

}
break;

case "actualizamanifestacao":
$idm=$_GET["idm"];
$status=$_GET["status"];
$nota=$_GET["nota"];
$autor=$_GET["autor"];

if ($nota=="") {
echo "Sucesso 002";
}
else{
$sql1 ="insert IGNORE into complaintremark(complaintNumber,status,remark,autor) values('$idm','$status','$nota','$autor')";
$result = $mysqli->query($sql1);
echo "Sucesso 1";
}
$sql2 ="update complaints set status='$status' where id='$idm'";
$result2 = $mysqli->query($sql2);

if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $mysqli->error;
}
else
{

}
break;


case "logar":
$usuario=$_GET["usuario"];
$senha=sha1(md5($_GET["senha"]));
$sql = "SELECT * FROM user WHERE usuario='$usuario' and senha='$senha' LIMIT 1";
$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("semsucesso");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;


case "AddUser":
$nome=$_GET["nome"];
$user=$_GET["user"];
$senha1=$_GET["senha"];
$sql1="INSERT INTO `user` (`id`, `usuario`, `nome`, `senha`,`admin` ) VALUES (NULL, '$user', '$nome', sha1(md5('$senha1')),0);";
$result = $mysqli->query($sql1);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql1.'\n';
echo $mysqli->error;
}
else
{
echo "Certo";           
}
break;


//Notificacoes--------------------------------------------
//

case "AddNotif":
$remetende=$_GET["remetende"];
$corpo=$_GET["corpo"];
$assunto=$_GET["assunto"];
$receptor=$_GET["receptor"];
$sql1="INSERT INTO `notification` (`id_notification`, `remetende`, `corpo`, `lida`, `assunto`, `receptor`) VALUES (NULL, '$remetende', '$corpo', '0', '$assunto', '$receptor');";
$result = $mysqli->query($sql1);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $mysqli->error;
}
else
{
echo "Sucesso";
}
break;



case "marcalida":
$id=$_GET["id"];
$sql1="UPDATE `notification` SET `lida` = '1' WHERE `notification`.`id_notification` = '$id';";
$result = $mysqli->query($sql1);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $mysqli->error;
}
else
{
echo "Sucesso";
}
break;


case "PegaNot":
$receptor=$_GET["receptor"];
$sql = "SELECT * FROM `notification` WHERE lida = '0' and receptor like '%$receptor%';";
$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("sem");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;

case "PegaTodas":
$sql = "SELECT * FROM `notification`;";
$result = $mysqli->query($sql);
if ($mysqli->errno)
{
header("HTTP/1.1 500 Internal Server Error");
echo $sql.'\n';
echo $mysqli->error;
}
else
{
    if ($result->num_rows == 0)
            {
                echo("sem");
                exit;
            }
            
$rows = array();
while ($row = $result->fetch_assoc()) 
{
$rows[] = $row;
}
print json_encode($rows);
}
break;
default: 
echo "HUM";
}



