<?php
$this->load->view('common/header');
//echo "<pre>";
//print_r($companydet);
//echo "</pre>";
?>
       <!--page_title-->
       <div class="page_title">
         <div class="headline">
          <h1><span><i class="fa fa-cog"></i></span><?php echo $this->lang->line('Settings');?></h1>
         </div>
         <div class="right_panel">
           <!--<a href="#" class="btn pi-btn-base pi-btn-no-border"><span class="icon_all"><i class="fa fa-inbox"></i></span>Manage categories</a>-->
           
           <!--<a href="#" class="bttn pi-btn btn-no-border"><span class="edit_all"><i class="fa fa-pencil"></i></span>Edit message</a>-->
           
       
           
           <!--<a href="#"  class="bttn pi-btn btn-no-border"><span class="edit_all"><i class="fa fa-times"></i></span>Delete message</a>-->
         </div>
       </div>
       <!--/page_title-->
       <!--main_section-->
       <div class="main_section">
	<?php $this->load->view('common/ticketpanel');?>
         <!--vertical_menu-->
          <!--<div class="left_ver" id="change_bar">
          <span><i class="fa fa-angle-double-right"></i></span>
          </div>-->
         <!--/vertical_menu-->
	 
         <!--product_box-->
         <div class="product_box" id="side_area">
          <div class="headding_bl">
           <p><span><i class="fa fa-th-list"></i></span><?php echo $this->lang->line('Manage Settings');?></p>
          <!--  <form id="pageNo" action="<?= TICKET_PLUGIN_URL;?>CI/index.php/company/index/<?= $this->uri->segment(3) ?>" method="post">
             Show&nbsp;<select name="perpage" onchange="$('#pageNo').submit()">
              <?php $array = array(5,10,20,40,80,100); 
              foreach($array as $no){
               $sel = $no == $noPage ? 'selected':'';
              ?>
               <option value="<?= $no ?>" <?= $sel ?>><?= $no ?></option>
              <?php } ?>
             </select>&nbsp;Entries
           </form> -->
          </div>
          <div class="main_pro_pi">
           
           
         <div class="child_cake">
            <div class="drop_down_pi">
             <div class="all_dro">

             </div>

            </div>
              <div class="main_panel">
	      <ul class="tabs" data-persist="true">
		<li><a href="#adminemail">Admin Email</a></li>
		<?php
		$email_mod=fetchmod('email_mod');
		if($email_mod==1)
		{
		?>
		<li><a href="#imapsetting">IMAP</a></li>
		<?php
		}
		?>
                <li><a href="#ticket_attachment">Uploads</a></li>
		<?php
		$mob_ver=fetchmod('mob_ver');
		if($mob_ver==1)
		{
		?>
                <li><a href="#view2">Mobile Verification</a></li>
		<?php
		}
		?>
                <li><a href="#view3">reCAPTCHA</a></li>
                <li><a href="#view4">Ticket Auto Close</a></li>
		<?php
		$backup=fetchmod('backup');
		if($backup==1)
		{
		?>
                <li><a href="#view5">Scheduled Backup</a></li>
		<?php
		}
		?>
                <!--<li><a href="#view6">Register</a></li>-->
                <li><a href="#view7">Pagination</a></li>
                <li><a href="#view8">Ticket</a></li>
                <li><a href="#view9">Delete Confirmation</a></li>
		<?php
		$akismet=fetchmod('akismet');
		if($akismet==1)
		{
		?>
                <li><a href="#view10">Akismet</a></li>
		<?php
		}
		?>
		<?php
		$opswat=fetchmod('opswat');
		if($opswat==1)
		{
		?>
                <li><a href="#view11">OPSWAT</a></li>
		<?php
		}
		?>
		<li><a href="#view12">Auto Responder confirmation</a></li>
		<?php
		$resp_tim=fetchmod('response_time');
		if($resp_tim==1)
		{
		?>
		<li><a href="#view13">Response Time</a></li>
		<?php
		}
		?>
		<?php
		$tweet=fetchmod('twitter');
		if($tweet==1)
		{
		?>
		<li><a href="#view14">Twitter</a></li>
		<?php
		}
		?>
	      </ul>
            <div class="tabcontents">
	      
				  <div id="adminemail" class="clearfix">
		    <!--<p><strong>Admin Email </strong></p>-->
		    <form action="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post">

			   
			   <div class="fileds">
		<?php
		 $settings = (array)getSettingsValue('adminemail');

		 $email = $settings['email'];

		?>           
		
		<div class="form_holder">
		<h1 class="tab_name"><?php echo $this->lang->line('Admin Email');?></h1>
		  <label><span><?php echo $this->lang->line('Admin Email');?></span></label>
		  <input type="text" name="adminemail[email]" placeholder="" value="<?= $email;?>">
		</div>
		<input type="hidden" name="setting_name" value="adminemail"/>      
			   
			  <div class="form_holder">
			     <button class="sbmt sbmt_base sbmt_base-no-border" type="submit"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Save');?></button>
			   </div>
			   
			  </div>
		
		    </form>
                </div>

            <div id="adminemail" class="clearfix">
		    <!--<p><strong>Admin Email </strong></p>-->
		  <!--   <form action="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post"> -->
				
				<?php
				  //print_r($_SESSION);
					 //$userdet=getUserInfoById($ticket->userid);
				 ?>
			   
			   <div class="fileds">
          		
		<div class="form_holder">
		<h1 class="tab_name"><?php echo $this->lang->line('Change Password');?></h1>
		 <div class="error" id="uerror" style="display:none;"><p></p></div>
		  <label><span><?php echo $this->lang->line('Username');?></span></label>
		  <input id="username" type="text" name="username" placeholder="Enter Username" value="">
		  <input type="hidden" id="changepass">
		</div>       
			  <div class="form_holder">
			     <button id="submitUcheck" class="sbmt sbmt_base sbmt_base-no-border" type="button"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Submit');?></button>
			   </div>
			   
			  </div>
		
