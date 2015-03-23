var lfgmsoftwares = lfgmsoftwares || {};   

lfgmsoftwares.farmacias = new (function($){
  var _instance = this;
  this.map;
  this.geocoder;
  this.marker;
  this.listaFarmacias = [];
  
  this.zoom = function(id){
    _instance.map.setZoom(20);
    
    _instance.map.setCenter(_instance.listaFarmacias[id].position); 
       
  }
  
  this.infoWindow = function(element,markerInfo){
    function __serviceInfoWindow(event) {
                    
        var contentTemp = "<div id='content'>" +
        "<b>Raz&atilde;o Social</b>:" + markerInfo.razaoSocial + "<br>" +
        "<b>CNPJ</b>:" + markerInfo.cnpj + "<br>" +
        "<b>Unidade</b>:" + markerInfo.unidade + "<br>" +
        "<b>Endere&ccedil;o</b>:" + markerInfo.endereco + "<br>" +
        "<b>N&uacute;mero</b>:" + markerInfo.numero + "<br>" +
        "<b>Bairro</b>:" + markerInfo.bairro + "<br>" +
        "<b>Cidade</b>:" + markerInfo.cidade + "<br>" +
        "<b>UF</b>:" + markerInfo.uf + "<br>" +
        "<b>CEP</b>:" + markerInfo.cep + "<br>" +
        "<b>DDD</b>:" + markerInfo.ddd + "<br>" +
        "<b>Telefone</b>:" + markerInfo.telefone + "<br>" +
        "<b>Contato</b>:" + markerInfo.contato + "<br>" +
        "<b>Email</b>:" + markerInfo.email + "<br>" +
        "<b>IE</b>:" + markerInfo.ie + "<br>" +
        "<b>Dist&acirc;ncia em KM</b>:" + markerInfo.distancia +
        "</div>";
        
        var iwTemp = new google.maps.InfoWindow();
        iwTemp.setContent(contentTemp);
        iwTemp.setPosition(event.latLng);
        iwTemp.open(_instance.map);

    }
    
    google.maps.event.addListener(element, 'click', function (event) {
      __serviceInfoWindow(event);
    });
  }
  
  this.pesquisaGeocode = function(endereco){
    if (!_instance.geocoder) {
        _instance.geocoder = new google.maps.Geocoder();
    };
    
    if(!_instance.listaFarmacias){
      _instance.listaFarmacias = [];
    }
    
    _instance.geocoder.geocode({'address': endereco}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        
        _instance.map.setCenter(results[0].geometry.location);
        _instance.map.setZoom(14);
        
        _instance.limparMapa();
        
        if(_instance.marker){
          _instance.marker.setMap(null);
        }
  
        _instance.marker = new google.maps.Marker({
            map: _instance.map,
            icon: "Content/Images/home.png",  
            position: results[0].geometry.location
        });
        
        var latLng = new Object();
        latLng.latitude = lfgmsoftwares.farmacias.marker.position.lat();
        latLng.longitude = lfgmsoftwares.farmacias.marker.position.lng();
        
        $.post("Controller/FarmaciasController.php",
         {parametros: JSON.stringify(latLng)},
          function(data){
            
            var listaTmp = JSON.parse(data);
            
             $("#resultados").empty();
            
            for(var i=0;i<listaTmp.length;i++){
              var latLgn = new google.maps.LatLng(listaTmp[i].latitude,listaTmp[i].longitude);

              var markerTemp = new google.maps.Marker({
                map: _instance.map,
                icon: "Content/Images/pointer.png",  
                position: latLgn
              });
              
              var liTemp = "<li>" +
                              "<div class='branch-list-header'>" +
                              "<a class='jsp_loc_branchdetails' href='javascript:lfgmsoftwares.farmacias.zoom("+ i  + ");' title='Clique para Localizar no mapa'>" +
                              "<div class='jsp_loc_list_image'>" +
                              " <img src='Content/Images/pointer.png' title='"+listaTmp[i].razaoSocial+ "'>" +
                              "</div>" +
                              "<address>" + 
                              " <span class='jsp_loc_list_branch_name'>"+listaTmp[i].razaoSocial+"</span>" + 
                              "Endere&ccedil;o:" +listaTmp[i].endereco + "," + listaTmp[i].numero +
                              "<br>Bairro: "+listaTmp[i].bairro+"<br>Cidade: " +listaTmp[i].cidade+ " - CEP: "+listaTmp[i].cep+"<br>Estado:" + listaTmp[i].uf +
                              "<span class='jsp_loc_list_branch_contact'>Telefone: (" + listaTmp[i].ddd +")" + listaTmp[i].telefone + "<br>" + 
                              "</span>" +
                              "</address>" +
                              "</a>" +
                              "</div>" +
                              "<div class='branch-list-footer'>" +
                              "      <ul class='unstyled list-1'></ul>" +
                              "    </div>" +
                              "<div style='clear:both;'>" +
                              "</div>" +
                              "</li>";           
              
              $("#resultados").append(liTemp);
              
              _instance.infoWindow(markerTemp,listaTmp[i]);
              _instance.listaFarmacias.push(markerTemp);
            }
          }
        )
        
        var iw = new google.maps.InfoWindow({
          content: results[0].formatted_address
        });
        
        google.maps.event.addListener(_instance.marker, 'click', function(){
          iw.open(_instance.map, _instance.marker);
        });
      } else {
        alert('N\u00e3o encontrado');
      }    
    });
  }
  
  this.limparMapa = function(){
    for(var i=0; i<_instance.listaFarmacias.length;i++){
      _instance.listaFarmacias[i].setMap(null);
    }
    _instance.listaFarmacias = [];
  }
  
  this.inicializarMapa = function(){
    var mapOptions = { 
        //Zoom do Mapa
        zoom: 4,
        //Centro do Mapa    
        center: new google.maps.LatLng(-14.2400732, -53.1805018),
        mapTypeId: 'roadmap'
    };
   
    _instance.map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    lfgmsoftwares.farmacias.setPosition();
    $(window).resize(function () {
        lfgmsoftwares.farmacias.setPosition();
    });
  }

  this.setPosition = function(){
      var y = $(window).height();
      $("#map-canvas").css({ 'height': (y - 57) });
  }
})(jQuery);
    
$(document).ready(function() {
  $("#btnPesquisaGeocode").on('click',function(){
    lfgmsoftwares.farmacias.pesquisaGeocode($("#txtEnderecoGeocode").val());  
  })
});