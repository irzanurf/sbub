<?php function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }?>
 <!-- [ Main Content ] start -->
 <div class="pcoded-main-container">
        <div class="pcoded-wrapper container">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ horizontal-layout ] start -->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Selamat Datang</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="lead m-t-0">Sistem ini akan membantu dalam melakukan pelaporan studi Anda selama kuliah</p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- [ horizontal-layout ] end -->
                            </div>
                            <!-- [ Main Content ] end -->
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                
                                    <div class="col-sm-4">
                                        <div class="card text-white bg-info ">
                                           
                                            <div class="card-body text-center">
                                            <a href="<?= base_url('Mhs');?>" class="btn btn-primary-outline"><img src="<?= base_url('assets/home.png');?>" alt="attach" width="120" height="120"/></a>
                                            <h5 class="card-title text-white">Dashboard</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card text-white bg-success ">
                                            <div class="card-body text-center">
                                            <a href="<?= base_url('Mhs/pribadi');?>" class="btn btn-primary-outline"><img src="<?= base_url('assets/user.png');?>" alt="attach" width="110" height="120"/></a>
                                            <h5 class="card-title text-white">Data Pribadi</h5>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card text-white bg-warning ">
                                            <div class="card-body text-center">
                                            <a href="<?= base_url('Mhs/akademik');?>" class="btn btn-primary-outline"><img src="<?= base_url('assets/cap.png');?>" alt="attach" width="120" height="120"/></a>
                                            <h5 class="card-title text-white">Data Akademik</h5>
                                                
                                            </div>
                                        </div>
                                    </div>

                                <?php foreach($view as $v){ 
                                    $tgl = tgl_indo($v->date);
                                    $ch = strlen($v->head);
                                    $cp = strlen($v->pengumuman);?>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                        <?php echo "<h5>" ?> <?=$v->judul?> <?php "</h5>" ?><br>
                                        <small class="text-muted">Last updated <?=$tgl?></small>
                                        </div>
                                        <?php if ($ch==$cp): ?>
                                        <div class="card-body" style="overflow:hidden;">
                                            <?=$v->head?>
                                        </div>
                                        <?php else: ?>
                                        <div class="card-body" style="overflow:hidden;">
                                            <?=$v->head?>...
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="button" data-toggle="modal" data-target="#pengumuman<?=$v->id?>" class="btn btn-primary">Read More</button>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php } ?>
                                
                            </div>
                            <!-- [ Main Content ] end -->
                             <!-- modal tambah prestasi -->
                             <?php foreach($view as $v){ ?>
                             <div class="modal fade tambah-prestasi" id="pengumuman<?=$v->id?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="padding-top: 5px; padding-bottom: 0px;">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                    <div class="modal-body" style="overflow:hidden; padding-top: 5px; padding-bottom: 0px;">
                                                                    <?php echo "<h3>" ?> <?=$v->judul?> <?php "</h3>" ?><br>
                                                                    <small class="text-muted">Last updated <?=$tgl?></small><hr>
                                                                        <?=$v->pengumuman?> 
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>