<!-- 		    </form> -->
		    <script>
$(document).ready(function(){
		    $("#submitUcheck").click(function(){
		    	$.post('<?= TICKET_PLUGIN_URL;?>CI/index.php/forgetpassword/checkuser',{username:$("#username").val()},function(data){
		    		 var obj = $.parseJSON(data)
		    		 if(obj.status == 1)
		    		 {
		    		 	$("#changepass").click();
		    		 	$("#npassword").focus();

		    		 }

		    		 if(obj.status == 0)
		    		 {
		    		 	$("#uerror").html(obj.msg).fadeIn().delay(1000).fadeOut();
		    		 }
		    	});
		    });

		$('#changepass').magnificPopup({
                items: {
                    src: '#changepasswordbox',
                    type: 'inline'
                },
                closeBtnInside: true
     });


  $("#changepasswordbox_form").submit(function(e){
      $('.status-message').html('<img src="<?= TICKET_PLUGIN_URL;?>CI/assets/images/icon_loading.gif" />').css({"text-align":"center"});
       var form = $(this);
       var submitbtn = $(this).find('button[type="submit"]');
       submitbtn.attr('disabled',true);
       var url = $(this).attr('action'),
       data = $(this).serialize(); 
       $.ajax({
        url: url,
        data:data,
        type:"POST",
        success:function(data){
           submitbtn.attr('disabled',false);
           obj = $.parseJSON(data);
           if(obj.status == 0)
           {
           $('.status-message').html(obj.msg).fadeIn('slow').delay(2000).fadeOut('slow');
           }

           if(obj.status == 1)
           {
           $('.status-message').html(obj.msg).fadeIn('slow').delay(2000).fadeOut('slow',function(){

            form[0].reset();
            $.magnificPopup.close();
            window.location.href="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings";
           });
           }

        }
       });
      e.preventDefault();
      return false;
     });
});
		    </script>
		    <style type="text/css">
			.error{
				  background-color: #f2dede;
			    border-color: #eed3d7;
			    border-radius: 4px;
			    color: #b94a48;
			    margin-bottom: 20px;
			    margin-right: 20px;
			    margin-left: 20px;
			    padding: 8px 35px 8px 14px;
			    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
			}

			.error p{
				color: #b94a48;
    font-family: arial;
    font-size: 14px;
    text-align: center;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
			}

			.white-popup {
                position: relative;
                background: #FFF;
                padding: 20px;
                width:auto;
                max-width: 500px;
                margin: 20px auto;
              }
		    </style>

<div id="changepasswordbox" class="white-popup mfp-hide">
  <form id="changepasswordbox_form" method="post" action="<?= TICKET_PLUGIN_URL;?>CI/index.php/forgetpassword/changepassword">
    
          <div class="main_pro_pi">
      <div class="status-message">
      </div>
              <div class="fileds">
        
    <div class="form_holder">
      <label><span><?php echo $this->lang->line('New Password');?></span></label>
      <input type="text" id="npassword" value="" placeholder="<?php echo $this->lang->line('Enter New Password');?>" name="npassword">
    </div>
     <div class="form_holder">
      <label><span><?php echo $this->lang->line('Re-Type Password');?></span></label>
      <input type="text" value="" placeholder="<?php echo $this->lang->line('Re-Type Password');?>" name="cpassword">
    </div>
         
               
               <!--<div class="form_holder">-->
               <!--  <label><span>Backup Description</span></label>-->
               <!--  <textarea name="backup_description" cols="" rows=""></textarea>-->
               <!--</div>-->
               
               <!-- <div class="form_holder radio">
                 <label><span>Radio</span></label>
                 <input name="" type="checkbox" value=""> Checkbox
               </div> -->
               
               
               <div class="form_holder">
               <button type="submit" class="sbmt sbmt_base sbmt_base-no-border"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Submit');?></button>
               </div>
               
              </div>
    
        
         
              </div>
              <div style="clear: both;"></div>
