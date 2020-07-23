 <section class="content">
        <div class="">
            <!-- Basic Validation -->

      
      
  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Hasil Sayembara</h2>
                        </div>

                       
                        <div class="body">
                             
                            <div id="quiz">
                         
                                
                                <section>
                                      <?php if($rs_quiz['correct']=='1'){
                                      	echo "<h3>Selamat Jawaban Anda Benar</h3>Ikuti Sayembara hariannya";
                                      }elseif($rs_quiz['correct']=='2'){
                                      	echo "Jawaban Anda Salah<h3>Coba lagi besok</h3>";
                                      }else{
                                      	echo "Anda telah kehabisan waktu<h3>Coba lagi besok</h3>";
                                      }
                                      ?>
                                      
                                </section>
                          
                               
                            </div>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
</section>
