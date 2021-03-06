                                <div class="col-md-18">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Ubah Data Pribadi</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="lead m-t-0">Gunakan menu di sebelah kiri untuk memilih menu <br> Tekan tombol <b><i>submit</i></b> untuk menyimpan perubahan data</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            <!-- [ Main Content ] start -->
                            <!-- Akademik -->
                            <div class="col-md-18">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Data diri</h5>
                                    </div>
                                    <div class="card-body">
                                    <form class="needs-validation" method="post" action="<?= base_url('Mhs/update_diri');?>" enctype="multipart/form-data">
                                        <div class="form-row">
                                                <div class="col-md-12 mb-9 text-center">
                                                <?php if(empty($diri->profile)): ?>
                                                <img src="<?= base_url('assets/profile.png');?>" alt="profile" width="150" height="160"/><hr>
                                                <?php else : ?>
                                                <img src="<?= base_url('assets/fotoProfile');?>/<?=$diri->profile?>" alt="profile" width="150" height="200"/><hr>
                                                <?php endif; ?>
                                                <input type="file" accept="image/*" name="profile" ><br>
                                                <label style="color:red; font-size:12px;">File gambar maks 10mb</label>
                                                </div>
                                        </div><hr>
                                        <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label>NIM</label>
                                                    <input class="form-control" value="<?=$diri->nim?>" disabled>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>NIK</label>
                                                    <input name="nik" class="form-control" value="<?=$diri->nik?>" >
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>Nama</label>
                                                    <input name="nama" class="form-control" value="<?=$diri->nama?>" >
                                                </div>
                                        </div><br>
                                        <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label>Fakultas</label>
                                                    <input class="form-control" name="fakultas" value="Teknik" disabled>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>Departemen/Program Studi</label>
                                                    <select class="form-control" name="prodi" required="">
                                                            <?php
                                                            foreach ($prodi as $p) {
                                                                ?>
                                                                <option value="<?php echo $p->id; ?>"<?php echo ($diri->prod==$p->prodi) ? "selected='selected'" : "" ?>><?php echo $p->prodi; ?> </option>
                                                                <?php
                                                            }
                                                            ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>Angkatan</label>
                                                    <select class="form-control" name="angkatan">
                                                        <?php
                                                        for ($year = (int)date('Y'); 2000 <= $year; $year--): ?>
                                                        <option value="<?php echo $year; ?>"<?php echo ($diri->angkatan==$year) ? "selected='selected'" : "" ?>><?php echo $year; ?> </option>
                                                        <?php endfor; ?>
                                                    </select><br>
                                                </div>
                                        </div><br>
                                        <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label>Tempat Lahir</label>
                                                    <<textarea name="tempat_lahir" class="form-control" ><?=$diri->tempat_lahir?></textarea>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>Tanggal Lahir</label>
                                                    <input type="date" name="tgl_lahir" class="form-control" value="<?=$diri->tgl_lahir?>" >
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>Alamat</label>
                                                    <textarea name="alamat" class="form-control" ><?=$diri->alamat?></textarea>
                                                </div>
                                        </div><br>
                                        <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label>Email SSO</label>
                                                    <input name="sso" class="form-control" value="<?=$diri->sso?>" >
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>Email Pribadi</label>
                                                    <input name="email" class="form-control" value="<?=$diri->email?>" >
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>No. HP</label>
                                                    <input type="number" name="no_hp" class="form-control" value="<?=$diri->no_hp?>" >
                                                </div>
                                        </div>
                                        <br><button class="btn btn-info" type="submit">Submit</button>
                                        </form>
                                            
                                    </div>
                                </div>
                            </div>
                            
                            <!-- [ Main Content ] end -->