</form>
</div>
 <p><strong><?php echo $this->lang->line('Enter username for verification');?> </strong></p>
                </div>

				<?php
		$email_mod=fetchmod('email_mod');
		if($email_mod==1)
		{
		?>
				<div id="imapsetting" class="clearfix">

		    <form action="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post">

			   
			   <div class="fileds">
		<?php
		 $settings = (array)getSettingsValue('imapsetting');

		 $subject = $settings['subject'];
		 $login = $settings['login'];
		 $pass = $settings['pass'];
		 $host = $settings['host'];
		 $port = $settings['port'];
		 $service_flags = $settings['service_flags'];
		 $mailbox = $settings['mailbox'];
		?>           
		<div class="form_holder">
		<h1 class="tab_name">IMAP <?php echo $this->lang->line('Settings');?></h1>
		  <label><span><?php echo $this->lang->line('Mail Subject');?></span></label>
		  <input type="text" name="imapsetting[subject]" placeholder="" value="<?= $subject;?>">
		  <br />
		  <span><?php echo $this->lang->line('Only mails with this subject will be fetched from inbox');?></span>
		</div>
		
		<div class="form_holder">
		  <label><span><?php echo $this->lang->line('Login Email');?></span></label>
		  <input type="text" name="imapsetting[login]" placeholder="" value="<?= $login;?>">
		</div>
		
		<div class="form_holder">
		  <label><span><?php echo $this->lang->line('Password');?></span></label>
		  <input type="text" name="imapsetting[pass]" placeholder="" value="<?= $pass;?>">
		</div>
		
		<div class="form_holder">
		  <label><span><?php echo $this->lang->line('Host');?></span></label>
		  <input type="text" name="imapsetting[host]" placeholder="" value="<?= $host;?>">
		</div>
		
		<div class="form_holder">
		  <label><span><?php echo $this->lang->line('Port');?></span></label>
		  <input type="text" name="imapsetting[port]" placeholder="" value="<?= $port;?>">
		</div>
		
		<div class="form_holder">
		  <label><span><?php echo $this->lang->line('Service Flags');?></span></label>
		  <input type="text" name="imapsetting[service_flags]" placeholder="" value="<?= $service_flags;?>">
		</div>
		
		<div class="form_holder">
		  <label><span><?php echo $this->lang->line('Mailbox');?></span></label>
		  <input type="text" name="imapsetting[mailbox]" placeholder="" value="<?= $mailbox;?>">
		</div>
		<input type="hidden" name="setting_name" value="imapsetting"/>      
			   
			  <div class="form_holder">
			     <button class="sbmt sbmt_base sbmt_base-no-border" type="submit"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Save');?></button>
			   </div>
			   
			  </div>
		
		    </form>
                </div>
	      <?php
		}
		?>
	      
                <div id="ticket_attachment" class="clearfix">
                     <form action="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post">
  
               
               <div class="fileds">
    <?php
     $settings = (array)getSettingsValue('ticket_attachment');

     $ext = $settings['extensions_allowed'];

     $size = $settings['max_upload'];
    ?>           
    
    <div class="form_holder">
    <h1 class="tab_name"><?php echo $this->lang->line('Upload Settings');?></h1>
      <label><span><?php echo $this->lang->line('Allowed Files');?></span></label>
  <input type="text" name="ticket_attachment[extensions_allowed]" placeholder="" value="<?= $ext ?>">
    </div>
      
    <div class="form_holder">
      <label><span><?php echo $this->lang->line('Max No Of Upload');?> </span></label>
      <input type="text" name="ticket_attachment[max_upload]" placeholder="" value="<?= $size ?>" style="width:50px;">
    </div>
    <input type="hidden" name="setting_name" value="ticket_attachment"/>      
               
              <div class="form_holder">
                 <button class="sbmt sbmt_base sbmt_base-no-border" type="submit"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Save');?></button>
               </div>
               
              </div>
    
        </form>
                </div>
		
		<?php
		$mob_ver=fetchmod('mob_ver');
		if($mob_ver==1)
		{
		?>
                <div id="view2" class="clearfix">
                            
                                <form action="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post">
  
                                       
                                       <div class="fileds">
                            <?php
                             $settings = (array)getSettingsValue('mobile_verification');

                             $ext = $settings['app_id'];
                             $size = $settings['access_token'];
                            ?>           
                            
                            <div class="form_holder">
                             <h1 class="tab_name"><?php echo $this->lang->line('Mobile Verification API Settings');?></h1>
                              <label><span><?php echo $this->lang->line('App Id');?></span></label>
                              <input type="text" name="mobile_verification[app_id]" placeholder="" value="<?= $ext ?>">
                            </div>
                              
                            <div class="form_holder">
                              <label><span><?php echo $this->lang->line('Access Token');?></span></label>
                              <input type="text" name="mobile_verification[access_token]" placeholder="" value="<?= $size ?>">
                            </div>

						
							<div class="form_holder radio">
					        	<label><span><?php echo $this->lang->line('During Registration Mobile Verification');?> </span></label>     
					        </div>                        
                               
                            <div class="form_holder radio" style="margin-left: 16px;">                   
	                            <input name="mobile_verification[type]" type="radio" value="1"  <?php if($settings['type'] == 1) echo "checked"; ?> > 
	                            <?php echo $this->lang->line('Required');?>
                            </div>    

                            <div class="form_holder radio" style="margin-left: 16px;">                   
	                            <input name="mobile_verification[type]" type="radio" value="2" <?php if($settings['type'] == 2) echo "checked"; ?> > 
	                          <?php echo $this->lang->line('Optional');?>
                            </div> 


                            <input type="hidden" name="setting_name" value="mobile_verification"/>      
                                       
                                      <div class="form_holder">
                                         <button class="sbmt sbmt_base sbmt_base-no-border" type="submit"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Save');?></button>
                                       </div>
                                       
                                      </div>
                            
                                </form>
                    <p><strong><?php echo $this->lang->line('cognalys.com API Credentials');?> </strong></p>
                </div>
		<?php
		}
		?>
                <div id="view3" class="clearfix">
                    
                     <form action="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post">
  
                                       
                                       <div class="fileds">
                            <?php
                             $settings = (array)getSettingsValue('reCAPTCHA');

                             $t = $settings['theme'];

                             $l = $settings['language'];
			     $sitekey = $settings['sitekey'];
                            ?>           
                            
                                                        <div class="form_holder">
                                                        <h1 class="tab_name"><?php echo $this->lang->line('reCAPTCHA Settings');?></h1>
                                                           <label><span><?php echo $this->lang->line('Theme');?></span></label>
                                                           <div class="select_cover">
                                                           <select name="reCAPTCHA[theme]">
                                                              <option value=""><?php echo $this->lang->line('Select Theme');?></option>
                                                              <option value="dark" <?php if($t == 'dark') echo 'selected'; ?> ><?php echo $this->lang->line('dark');?></option>
                                                              <option value="light" <?php if($t == 'light') echo 'selected'; ?>><?php echo $this->lang->line('light');?></option>
                                                           </select> 
                                                           </div>
                                                         </div>
                              
                                                        <div class="form_holder">
                                                           <label><span><?php echo $this->lang->line('Language');?></span></label>
                                                           <div class="select_cover">
                                                           <select name="reCAPTCHA[language]">
                                                              <option value=""><?php echo $this->lang->line('Select Language');?></option>
                                                              <option value="en" <?php if($l == 'en') echo 'selected'; ?>>English</option>
                                                              <option value="nl" <?php if($l == 'nl') echo 'selected'; ?>>Dutch</option>
                                                              <option value="fr" <?php if($l == 'fr') echo 'selected'; ?>>French</option>
                                                              <option value="de" <?php if($l == 'de') echo 'selected'; ?>>German</option>
                                                              <option value="pt" <?php if($l == 'pt') echo 'selected'; ?>>Portuguese</option>
                                                              <option value="ru" <?php if($l == 'ru') echo 'selected'; ?>>Russian</option>
                                                              <option value="es" <?php if($l == 'es') echo 'selected'; ?>>Spanish</option>
                                                              <option value="tr" <?php if($l == 'tr') echo 'selected'; ?>>Turkish</option>
                                                           </select> 
                                                           </div>
                                                         </div>
							
							<div class="form_holder">
							  <label><span>SiteKey</span></label>
							  <input type="text" name="reCAPTCHA[sitekey]" placeholder="" value="<?= $sitekey;?>">
							</div>
                            <input type="hidden" name="setting_name" value="reCAPTCHA"/>      
                                       
                                      <div class="form_holder">
                                         <button class="sbmt sbmt_base sbmt_base-no-border" type="submit"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Save');?></button>
                                       </div>
                                       
                                      </div>
                            
                                </form>
                </div>
                <div id="view4" class="clearfix">
                    
                     <form action="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post">
  
                                       
                                       <div class="fileds">
                            <?php
                             $settings = (array)getSettingsValue('ticket_auto_close');

                             $t = $settings['number'];

                             $l = $settings['type'];

                             $array = array('second','minute','hour','day','month','year');

                            ?>           
                            
                                                        <div class="form_holder">
                                                        <h1 class="tab_name"><?php echo $this->lang->line('Ticket Auto Close Settings');?></h1>
                                                           <label><span>&nbsp;</span></label>
                      <input style="width:50px;float: left;margin-right:20px" type="text" name="ticket_auto_close[number]" placeholder="" value="<?= $t ?>">
                                                           <div  style="width:200px;float: left;" class="select_cover">
                                                           <select name="ticket_auto_close[type]">
                                                              <?php
                                                              foreach($array as $val)
                                                              {
                                                              ?>
                                                                <option value="<?= $val ?>" <?php if($l == $val) echo 'selected'; ?>><?= $val ?></option>
                                                              <?php } ?>
                                                           </select> 
                                                           </div>
                                                         </div>
                              
                                                      
                            <input type="hidden" name="setting_name" value="ticket_auto_close"/>      
                                       
                                      <div class="form_holder">
                                         <button class="sbmt sbmt_base sbmt_base-no-border" type="submit"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Save');?></button>
                                       </div>
                                       
                                      </div>
                            
                                </form>
                </div>
		
		<?php
		$backup=fetchmod('backup');
		if($backup==1)
		{
		?>
                <div id="view5" class="clearfix">
                 
                     <form action="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post">
  
                                       
                                       <div class="fileds">
                            <?php
                             $settings = (array)getSettingsValue('scheduled_backup');

                             $t = $settings['number'];

                             $l = $settings['type'];

                             $array = array('day','month','year');

                            ?>           
                            
                                                        <div class="form_holder">
                                                        <h1 class="tab_name"><?php echo $this->lang->line('Backup Settings');?></h1>
                                                           <label><span>&nbsp;</span></label>
                      <input style="width:50px;float: left;margin-right:20px" type="text" name="scheduled_backup[number]" placeholder="" value="<?= $t ?>">
                                                           <div  style="width:200px;float: left;" class="select_cover">
                                                           <select name="scheduled_backup[type]">
                                                              <?php
                                                              foreach($array as $val)
                                                              {
                                                              ?>
                                                                <option value="<?= $val ?>" <?php if($l == $val) echo 'selected'; ?>><?= $val ?></option>
                                                              <?php } ?>
                                                           </select> 
                                                           </div>
                                                         </div>
                               <input type="hidden" name="scheduled_backup[set_date]" value="<?= date('Y-m-d') ?>"/> 
                                                      
                            <input type="hidden" name="setting_name" value="scheduled_backup"/>      
                                       
                                      <div class="form_holder">
                                         <button class="sbmt sbmt_base sbmt_base-no-border" type="submit"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Save');?></button>
                                       </div>
                                       
                                      </div>
                            
                                </form>
                                   <p><strong><?php echo $this->lang->line('Scheduled Backup will be taken every x Day/Month/year whatever set in the settings from the day its been set.');?></strong></p>
                </div>
		<?php
		}
		?>
                <!--<div id="view6" class="clearfix">  -->
                     <!--<form action="<?php //echo TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post">-->
  
                                       
                                       <!--<div class="fileds">-->
                            <?php
                             //$settings = (array)getSettingsValue('register');
                             //$types = getRegisterType();

