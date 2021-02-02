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
                <h3>Data Testi Alumni</h3>  
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Master Data Testi Alumni</h2>
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
                          <th>Foto</th>
                          <th width="200px">Nama</th>
                          <th width="200px">Status</th>
                          <th>Deskripsi </th>
                          <th width="120px"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i = 1;
                      foreach ($alumni as $show) { ?>
                        <tr>
                          <th><?= $i++ ?></th>
                          <td>
                          <img style="margin: 0;width: 75px; height: 90px " src="<?= base_url('build/images/alumni/' . $show->image) ?>" alt="img">
                          </td>
                          <td><?= $show->nama ?><br>
                            <button data-toggle="modal" data-target="#photo-<?= $show->id ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Ubah Foto</button>
                          </td>
                          <td><?= $show->title ?></td>
                          <td><?= $show->desc ?></td>
                          <td>
                            <a data-toggle="modal" href="#edit<?= $show->id ?>"
                                class="btn btn-primary btn-sm" style="width: 100px"><i class="fa fa-pencil"></i> Ubah</a>
                          </td>
                        </tr>
                        <!-- Small modal -->
                        <div id="edit<?= $show->id ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 0">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <?= form_open_multipart('LandingPage/update_alumni/' . $show->id); ?>
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Update Testi Alumni</h4>
                              </div>
                              <div class="modal-body form-horizontal form-label-left">
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3" style="text-align: right">Nama</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" name="nama" class="form-control col-md-7 col-xs-12" required="required" value="<?= $show->nama ?>">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3" style="text-align: right">Title</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control" name="title" value="<?= $show->title ?>">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3" style="text-align: right">Deskripsi</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <script type="text/javascript">
                                            tinymce.init({
                                            selector: 'textarea',
                                            height: 200,
                                            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',

                                            });
                                        </script>
                                        <textarea name="desc"><?= $show->desc ?></textarea>
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
                        <!-- Small modal -->
                        <div id="photo-<?= $show->id ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                            <?= form_open_multipart('LandingPage/update_fotoalumni/'.$show->id); ?>
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Ganti Foto</h4>
                              </div>
                              <div class="modal-body">
                                <p>Nama : <?= $show->nama ?></p>
                                <p>Foto &nbsp;&nbsp;: <?= $show->image ?>
                                </p><br>
                                <p>Format jpg/png/jpeg. Maks size 2Mb.</p>
                                <input name="nama" type="text" hidden value="<?= $show->nama ?>">
                                <input name="foto_lama" type="text" hidden value="<?= $show->image ?>">
                                <input type="file" name="foto" required="required" class="form-control col-md-7 col-xs-12"><br><br>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ganti Foto</button>
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
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Master Data Quotes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="javascript:history.back()" class="collapse-link"><h2><i class="fa fa-arrow-left"></i> Back</h2></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    <table style="font-size: 15px" id="datatable-responsives" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Foto</th>
                          <th width="200px">Nama</th>
                          <th width="200px">Status</th>
                          <th>Deskripsi </th>
                          <th width="120px"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                          <img style="margin: 0;width: 75px; height: 90px " src="<?= base_url('build/images/alumni/' . $quotes->image) ?>" alt="img">
                          </td>
                          <td><?= $quotes->nama ?><br>
                            <button data-toggle="modal" data-target="#photo-quotes" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Ubah Foto</button>
                          </td>
                          <td><?= $quotes->title ?></td>
                          <td><?= $quotes->desc ?></td>
                          <td>
                            <a data-toggle="modal" href="#edit-quotes"
                                class="btn btn-primary btn-sm" style="width: 100px"><i class="fa fa-pencil"></i> Ubah</a>
                          </td>
                        </tr>
                        <!-- Small modal -->
                        <div id="edit-quotes" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 0">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <?= form_open_multipart('LandingPage/update_quotes'); ?>
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Update Quotes</h4>
                              </div>
                              <div class="modal-body form-horizontal form-label-left">
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3" style="text-align: right">Nama</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" name="nama" class="form-control col-md-7 col-xs-12" required="required" value="<?= $quotes->nama ?>">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3" style="text-align: right">Title</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control" name="title" value="<?= $quotes->title ?>">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3" style="text-align: right">Deskripsi</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <script type="text/javascript">
                                            tinymce.init({
                                            selector: 'textarea',
                                            height: 200,
                                            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',

                                            });
                                        </script>
                                        <textarea name="desc"><?= $quotes->desc ?></textarea>
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
                        <!-- Small modal -->
                        <div id="photo-quotes" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                            <?= form_open_multipart('LandingPage/update_fotoquotes/'.$quotes->id); ?>
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Ganti Foto</h4>
                              </div>
                              <div class="modal-body">
                                <p>Nama : <?= $quotes->nama ?></p>
                                <p>Foto &nbsp;&nbsp;: <?= $quotes->image ?>
                                </p><br>
                                <p>Format jpg/png/jpeg. Maks size 2Mb.</p>
                                <input name="nama" type="text" hidden value="<?= $quotes->nama ?>">
                                <input name="foto_lama" type="text" hidden value="<?= $quotes->image ?>">
                                <input type="file" name="foto" required="required" class="form-control col-md-7 col-xs-12"><br><br>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ganti Foto</button>
                              </div>
                            <?= form_close(); ?>
                            </div>
                          </div>
                        </div>
                        <!-- /modals -->
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
    <script>
        $('#datatable-responsives').DataTable();
    </script>
    
