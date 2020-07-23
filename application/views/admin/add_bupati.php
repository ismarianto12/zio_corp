<section class="content">
    <div class="">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Tambah Bupati</h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" enctype="multipart/form-data">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="nama" autocomplete="off" required>
                                    <label class="form-label">Nama</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" autocomplete="off" required>
                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="telepon" autocomplete="off" required>
                                    <label class="form-label">Telepon</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                            	<label>Kota</label>
                            	<div class="form-line">
                            		<select class="form-control show-tick" name="kota">
		                                <option value="Palembang">Palembang</option>
		                                <option value="Banyuasin">Banyuasin</option>
		                                <option value="Musi Rawas">Musi Rawas</option>
		                                <option value="Musi Rawas Utara">Musi Rawas Utara</option>
		                                <option value="Musi Banyuasin">Musi Banyuasin</option>
		                                <option value="Lubuk Linggau">Lubuk Linggau</option>
		                            </select>
                            	</div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="kecamatan" autocomplete="off" required>
                                    <label class="form-label">Kecamatan</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="desa" autocomplete="off" required>
                                    <label class="form-label">Desa</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="username" autocomplete="off" required>
                                    <label class="form-label">username</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" class="form-control" name="password" autocomplete="off" required>
                                    <label class="form-label">Password</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                            	<label>Photo Profil</label>
                            	<div class="form-line">
                            		<input type="file" name="foto_profile">
                            	</div>
                            </div>
                            <div class="form-group form-float">
                            	<label>Photo Sampul</label>
                            	<div class="form-line">
                            		<input type="file" name="foto_sampul">
                            	</div>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit">Simpan</button>
                            <a class="btn btn-warning waves-effect" href="<?php echo site_url(); ?>/admin/bupati">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>