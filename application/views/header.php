<script type="text/javascript">
$(document).ready(function(){
    $("#register-modal").hide();
    $('#register-link').click(function(){
        var id = this.id;
         $("#login-modal").hide();
         $("#register-modal").show();
    });
    $('#header-logo').click(function(){
        var id = this.id;
        window.location.replace("<?=base_url('mainpage')?>");
    });
    $('#header-logo').css('cursor', 'pointer');
});
</script>
<div class="row" style="background-color:white; height:50px;padding:8px 5px" >
    <div class="col-md-3 col-xs-6">
        <img class="questio-mini-logo" src="<?= base_url()?>assets/images/logo.png" alt="">
        <font style="font-size:20px" class="text-questio-title">Questio</font>
    </div>
    <div class="col-md-3 col-md-push-6 col-xs-3 col-xs-push-3">
        <?php if($this->session->userdata('logged_in') != NULL) :?>
        <font style="font-size:20px;color:white">
            <?=$this->session->userdata('logged_in')['firstname'];?>
            <?=$this->session->userdata('logged_in')['lastname'];?>
        </font>
        <a href="<?=base_url('mainpage/logout')?>">
            <button
            type="button"
            class="btn btn-default">
            Logout
        </button>
    </a>
<?php else :?>
    <button
    type="button"
    class="btn btn-default"
    data-toggle="modal"
    data-target="#login">
    Login
</button>
<?php endif; ?>
</div>
</div>


<!-- Modal -->
<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content size">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Keeper Login</h4>
    </div>
    <!-- Login -->
    <div class="modal-body" id = "login-modal">
        <?=validation_errors();?>
        <?=form_open('login')?>
        <input type="text" size="20" id="username" name="username" placeholder ="Username" style ="margin-bottom:5px;width:300px;"/>
        <input type="password" size="20" id="password" name="password" placeholder ="Password"style ="width:300px;"/>
        <br/> <br/>
        <input class ="btn btn-info" type="submit" value="login">
        <?=form_close()?>
        <br>
         <!--
        <a href="<?=base_url('register')?>">Register</a>
        -->
        <a href="#" id="register-link">Register</a>
        <br>
        <a href="<?=base_url('forgotpassword')?>">Forgot password?</a>
    </div>
    <!-- Register -->
    <div class="modal-body " id = "register-modal">
    <?= form_open('register/updatecheck')?>
        Username*:
        <i>Must be 3-16 characters</i>
         <input type="text" name="username" id="username"><br>
        Password*:
        <i>Must be 8-12 characters</i>
         <input type="password" name="password" id="password"><br>
        Password Confirmation*: <input type="password" name="passwordconf" id="passwordconf"><br>
        First Name*: <input type="text" name="fname" id="fname" size="50"><br>
        Last Name*: <input type="text" name="lname" id="lname" size="50"><br>
        Telephone*: <input type="tel" name="telephone" id="telephone"><br>
        E-Mail*: <input type="email" name="email" id="email" size="70"><br>
        <input type="submit" value="Submit">
    <?=form_close()?>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </div>

</div>
</div>





