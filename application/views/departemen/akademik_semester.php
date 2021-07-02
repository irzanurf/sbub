<div class="container-fluid">
                            <div class="col-md-18">
                                <div class="card">
                                    <div class="card-body">
                                        <nav aria-label="Page navigation">
                                        <h5 style="text-align:center; color:blue;">Semester<h6>
                                            <ul class="pagination justify-content-center">
                                            <?php
                                                foreach($semester as $s) {
                                                    $sem=$s->semester;
                                                    if($sem==$semester_now):
                                            ?>
                                                <li class="page-item active">
                                                <form style="display:inline-block;" method="get" action="<?= base_url('Departemen/akademik_semester');?>">
                                                <input type='hidden' name="nim" value="<?= $nim ?>">
                                                <input type='hidden' name="semester_now" value="<?= $sem ?>">
                                                <button type="Submit" class="page-link">
                                                <?= $sem ?>
                                                </button>
                                                </form></li>
                                                <?php
                                                    else:
                                            ?>
                                                <li class="page-item">
                                                <form style="display:inline-block;" method="get" action="<?= base_url('Departemen/akademik_semester');?>">
                                                <input type='hidden' name="nim" value="<?= $nim ?>">
                                                <input type='hidden' name="semester_now" value="<?= $sem ?>">
                                                <button type="Submit" class="page-link">
                                                <?= $sem ?>
                                                </button>
                                                </form></li>
                                                
                                            <?php
                                            endif;
                                                }
                                            ?>
                                        </nav>
                                        <hr>
                                    
                                    </div>
                                </div>
                            </div>
                            <!-- Akademik -->
                            <div class="col-md-18 border-bottom-primary">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Form Akademik Kuliah</h5>
                                    </div>
                                    <div class="card-body">
                                           <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                <input class="form-control" type="hidden" name="id" value="<?=$akademik->id?>">
                                                <input class="form-control" type="hidden" name="semester" value="<?=$semester_now?>">
                                                    <label>SKS</label>
                                                    <input type="number" name="sks" class="form-control" id="validationCustom01" placeholder="SKS" value="<?= $akademik->sks ?>" readonly>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>IP Semester</label>
                                                    <input type="float" name="ips" class="form-control" id="validationCustom02" placeholder="IP Semester" value="<?= $akademik->ips ?>" readonly>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>IP Komulatif</label>
                                                    <input type="float" name="ipk" class="form-control" id="validationCustom02" placeholder="IP Komulatif" value="<?= $akademik->ipk ?>" readonly>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                            <?php if(empty($akademik->krs)): ?>
                                                <div class="col-md-4 mb-3">
                                                    <label>File KRS</label>
                                                    <br>
                                                </div>
                                            <?php else: ?>
                                                <div class="col-md-4 mb-3">
                                                    <label>File KRS</label><br>
                                                    <button method="post" onclick=" window.open('<?= base_url('assets/krs');?>/<?=$akademik->krs?>', '_blank'); return false;" class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>" alt="attach" width="50" height="50"/></button>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(empty($akademik->transkrip)): ?>
                                                <div class="col-md-4 mb-3">
                                                    <label>File Transkrip</label>
                                                    <br>
                                                </div>
                                            <?php else: ?>
                                                <div class="col-md-4 mb-3">
                                                    <label>File Transkrip</label><br>
                                                    <button method="post" onclick=" window.open('<?= base_url('assets/transkrip');?>/<?=$akademik->transkrip?>', '_blank'); return false;" class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>" alt="attach" width="50" height="50"/></button>
                                                </div>
                                            <?php endif; ?>
                                            </div>
                                    </div>
                                </div>
                            </div><br>
                            
                            <div class="col-md-18">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Form Prestasi</h5>
                                    </div>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align:center">No</th>
                                                                <th>Nama</th>
                                                                <th>Penyelenggara</th>
                                                                <th>Tahun</th>
                                                                <th>Tingkat</th>
                                                                <th>File Pendukung</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                            
                                                            </tr>
                                                        </tfoot>
                                                        <?php 
                                                        $no = 1;
                                                        foreach($prestasi as $p) { ?>
                                                        <tbody>
                                                        
                                                            <tr>
                                                                <td style="text-align:center"><?=$no++?></td>
                                                                <td><?=$p->nama?></td>
                                                                <td><?=$p->penyelenggara?></td>
                                                                <td><?=$p->tahun?></td>
                                                                <td><?=$p->tingkat?></td>
                                                                <td>Sertifikat<br>
                                                                <?php if(empty($p->sertifikat)): ?> -
                                                                <?php else : ?> <button method="post" onclick=" window.open('<?= base_url('assets/sertifikat');?>/<?=$p->sertifikat?>', '_blank'); return false;" class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>" alt="attach" width="30" height="30"/></button>
                                                                <?php endif; ?>
                                                                <br>
                                                                    Foto Dokumentasi<br>
                                                                <?php if(empty($p->foto)): ?> -
                                                                <?php else : ?> <button method="post" onclick=" window.open('<?= base_url('assets/foto');?>/<?=$p->foto?>', '_blank'); return false;" class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>" alt="attach" width="30" height="30"/></button>
                                                                <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                        
                                                        </tbody>
                                                        <?php } ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
</div>