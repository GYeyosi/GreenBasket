<?php
                              include '../login/config.php';
                              session_start();
                                       $totalprice=0;
                                       $image="";   

                              $param_username=$_SESSION['username'];
                             

                              $result1 = mysqli_query($link,"select v.*, i.image from vegetable i join (select c.*,s.price from cart c join (select  dealerid,vegname,region,price from stock) s on c.dealerid=s.dealerid and c.vegname=s.vegname and c.region=s.region where c.username='dedsec' and paymentstatus='no' ) as v  on v.vegname=i.vegname;");                       

                              if (mysqli_num_rows($result1)) {
                              // output data of each row
                                while($row = mysqli_fetch_assoc($result1)) {
                                      $vegname= $row["vegname"];
                                      $region= $row["region"];
                                      $dealerid= $row["dealerid"];
                                      $quantity=$row["quantity"];
                                      $price=$row["price"];
                                      $image=$row["image"];
                                      //echo $image;
                                       $totalprice= $totalprice+ $price;
                                      echo ' 

                                            <tr>
                                                    <td class="cart-image">
                                                       <a href="../singlepro.php?vegname='.$vegname.'&image='.$image.'" class="entry-thumbnail">
                                                       <img src="../img/vegetables/'.$image.'" width="600px" alt="">
                                                       </a>
                                                    </td>
                                                    <td class="cart-product-name-info">
                                                       <div class="cc-tr-inner">
                                                          <h4 class="cart-product-description"><a href="#">Fabulas t-shirt</a></h4>
                                                          <div class="cart-product-info">
                                                             <span class="product-color">DEALER :</span><p>'.$dealerid.'</p>
                                                             <br>
                                                             <span class="product-color">REGION :</span><p>'.$region.'</p>
                                                          </div>
                                                       </div>
                                                    </td>
                                                    <td class="cart-product-quantity">
                                                       <div class="quant-input">
                                                          <input type="number" readonly size="4" class="input-text qty text" title="Qty" value="'.$quantity.'" name="quantity[113]" max="119" min="0" step="1">
                                                       </div>
                                                    </td>
                                                    <td class="cart-product-price">
                                                       <div class="cc-pr">$'.$price.'</div>
                                                    </td>
                                                    <td class="cart-product-delivery">
                                                       <div class="cc-pr">Free shipping</div>
                                                    </td>
                                                    <td class="cart-product-sub-total">
                                                       <div class="cc-pr">'.$quantity*$price.'</div>
                                                    </td>
                                                    <td class="romove-item">
                                                       <a href="#"><img src="./cart/remove.png" alt="">
                                                       </a>
                                                    </td>
                                          </tr>

                                            ';                                                  

                                      }
                                }



                          ?>