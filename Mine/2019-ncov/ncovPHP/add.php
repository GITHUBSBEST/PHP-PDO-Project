<html>

<head>
    <title>Add Information</title>
</head>

<body>
    <center>
        <?php
            require 'topic.php';
        ?>
        <h2>Add the Information</h2>
        <table>
            <form action='action.php?action=add' method='post'>
                <!-- <table> -->
                <tr>
                    <td>Province</td>
                    <td><input type='text' name='pro' /></td>
                </tr>
                <tr>
                    <td>Number</td>
                    <td><input type='text' name='num' /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type='submit' value='add'><input type='reset' value='reset'></td>
                </tr>
                <!-- </table> -->
            </form>
        </table>
    </center>
</body>

</html>