?>
<!--<div class="form_holder radio">-->
        <!--<label><span>Register Types</span></label>     -->
       <!--</div>                        -->
                             <?php

                             //if(!empty($types))
                             //{
                              //foreach($types as $type)
                              //{
                                //$sel = ($settings['active'] == $type->type) ? "checked" : "";
                            ?>   
                            <!--<div class="form_holder radio">-->
                                                   
                            <!--<input name="register[active]" type="radio" value="<?php //echo $type->type ?>" <?php echo $sel ?> >-->
			    <?php //echo $type->type ?>
                            <!--</div>                          -->
                              <?php //}
                              //} ?>                          
                                                  
                         
                                                      
                            <!--<input type="hidden" name="setting_name" value="register"/>      -->
                                       
                                      <!--<div class="form_holder">-->
                                         <!--<button class="sbmt sbmt_base sbmt_base-no-border" type="submit"><i class="fa fa-spinner upload_icon"></i>Save</button>-->
                                       <!--</div>-->
                                       
                                      <!--</div>-->
                            
                                <!--</form>-->
                <!--</div>-->
                <div id="view7" class="clearfix">  
                     <form action="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post">
  
                                       
                                       <div class="fileds">
                            <?php
                             $settings = (array)getSettingsValue('pagination');

?>
<div class="form_holder">
   <h1 class="tab_name"><?php echo $this->lang->line('Pagination Settings');?></h1>
