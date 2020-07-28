<link href="<?= base_url('assets/css/sweet-alert.css') ?>" rel="stylesheet" />
<script type="text/javascript" src="<?= base_url('assets/js/sweet-alert.js') ?>"></script>
<section class="content">
    <div class="">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Data list Kelengkapan</h2>
                    </div>
                    <div class="body" style="overflow: auto;">
                        <tt>
                            <p style="color: red;">untuk melihat data lengkap silahkan scrol ke kanan</p>
                        </tt>
                        <a href="<?= base_url('reg_kelengkapan/tambah') ?>" class="btn btn-primary"><i class="btn btn-primary"></i>Tambah</a>
                        <table class="table" id="datatables">
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                                    <th>No Registrasi</th>
                                    <th>Form Pendaftar</th>
                                    <th>Ktp</th>
                                    <th>Npwp</th>
                                    <th>Pas Foto</th>
                                    <th>Data Orang Tua</th>
                                    <th>Data Ujian</th>
                                    <th>Data Ijazah</th>
                                    <th>Data Nilai</th>
                                    <th>Data Sertifikat</th>
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
                                        "url": "reg_kelengkapan/json",
                                        "type": "POST"
                                    },
                                    columns: [{
                                            "data": "id",
                                            "orderable": false
                                        }, {
                                            "data": "no_registrasi"
                                        }, {
                                            "data": "form_pendaftar"
                                        }, {
                                            "data": "ktp",
                                            "render": function(data, type, row) {
                                                if (row.ktp == 1) {
                                                    return 'Ada';
                                                } else {
                                                    return 'Tidak Ada';

                                                }
                                            },
                                        },
                                        {
                                            "data": "npwp",
                                            "render": function(data, type, row) {
                                                if (row.npwp == 1) {
                                                    return 'Ada';
                                                } else {
                                                    return 'Tidak Ada';

                                                }
                                            },
                                        },
                                        {
                                            "data": "pas_foto",
                                            "render": function(data, type, row) {
                                                if (row.pas_foto == 1) {
                                                    return 'Ada';
                                                } else {
                                                    return 'Tidak Ada';

                                                }
                                            },
                                        }, 
                                        {
                                            "data": "data_orang_tua",
                                            "render": function(data, type, row) {
                                                if (row.data_orang_tua == 1) {
                                                    return 'Ada';
                                                } else {
                                                    return 'Tidak Ada';

                                                }
                                            },
                                        },
                                        {
                                            "data": "data_ujian",
                                            "render": function(data, type, row) {
                                                if (row.data_ujian == 1) {
                                                    return 'Ada';
                                                } else {
                                                    return 'Tidak Ada';

                                                }
                                            },
                                        },
                                        {
                                            "data": "data_ijazah",
                                            "render": function(data, type, row) {
                                                if (row.data_ijazah == 1) {
                                                    return 'Ada';
                                                } else {
                                                    return 'Tidak Ada';

                                                }
                                            },
                                        },
                                        {
                                            "data": "data_nilai",
                                            "render": function(data, type, row) {
                                                if (row.data_sertifikat == 1) {
                                                    return 'Ada';
                                                } else {
                                                    return 'Tidak Ada';

                                                }
                                            },
                                        },
                                        {
                                            "data": "data_sertifikat",
                                            "render": function(data, type, row) {
                                                if (row.data_sertifikat == 1) {
                                                    return 'Ada';
                                                } else {
                                                    return 'Tidak Ada';

                                                }
                                            },
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
                                        window.location.href = '<?= base_url('reg_kelengkapan/hapus/') ?>' + n;
                                    });
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>