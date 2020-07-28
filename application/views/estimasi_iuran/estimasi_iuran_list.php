 
          
<link href="<?= base_url('assets/css/sweet-alert.css') ?>" rel="stylesheet" />
<script type="text/javascript" src="<?= base_url('assets/js/sweet-alert.js') ?>"></script>
<section class="content">
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
                <div class="header"> 
                 <h2><?= ucfirst($page_title) ?></h2> 
                 </div>
				<div class="body" style="overflow: auto;"> 
					<div class='row'>
						<div class='col-sm-12'>  
                        <?= $this->session->flashdata('message') ?>
							<div class='white-box'>
								<h3 class='box-title m-b-0'></h3>  
  <?php echo anchor(site_url('estimasi_iuran/tambah'), 'Tambah Data', 'class="btn btn-primary "'); ?>
	    
  <br /><br />
        <table class="table" id="datatables">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Jenis Id</th>
		    <th>Subkategori Id</th>
		    <th>Nilai</th>
		    <th>Quantity</th>
		    <th>Tot Bayar</th>
		    <th>User Id</th>
		    <th>Update At</th>
		    <th>Creaate At</th>
		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table>
       
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#datatables").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#datatables input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "estimasi_iuran/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id",
                            "orderable": false
                        },{"data": "jenis_id"},{"data": "subkategori_id"},{"data": "nilai"},{"data": "quantity"},{"data": "tot_bayar"},{"data": "user_id"},{"data": "update_at"},{"data": "creaate_at"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
         
     function hapus(n){
        swal({
            title: 'Konfirmasi Hapus',
            text: 'Apakah Anda Yakin Untuk Menghapus Data Ini?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Ya',
            closeOnConfirm: false
        },
        function(){
           swal('Hapus Data', 'Data Berhasil Di Hapus', 'success'); 
           window.location.href='<?= base_url('estimasi_iuran/hapus/') ?>'+n;
         });
    }
 </script>
      </div>
     </div>
   </div>
 </div>