<label><span><?php echo $this->lang->line('Default No. of records to show');?></span></label>   

   <div class="select_cover" style="width:100px" >
                                  <select name="pagination[active]">
                                 <?php $array = array(5,10,20,40,80,100); 
                                 foreach($array as $no){
                                  $sel = $no ==  $settings['active'] ? 'selected':'';
                                 ?>
                                  <option value="<?= $no ?>" <?= $sel ?>><?= $no ?></option>
                                 <?php } ?>
                                 </select>
        </div>  

       </div>                        

                                              
                                            
                                                          
                                                  
                         
                                                      
                            <input type="hidden" name="setting_name" value="pagination"/>      
                                       
                                      <div class="form_holder">
                                         <button class="sbmt sbmt_base sbmt_base-no-border" type="submit"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Save');?></button>
                                       </div>
                                       
                                      </div>
                            
                                </form>
                </div>
 <div id="view8" class="clearfix">  
                     <form action="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post">
  
                                       
                                       <div class="fileds">
                          <?php
                             $settings = (array)getSettingsValue('ticket_time');
                             

?>
<div class="form_holder radio">
   <h1 class="tab_name"><?php echo $this->lang->line('Ticket Time Settings');?></h1>
        <label><span><?php echo $this->lang->line('Default Ticket Time View');?></span></label>     
       </div>                        
                               
                            <div class="form_holder radio">
                                                   
                            <input name="ticket_time[type]" type="radio" value="1"  <?php if($settings['type'] == 1) echo "checked"; ?> > 
                            <?php echo $this->lang->line('Creation Time');?>
                            </div>    

                              <div class="form_holder radio">
                                                   
                            <input name="ticket_time[type]" type="radio" value="2" <?php if($settings['type'] == 2) echo "checked"; ?> > 
                            <?php echo $this->lang->line('Elapsed Time');?>
                            </div>                          
                                                        
                                                      
                                                  
                         
                                                      
                            <input type="hidden" name="setting_name" value="ticket_time"/>       
                                       
                                      <div class="form_holder">
                                         <button class="sbmt sbmt_base sbmt_base-no-border" type="submit"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Save');?></button>
                                       </div>
                                       
                                      </div>
                            
                                </form>
                </div>
