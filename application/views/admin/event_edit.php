    <section class="content">
        <div class="">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Mading </h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="hidden" name="id" value="<?php echo $rs_event['id'] ?>">
                                        <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $rs_event['event_title'] ?>" required>
                                        <label class="form-label">Nama Kelompok </label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="keterangan" autocomplete="off" value="<?php echo $rs_event['event_description'] ?>" required>
                                        <label class="form-label">Keterangan</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="lokasi" autocomplete="off" value="<?php echo $rs_event['event_location'] ?>" required>
                                        <label class="form-label">Lokasi</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class="input-group-addons">
                                          <label class="form-label">Tanggal Event</label> 
                                    </span>
                                        <div class="form-line">
                                            <input type="date" name="tgl_event" class="form-control" value="<?php echo $rs_event['start_date'] ?>">
                                             </div>
                                    </div>
                               
                                
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
         
           
        </div>
    </section>
 