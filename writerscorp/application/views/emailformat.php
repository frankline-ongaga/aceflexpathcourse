<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Writers Corp</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                    <tr>
                        <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                           <img class="logo" src="<?php echo base_url('images/writerscorplogo.png'); ?>" alt=""  />
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                        <b>New Order From Customer Placed</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                        Hey support. A new order has been placed at writers-corp.com Check Out the details Below:
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <?php
                                
			             foreach ($g->result() as $row)  
			             {  
 
                                     ?>
                                        Customer email: <?php echo $row->cust_email;?>  <br>
                                        Customer Name: <?php echo $row->cust_name; ?>  <br>
                                        Format: <?php echo $row->format_name; ?>  <br>
                                        Order Time:  <?php echo $row->posted_date; ?>   <br>
                                        Title:      <?php echo $row->order_topic; ?>     <br>
                                        No. Of Pages: <?php echo $row->order_pages; ?>   <br>
                                        Instructions: <?php echo $row->order_instructions; ?>   <br>
                                        Deadline:        <br>
                                        Payment:      <?php echo $row->order_paymentstatus; ?>  <br>

                                    </td>
                                    
                                </tr>
                                <?php 
                                    } 
                                    
                                  ?>
                                <tr>
                                    <td>
                                    <h3> Kindly Check the Order and Assign the task to Writer</h3>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                                        &reg;CustomWritings Hub 2016<br/>
                                        <a href="<?php echo base_url('professionalwriting/contactus') ?>" style="color: #ffffff;"><font color="#ffffff">Contact US</font></a> And we willreply
                                    </td>
                                    <td align="right" width="25%">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                    <a href="https://twitter.com/customwritings5" style="color: #ffffff;">
                                                        <img src="http://customwritingshub.com/logo/che/img/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
                                                    </a>
                                                </td>
                                                <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                                <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                    <a href="http://facebook.com/customwritingshub" style="color: #ffffff;">
                                                        <img src="http://customwritingshub.com/logo/che/img/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>