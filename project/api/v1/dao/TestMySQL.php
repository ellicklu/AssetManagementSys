<?php
    //phpinfo();
    //database table cols
    $dbcolarray = array('S_User_Name', 'S_Disp_Name');  
      
    //mysql_connect  
    $conn = mysql_connect('localhost', 'oracle', 'welcome1');// or die("connect failed" . mysql_error());
    //$conn = mysqli_connect('localhost', 'root', 'welcome1', 'assets_management', '3306', '') or die("connect failed" . mysqli_error());  
    mysql_select_db('assets_management', $conn);  
      
    //read record number
    $sql = sprintf("select count(*) from %s", 'User');  
    $result = mysql_query($sql, $conn);  
    if ($result)  
    {  
        $count = mysql_fetch_row($result);  
    }  
    else  
    {  
        die("query failed");  
    }  
    echo "there are $count[0] records<br />";  
      
      
    $sql = sprintf("select %s from %s", implode(",",$dbcolarray), 'User');  
    $result = mysql_query($sql, $conn);  
    //表格  
    echo '<table id="Table" border=1 cellpadding=10 cellspacing=2 bordercolor=#ffaaoo>';   
    //table head
    $thstr = "<th>" . implode("</th><th>", $dbcolarray) . "</th>";  
    echo $thstr;  
    //table content
    while ($row=mysql_fetch_array($result, MYSQL_ASSOC))//equals to $row=mysql_fetch_assoc($result)
    {  
        echo "<tr>";  
        $tdstr = "";  
        foreach ($dbcolarray as $td)  
            $tdstr .= "<td>$row[$td]</td>";  
        echo $tdstr;  
        echo "</tr>";  
    }  
    echo "</table>";  
    mysql_free_result($result);  
    mysql_close($conn);
?>