<div id="view9" class="clearfix">  
                     <form action="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post">
  
                                       
                                       <div class="fileds">
                          <?php
                             $settings = (array)getSettingsValue('delete_confirmation');
                             

?>
<div class="form_holder radio">
   <h1 class="tab_name"><?php echo $this->lang->line('Ticket Delete Settings');?></h1>
        <label><span><?php echo $this->lang->line('Ask for Confirmation while deleting if enable');?></span></label>     
       </div>                        
                               
                            <div class="form_holder radio">
                                                   
                            <input name="delete_confirmation[type]" type="radio" value="1"  <?php if($settings['type'] == 1) echo "checked"; ?> > 
                           <?php echo $this->lang->line('Enable');?> 
                            </div>    

                              <div class="form_holder radio">
                                                   
                            <input name="delete_confirmation[type]" type="radio" value="2" <?php if($settings['type'] == 2) echo "checked"; ?> > 
                            <?php echo $this->lang->line('Disable');?> 
                            </div>                          
                                                        
                                                      
                                                  
                         
                                                      
                            <input type="hidden" name="setting_name" value="delete_confirmation"/>       
                                       
                                      <div class="form_holder">
                                         <button class="sbmt sbmt_base sbmt_base-no-border" type="submit"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Save');?></button>
                                       </div>
                                       
                                      </div>
                            
                                </form>
                </div>
	      <?php
	      $akismet=fetchmod('akismet');
	      if($akismet==1)
	      {
	      ?>
              <div id="view10" class="clearfix">
                              
                                <form action="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post">
  
                                       
                                       <div class="fileds">
                            <?php
                             $settings = (array)getSettingsValue('akismet');

                             $ext = $settings['api_key'];

                            ?>           
                            
                            <div class="form_holder">
                               <h1 class="tab_name"><?php echo $this->lang->line('Akismet Settings');?></h1>
                              <label><span><?php echo $this->lang->line('API Key');?></span></label>
                              <input type="text" name="akismet[api_key]" placeholder="" value="<?= $ext ?>">
                            </div>
                              
                            <input type="hidden" name="setting_name" value="akismet"/>      
                                       
                                      <div class="form_holder">
                                         <button class="sbmt sbmt_base sbmt_base-no-border" type="submit"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Save');?></button>
                                       </div>
                                       
                                      </div>
                            
                                </form>
                                  <p><strong><?php echo $this->lang->line('Akismet API Credentials');?></strong></p>
                
                </div>
		<?php
	      }
	      ?>
	      <?php
	      $opswat=fetchmod('opswat');
	      if($opswat==1)
	      {
		?>
                <div id="view11" class="clearfix">
                              
                                <form action="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post">
  
                                       
                                       <div class="fileds">
                            <?php
                             $settings = (array)getSettingsValue('opswat');

                             $ext = $settings['api_key'];

                            ?>           
                            
                            <div class="form_holder">
                             <h1 class="tab_name"><?php echo $this->lang->line('OPSWAT Settings');?></h1>
                              <label><span>API Key</span></label>
                              <input type="text" name="opswat[api_key]" placeholder="" value="<?= $ext ?>">
                            </div>
                              

                            <input type="hidden" name="setting_name" value="opswat"/>      
                                       
                                      <div class="form_holder">
                                         <button class="sbmt sbmt_base sbmt_base-no-border" type="submit"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Save');?></button>
                                       </div>
                                       
                                      </div>
                            
                                </form>
                                  <p><strong><?php echo $this->lang->line('OPSWAT API Credentials');?> </strong></p>
                
                </div>
		<?php
	      }
	      ?>

		

            	<div id="view12" class="clearfix">  
                     <form action="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post">
  
                                       
                                       <div class="fileds">
                          <?php
                             $settings = (array)getSettingsValue('auto_responder');
                             

