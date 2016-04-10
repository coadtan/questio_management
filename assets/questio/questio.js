$(document).ready(function(){
    $("#register-modal").hide();
    $('.keeperplace').click(function(){
        var placeid = this.getAttribute( "placeid");
        $('#buildinglist').load(
            "http://localhost/questio_management/mainpage/getbuilding/"+placeid);
    });
    $('.keeperbuilding').click(function(){
        var buildingid = this.getAttribute( "buildingid");
        $('#floorlist').load("http://localhost/questio_management/mainpage/getfloor/"+buildingid);
    });
    $('.keeperfloor').click(function(){
        var floorid = this.getAttribute( "floorid");
        $('#zonelist').load("http://localhost/questio_management/mainpage/getzone/"+floorid);
    });
    $('.keeperquest').click(function(){
        var id = this.id;
        $('#questdetails').load("<?=base_url('mainpage/getquestdetails/"+id+"')?>")
    });
    $('.keeperzone').click(function(){
        var id = this.id;
        $('#questlist').load("<?=base_url('mainpage/getquest/"+id+"')?>")
    });

    $('#register-link').click(function(){
        var id = this.id;
         $("#login-modal").hide();
         $("#register-modal").show();
    });

});
