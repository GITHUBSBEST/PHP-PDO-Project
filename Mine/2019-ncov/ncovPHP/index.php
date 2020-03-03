<html>

<head>
    <title>Epidemic information</title>
    <script>
    function doDel(id) {
        if (confirm('Are you sure to delete this data?')) {
            window.location = 'action.php?action=del&id=' + id;
        }
    }
    </script>

<body>
    <center>
        <?php require "topic.php"; ?>
        <h2>Epidemic information of provinces and cities</h2>
        <table width="600" border="1">
            <tr>
                <th>Id</th>
                <th>Province</th>
                <th>Total_num</th>
                <th>Now_num</th>
                <th>Dead_num</th>
                <th>Cure_num</th>
                <th>Operation</th>
            </tr>
            <?php 
                try{
                    $figure=new PDO("mysql:host=localhost;dbname=test","root","");
                }catch(PDOException $e){
                    die("database connect error".$e->getMessage());
                }
                $ember="SELECT * FROM ncov_t ";
                foreach ($figure->query($ember) as  $torch) {
                    echo "<tr>";
                    echo "<td>{$torch['id']}</td>";
                    echo "<td>{$torch['province']}</td>";
                    echo "<td>{$torch['total_num']}</td>";
                    echo "<td>{$torch['now_num']}</td>";
                    echo "<td>{$torch['dead_num']}</td>";
                    echo "<td>{$torch['cure_num']}</td>";
                    echo "<td><a href='javascript:doDel({$torch['id']})'>Del</a>
                              <a href='edit.php?id={$torch['id']}'}>Mod</a>
                          </td>";
                    echo "</tr>";
                    # code...
                }
            ?>
        </table>
    </center>
</body>
</head>

</html>