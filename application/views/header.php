<script type="text/javascript">
$(document).ready(function(){
    $("#login-form").submit(function(e) {
        var url = "<?=base_url('login/login_action')?>";
        $.ajax({
               type: "POST",
               url: url,
               data: $("#login-form").serialize(),
               success: function(data)
               {
                    if (data == "LOGIN_SUCCESSED"){
                        window.location.replace("<?=base_url('mainpage')?>");
                    }else if(data == "LOGIN_FAILED"){
                        $('#form-error').text('Invalid username or password.')
                    }
               }
             });
        e.preventDefault();
    });
    $('#register-link').click(function(){
        var id = this.id;
        window.location.replace("<?=base_url('register')?>");
    });
    $('#header-logo').click(function(){
        var id = this.id;
        window.location.replace("<?=base_url('mainpage')?>");
    });
    $('#header-logo').css('cursor', 'pointer');
});

</script>

<div class="row" style="background-color:white; height:50px;padding:8px 5px" >
    <div class="col-md-3 col-xs-6" id="header-logo">
        <img class="questio-mini-logo" src="<?= base_url()?>assets/images/logo.png" alt="">
        <font style="font-size:20px" class="text-questio-title">Questio</font>
    </div>
    <div class="col-md-3 col-md-push-6 col-xs-3 col-xs-push-3">
        <?php if($this->session->userdata('logged_in') != NULL) :?>
        <a href="<?=base_url('mainpage/logout')?>">
            <button
            type="button"
            class="btn btn-default">
            <?=$this->session->userdata('logged_in')['firstname'];?>
            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
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
        <p id="form-error" style="color:red"></p>
        <?=validation_errors();?>
<<<<<<< HEAD
        <?=form_open('login')?>
=======
        <form id="login-form">
>>>>>>> 13b5d01c3dce196340ed7a5fb07c891a38564d42
        <input type="text" size="20" id="username" name="username" placeholder ="Username" style ="margin-bottom:5px;width:300px;" required />
        <input type="password" size="20" id="password" name="password" placeholder ="Password"style ="width:300px;" required/>
        <br/> <br/>
        <input class ="btn btn-info" type="submit" value="login">
        </form>
        <br>
        <a href="#" id="register-link" style ="color:gray">Register</a>
        <br>
        <a href="<?=base_url('forgotpassword')?>" style ="color:gray">Forgot password?</a>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </div>

</div>
</div>





