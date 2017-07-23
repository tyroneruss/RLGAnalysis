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
                <br><br><font size="5">Foreclosure Leads</font>
            </div>
        </div>
    </div>
</div>
<!-- Header end -->

    <table border="0" width='1200' align='left'>
            <tr>
                <td >
          
               </td>
              <td height="25" align="left" width="900" 
                  style="font-family: Times New Roman; color: #990000; font-size: 22px">
                   &nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="" >August&nbsp;&nbsp;&nbsp;&nbsp;</a> 
                  <a href="" >July&nbsp;&nbsp;&nbsp;&nbsp;</a>
                  <a href="" >June&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="" >May&nbsp&nbsp&nbsp&nbsp
                  <a href="" >
              </td>
            </tr>
            <tr>
                <td height="20" ></td>
            </tr>
    </table>

    <table width="1200" border="0">
        <tr>
            <td>
                <table width='600'>
                    <?php
                        $sum    = 0;
                        $ALsum  = 0;
                        $ACsum  = 0;
                        $GALsum = 0;
                        $TXLsum = 0;                          
                        $handle = fopen("Results/MailerLPMatric.csv", "r");                                
                        echo '<tr  style="background-color: lightgrey"> ';       
                            echo '<td  height="20" width="80%" align="center" colspan=5" style="font-family: Times New Roman; font-size: 22px"><b>Loan Post Leads Matrices</b></td>';                     
                        echo '</tr>';
                        echo '<tr>';
                            echo '<td colspan="5" height="20" align="center" colspna=5"></td>';                     
                        echo '</tr>';
                        echo '<tr  style="background-color: lightgrey"> ';
                            echo '<td  width="100" style="font-family: Times New Roman; font-size: 18px">Month</td>';          
                            echo '<td  width="100"  style="font-family: Times New Roman; font-size: 18px">Leads</td>';            
                            echo '<td  width="100" style="font-family: Times New Roman; font-size: 18px">All Clients</td>';  
                            echo '<td  width="100"  style="font-family: Times New Roman; font-size: 18px">GA-Leads</td>';          
                            echo '<td  width="100"  style="font-family: Times New Roman; font-size: 18px">TX-Leads</td>';            
                        echo '</tr>';
                    
                        if ($handle) {
                            while (($line = fgets($handle)) !== false) {
                                $list = explode(",", $line);
                                echo '<tr>';
                                    echo '<td  style="font-family: Times New Roman; font-size: 18px">' . ($list[0]) . '</td>';            
                                    echo '<td  style="font-family: Times New Roman; font-size: 18px">' . ($list[1]) . '</td>';            
                                    echo '<td  style="font-family: Times New Roman; font-size: 18px">' . ($list[2]) . '</td>';            
                                    echo '<td  style="font-family: Times New Roman; font-size: 18px">' . ($list[3]) . '</td>';            
                                    echo '<td  style="font-family: Times New Roman; font-size: 18px">' . ($list[4]) . '</td>';            
                                echo '</tr>';                         
                                $ALsum  = $ALsum +  intval($list[1]);
                                $ACsum  = $ACsum +  intval($list[2]);
                                $GALsum = $GALsum + intval($list[3]);
                                $TXLsum = $TXLsum + intval($list[4]);
                                }
                                        // Total the number of reoords found
                                fclose($handle);
                                echo '<tr  style="background-color: lightgrey">';
                                    echo '<td align="left" style="font-family: Times New Roman; font-size: 18px"><b>Totals</b></td>';          
                                    echo '<td align="left" style="font-family: Times New Roman; font-size: 18px"><b>' . $ALsum . '</b></td>';          
                                    echo '<td align="left" style="font-family: Times New Roman; font-size: 18px"><b>' . $ACsum . '</b></td>';          
                                    echo '<td align="left" style="font-family: Times New Roman; font-size: 18px"><b>' . $GALsum . '</b></td>';          
                                    echo '<td align="left" style="font-family: Times New Roman; font-size: 18px"><b>' . $TXLsum . '</b></td>';          
                                echo '</tr>';         
                                }
                        else {
                    // error opening the file.
                        }   
          
                  ?>  
                </td>
                </tr>
            </table>
        </td >
        <td>
            <table width='700'>
                <tr>
                    <td width="20%"> 

                    </td> 
                    <td width="80%"  style="background-color: lightgrey"> 
                        <img src="images/LP-Leads.jpg" width="600" height="387" alt="LP-Leads"/>
                    </td> 
                </tr>
            </table>
        </td>
        <tr>
    </table>
    </body>
</html>


