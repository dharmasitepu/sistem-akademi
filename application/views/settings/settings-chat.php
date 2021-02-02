    <div class="right_col" role="main" style="min-height: 2098px;">
        <?php if ($this->session->flashdata('berhasil')) { ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
        data-judul="Data Chat Default"></div>
        <?php } if ($this->session->flashdata('gagal')) { ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
        data-judul="Data Chat Default"></div>
        <?php } ?>
        <?php
            date_default_timezone_set('Asia/Bangkok');
            $time  = date("H");
            ($time < "11")                  ? $waktu = "Selamat Pagi"   : NULL;
            ($time >= "11" && $time < "15") ? $waktu = "Selamat Siang"  : NULL;
            ($time >= "15" && $time < "19") ? $waktu = "Selamat Sore"   : NULL;
            ($time >= "19")                 ? $waktu = "Selamat Malam"  : NULL;
        ?>
        <div class="page-title">
            <div class="title_left">
                <h3>Settings  <small> chat</small></h3>
            </div>
        </div>
        <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-whatsapp"></i>&nbsp; Chat </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="javascript:history.back()" class="close-link"><i class="fa fa-arrow-left"></i> Back to Settings</a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Default Chat</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <form action="<?= site_url('settings/saveChat') ?>" method="POST" class="form-horizontal form-label-left input_mask">
                                <p>Chat.</p>
                                <input type="text" hidden name="id" value="<?= $isiChat->id ?>">
                                <textarea style="height: 35px; margin-bottom: 10px" disabled id="message" class="form-control"><?= $waktu ?>,</textarea>
                                <textarea style="height: 200px" id="message" required="required" class="form-control" name="textDefault" data-parsley-trigger="keyup" 
                                    data-parsley-minlength="10" data-parsley-maxlength="500" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." 
                                    data-parsley-validation-threshold="20"><?= $isiChat->isi ?></textarea>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
        </div>
      </div>
        