<center>
<?php 
    include "settings.php";
    $con= mysql_connect($DB_HOST , $DB_LOGIN , $DB_PASSWORD);//connection with database
    if($con)//if connection ok
    {
        $base=mysql_select_db($DB_NAME);
        if($base){ }
        else
            echo 'Data base error1: '.mysql_error();
    }    
    else
        echo 'Data base error2: '.mysql_error();
    $record1=mysql_query("SELECT * FROM $DB_TABLE_NAME WHERE id=1");//imort records from database
    $slide1 = mysql_fetch_array($record1);
    $record2=mysql_query("SELECT * FROM $DB_TABLE_NAME WHERE id=2");
    $slide2 = mysql_fetch_array($record2);
    $record3=mysql_query("SELECT * FROM $DB_TABLE_NAME WHERE id=3");
    $slide3 = mysql_fetch_array($record3);
 
 if((!isset($_GET['id'])) && (!isset($_POST["new"])) && (!isset($_GET['install'])))
{ ?>
    <form action="sliderCMS.php" method="POST"> <!-- adding new slide -->
        <table> 
            <tr><th>new: </th><th><input type="submit" value="Add new slide" name="new"></th></tr>
        </table>       
    </form>
    <br /><br />
    <form action="sliderCMS.php?id=1" method="POST"> <!-- Showing slide's content -->
        <table> 
            <tr>First slide:</tr>           
            <tr><th>Title: </th><th><input type="text" name="title" value="<?php echo $slide1[$TITLE_DB_NAME]; ?>"></th></tr>
            <tr><th>Picture: </th><th><input type="text" name="picture" value="<?php echo $slide1[$PICTURE_DB_NAME]; ?>"></th></tr>
            <tr><th>Link: </th><th><input type="text" name="link" value="<?php echo $slide1[$LINK_DB_NAME]; ?>"></th></tr>
            <tr><th><input type="submit" value="submit"></th></tr>
        </table>        
    </form>
    <br /><br />
    <form action="sliderCMS.php?id=2" method="POST">
        <table> 
            <tr>Second slide:</tr>      
            <tr><th>Title: </th><th><input type="text" name="title" value="<?php echo $slide2[$TITLE_DB_NAME]; ?>"></th></tr>
            <tr><th>Picture: </th><th><input type="text" name="picture" value="<?php echo $slide2[$PICTURE_DB_NAME]; ?>"></th></tr>
            <tr><th>Link: </th><th><input type="text" name="link" value="<?php echo $slide2[$LINK_DB_NAME]; ?>"></th></tr>
            <tr><th><input type="submit" value="submit"></th></tr>
        </table>        
    </form>
    <br /><br />
    <form action="sliderCMS.php?id=3" method="POST">
        <table> 
            <tr>Third slide:</tr>          
            <tr><th>Title: </th><th><input type="text" name="title" value="<?php echo $slide3[$TITLE_DB_NAME]; ?>"></th></tr>
            <tr><th>Picture: </th><th><input type="text" name="picture" value="<?php echo $slide3[$PICTURE_DB_NAME]; ?>"></th></tr>
            <tr><th>Link: </th><th><input type="text" name="link" value="<?php echo $slide3[$LINK_DB_NAME]; ?>"></th></tr>
            <tr><th><input type="submit" value="submit"></th></tr>
        </table>        
    </form>
    <br /><br />
<?php } 
if (isset($_POST["new"]))//body if user clicked "add news slide"
{ ?>
   <form action="sliderCMS.php?id=new" method="POST">
   new slide:<br />
       <table>             
           <tr><th>Title: </th><th><input type="text" name="title" value=""></th></tr>
           <tr><th>Picture: </th><th><input type="text" name="picture" value=""></th></tr>
           <tr><th>Link: </th><th><input type="text" name="link" value=""></th></tr>
           <tr><th><input type="submit" value="submit"></th></tr>
       </table>        
   </form>
<?php }
?>



