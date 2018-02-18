
    <center>
<?php// connection with database
$pol= mysql_connect('host' , 'login' , 'password');
    if($pol)
    {
        $baza=mysql_select_db('yourDB');
        if($baza){ }
        else
            echo 'Connection error1: '.mysql_error();
    }    
    else
        echo 'Connection error1: '.mysql_error();
/*chosing 3 records from database: slide 1,slide 2 and slide 3
        "slider2" - table name in database
        */
        $record1=mysql_query("SELECT * FROM slider2 WHERE id=1");
        $slide1 = mysql_fetch_array($record1);
        $record2=mysql_query("SELECT * FROM slider2 WHERE id=2");
        $slide2 = mysql_fetch_array($record2);
        $record3=mysql_query("SELECT * FROM slider2 WHERE id=3");
        $slide3 = mysql_fetch_array($record3);
 ?>
<?php if((!isset($_GET['id'])) && (!isset($_POST["nowy"])))
{ ?>
<form action="sliderCMS.php" method="POST">

        <table>      
            <tr><th>Nowy: <th><input type="submit" value="Dodaj nowy slajd" name="nowy"></th></tr>
        </table>        
    </form>
    <br /><br />
    <form action="sliderCMS.php?id=1" method="POST">
    Pierwszy slajd:<br />
        <table>             
             <!--
                "link", "title" and "zdjecie" are defined in field in the database
                "link" - link for full news. Remember about Http://www.
                "tytul"- slide title
                "zdjecie" - slide photo
                -->
            <tr><th>Tytuł: </th><th><input type="text" name="tytul" value="<?php echo $slide1['tytul']; ?>"></th></tr>
            <tr><th>Zdjęcie: </th><th><input type="text" name="zdjecie" value="<?php echo $slide1['zdjecie']; ?>"></th></tr>
            <tr><th>Link: </th><th><input type="text" name="link" value="<?php echo $slide1['link']; ?>"></th></tr>
            <tr><th><input type="submit" value="wyślij"></th></tr>
        </table>        
    </form>
    <br /><br />
    <form action="sliderCMS.php?id=2" method="POST">
    Drugi slajd:<br />
        <table>             
            <tr><th>Tytuł: </th><th><input type="text" name="tytul" value="<?php echo $slide2['tytul']; ?>"></th></tr>
            <tr><th>Zdjęcie: </th><th><input type="text" name="zdjecie" value="<?php echo $slide2['zdjecie']; ?>"></th></tr>
            <tr><th>Link: </th><th><input type="text" name="link" value="<?php echo $slide2['link']; ?>"></th></tr>
            <tr><th><input type="submit" value="wyślij"></th></tr>
        </table>        
    </form>
    <br /><br />
    <form action="sliderCMS.php?id=3" method="POST">
    Trzeci slajd:<br />
        <table>             
            <tr><th>Tytuł: </th><th><input type="text" name="tytul" value="<?php echo $slide3['tytul']; ?>"></th></tr>
            <tr><th>Zdjęcie: </th><th><input type="text" name="zdjecie" value="<?php echo $slide3['zdjecie']; ?>"></th></tr>
            <tr><th>Link: </th><th><input type="text" name="link" value="<?php echo $slide3['link']; ?>"></th></tr>
            <tr><th><input type="submit" value="wyślij"></th></tr>
        </table>        
    </form>
    <br /><br />
<?php } 
if (isset($_POST["nowy"]))
{ ?>
   <form action="sliderCMS.php?id=new" method="POST">
   Nowy slajd:<br />
       <table>             
           <tr><th>Tytuł: </th><th><input type="text" name="tytul" value=""></th></tr>
           <tr><th>Zdjęcie: </th><th><input type="text" name="zdjecie" value=""></th></tr>
           <tr><th>Link: </th><th><input type="text" name="link" value=""></th></tr>
           <tr><th><input type="submit" value="wyślij"></th></tr>
       </table>        
   </form>
<?php }
?>

</center>
<?php
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $tytul=trim($_POST["tytul"]);
        $zdjecie=trim($_POST["zdjecie"]);
        $link=trim($_POST["link"]);

        if($id==1)
        {
            $tekst="UPDATE slider2 SET tytul='$tytul', zdjecie='$zdjecie', link='$link' WHERE id='$id'"; 
            $zapytanie=mysql_query($tekst);
            if($zapytanie)
                echo "<p style=\"color:red\">Slajd 1 zaktualizowany!</p>";
            else 
              echo "blad zapytania1".mysql_error();
        }
        if($id==2)
        {
            $tekst="UPDATE slider2 SET tytul='$tytul', zdjecie='$zdjecie', link='$link' WHERE id='$id'"; 
            $zapytanie=mysql_query($tekst);
            if($zapytanie)
                echo "<p style=\"color:red\">Slajd 2 zaktualizowany!</p>";
            else 
              echo "blad zapytania1".mysql_error();
        }
        if($id==3)
        {
            $tekst="UPDATE slider2 SET tytul='$tytul', zdjecie='$zdjecie', link='$link' WHERE id='$id'"; 
            $zapytanie=mysql_query($tekst);
            if($zapytanie)
                echo "<p style=\"color:red\">Slajd 3 zaktualizowany!</p>";
            else 
              echo "blad zapytania1".mysql_error();
        }
        if($id=="new")
        {
            $tytul=$slide2["tytul"];
            $zdjecie=$slide2["zdjecie"];
            $link=$slide2["link"];
            
            $tekst="UPDATE slider2 SET tytul='$tytul', zdjecie='$zdjecie', link='$link' WHERE id='3'"; 
            $zapytanie=mysql_query($tekst);
            if($zapytanie)
                { }
            else 
              echo "Nowy rekord, 2->3 error: ".mysql_error();

              $tytul=$slide1["tytul"];
              $zdjecie=$slide1["zdjecie"];
              $link=$slide1["link"];
              
              $tekst="UPDATE slider2 SET tytul='$tytul', zdjecie='$zdjecie', link='$link' WHERE id='2'"; 
              $zapytanie=mysql_query($tekst);
              if($zapytanie)
                  { }
              else 
                echo "Nowy rekord, 1->2 error: ".mysql_error();

            $tytul=trim($_POST["tytul"]);
            $zdjecie=trim($_POST["zdjecie"]);
            $link=trim($_POST["link"]);
            $tekst="UPDATE slider2 SET tytul='$tytul', zdjecie='$zdjecie', link='$link' WHERE id='1'"; 
            $zapytanie=mysql_query($tekst);
            if($zapytanie)
                    { }
             else 
                echo "Nowy rekord, error: ".mysql_error();
            
            
              echo "<p style=\"color:red\">Slajd dodany!</p>";
          
        }
        ?> 
        <a href=""> Powrot </a>
    <?php }
    
?>
 
 <?php } 
?>

