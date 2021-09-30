<!-- BootStrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!-- BootStrap以上 -->

<?php
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES);
}
?>
<html>
<head>

<!-- DB接続処理 -->
<?php
try {
    $db = new PDO('mysql:dbname=HWgantt;host=localhost;charset=utf8',
    'root', 'root');
}catch(PDOException $e){
    echo 'DB接続エラー： '. $e->getMessage();

}
?>
<!-- DB接続処理以上 -->

<div class = "container">
<h1 class= "mt-5">家事スケジュール</h1>
<?php
$records = $db ->query('SELECT * FROM Items');
while ($record = $records->fetch()){
    echo(h($record['housework']) . h($record['charge']) . h($record['stime']). "〜" . h($record['ftime']) . "<br/>\n");
}
?>
</div>

<div class = "container">
<h2 class= "mt-5"> 父がやること </h1>
<?php
$records = $db ->query('SELECT * FROM Items WHERE charge="父"');
while ($record = $records->fetch()){
    echo($record['housework'] . $record['charge'] . $record['stime']. "〜" . $record['ftime'] . "<br/>\n");
}
?>
</div>

<div class = "container">
<h3 class= "mt-5"> 母がやること </h1>
<?php
$records = $db ->query('SELECT * FROM Items WHERE charge="母"');
while ($record = $records->fetch()){
    echo($record['housework'] . $record['charge'] . $record['stime']. "〜" . $record['ftime'] . "<br/>\n");
}

?>

</div>

