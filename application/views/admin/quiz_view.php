    <section class="content">
        <div class="">
            <!-- Basic Validation -->

      
      
  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2></h2>
                        </div>

                       
                        <div class="body">Time left :<span id="timer"></span> 
                             
                           <div id="quiz">
                                <form id="form_validation" method="POST" action="<?php echo base_url();?>admin/sayembara_add">
                                    <h3><?php echo $rs_quiz['question'];?></h3>
                                    <input type="hidden" id="timerqinti" value="<?php echo $rs_quiz['timer']; ?>">
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

<script type="text/javascript">
var count = document.getElementById('timerqinti').value;// <?php //echo $rs_quiz['timer']*60;?>;
var redirect = "<?php echo site_url();?>/admin/sayembara_timeout";
 
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

countDown();
</script>