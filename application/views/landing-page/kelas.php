<script src="<?= base_url() ?>vendors/tinymce/tinymce.min.js"></script>
<div class="right_col" role="main" style="min-height: 2098px;">
    <?php if ($this->session->flashdata('berhasil')) { ?>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
      data-judul="Data Biaya PPDB"></div>
    <?php } if ($this->session->flashdata('gagal')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
      data-judul="Data Biaya PPDB"></div>
    <?php } ?>
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Tipe</h3>  
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Master Data Tipe Kelas</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="javascript:history.back()" class="collapse-link"><h2><i class="fa fa-arrow-left"></i> Back</h2></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    <table style="font-size: 15px" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th width="200px">Tipe Kelas</th>
                          <th width="200px">Deskripsi Singkat</th>
                          <th>Deskripsi Lengkap</th>
                          <th width="120px"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i = 1;
                      foreach ($getTipe as $show) { ?>
                        <tr style="background-color: <?= ($show->active == 0) ?'#ffd6d6' : NULL ?>">
                          <th><?= $i++ ?></th>
                          <td><?= $show->judul_kelas ?></td>
                          <td><?= $show->desc_singkat ?></td>
                          <td><?= $show->desc_lengkap ?></td>
                          <td>
                            <?php if($show->active == 0) { ?>
                              <a data-toggle="modal" href="<?= base_url('LandingPage/kelas/' . $show->id .'/1') ?>"
                                  class="btn btn-success btn-sm" style="width: 100px"><i class="fa fa-check"></i> Aktivasi</a>
                            <?php }else{ ?>
                                <a data-toggle="modal" href="#edit<?= $show->id ?>"
                                  class="btn btn-primary btn-sm" style="width: 100px"><i class="fa fa-pencil"></i> Ubah</a>
                                <a data-toggle="modal" href="<?= base_url('LandingPage/kelas/' . $show->id .'/0') ?>"
                                    class="btn btn-danger btn-sm" style="width: 100px"><i class="fa fa-close"></i> Nonaktif</a>
                            <?php } ?>
                          </td>
                        </tr>
                        <!-- Small modal -->
                        <div id="edit<?= $show->id ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 0">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <?= form_open_multipart('LandingPage/kelas/' . $show->id); ?>
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Update Tipe Kelas</h4>
                              </div>
                              <div class="modal-body form-horizontal form-label-left">
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3" style="text-align: right">Tipe Kelas</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" name="judul_kelas" class="form-control col-md-7 col-xs-12" required="required" value="<?= $show->judul_kelas ?>">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3" style="text-align: right">Desc Singkat</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control" name="desc_singkat" value="<?= $show->desc_singkat ?>">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3" style="text-align: right">Desc Lengkap</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <script type="text/javascript">
                                            tinymce.init({
                                            selector: 'textarea',
                                            height: 200,
                                            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',

                                            });
                                        </script>
                                        <textarea name="desc_lengkap"><?= $show->desc_lengkap ?></textarea>
                                    </div>
                                </div>
                              </div>
                              <br>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                            <?= form_close(); ?>
                            </div>
                          </div>
                        </div>
                        <!-- /modals -->
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    
    <!-- Datatables -->
    <script src="<?= base_url() ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url() ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

    
