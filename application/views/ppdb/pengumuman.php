
<script src="<?= base_url() ?>vendors/tinymce/tinymce.min.js"></script>
<div class="right_col" role="main" style="min-height: 2098px;">
<?php if ($this->session->flashdata('berhasil')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
    data-judul="Pengumuman"></div>
<?php } if ($this->session->flashdata('gagal')) { ?>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
    data-judul="Pengumuman"></div>
<?php } ?>
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Dashboard Pengumuman</h3>  
            </div>
        </div>
        <div class="clearfix"></div>
        <form method="POST" action="<?= base_url('ppdb/updatePengumuman') ?>">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <h2><strong>Pengumuman</strong></h2>
                <div class="x_content">
                <script type="text/javascript">
                    tinymce.init({
                    selector: 'textarea',
                    height: 300,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table contextmenu paste code'
                    ],
                    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

                    });
                </script>
                <div class="col-md-12">
                    <textarea name="pengumuman" rows="3">
                    <?= $showPengumuman->pengumuman ?>
                    </textarea>
                </div>
                <div class="ln_solid"></div>
                </div>
                <h2><strong>Informasi</strong></h2>
                <div class="x_content">
                  <div id="alerts"></div>
                  <script type="text/javascript">
                        tinymce.init({
                        selector: 'textarea',
                        height: 300,
                        plugins: [
                            'advlist autolink lists link image charmap print preview anchor',
                            'searchreplace visualblocks code fullscreen',
                            'insertdatetime media table contextmenu paste code'
                        ],
                        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

                        });
                    </script>
                    <div class="col-md-12">
                        <textarea name="informasi" rows="3">
                        <?= $showPengumuman->informasi ?>
                        </textarea>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
              </div>
            </div>
        </div>
        </form>
    </div>
</div>   
    
