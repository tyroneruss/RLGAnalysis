<!DOCTYPE html>

 <!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/style.css">

        <title>First PHP program</title>
    </head>
    <body>
        
<body  >
<!-- Header start -->
 
<div id="container">
    <div id="intro">
        <div id="pageHeader">
            <div id="sitename">
                <h1>&nbsp;&nbsp;&nbsp;&nbsp;The Russ Law Group</h1>
                <br><br><font size="5">Foreclosure Listings</font>
            </div>
        </div>
    </div>
</div>
<!-- Header end -->

    <table border="0" width='1200' align='left'>
            <tr>
                <td  width="300" >
          
               </td>
              <td height="25" align="left" width="900" 
                  style="font-family: Times New Roman; color: #990000; font-size: 22px">
                   &nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="">Aug 1st&nbsp;&nbsp;&nbsp;&nbsp;</a> 
                  <a href="" >July 5th&nbsp;&nbsp;&nbsp;&nbsp;</a>
                  <a href="" >June 6th&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="" >May 2nd&nbsp&nbsp&nbsp&nbsp
                  <a href="" >
              </td>
            </tr>
            <tr>
                <td height="20" ></td>
            </tr>
    </table>

    <table width="1000" border="0">
        <tr>
        <td>
            <table width='500'>
                <?php
                    $sum = 0;
                    $i = 0; 
                    
                    $handle = fopen("NEED FILE", "r");
                    // Header
                    $line = fgets($handle);
                    $list = explode("|", $line);
                    $state = $list[0];
                    $month = $list[1];
                    $date  = $list[2];
                    echo '<tr  style="background-color: lightgrey"> ';
                        echo '<td  valign="center" height="30" width="200" style="font-family: Times New Roman; font-size: 18px">' . $state . '</td>';          
                        echo '<td  style="font-family: Times New Roman; font-size: 18px">' . $month . '</td>';            
                        echo '<td  style="font-family: Times New Roman; font-size: 18px">Sale Date: ' . $date  . '</td>';  
                    echo '</tr>';

                    echo '<tr>';
                        echo '<td width="600" colspan="3" height="20"></td>';                   
                    echo '</tr>';

                    echo '<tr valign="bottom">';
                        echo '<td width="200" height="20" style="font-family: Times New Roman; font-size: 18px"><b>Listing source</b></td>';          
                        echo '<td width="175" align="left"><b># of Records</b></td>';          
                        echo '<td width="250" ><b>WebSite Links</b></td>';          
                    echo '</tr>';

                    if ($handle) {
                       while (($line = fgets($handle)) !== false) {
                            $list = explode("|", $line);
                            echo '<tr>';
                                echo '<td  style="font-family: Times New Roman; font-size: 18px">' . ($list[0]) . '</td>';            
                                echo '<td  align="left" style="font-family: Times New Roman; font-size: 18px">' . ($list[1]) . '</td>';
                                echo '<td  style="font-family: Times New Roman; font-size: 18px">';
                                echo '<a href="' . ($list[2]) . '" color="#990000">' . ($list[0]) . '</a></td>';                                 
                            echo '</tr>';                         
                            $sum = $sum + intval($list[1]);
                            $i = $i + 1;
                       }
                            // Total the number of reoords found
                        
                        fclose($handle);
                    } else {
                // error opening the file.
                    }   
                echo '<tr valign="bottom">';
                    echo '<td align="left" style="font-family: Times New Roman; font-size: 18px"><b>Total;</b></td>';          
                    echo '<td align="left" style="font-family: Times New Roman; font-size: 18px"><b>w/ Names</b></td>';          
                    echo '<td align="left" style="font-family: Times New Roman; font-size: 18px">Duplicates<b></b></td>';          
                echo '</tr>';
                $handle = fopen("FCstats.csv", "r");
                // Header
                $line = fgets($handle);
                $list = explode("|", $line);
                echo '<tr>';
                    echo '<td  style="font-family: Times New Roman; font-size: 18px"'   . $list[2] .  '</td>';            
                    echo '<td  align="left" style="font-family: Times New Roman; font-size: 18px">' .  $list[1] . '</td>';
                    echo '<td  style="font-family: Times New Roman; font-size: 18px"></td>';           
                echo '</tr>';            


                ?>  
                
            </td>
            </tr>
        </table>
        </td >
        <td>
        <table width='500'>
            <tr>
            <td>                   
                <?php
                   $x = 0;               
                   $handle = fopen("FCreportTX.txt", "r");
                   // Header
                   $line = fgets($handle);
                   $list = explode("|", $line);
                   $state = $list[0];
                   $month = $list[1];
                   $date  = $list[2];
                   echo '<tr  style="background-color: lightgrey"> ';
                       echo '<td  valign="center" height="30" width="200" style="font-family: Times New Roman; font-size: 18px">' . $state . '</td>';          
                       echo '<td  style="font-family: Times New Roman; font-size: 18px">' . $month . '</td>';            
                       echo '<td  style="font-family: Times New Roman; font-size: 18px">Sale Date: ' . $date  . '</td>';  
                   echo '</tr>';

                   echo '<tr>';
                       echo '<td width="600" colspan="3" height="20"></td>';                   
                   echo '</tr>';

                   echo '<tr valign="bottom">';
                       echo '<td width="200" height="20" style="font-family: Times New Roman; font-size: 18px"><b>Listing source</b></td>';          
                       echo '<td width="175" align="left"><b># of Records</b></td>';          
                       echo '<td width="250" ><b>WebSite Links</b></td>';          
                   echo '</tr>';

                   if ($handle) {
                      while (($line = fgets($handle)) !== false) {
                           $list = explode("|", $line);
                           echo '<tr>';
                               echo '<td  style="font-family: Times New Roman; font-size: 18px">' . ($list[0]) . '</td>';            
                               echo '<td  align="left" style="font-family: Times New Roman; font-size: 18px">' . ($list[1]) . '</td>';
                               echo '<td  style="font-family: Times New Roman; font-size: 18px">';
                               echo '<a href="' . ($list[2]) . '" color="#990000">' . ($list[0]) . '.com</a></td>';           
                           echo '</tr>';            
                           // process the line read.
                       }
                            // Total the number of reoords found
                        echo '<tr>';
                        echo '<td  style="font-family: Times New Roman; font-size: 18px"><b>Total<b></td>';            
                        echo '<td  align="left" style="font-family: Times New Roman; font-size: 18px"></td>';
                        echo '<td  style="font-family: Times New Roman; font-size: 18px">';           
                        echo '</tr>';            
 
                       fclose($handle);
                   } else {
               // error opening the file.
                   }    
               ?>                 
            </td> 
        </tr>
    </table>
    </body>
</html>


