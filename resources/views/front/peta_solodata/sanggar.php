<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informasi Tata Ruang Infrastruktur dan Perencanaan Kota Surakarta | Sistem Informasi PU Terpadu</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>favicon.png" type="image/x-icon" />


    <!-- CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets_front/css/leaflet.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" id="css-main" href="<?= base_url()?>assets/css/codebase.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets_front/css/custom.css">
    <style>
        #myfooter{
            position: fixed;
            width: 100%;
            bottom: 0px;
            z-index: 2000;
            padding: 10px;
            /* background: #ffffff; */
        }

        .feature_name:hover{
            font-weight: bold;
            color: #ff0000;
            cursor: pointer;
        }

    </style>

</head>
<body>
    <div id="page-container" class="page-header-fixed page-header-glass">

    <div id="page-header">
        <div class="content-header">
            <div id="logo" class="content-header-section">
                <div class="row">
                    <div class="col-1"><img src="<?=base_url()?>assets/solo.png" alt=""></div>
                    <div class="col-11" style="padding-left: 30px;padding-top: 7px">
                        <h2 style="color: #ffffff">Sistem Informasi PU Terpadu</h2>
                        <div style="color: #ffffff; font-size: larger; margin-top: -20px">
                            Informasi Tata Ruang Infrastruktur dan Perencanaan Kota Surakarta
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-section">
                <!-- <button id="btn_map_home" type="button" class="btn btn-lg btn-circle btn_map mr-10" title="Kembali ke beranda">
                    <i class="si si-home"></i>
                </button> -->
                <button id="btn_map_zoom_in" type="button" class="btn btn-lg btn-circle btn_map mr-10" title="Perbesar peta">
                    <i class="si si-magnifier-add"></i>
                </button>
                <button id="btn_map_zoom_out" type="button" class="btn btn-lg btn-circle btn_map mr-10" title="Perkecil peta">
                    <i class="si si-magnifier-remove"></i>
                </button>
                <button id="btn_map_search" type="button" class="btn btn-lg btn-circle btn_map mr-10" title="Pencarian">
                    <i class="si si-magnifier"></i>
                </button>
                <button id="btn_map_info" type="button" class="btn btn-lg btn-circle btn_map mr-10" title="Tampilkan Informasi Layer">
                    <i class="si si-info"></i>
                </button>
                <button id="btn_map_layers" type="button" class="btn btn-lg btn-circle btn_map mr-10" title="Tampilkan layer peta">
                    <i class="si si-layers"></i>
                </button>
                <button id="btn_map_base" type="button" class="btn btn-lg btn-circle btn_map mr-10" title="Pilih peta dasar">
                    <i class="si si-globe"></i>
                </button>
                <button id="btn_map_menu" type="button" class="btn btn-lg btn-circle mr-10 ml-30" title="Tampil atau sembunyikan menu">
                    <i class="fa fa-tasks"></i>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile_header" style="display:none;">
        <div class="row" style="margin-right:0px">
            <div class="col-2" style="padding-top: 10px; padding-left: 30px;"><img src="<?=base_url()?>assets/solo.png" alt=""></div>
            <div class="col-10" style="padding-left: 30px;padding-top: 7px">
                <h2 style="color: #ffffff">Sistem Informasi PU Terpadu</h2>
                <div style="color: #ffffff; font-size: larger; margin-top: -20px">
                    Informasi Tata Ruang Infrastruktur dan Perencanaan Kota Surakarta
                </div>
            </div>
        </div>
    </div>
    
    <div id="map"></div>
    <div id="side_layers" class="side_option large_screen">
        <div class="side_option_title">Layer</div>
        <div class="side_option_content">
            <div class="layer_group">
                <!-- <div class="layer_group_title">Layer Group</div> -->
                <div class="layer_group_title"></div>
                <div class="layer_group_content pl-10">

                    <?php foreach($list_layer as $jpk => $jpv):?>
                        <div style="font-size: large"><b><?=$jpv['src']['nama_jenis_peta']?></b></div>
                        <?php foreach($jpv['data'] as $glk => $glv):?>
                            <div style="font-size: normal; margin-left:10px"><i class="si si-pointer"></i> <?=$glv['src']['nama_grup_layer']?></div>
                            <?php foreach($glv['data'] as $lk => $lv):?>
                                <div style="margin-left:30px">
                                    <label class="css-control css-control-danger css-checkbox">
                                        <input type="checkbox" class="css-control-input dynamic_layers" name="<?=$lv['slug']?>" id_layer="<?=$lv['id']?>" data-name="<?=$lv['name']?>">
                                        <span class="css-control-indicator"></span> <?=$lv['name']?>
                                    </label>
                                    <span class="bar_loader" data-name="<?=$lv['slug']?>">
                                        <svg style="" width="25px" height="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 -25 100 100" preserveAspectRatio="xMidYMid" class="lds-facebook"><rect ng-attr-x="{{config.x1}}" ng-attr-y="{{config.y}}" ng-attr-width="{{config.width}}" ng-attr-height="{{config.height}}" ng-attr-fill="{{config.c1}}" x="17.5" y="30" width="15" height="40" fill="#ff0000"><animate attributeName="y" calcMode="spline" values="18;30;30" keyTimes="0;0.5;1" dur="1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s" repeatCount="indefinite"></animate><animate attributeName="height" calcMode="spline" values="64;40;40" keyTimes="0;0.5;1" dur="1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s" repeatCount="indefinite"></animate></rect><rect ng-attr-x="{{config.x2}}" ng-attr-y="{{config.y}}" ng-attr-width="{{config.width}}" ng-attr-height="{{config.height}}" ng-attr-fill="{{config.c2}}" x="42.5" y="30" width="15" height="40" fill="#ff6f6f"><animate attributeName="y" calcMode="spline" values="20.999999999999996;30;30" keyTimes="0;0.5;1" dur="1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s" repeatCount="indefinite"></animate><animate attributeName="height" calcMode="spline" values="58.00000000000001;40;40" keyTimes="0;0.5;1" dur="1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s" repeatCount="indefinite"></animate></rect><rect ng-attr-x="{{config.x3}}" ng-attr-y="{{config.y}}" ng-attr-width="{{config.width}}" ng-attr-height="{{config.height}}" ng-attr-fill="{{config.c3}}" x="67.5" y="30" width="15" height="40" fill="#ffd8d8"><animate attributeName="y" calcMode="spline" values="24;30;30" keyTimes="0;0.5;1" dur="1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="0s" repeatCount="indefinite"></animate><animate attributeName="height" calcMode="spline" values="52;40;40" keyTimes="0;0.5;1" dur="1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="0s" repeatCount="indefinite"></animate></rect></svg>
                                    </span>
                                </div>
                            <?php endforeach;?>
                            
                        <?php endforeach;?>
                        
                    <?php endforeach;?>
                </div>
            </div>

        </div>
    </div>
    <div id="side_info" class="side_option">
        <div class="side_option_title">Info Layer</div>
        <div id="info_content" style="padding: 20px;" class="side_option_content"></div>
    </div>
    <div id="side_base" class="side_option">
        <div class="side_option_title">Base Map</div>
        <div class="side_option_content">
            <div>
                <!-- OSM -->
                <label class="css-control css-control-danger css-radio">
                    <input type="radio" class="css-control-input" name="base_map" value="osm" checked>
                    <span class="css-control-indicator"></span> Open Street Map
                </label>
            </div>
            <div>
                <!-- GOOGLE ROADMAP -->
                <label class="css-control css-control-danger css-radio">
                    <input type="radio" class="css-control-input" name="base_map" value="google_roadmap">
                    <span class="css-control-indicator"></span> Google Roadmap
                </label>
            </div>
            <div>
                <!-- GOOGLE SATELLITE -->
                <label class="css-control css-control-danger css-radio">
                    <input type="radio" class="css-control-input" name="base_map" value="google_satellite">
                    <span class="css-control-indicator"></span> Google Satellite
                </label>
            </div>
            <div>
                <!-- GOOGLE HYBRID -->
                <label class="css-control css-control-danger css-radio">
                    <input type="radio" class="css-control-input" name="base_map" value="google_hybrid">
                    <span class="css-control-indicator"></span> Google Hybrid
                </label>
            </div>
            <div>
                <!-- GOOGLE TERRAIN -->
                <label class="css-control css-control-danger css-radio">
                    <input type="radio" class="css-control-input" name="base_map" value="google_terrain">
                    <span class="css-control-indicator"></span> Google Terrain
                </label>
            </div>
            <div>
                <!-- ESRI WORLD IMAGERY -->
                <label class="css-control css-control-danger css-radio">
                    <input type="radio" class="css-control-input" name="base_map" value="esri_world_imagery">
                    <span class="css-control-indicator"></span> ESRI World Imagery
                </label>
            </div>
            <div>
                <!-- ESRI WORLD STREET MAP -->
                <label class="css-control css-control-danger css-radio">
                    <input type="radio" class="css-control-input" name="base_map" value="esri_world_street_map">
                    <span class="css-control-indicator"></span> ESRI World Street Map
                </label>
            </div>
            <div>
                <!-- ESRI WORLD TOPO MAP-->
                <label class="css-control css-control-danger css-radio">
                    <input type="radio" class="css-control-input" name="base_map" value="esri_world_topo_map">
                    <span class="css-control-indicator"></span> ESRI World Topo Map
                </label>
            </div>
            <div>
                <!-- Citra Satelit -->
                <label class="css-control css-control-danger css-radio">
                    <input type="radio" class="css-control-input" name="base_map" value="citra_satelit">
                    <span class="css-control-indicator"></span> Citra Satelit
                </label>
            </div>
            <div>
                <!-- Rupa Bumi Indonesia -->
                <label class="css-control css-control-danger css-radio">
                    <input type="radio" class="css-control-input" name="base_map" value="peta_rbi">
                    <span class="css-control-indicator"></span> Peta Rupa Bumi Indonesia
                </label>
            </div>
            <div>
                <!-- Rupa Bumi Indonesia Open Source -->
                <label class="css-control css-control-danger css-radio">
                    <input type="radio" class="css-control-input" name="base_map" value="peta_rbi_opensource">
                    <span class="css-control-indicator"></span> Peta Rupa Bumi Indonesia Open Source
                </label>
            </div>
        </div>
    </div>

    <div id="side_search" class="side_option">
        <div class="side_option_title">Pencarian Data Layer</div>
        <div class="side_option_content">
            <div>
                <select name="layer_search" id="layer_search" style="width:100%"></select>
            </div>
            <div class="mt-10">
                <input id="feature_search" type="text" class="form-control">
            </div>
            <div id="feature_name" class="mt-20"></div>
        </div>
    </div>

    <!-- mobile tabs -->
    <!-- Block Tabs Animated Fade -->
    <div id="mobile_tabs" class="block" style="display:none">
        <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>" onclick="location.replace('<?=base_url()?>')"><i class="si si-home"></i> Home</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link active" href="#mobile_base_map"><i class="si si-globe"></i> Peta Dasar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#mobile_layers"><i class="si si-layers"></i> Layer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#mobile_info"><i class="si si-info"></i> Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#mobile_search"><i class="si si-magnifier"></i> Cari</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#mobile_latlng"><i class="si si-pointer"></i> LatLng</a>
            </li>
        </ul>
        <div class="block-content tab-content overflow-hidden">
            <div class="tab-pane fade show active" id="mobile_base_map" role="tabpanel">
                <div id="side_base">
                    <div>
                        <!-- OSM -->
                        <label class="css-control css-control-danger css-radio">
                            <input type="radio" class="css-control-input" name="base_map" value="osm" checked>
                            <span class="css-control-indicator"></span> Open Street Map
                        </label>
                    </div>
                    <div>
                        <!-- GOOGLE ROADMAP -->
                        <label class="css-control css-control-danger css-radio">
                            <input type="radio" class="css-control-input" name="base_map" value="google_roadmap">
                            <span class="css-control-indicator"></span> Google Roadmap
                        </label>
                    </div>
                    <div>
                        <!-- GOOGLE SATELLITE -->
                        <label class="css-control css-control-danger css-radio">
                            <input type="radio" class="css-control-input" name="base_map" value="google_satellite">
                            <span class="css-control-indicator"></span> Google Satellite
                        </label>
                    </div>
                    <div>
                        <!-- GOOGLE HYBRID -->
                        <label class="css-control css-control-danger css-radio">
                            <input type="radio" class="css-control-input" name="base_map" value="google_hybrid">
                            <span class="css-control-indicator"></span> Google Hybrid
                        </label>
                    </div>
                    <div>
                        <!-- GOOGLE TERRAIN -->
                        <label class="css-control css-control-danger css-radio">
                            <input type="radio" class="css-control-input" name="base_map" value="google_terrain">
                            <span class="css-control-indicator"></span> Google Terrain
                        </label>
                    </div>
                    <div>
                        <!-- ESRI WORLD IMAGERY -->
                        <label class="css-control css-control-danger css-radio">
                            <input type="radio" class="css-control-input" name="base_map" value="esri_world_imagery">
                            <span class="css-control-indicator"></span> ESRI World Imagery
                        </label>
                    </div>
                    <div>
                        <!-- ESRI WORLD STREET MAP -->
                        <label class="css-control css-control-danger css-radio">
                            <input type="radio" class="css-control-input" name="base_map" value="esri_world_street_map">
                            <span class="css-control-indicator"></span> ESRI World Street Map
                        </label>
                    </div>
                    <div>
                        <!-- ESRI WORLD TOPO MAP-->
                        <label class="css-control css-control-danger css-radio">
                            <input type="radio" class="css-control-input" name="base_map" value="esri_world_topo_map">
                            <span class="css-control-indicator"></span> ESRI World Topo Map
                        </label>
                    </div>
                    <div>
                        <!-- Citra Satelit -->
                        <label class="css-control css-control-danger css-radio">
                            <input type="radio" class="css-control-input" name="base_map" value="citra_satelit">
                            <span class="css-control-indicator"></span> Citra Satelit
                        </label>
                    </div>
                    <div>
                        <!-- Rupa Bumi Indonesia -->
                        <label class="css-control css-control-danger css-radio">
                            <input type="radio" class="css-control-input" name="base_map" value="peta_rbi">
                            <span class="css-control-indicator"></span> Peta Rupa Bumi Indonesia
                        </label>
                    </div>
                    <div>
                        <!-- Rupa Bumi Indonesia Open Source -->
                        <label class="css-control css-control-danger css-radio">
                            <input type="radio" class="css-control-input" name="base_map" value="peta_rbi_opensource">
                            <span class="css-control-indicator"></span> Peta Rupa Bumi Indonesia Open Source
                        </label>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="mobile_layers" role="tabpanel">
                <div id="side_layers">
                    <div class="layer_group">
                        <div class="layer_group_title"></div>
                        <div class="layer_group_content pl-10">
                            <?php foreach($list_layer as $jpk => $jpv):?>
                                <div style="font-size: large"><b><?=$jpv['src']['nama_jenis_peta']?></b></div>
                                <?php foreach($jpv['data'] as $glk => $glv):?>
                                    <div style="font-size: normal; margin-left:10px"><i class="si si-pointer"></i> <?=$glv['src']['nama_grup_layer']?></div>
                                    <?php foreach($glv['data'] as $lk => $lv):?>
                                        <div style="margin-left:30px">
                                            <label class="css-control css-control-danger css-checkbox">
                                                <input type="checkbox" class="css-control-input dynamic_layers" name="<?=$lv['slug']?>" id_layer="<?=$lv['id']?>" data-name="<?=$lv['name']?>">
                                                <span class="css-control-indicator"></span> <?=$lv['name']?>
                                            </label>
                                            <span class="bar_loader" data-name="<?=$lv['slug']?>">
                                                <svg style="" width="25px" height="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 -25 100 100" preserveAspectRatio="xMidYMid" class="lds-facebook"><rect ng-attr-x="{{config.x1}}" ng-attr-y="{{config.y}}" ng-attr-width="{{config.width}}" ng-attr-height="{{config.height}}" ng-attr-fill="{{config.c1}}" x="17.5" y="30" width="15" height="40" fill="#ff0000"><animate attributeName="y" calcMode="spline" values="18;30;30" keyTimes="0;0.5;1" dur="1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s" repeatCount="indefinite"></animate><animate attributeName="height" calcMode="spline" values="64;40;40" keyTimes="0;0.5;1" dur="1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s" repeatCount="indefinite"></animate></rect><rect ng-attr-x="{{config.x2}}" ng-attr-y="{{config.y}}" ng-attr-width="{{config.width}}" ng-attr-height="{{config.height}}" ng-attr-fill="{{config.c2}}" x="42.5" y="30" width="15" height="40" fill="#ff6f6f"><animate attributeName="y" calcMode="spline" values="20.999999999999996;30;30" keyTimes="0;0.5;1" dur="1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s" repeatCount="indefinite"></animate><animate attributeName="height" calcMode="spline" values="58.00000000000001;40;40" keyTimes="0;0.5;1" dur="1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s" repeatCount="indefinite"></animate></rect><rect ng-attr-x="{{config.x3}}" ng-attr-y="{{config.y}}" ng-attr-width="{{config.width}}" ng-attr-height="{{config.height}}" ng-attr-fill="{{config.c3}}" x="67.5" y="30" width="15" height="40" fill="#ffd8d8"><animate attributeName="y" calcMode="spline" values="24;30;30" keyTimes="0;0.5;1" dur="1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="0s" repeatCount="indefinite"></animate><animate attributeName="height" calcMode="spline" values="52;40;40" keyTimes="0;0.5;1" dur="1" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="0s" repeatCount="indefinite"></animate></rect></svg>
                                            </span>
                                        </div>
                                    <?php endforeach;?>
                                    
                                <?php endforeach;?>
                                
                            <?php endforeach;?>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="tab-pane fade" id="mobile_info" role="tabpanel">
                <div id="info_content"></div>
            </div>
            <div class="tab-pane fade" id="mobile_latlng" role="tabpanel">
                <div>
                    <label for="m_cari_lat">Latitude</label>
                    <input class="form-control" type="number" name="m_cari_lat">
                </div>
                <div>
                    <label for="m_cari_lng">Longitude</label>
                    <input class="form-control" type="number" name="m_cari_lng"> 
                </div>
                        
                <div class="mt-20 mb-20">
                    <button id="m_cari_latlng" class="btn btn-map col-12" style="background:#ff0000;color:#ffffff"><i class="si si-magnifier"></i> Cari</button>
                </div>
            </div>
            <div class="tab-pane fade" id="mobile_search" role="tabpanel">
                <div>
                    <select name="m_layer_search" id="m_layer_search" style="width:100%"></select>
                </div>
                <div class="mt-10">
                    <input id="m_feature_search" type="text" class="form-control">
                </div>
                <div id="m_feature_name" class="mt-20"></div>
            </div>
        </div>
    </div>
    <!-- END Block Tabs Animated Fade -->

