   


    <!-- Jquery Core Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.js"></script>
    

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Light Gallery Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/light-gallery/js/lightgallery-all.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url();?>assets/js/pages/medias/image-gallery.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/node-waves/waves.js"></script>
  <script src="<?php echo base_url();?>assets/plugins/tinymce/tinymce.js"></script>
  <script src="<?php echo base_url();?>assets/plugins/jquery-validation/jquery.validate.js"></script>
    <script src="<?php echo base_url();?>assets/js/pages/forms/form-validation.js"></script>
  
    <!-- Custom Js -->
    <script src="<?php echo base_url();?>assets/js/admin.js"></script>
     <script src="<?php echo base_url();?>assets/js/pages/tables/jquery-datatable.js"></script>
    <!-- Demo Js -->
    <script src="<?php echo base_url();?>assets/js/demo.js"></script>
    <!--Data table-->
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9VPjCRe0u-KRTBVXtbXfGo_kdkX_mb-I&libraries=places"></script>

    <script type="text/javascript">

        function initMap(ids) {
            var autocomplete = new google.maps.places.Autocomplete(
                /** @type {HTMLInputElement} */(document.getElementById(ids)),
                { types: [] });
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                var lat = place.geometry.location.lat(), lng = place.geometry.location.lng();
                var lokasimap = lat+','+lng;

                $("#long").val(lng);
                $("#lat").val(lat);
            });
        }
        
        $(document).ready(function(){

            $("body").on('keyup', '#alamatsponsorzzz', function(){
                var lokasi = $(this).attr('id');
                initMap(lokasi);
            });

            tinymce.init({
                selector: "textarea#tinymce",
                branding: false,
                menubar: false,
                theme: "modern",
                height: 300,
                toolbar1: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '<?php echo base_url();?>assets/plugins/tinymce';

            $('iframe').width('100%');
            $('body').on('change', '#pilihzzz', function(){
                var opt = $('#pilihzzz').val();

                if(opt == 'local')
                {
                    $('#linkembedzzz').hide();
                    $('#videogalerizzz').show();
                }
                else{
                    $('#linkembedzzz').show();
                    $('#videogalerizzz').hide();
                }
            });

            $('body').on('click', '#btnaddzzz', function(){
                $('#formquizzzz').append('<div class="form-group form-float"><div class="form-line"><input type="text" class="form-control soalzzz" name="soal" placeholder="soal" required></div></div><div class="form-group form-float"><div class="form-line"><input type="text" class="form-control choicezzz1" name="choice[]" placeholder="opsi 1" required></div></div><div class="form-group form-float"><div class="form-line"><input type="text" class="form-control choicezzz2" name="choice[]" placeholder="opsi 2"></div></div><div class="form-group form-float""><div class="form-line"><input type="text" name="choice[]" class="form-control choicezzz3" placeholder="opsi 3"></div></div><div class="form-group form-float""><div class="form-line"><input type="text" name="choice[]" class="form-control choicezzz4" placeholder="opsi 4"></div></div><div class="form-group form-float""><div class="form-line"><input type="number" name="correct_choices" class="form-control correct_choiceszzz" placeholder="jawaban yang benar"></div></div>');
            });

            $('body').on('click', '#btnsimpanzzz', function(){
                var item_soal = [],
                    item_choice1 = [],
                    item_choice2 = [],
                    item_choice3 = [],
                    item_choice4 = [],
                    item_correct = [],
                    timer = $('.timerzzz').val(),
                    tanggal = $('.tanggalzzz').val();

                $('.soalzzz').each(function(){
                    item_soal.push($(this).val());
                });

                $('.choicezzz1').each(function(){
                    item_choice1.push($(this).val());
                });
                $('.choicezzz2').each(function(){
                    item_choice2.push($(this).val());
                });
                $('.choicezzz3').each(function(){
                    item_choice3.push($(this).val());
                });
                $('.choicezzz4').each(function(){
                    item_choice4.push($(this).val());
                });
                $('.correct_choiceszzz').each(function(){
                    item_correct.push($(this).val());
                });

                $.ajax({
                    url: '<?php echo base_url(); ?>quiz/quiz_tmb',
                    method: "POST",
                    data: { item_soal: item_soal, item_choice1: item_choice1, item_choice2: item_choice2, item_choice3: item_choice3, item_choice4: item_choice4, item_correct: item_correct, timer: timer, tanggal: tanggal },
                    success: function(data){
                        setTimeout('window.location.href = "<?php echo base_url(); ?>quiz/quiz_add"', 1000);
                    }
                })
            });

            $('body').on('click', '#btnbuatpesanzzz', function(){
                $('#formpesanzzz').show();
            });

            $('body').on('click', '#btnbuatnewszzz', function(){
                $('#formnewszzz').show();
            });
        })
    </script>

</body>

</html>