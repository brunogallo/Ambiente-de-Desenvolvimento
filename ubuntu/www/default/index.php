<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <!-- Titulo da Pagina -->
        <title>Geocode</title>
        
        <link rel="stylesheet" type="text/css" href="Content/Plugins/Bootstrap/css/bootstrap-responsive.min.css"/>
        <link rel="stylesheet" type="text/css" href="Content/Plugins/Bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="Content/Styles/base.css"/>
        <link rel="shortcut icon" href="Content/Images/favicon.ico">
        <link rel="icon" type="image/gif" href="Content/Images/animated_favicon1.gif">
  
        <script src='Content/Scripts/Lib/jquery-1.11.0.min.js' type='text/javascript'></script>
        <script src='Content/Scripts/lfgmsoftwares.js' type='text/javascript'></script>
        
         <!-- Referencia da API -->   
        <script src="https://maps.googleapis.com/maps/api/js?v=3.15&sensor=false&libraries=visualization"></script> 
    </head>
    <body>
        <div id="wrapper">
           <div class="page2" stlyle="overflow-y: scroll;!important">
             <div id="lat" class="main-content">
             <div class="jsp_wrap" style="margin-top:10px;height: 600px!important;"  >
              <div class="jsp_wrap_body clearfix" id="jsp_wrap_body">
                <br>
                <div class="branch-panel" style="opacity: 1;display: block;">
                  <h2 class="jsp_title">Lojas</h2>
                  <div class="branch-panel-wrapper custom-scroll mCustomScrollbar _mCS_1" style="height: 90%">
                    <div class="mCustomScrollBox mCS-light" id="mCSB_1" style="position:relative; height:100%; overflow:hidden; max-width:100%;">
                      <div class="mCSB_container" style="position: relative; height: 540px!important; top: 0px;overflow-y: scroll;">
    
                          <ul class="side_bar unstyled branch-list" id="resultados">

                          </ul> 
                        <div id="directions" style="display:none;"></div>
                        <div class="back-to-result"><a id="backToResult" style="display:none;" href="/index.php/lojas#" onclick="showElement('side_bar');hideElement('directions');hideElement('backToResult');" title="Click here to hide Direction List and Show Locations List">Back to results</a></div>
                      </div>
                      <div class="mCSB_scrollTools" style="position: absolute; display: block; opacity: 0;">
                        <div class="mCSB_draggerContainer">
                          <div class="mCSB_dragger" style="position: absolute; top: 0px; height: 30px;" oncontextmenu="return false;">
                            <div class="mCSB_dragger_bar" style="position: relative; line-height: 30px;">
                            </div>
                          </div>
                          <div class="mCSB_draggerRail"></div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              </div>
              </div>  
             </div>
           </div>
           <div class="page">
             <div id="map-canvas">
             </div>
           </div> 
        </div>
        <!-- Definicao de Cor da Barra -->                        
        <div id="topo" style="background: #263F8D; !important">
            <div id="container">
                <span id="logo">
                    <!-- Logo -->
                    <img alt="Logo" src="Content/Images/logo.png" />
                </span>
                <div class="menu">
                    <ul>
                    </ul>
                </div>
                <div class="geocode-plugin omnibox-frame">
                  <div class="searchbox searchbox-shadow " tabindex="-1">
                      <div class="searchboxinput gsib_a">
                          <input class="tactile-searchbox-input" aria-label="Pesquisar" id="txtEnderecoGeocode"
                              name="q" tabindex="1" autocomplete="off" spellcheck="false" style="border: none; width: 100%; outline: none;" />
                      </div>
                      <button id="btnPesquisaGeocode" class="searchbutton" aria-label="Pesquisar" tabindex="3">
                      </button>
                  </div>
                </div>
            </div>
        </div>
        <div title="Clique para saber mais sobre a LFGM Softwares" onclick="window.open('http://www.lfgmsoftwares.com.br', '_blank')" class="logo-marcadagua">
        </div>

        <!--Loading-->
        <div id="notify-widget-pane">
            <div class="oe">
                <div class="loadingBox">
                    <div class="ls">
                    </div>
                    <div class="gd">
                        Carregando...</div>
                    <div class="ks">
                    </div>
                </div>
            </div>
        </div>
        <script>
            google.maps.event.addDomListener(window, 'load', lfgmsoftwares.farmacias.inicializarMapa());
        </script>
    </body>
</html>