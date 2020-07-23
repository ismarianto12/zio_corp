    <section class="content">
        <div class="">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            
                            <!-- <div class="right">
                                <button class="btn btn-primary btn-sm waves-effect" id="btnaddzzz">
                                    <i class="material-icons">add</i>
                                </button>
                            </div> -->
                            <h2>Tambah Quiz</h2>
                        </div>


                        <div class="body">
                             <?php
            $message = $this->session->flashdata('message');
            echo $message == '' ? '' : '<div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                '.$message.'</div>';?>
                            <form id="form_validation" method="POST">
                                <div id="formquizzzz">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control soalzzz" name="soal" required>
                                            <label class="form-label">Soal</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control choicezzz1" name="choice[]" autocomplete="off" required>
                                            <label class="form-label">Opsi 1</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" autocomplete="off" class="form-control choicezzz2" name="choice[]">
                                            <label class="form-label">Opsi 2</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float"">
                                       <div class="form-line">
                                            <input type="text" name="choice[]" autocomplete="off" class="form-control choicezzz3">
                                             <label class="form-label">Opsi 3</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float"">
                                        <div class="form-line">
                                            <input type="text" name="choice[]" class="form-control choicezzz4" autocomplete="off">
                                             <label class="form-label">Opsi 4</label>
                                        </div>
                                    </div>
                                     <div class="form-group form-float"">
                                        <div class="form-line">
                                            <input type="number" name="correct_choices" class="form-control correct_choiceszzz" autocomplete="off">
                                             <label class="form-label">Jawaban yang benar</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float"">
                                    <div class="form-line">
                                        <input type="date" name="tanggal" class="form-control tanggalzzz">
                                         <label class="form-label">Tanggal</label>
                                    </div>
                                </div>
                                 <div class="form-group form-float"">
                                    <div class="form-line">
                                        <input type="number" name="timer" autocomplete="off" class="form-control timerzzz">
                                         <label class="form-label">timer</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>

                            <!-- <button class="btn btn-primary waves-effect" id="btnsimpanzzz">SUBMIT</button> -->
                        </div>
                    </div>
                </div>
            </div>
           
         
           
        </div>
    </section>
 