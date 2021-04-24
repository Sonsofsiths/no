 
 
 
  <?php

              session_start();
               include("connection.php"); // connect to the database
                include("function.php");
              
     
              ?>
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

	  <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	  
	  <!-- Below is the external css for styling the index page-->
      <link rel="stylesheet" type="text/css" href="css/index.css"/>
	  
	   <link rel="stylesheet" type="text/css" href="css/friends.css"/>
	  
	  <script type="text/javascript" src="script/jquery-1.8.0.min.js"></script>
	 
	 
	   
	    

     </head>

         <body>

                 <nav id="index_page_header">
                      <tr>
                             <td><h1> Easygoing tutorial</h1></td>
                               <a href="" id="web_link">Click for more tutorials</a>
                      </tr>
                 </nav>
				   
						 
				 <div id="register_div">

               <h1>Welcom, hope you enjoyed it!!!  </h1>  <br>
               
			    <p style="position:absolute; top:59px; left:90px;">Freind request system in php and javascript </p>  <br><br>
				 
                   
					 
					 <?php
						 /* select the names of the login from the database */
                            
                             $member_id=$_SESSION["logged"];		

                             $result = mysql_query("SELECT * FROM `member` WHERE `member_id`='$member_id' LIMIT 1");

                             echo "<table border='0px' id='profile_name' style='position:absolute; top:129px; left:-200px; font-size:26px;'>
                             ";

                             while($row = mysql_fetch_array($result))
                        {
                             echo "<tr>";
           
                            echo"<p style='position:absolute; top:90px; left:-250px; font-size:16px; color:white;'>Your are called,</p>"; 
                             echo "<td>" . $row['firstname'] .' '. $row['secondname'] . "</td >";
                             
                             echo "</tr>";
                        }
                             echo "</table>";
                   
                        
						?> 

                           <div id="">
						          <?php
						 /* select the names of the login from the database */
                            
                             $member_id=$_SESSION["logged"];		

                             $result = mysql_query("SELECT * FROM `member` WHERE `member_id`!='$member_id' LIMIT 4");

                             echo "<table border='0px' id='profile_name' style='position:absolute; top:129px; left:70px; font-size:16px;'>
                             ";

                             while($row = mysql_fetch_array($result))
                        {
						        $memberid = $row["member_id"];
                             /* below check if the friend is already your friend */
							
							$member_id=$_SESSION["logged"];							
						    $post = mysql_query("SELECT * FROM myfriends WHERE myid = '$member_id' AND myfriends='$memberid' OR myfriends = '$member_id' AND myid='$memberid' ")or die(mysql_error());
								
							$num_rows  =mysql_numrows($post);
							
							if ($num_rows != 0 ){

							while($row = mysql_fetch_array($post)){
				
						    $myfriend = $memberid;
							$member_id=$_SESSION["logged"];
								
							if($myfriend == $member_id){
									
							$myfriend1 = $row['myfriends'];
							$friends = mysql_query("SELECT * FROM member WHERE member_id = '$myfriend1'")or die(mysql_error());
							$friendsa = mysql_fetch_array($friends);
							echo"";		  
							//echo" <div id='button_style'>Friends $memberid</div> ";
                            //echo'<hr class="line_1"> ';
									    
							}else{
										
							$friends = mysql_query("SELECT * FROM member WHERE member_id = '$myfriend'")or die(mysql_error());
							$friendsa = mysql_fetch_array($friends);
							
							/* If the person is your friend the div having this id button_style will be seen. */
							
							//echo" <div id='button_style'>Friends$memberid</div> ";
                             //echo'<hr class="line_1"> ';
									
							}
									
								}
								
								} else
							
							{

						   echo"<p style='position:absolute; top:90px; left:20px; font-size:16px; color:white;'>People you may know,</p>"; 
                            
							echo'<div align="left">'.$row['firstname']." ".$row['secondname'].'</div> ';	
							 echo'<a href="process.php?send='.$row['member_id'].'" class="retweet_link"><div id="button_style1">Add Friend</div></a><br>';	
							 
							 
							echo'<hr class="line_1" width="150px" style="position:absolute;left:10px;"> ';
							echo'<br>';
							
							} 
                             
                        }
                             echo "</table>";
                   
                        
						?>
						   
						   </div>
						
						
						
					 
					<div id="friend_div">
					 
					 <p style="position:absolute; color:green; margin: -19px 0px 0px -53px; font-size:16px;">Your friends</p>
					 
					
						 <?php
						    
							 $member_id=$_SESSION["logged"];							
								  $post = mysql_query("SELECT * FROM myfriends WHERE myid = '$member_id' OR myfriends = '$member_id' ")or die(mysql_error());
								
							     $num_rows  =mysql_numrows($post);
							
							     if ($num_rows != 0 ){

							  	while($row = mysql_fetch_array($post)){
				
								$myfriend = $row['myid'];
								$member_id=$_SESSION["logged"];
								
								
								
									if($myfriend == $member_id){
									
										$myfriend1 = $row['myfriends'];
										$friends = mysql_query("SELECT * FROM member WHERE member_id = '$myfriend1'")or die(mysql_error());
										$friendsa = mysql_fetch_array($friends);
									  
									    echo"<div class='myfriend_div'>";
									
									echo '
									<p  class="friend_info">&nbsp;'.$friendsa['firstname'].' '.$friendsa['secondname'].' </p></a>
									
									<div class="myfriend"><a href="delete_friend.php?delete=' .$friendsa['member_id'].' ">Unfriend</a> </div> ';
									
									   echo'</div>';
									    
									
									}else{
										
										$friends = mysql_query("SELECT * FROM member WHERE member_id = '$myfriend'")or die(mysql_error());
										$friendsa = mysql_fetch_array($friends);
										
										 echo"<div class='myfriend_div1' >";
										
										echo '
									        <p  class="friend_info">&nbsp;'.$friendsa['firstname'].' '.$friendsa['secondname'].' </p></a>
									
									          <div class="myfriend"><a href="delete_friend.php?delete=' .$friendsa['member_id'].' ">Unfriend</a></div> ';
									    
										  echo'</div>';
									
									}
									
								}
								
								
								
								}else{
								
								  echo"<div id='myfriend_div'>";
								  
									echo 'You don\'t have friends </li>';
										}
										
									echo'</div>';	
					 
					     ?>
					
					
					 
					 </div>
					 
					 
					 
					 <div id="friend_request_div">
					 
					 <p style="position:absolute; color:green; margin: -19px 0px 0px -53px; font-size:16px;">Friend request.</p>
					 
					
						<?php
				  
				                //Section for showing friendship requests
				  
				                 $member_id=$_SESSION["logged"];
                                 $query = mysql_query("SELECT * FROM friendship WHERE receiver = '$member_id'");
                                 if(mysql_num_rows($query) > 0) 
								 
								 {
								 
								 
                                 while($row = mysql_fetch_array($query)) 
								 
								 { 
								 
								 
                                 $_query = mysql_query("SELECT * FROM member WHERE member_id = '" . $row["sender"] . "'");
                                 while($_row = mysql_fetch_array($_query)) 
								 
								 {
                                  
								 
								  
			                     echo '
			                         
									 <div class="myfriend_div1">
									 
								  
			                    
			                     <div style="position:relative; margin:2px 0px 0px 13px;"><span style="font-size:20px; color:red;">'.$_row['firstname']." ".$_row['secondname'].' </span>want to be friends with you</div>
			                      <br>
								 <div class="myfriend"><a href="add_friend.php?accept=' .$row['sender'].' ">Accept</a></div><br>
			                     <div class="myfriend"><a href="delete_friend_request.php?accept=' .$row['sender'].'">Reject</a></div>
                                 
								 <hr>
								  </div>';
								 }
	                             
	                           }
							  
							   
                           }else{  
						   
						   
						        echo"<div class='myfriend_div1'>
						   
						   		You do not have any friend pending  </li>
									
                                  </div>";
									
								}

                            
					 ?>
					 
					 </div>
					 
                   </body>
                
				   </html>

				   
				  