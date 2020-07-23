    <section class="content">
        <div class="">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Visi Misi</h2>
                        </div>
                        <?php foreach ($rs_visi as $row) { ?>
                   
                        <div class="body">
                            <form id="form_validation" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <input type="hidden" name="foto_terdahulu" value="<?php echo $row['gambar_misi']; ?>">
                                    <input type="hidden" name="id" value="<?php echo $row['id_visi'] ?>">
                                    <textarea name="visi" rows="8" id="tinymce" class="form-control" placeholder="Masukan Misi"><?php echo $row['visi'];?></textarea>
                                </div>
                                <div class="form-group form-float">
                                    <textarea rows="8" name="misi" id="tinymce" class="form-control" placeholder="Masukan Visi"><?php echo $row['misi'];?></textarea>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Gambar Visi & Misi</label>
                                    <input type="file" class="form-control" name="gambar_misi">
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
           
         
           
        </div>
    </section>

   
     <script type="text/javascript">
         
         $(function () {
    

    //TinyMCE
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = '<?php echo base_url();?>assets/plugins/tinymce';
});
     </script>