</div>
<div id="myfooter">
        <div class="row">
            <div class="col-lg-5 col-sm-12">
            </div>
            <div class="col-lg-3 col-sm-12 input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        Latitude: 
                    </div>
                </div>
                <input class="form-control" type="number" name="cari_lat">    
            </div>
            <div class="col-lg-3 col-sm-12 input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        Longitude: 
                    </div>
                </div>
                <input class="form-control" type="number" name="cari_lng">    
            </div>

            <div class="col-lg-1 col-sm-12">
                <button id="cari_latlng" class="btn btn-map" style="background:#ff0000;color:#ffffff"><i class="si si-magnifier"></i> Cari</button>
            </div>
        </div>

</div>

<!-- JS -->
<script src="<?=base_url()?>assets_front/js/leaflet.js"></script>
<!-- <script src="<?=base_url()?>assets_front/js/leaflet-providers.js"></script> -->
<script src="https://unpkg.com/esri-leaflet@2.3.0/dist/esri-leaflet.js"
    integrity="sha512-1tScwpjXwwnm6tTva0l0/ZgM3rYNbdyMj5q6RSQMbNX6EUMhYDE3pMRGZaT41zHEvLoWEK7qFEJmZDOoDMU7/Q=="
    crossorigin=""></script>
<!-- <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5PIDMAb-MrL21uaWwk0xFsRBPjnjixWE"></script> -->
<script src="<?=base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/core/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/js/core/jquery.slimscroll.min.js"></script>
<script src="<?= base_url(); ?>assets/js/core/jquery.scrollLock.min.js"></script>
<script src="<?= base_url(); ?>assets/js/core/jquery.appear.min.js"></script>
<script src="<?= base_url(); ?>assets/js/core/jquery.countTo.min.js"></script>
<script src="<?= base_url(); ?>assets/js/core/js.cookie.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/select2/select2.full.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/select2/i18n/id.js"></script>
<script src="<?= base_url(); ?>assets/js/codebase.js"></script>
<?php include_once('sanggar_js.php')?>
</body>
</html>