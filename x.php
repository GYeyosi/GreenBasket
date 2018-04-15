 <?php
                        include './login/config.php';
                                $username='dedsec';
                                    $result = mysqli_query($link,"SELECT c.vegname ,c.quantity ,s.price*c.quantity as price from cart c join (select  dealerid,vegname,region,price from stock) s on c.dealerid=s.dealerid and c.vegname=s.vegname and c.region=s.region where c.username='$username'");
                                    $total=0;
                                    if (mysqli_num_rows($result)) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {

                                            $vegname= $row["vegname"];
                                            $quantity=$row["quantity"];
                                            $price=$row["price"];
                                            $total= $total+$price;
                                            echo '<p>'.$vegname.' ( '.$quantity.' )<span>'.$price.'</span> </p>';




                                          }
                                        }
                                        else
                                            echo "0 Results";
                        ?>