<link href="<?= base_url('assets/css/sweet-alert.css') ?>" rel="stylesheet" />  
<script type="text/javascript" src="<?= base_url('assets/js/sweet-alert.js') ?>"></script> 
<section class="content">
    <div class="">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Data list form inputan</h2>
                    </div>
                    <div class="body" style="overflow: auto;">
                        <tt>
                            <p style="color: red;">untuk melihat data lengkap silahkan scrol ke kanan</p>
                        </tt>
                        <table class="table" id="datatables">
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Nomor Pendaftaran</th>
                                    <th>Area</th>
                                    <th>Penerima</th>
                                    <th>Alamat penerima</th>
                                    <th>Tanggal</th>
                                    <th>Transportasi Angkutan</th>
                                    <th>Keterangan</th>
                                    <th>Nilai</th>
                                    <th>Jenis1</th>
                                    <th>Ukuran1</th>
                                    <th>Jumlah1</th>
                                    <th>Satuan1</th>
                                    <th>Keterangan1</th>
                                    <th>Jenis2</th>
                                    <th>Ukuran2</th>
                                    <th>Jumlah2</th>
                                    <th>Satuan2</th>
                                    <th>Keterangan2</th>
                                    <th>Jenis3</th>
                                    <th>Ukuran3</th>
                                    <th>Jumlah3</th>
                                    <th>Satuan3</th>
                                    <th>Keterangan3</th>
                                    <th>Jenis4</th>
                                    <th>Ukuran4</th>
                                    <th>Jumlah4</th>
                                    <th>Satuan4</th>
                                    <th>Keterangan4</th>
                                    <th>Jenis5</th>
                                    <th>Ukuran5</th>
                                    <th>Jumlah5</th>
                                    <th>Satuan5</th>
                                    <th>Keterangan5</th>
                                    <th>Date Created</th>
                                    <th>Date Updated</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>

                        </table>

                        <script type="text/javascript">
                            $(document).ready(function() {
                                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
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
                                    ajax: {
                                        "url": "<?= base_url('form_inputan/json') ?>",
                                        "type": "POST"
                                    },
                                    columns: [{
                                            "data": "id",
                                            "orderable": false
                                        }, {
                                            "data": "nama"
                                        }, {
                                            "data": "email"
                                        }, {
                                            "data": "alamat"
                                        }, {
                                            "data": "nomor_pendaftaran"
                                        }, {
                                            "data": "area"
                                        }, {
                                            "data": "penerima"
                                        }, {
                                            "data": "alamatpen"
                                        }, {
                                            "data": "tanggal"
                                        }, {
                                            "data": "transportasi_angkutan"
                                        }, {
                                            "data": "keterangan"
                                        }, {
                                            "data": "nilai"
                                        }, {
                                            "data": "jenis1"
                                        }, {
                                            "data": "ukuran1"
                                        }, {
                                            "data": "jumlah1"
                                        }, {
                                            "data": "satuan1"
                                        }, {
                                            "data": "keterangan1"
                                        }, {
                                            "data": "jenis2"
                                        }, {
                                            "data": "ukuran2"
                                        }, {
                                            "data": "jumlah2"
                                        }, {
                                            "data": "satuan2"
                                        }, {
                                            "data": "keterangan2"
                                        }, {
                                            "data": "jenis3"
                                        }, {
                                            "data": "ukuran3"
                                        }, {
                                            "data": "jumlah3"
                                        }, {
                                            "data": "satuan3"
                                        }, {
                                            "data": "keterangan3"
                                        }, {
                                            "data": "jenis4"
                                        }, {
                                            "data": "ukuran4"
                                        }, {
                                            "data": "jumlah4"
                                        }, {
                                            "data": "satuan4"
                                        }, {
                                            "data": "keterangan4"
                                        }, {
                                            "data": "jenis5"
                                        }, {
                                            "data": "ukuran5"
                                        }, {
                                            "data": "jumlah5"
                                        }, {
                                            "data": "satuan5"
                                        }, {
                                            "data": "keterangan5"
                                        },
                                        {
                                            "data": "date_created"
                                        }, {
                                            "data": "date_updated"
                                        },
                                        {
                                            "data": "action",
                                            "orderable": false,
                                            "className": "text-center"
                                        }
                                    ],
                                    order: [
                                        [0, 'desc']
                                    ],
                                    rowCallback: function(row, data, iDisplayIndex) {
                                        var info = this.fnPagingInfo();
                                        var page = info.iPage;
                                        var length = info.iLength;
                                        var index = page * length + (iDisplayIndex + 1);
                                        $('td:eq(0)', row).html(index);
                                    }
                                });
                            });

                            function hapus(n) {
                                swal({
                                        title: 'Konfirmasi Hapus',
                                        text: 'Apakah Anda Yakin Untuk Menghapus Data Ini?',
                                        type: 'warning',
                                        showCancelButton: true,
                                        confirmButtonClass: 'btn-danger',
                                        confirmButtonText: 'Ya',
                                        closeOnConfirm: false
                                    },
                                    function() {
                                        swal('Hapus Data', 'Data Berhasil Di Hapus', 'success');
                                        window.location.href = '<?= base_url('form_inputan/hapus/') ?>' + n;
                                    });
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>