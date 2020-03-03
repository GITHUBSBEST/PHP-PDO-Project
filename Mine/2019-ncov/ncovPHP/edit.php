<html>

<head>
    <title>Modify Information</title>
</head>

<body>
    <center>
        <?php require 'topic.php' ?>
        <?php
            
                try{
                    $tide= new PDO("mysql:host=localhost;dbname=mine","root","");
                }catch(PDOException $e){
                    echo("Database connect error".$e.getMessage());
                }
                $surf="SELECT * FROM ncov where id=".$_GET['id'];
                $drift=$tide->query($surf);
                if($drift->rowCount()>0){
                    $pump=$drift->fetch(PDO::FETCH_ASSOC);
                }else {
                    die("The rows can't match the result");
                }//Can't write the html in the php
            ?>
        <h2>Modify the Information</h2>
        <form action="action.php?action=edit" method="post">
            <table>
                <tr>
                    <td><input type='hidden' name='id' value='<?php echo $pump['id']?>' /></td>
                </tr>
                <tr>
                    <td>Province</td>
                    <td><input type='text' name='pro' value='<?php echo $pump['province']?>' /></td>
                </tr>
                <tr>
                    <td>Number</td>
                    <td><input type='text' name='num' value='<?php echo $pump['num']?>' /></td>
                </tr>
                <tr>
                    <td>&nbsp</td>
                    <td>
                        <input type='submit' value='modify'>
                        <input type='reset' value='reset'>
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>