<?php
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $title=trim($_POST["title"]);
        $picture=trim($_POST["picture"]);
        $link=trim($_POST["link"]);

        if($id==1)
        {
                $tekst="UPDATE $DB_TABLE_NAME SET title='$title', picture='$picture', link='$link' WHERE id='$id'"; 
                $query=mysql_query($tekst);
                if($query)
                    echo "<p style=\"color:red\">slide 1 updated!</p>";
                else 
                echo "Query error 1: ".mysql_error();
        }
        if($id==2)
        {
                $tekst="UPDATE $DB_TABLE_NAME SET title='$title', picture='$picture', link='$link' WHERE id='$id'"; 
                $query=mysql_query($tekst);
                if($query)
                    echo "<p style=\"color:red\">slide 2 updated!</p>";
                else 
                    echo "query error1".mysql_error();
        }
        if($id==3)
        {
                $tekst="UPDATE $DB_TABLE_NAME SET title='$title', picture='$picture', link='$link' WHERE id='$id'"; 
                $query=mysql_query($tekst);
                if($query)
                    echo "<p style=\"color:red\">slide 3 updated!</p>";
                else 
                echo "query error1".mysql_error();
        }
        if($id=="new") //body if user clicked "add new slide" and updating slider list. After added new slide, slide 1 is new slide, slide 2 is old slide 1, slide 3 is old slide 2
        {
            
            
                $title=$slide2["title"];
                $picture=$slide2["picture"];
                $link=$slide2["link"];
                $tekst="UPDATE $DB_TABLE_NAME SET title='$title', picture='$picture', link='$link' WHERE id='3'"; 
                $query=mysql_query($tekst);
                if($query)
                    { }
                else 
                echo "new rekord, 2->3 error: ".mysql_error();
            
           

              $title=$slide1["title"];
              $picture=$slide1["picture"];
              $link=$slide1["link"];
              
              $tekst="UPDATE $DB_TABLE_NAME SET title='$title', picture='$picture', link='$link' WHERE id='2'"; 
              $query=mysql_query($tekst);
              if($query)
                  { }
              else 
                echo "new rekord, 1->2 error: ".mysql_error();

            $title=trim($_POST["title"]);
            $picture=trim($_POST["picture"]);
            $link=trim($_POST["link"]);
            $tekst="UPDATE $DB_TABLE_NAME SET title='$title', picture='$picture', link='$link' WHERE id='1'"; 
            $query=mysql_query($tekst);
            if($query)
                    { }
             else 
                echo "new record, error: ".mysql_error();
            
            
              echo "<p style=\"color:red\">slide added!</p>";
          
        }

        ?> 
        <a href="sliderCMS.php"> Back </a>
    <?php }
    
?>
 
 <?php
if(isset($_GET['install']))// only for install
{
    $install=$_GET['install'];
    if($install="true")
    {
        $sql = "CREATE TABLE $DB_TABLE_NAME
        (
            id int NOT NULL AUTO_INCREMENT, 
            PRIMARY KEY(id),
            $TITLE_DB_NAME varchar(50),
            $PICTURE_DB_NAME varchar(250),
            $LINK_DB_NAME varchar(250)
        )";

        mysql_query($sql);
        if($sql)
            echo "Table created, <br />";
        else
            echo 'Create table DB error: '.mysql_error();

        $con = mysql_query("INSERT INTO $DB_TABLE_NAME (id,$TITLE_DB_NAME,$PICTURE_DB_NAME,$LINK_DB_NAME) VALUES ('1','','','')");
        if($con)
            echo "<p>record 1 created, <br /></p>";
        else 
            echo "install error1: ".mysql_error();
        $con = mysql_query("INSERT INTO $DB_TABLE_NAME (id,$TITLE_DB_NAME,$PICTURE_DB_NAME,$LINK_DB_NAME) VALUES ('2','','','')");
        if($con)
            echo "<p>record 2  created,<br /></p>";
        else 
            echo "install error2: ".mysql_error();
        $con = mysql_query("INSERT INTO $DB_TABLE_NAME (id,$TITLE_DB_NAME,$PICTURE_DB_NAME,$LINK_DB_NAME) VALUES ('3','','','')");
        if($con)
            echo "<p>record 3 created <br /></p>";
        else 
            echo "install error3: ".mysql_error();
        echo "<p style=\"color:red\">Done!</p>";
        print'<a href="sliderCMS.php"> Back </a>';
    }
}
mysql_close($con);
?>
</center>
