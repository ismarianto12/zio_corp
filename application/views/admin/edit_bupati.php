<section class="content">
    <div class="">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Bupati</h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST" enctype="multipart/form-data">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="hidden" name="fotoprofileprev" value="<?php echo $rs_bupati['user_pic']; ?>">
                                    <input type="hidden" name="fotosampulprev" value="<?php echo $rs_bupati['foto_sampul']; ?>">
                                    <input type="hidden" name="id" value="<?php echo $rs_bupati['id_user']; ?>">
                                    <input type="text" class="form-control" value="<?php echo $rs_bupati['nama']; ?>" name="nama" autocomplete="off" required>
                                    <label class="form-label">Nama</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" value="<?php echo $rs_bupati['email']; ?>" autocomplete="off" required>
                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="telepon" value="<?php echo $rs_bupati['telepon']; ?>" autocomplete="off" required>
                                    <label class="form-label">Telepon</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                            	<label>Kota</label>
                            	<div class="form-line">
                            		<select class="form-control show-tick" name="kota">
		                                <option value="Palembang" <?php if($rs_bupati['kota'] == 'Palembang'){echo'selected';}?>>Palembang</option>
		                                <option value="Banyuasin" <?php if($rs_bupati['kota'] == 'Banyuasin'){echo'selected';}?>>Banyuasin</option>
		                                <option value="Musi Rawas" <?php if($rs_bupati['kota'] == 'Musi Rawas'){echo'selected';}?>>Musi Rawas</option>
		                                <option value="Musi Rawas Utara" <?php if($rs_bupati['kota'] == 'Musi Rawas Utara'){echo'selected';}?>>Musi Rawas Utara</option>
		                                <option value="Musi Banyuasin" <?php if($rs_bupati['kota'] == 'Musi Banyuasin'){echo'selected';}?>>Musi Banyuasin</option>
		                                <option value="Lubuk Linggau" <?php if($rs_bupati['kota'] == 'Lubuk Linggau'){echo'selected';}?>>Lubuk Linggau</option>
		                            </select>
                            	</div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="kecamatan" value="<?php echo $rs_bupati['kecamatan']; ?>" autocomplete="off" required>
                                    <label class="form-label">Kecamatan</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" value="<?php echo $rs_bupati['desa']; ?>" name="desa" autocomplete="off" required>
                                    <label class="form-label">Desa</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" value="<?php echo $rs_bupati['username']; ?>" name="username" autocomplete="off" required>
                                    <label class="form-label">username</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" class="form-control" name="password" autocomplete="off">
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
                            <button class="btn btn-warning waves-effect" type="submit">Kembali</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>