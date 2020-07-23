 <script type="text/javascript">
var count = 30;// <?php //echo $rs_quiz['timer']*60;?>;
var redirect = "<?php echo base_url();?>user/sayembara_timeout";
 
function countDown(){
    var timer = document.getElementById("timer");
    if(count > 0){
        count--;
        timer.innerHTML = count+" seconds.";
        setTimeout("countDown()", 1000);
    }else{
        window.location.href = redirect;
    }
}
</script>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Sayembara
               
                </h2>
            </div>
            <!-- Basic Validation -->

      
      
  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Sayembara</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                       
                        <div class="body">Time left :<span id="timer">
<script type="text/javascript">countDown();</script>
</span> 
                             
                            <div id="quiz">
                            <form id="form_validation" method="POST" action="<?php echo base_url();?>user/sayembara_add">
                                <h3><?php echo $rs_quiz['question'];?></h3>
                                <section>
                                      <div class="form-group">
                                        <?php foreach ($rs_opsi as $row2) {
                                            ?>
                                            <input type="hidden" name="qid" value="<?php echo $row2['qid'];?>">
                                            <input type="radio" id="<?php echo $row2['id'];?>" name="opsi" value="<?php echo $row2['choice'];?>" class="with-gap">
                                             <label for="<?php echo $row2['id'];?>"><?php echo $row2['choice'];?></label>
                                         
                                       <?php } ?>
                                       </div>
                                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                                </section>
                            </form>
                               
                            </div>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
</section>
