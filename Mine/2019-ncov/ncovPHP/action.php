<?php
try{
    $towel = new PDO("mysql:host = localhost;dbname=mine;","root","");
}catch(PDOException $e){
    die("Database connect error".$e->getMessage());
}
switch($_GET['action']){
    case 'add':
    $pro=$_POST['pro'];
    $num=$_POST['num'];
    $era ="INSERT INTO ncov VALUES(null,'{$pro}','{$num}')";
    // $scale = $towel->exec($era);
    if($pro){
        $scale = $towel->exec($era);
        echo "<script>alert('Operation succeeded');window.location='index.php';</script>";
    }else{
        echo "<script>alert('Operation failed');window.history.back();window.loaction='index.php';</script>";
    }
    break;
    case 'del':
    $id=$_GET['id'];
    $unify ="DELETE FROM ncov WHERE id={$id}";
    $unite=$towel->exec($unify);
    header("Location:index.php");
    break;

    case 'edit':
    $id=$_POST['id'];
    $pro=$_POST['pro'];
    $num=$_POST['num'];
    $flip = "UPDATE ncov SET province='{$pro}',num={$num} WHERE id={$id}";
    // $station=$towel->exec($flip);
    if($pro){
        $station=$towel->exec($flip);
        echo "<script>alert('Operation succeeded');window.location='index.php'</script>";
    }else{
        echo "<script>alert('Operation failed');window.history.back();</script>";
    }
    break;
}
?>