?>
<div class="form_holder radio">
<h1 class="tab_name"><?php echo $this->lang->line('Auto Responder Settings');?></h1>
        <label><span><?php echo $this->lang->line('Sends an Auto-Responded mail to user after ticket post if enable');?></span></label>     
       </div>                        
                               
                            <div class="form_holder radio">
                                                   
                            <input name="auto_responder[type]" type="radio" value="1"  <?php if($settings['type'] == 1) echo "checked"; ?> > 
                           <?php echo $this->lang->line('Enable');?> 
                            </div>    

                              <div class="form_holder radio">
                                                   
                            <input name="auto_responder[type]" type="radio" value="2" <?php if($settings['type'] == 2) echo "checked"; ?> > 
                            <?php echo $this->lang->line('Disable');?>  
                            </div>                          
                                                        
                                                      
                                                  
                         
                                                      
                            <input type="hidden" name="setting_name" value="auto_responder"/>       
                                       
                                      <div class="form_holder">
                                         <button class="sbmt sbmt_base sbmt_base-no-border" type="submit"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Save');?></button>
                                       </div>
                                       
                                      </div>
                            
                                </form>
                </div>
		
		<?php
		$resp_tim=fetchmod('response_time');
		if($resp_tim==1)
		{
		?>
		<div id="view13" class="clearfix">

                     <form action="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post">
  
                                       
                                       <div class="fileds">
                            <?php
                             $settings = (array)getSettingsValue('response_time');

                             $t = $settings['number'];

                             $l = $settings['unit'];

                             $array = array('second','minute','hour','day','month','year');

                            ?>           
                            
                                                        <div class="form_holder">
                                                        <h1 class="tab_name"><?php echo $this->lang->line('Response Time Settings');?></h1>
                                                           <label><span>&nbsp;</span></label>
                      <input style="width:50px;float: left;margin-right:20px" type="text" name="response_time[number]" placeholder="" value="<?php echo $t;?>">
                                                           <div  style="width:200px;float: left;" class="select_cover">
                                                           <select name="response_time[unit]">
                                                              <?php
                                                              foreach($array as $val)
                                                              {
                                                              ?>
                                                                <option value="<?php echo $val;?>" <?php if($val==$l) { ?> selected="true" <?php } ?>><?= $val ?></option>
                                                              <?php
							      }
							      ?>
                                                           </select> 
                                                           </div>
                                                         </div>
                                                      
                            <input type="hidden" name="setting_name" value="response_time"/>      
                                       
                                      <div class="form_holder">
                                         <button class="sbmt sbmt_base sbmt_base-no-border" type="submit"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Save');?></button>
                                       </div>
                                       
                                      </div>
                            
                                </form>
                                                    <p><strong><?php echo $this->lang->line('Response time to set a mark for admins.');?></strong></p>
                </div>
		<?php
		}
		?>
		<?php
		$tweet=fetchmod('twitter');
		if($tweet==1)
		{
		?>
		<div id="view14" class="clearfix">

        <form action="<?= TICKET_PLUGIN_URL;?>CI/index.php/settings/save" method="post">

         
         <div class="fileds">
    <?php
     $settings = (array)getSettingsValue('twitter');

     $access_token = $settings['oauth_access_token'];
     $access_token_secret = $settings['oauth_access_token_secret'];
     $consumer_key = $settings['consumer_key'];
     $consumer_secret = $settings['consumer_secret'];
     $screen_name = $settings['screen_name'];
     $count = $settings['count'];
     //$mailbox = $settings['mailbox'];
    ?>           
    <div class="form_holder">
    <h1 class="tab_name"><?php echo $this->lang->line('Twitter API Settings');?></h1>
      <label><span><?php echo $this->lang->line('Access Token');?></span></label>
      <input type="text" name="twitter[oauth_access_token]" placeholder="" value="<?= $access_token;?>">
      <br />
      <span></span>
    </div>
    
    <div class="form_holder">
      <label><span><?php echo $this->lang->line('Access Token Secret');?></span></label>
      <input type="text" name="twitter[oauth_access_token_secret]" placeholder="" value="<?= $access_token_secret;?>">
    </div>
    
    <div class="form_holder">
      <label><span><?php echo $this->lang->line('Consumer Key');?></span></label>
      <input type="text" name="twitter[consumer_key]" placeholder="" value="<?= $consumer_key;?>">
    </div>
    
    <div class="form_holder">
      <label><span><?php echo $this->lang->line('Consumer Secret');?></span></label>
      <input type="text" name="twitter[consumer_secret]" placeholder="" value="<?= $consumer_secret;?>">
    </div>
    
    <div class="form_holder">
      <label><span><?php echo $this->lang->line('Username');?></span></label>
      <input type="text" name="twitter[screen_name]" placeholder="" value="<?= $screen_name;?>">
    </div>
    
    <div class="form_holder">
      <label><span><?php echo $this->lang->line('No. of Tweets to Fetch');?></span></label>
      <input type="text" name="twitter[count]" placeholder="" value="<?= $count;?>">
    </div>
    
<!--     <div class="form_holder">
  <label><span>Mailbox</span></label>
  <input type="text" name="imapsetting[mailbox]" placeholder="" value="">
</div> -->
    <input type="hidden" name="setting_name" value="twitter"/>      
         
        <div class="form_holder">
           <button class="sbmt sbmt_base sbmt_base-no-border" type="submit"><i class="fa fa-spinner upload_icon"></i><?php echo $this->lang->line('Save');?></button>
         </div>
         
        </div>
    
        </form>
                <p><strong><?php echo $this->lang->line('Twitter API 1.1 Credentials for Posting Tweets as Ticket');?> </strong></p>
                </div>
		<?php
		}
		?>
            </div>

          
                        </div>

          </div>
         </section>
                </div>
			
                
              
               
              </div>
              </div>
          </div>
          
         </div>
           
         <!--/product_box-->
         
       
         
       </div>
       <!--/main_section-->
       
       <!--recent_activity-->
       <!-- <div class="recent_act_box">
        <h1>Recent Activity</h1>
         <div class="sec_act">
          <div class="porfile_box">
            <div class="date_pi">
            <p>20</p><strong>March</strong>
            </div>
             <div class="time_pi">
          9pm
          </div>
          </div>
         
          <div class="right_rec">
           <p class="icon_top">
            <img src="<?= TICKET_PLUGIN_URL;?>CI/images/pic01.jpg">
           </p>
            <div class="corner">
          </div>
           <div class="left_details">
            <p class="name_pil">Suzane Marie <strong>#52</strong>
            <span class="aroe_pi"><a href="#"><i class="fa fa-reply"></i></a></span>
            <span class="lock_pi"><a href="#"><i class="fa fa-lock"></i><strong>Completed</strong></a></span>
            </p>
            <p class="det_all"><strong>Milestone Title</strong>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
             
           </div>
          </div>
         </div>
         
         <div class="sec_act">
          <div class="porfile_box">
            <div class="date_pi ui_pi">
            <p>20</p><strong>March</strong>
            </div>
             <div class="time_pi bhu_txt">
          9pm
          </div>
          </div>
         
          <div class="right_rec">
             <p class="icon_top">
            <img src="<?= TICKET_PLUGIN_URL;?>CI/images/pic02.jpg">
           </p>
            <div class="corner">
          </div>
           <div class="left_details">
            <p class="name_pil">Suzane Marie <strong>#52</strong>
            <span class="aroe_pi"><a href="#"><i class="fa fa-reply"></i></a></span>
            <span class="lock_pi"><a href="#"><strong class="red_imp">Important</strong></a></span>
            </p>
            <p class="det_all"><strong>Milestone Title</strong>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
           <div class="icon_ht"></div>
           </div>
          </div>
         </div>
         
         <div class="sec_act">
          <div class="porfile_box">
            <div class="date_pi">
            <p>20</p><strong>March</strong>
            </div>
             <div class="time_pi">
          9pm
          </div>
          </div>
         
          <div class="right_rec">
           <p class="icon_top">
            <img src="<?= TICKET_PLUGIN_URL;?>CI/images/pic03.jpg">
           </p>
            <div class="corner">
          </div>
           <div class="left_details">
            <p class="name_pil">Suzane Marie <strong>#52</strong>
            <span class="aroe_pi"><a href="#"><i class="fa fa-reply"></i></a></span>
            <span class="lock_pi"><a href="#"><i class="fa fa-lock"></i><strong>Completed</strong></a></span>
            </p>
            <p class="det_all"><strong>Milestone Title</strong>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
           </div>
          </div>
         </div>
         
         <div class="sec_act">
          <div class="porfile_box">
            <div class="date_pi">
            <p>20</p><strong>March</strong>
            </div>
             <div class="time_pi">
          9pm
          </div>
          </div>
         
          <div class="right_rec">
            <p class="icon_top">
            <img src="<?= TICKET_PLUGIN_URL;?>CI/images/pic04.jpg">
           </p>
            <div class="corner">
          </div>
           <div class="left_details">
            <p class="name_pil">Suzane Marie <strong>#52</strong>
            <span class="aroe_pi"><a href="#"><i class="fa fa-reply"></i></a></span>
           <span class="lock_pi"><a href="#"><strong class="red_imp">Important</strong></a></span>
            </p>
            <p class="det_all"><strong>Milestone Title</strong>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
           </div>
          </div>
         </div>
         
        </div>-->
       <!--/recent_activity-->
    </div>
    
  </div>
</div>
            <script type="text/javascript">
                
                $('.rtabs').find('li').removeClass('selected');
            </script>
<?php
unset($_SESSION["open_tab"]);
$this->load->view('common/footer');
?>
