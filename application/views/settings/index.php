<div class="right_col" role="main" style="min-height: 2098px;">
        <?php if ($this->session->flashdata('berhasil')) { ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>" data-tipe="Berhasil"
        data-judul="Data Chat Default"></div>
        <?php } if ($this->session->flashdata('gagal')) { ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-tipe="Gagal"
        data-judul="Data Chat Default"></div>
        <?php } ?>
        <div class="page-title">
            <div class="title_left">
                <h3>Settings  <small> Umum</small></h3>
            </div>
        </div>
        <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-gear"></i>&nbsp; Settings </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a style="color: green" href="<?= site_url('settings/chat') ?>" class="close-link"><i class="fa fa-whatsapp"></i> Chat</a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Server</a>
                        </li>
                        <!-- <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="true">Profile</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                        </li> -->
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <table style="font-size: 16px" class="table table-stripped">
                              <tbody>
                                <tr>
                                  <td>PHP Version</td>
                                  <td>:</td>
                                  <td><?= phpversion() ?></td>
                                </tr>
                                <tr>
                                  <td>Codeigniter Version</td>
                                  <td>:</td>
                                  <td><?= CI_VERSION ?></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk </p>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
        </div>
      </div>
        