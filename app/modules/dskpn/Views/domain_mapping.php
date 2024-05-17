<style>
  /* Custom Css to overwrite select2 style */
  .select2-container .select2-selection__rendered {
    display: flex;
    align-items: center;
    padding: 0.5rem 0.75rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.4rem;
    color: #344767;
    white-space: nowrap;
    background-color: #fff;
    border: 1px solid #d2d6da;
    border-radius: 0.5rem;
  }

  .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 38px !important;
  }

  .select2-container--open .select2-selection__rendered {
    border-bottom: none;
    border-bottom-right-radius: 0;
  }

  .select2-container--open .select2-dropdown--below {
    border-top: none;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border: 1px solid #d2d6da;

  }

  .select2-container--default .select2-selection--single .select2-selection__rendered {
    /* color: #444; */
    line-height: inherit !important;
  }

  .select2-container--default .select2-selection--single {
    /* background-color: #fff; */
    border: 0 !important;
    /* border-radius: 4px; */
  }

  /* .row>* {
    padding-right: calc(var(--bs-gutter-x)* 0);
    padding-left: calc(var(--bs-gutter-x)* 0);
    margin-right: calc(var(--bs-gutter-x)* .5);
    margin-left: calc(var(--bs-gutter-x)* .5);
  } */
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<div class="container-fluid py-4">

  <div class="card">
    <div class="card-header d-flex p-3 bg-gradient-primary">
      <h6 class="my-auto text-white">16 DOMAIN MAPPING</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col">
          <label for="kluster">KLUSTER</label>
          <select class="form-control select2" id="kluster" name="kluster">
            <option value="AL">Alabama</option>
            <!-- Other options here -->
            <option value="WY">Wyoming</option>
          </select>
        </div>
        <div class="col">
          <label for="tahun">TOPIK</label>
          <select class="form-control select2" id="tahun" name="tahun">
            <option value="AL">Alabama</option>
            <!-- Other options here -->
            <option value="WY">Wyoming</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-flex pb-0 p-3">
          <div class="nav-wrapper position-relative w-100">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#spesifikasi_pengajaran" role="tab" aria-controls="spesifikasi_pengajaran" aria-selected="false" tabindex="-1">
                  PENGETAHUAN ASAS
                </a>
              </li>
              <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 155px;"><a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">-</a></div>
            </ul>
          </div>
        </div>
        <div class="card-body p-3 mt-2" style="height: auto;">
          <div class="tab-content" id="v-pills-tabContent">
            <!-- Spesifikasi -->
            <div class="tab-pane fade position-relative border-radius-lg active show" id="spesifikasi_pengajaran" role="tabpanel" aria-labelledby="spesifikasi_pengajaran">

              <div class="row">
                <div class="col-md-4">
                  <div class="card mt-4" style="min-height:360px;" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">REKA BENTUK INTRUKSI</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Active Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault11">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Collaborative Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Constructive Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Authentic Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Goal-Directed Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mt-4" style="min-height:360px;" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">INTEGRASI TEKNOLOGI</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Entry Level</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault11">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Adaptation Level</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Infussion Level</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Transformation Level</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Goal-Directed Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mt-4" style="min-height:360px;" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">PENDEKATAN</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Inkuiri</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault11">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Berasaskan Masalah</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Berasaskan Projek</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Pembelajaran Masteri</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Kontekstual</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Berasaskan Pengalaman</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-flex pb-0 p-3">
          <div class="nav-wrapper position-relative w-100">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#spesifikasi_pengajaran" role="tab" aria-controls="spesifikasi_pengajaran" aria-selected="false" tabindex="-1">
                  PENGETAHUAN ASAS
                </a>
              </li>
              <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 155px;"><a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">-</a></div>
            </ul>
          </div>
        </div>
        <div class="card-body p-3 mt-2" style="height: auto;">
          <div class="tab-content" id="v-pills-tabContent">
            <!-- Spesifikasi -->
            <div class="tab-pane fade position-relative border-radius-lg active show" id="spesifikasi_pengajaran" role="tabpanel" aria-labelledby="spesifikasi_pengajaran">

              <div class="row">
                <div class="col-md-4">
                  <div class="card mt-4" style="min-height:360px;" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">REKA BENTUK INTRUKSI</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Active Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault11">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Collaborative Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Constructive Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Authentic Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Goal-Directed Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mt-4" style="min-height:360px;" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">INTEGRASI TEKNOLOGI</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Entry Level</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault11">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Adaptation Level</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Infussion Level</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Transformation Level</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Goal-Directed Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mt-4" style="min-height:360px;" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">PENDEKATAN</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Inkuiri</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault11">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Berasaskan Masalah</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Berasaskan Projek</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Pembelajaran Masteri</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Kontekstual</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Berasaskan Pengalaman</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-flex pb-0 p-3">
          <div class="nav-wrapper position-relative w-100">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#spesifikasi_pengajaran" role="tab" aria-controls="spesifikasi_pengajaran" aria-selected="false" tabindex="-1">
                  PENGETAHUAN ASAS
                </a>
              </li>
              <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 155px;"><a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">-</a></div>
            </ul>
          </div>
        </div>
        <div class="card-body p-3 mt-2" style="height: auto;">
          <div class="tab-content" id="v-pills-tabContent">
            <!-- Spesifikasi -->
            <div class="tab-pane fade position-relative border-radius-lg active show" id="spesifikasi_pengajaran" role="tabpanel" aria-labelledby="spesifikasi_pengajaran">

              <div class="row">
                <div class="col-md-4">
                  <div class="card mt-4" style="min-height:360px;" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">REKA BENTUK INTRUKSI</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Active Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault11">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Collaborative Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Constructive Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Authentic Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Goal-Directed Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mt-4" style="min-height:360px;" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">INTEGRASI TEKNOLOGI</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Entry Level</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault11">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Adaptation Level</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Infussion Level</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Transformation Level</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Goal-Directed Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mt-4" style="min-height:360px;" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">PENDEKATAN</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Inkuiri</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault11">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Berasaskan Masalah</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Berasaskan Projek</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Pembelajaran Masteri</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Kontekstual</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Berasaskan Pengalaman</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>