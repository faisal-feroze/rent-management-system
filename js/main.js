$( document ).ready(function() {
    console.log( "ready!" );

    $.urlParam = function(name){
    	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    	return results[1] || 0;
    }
    var actSidebar = $.urlParam('act');
    // var tenant = $.urlParam('tenant_board');
    console.log(actSidebar);

    if(actSidebar == 'add_tenant' || actSidebar == 'map_tenant' || actSidebar == 'show_tenant' || actSidebar == 'release_tenant' || actSidebar == 'tenant_detail'){
      $('.tenant_info').addClass("active");
    }

    else if (actSidebar == 'to_be_paid_report') {
      $('.ledger').addClass("active");
      console.log('flag');
    }

    else if (actSidebar == 'flat_detail') {
      $('.add_flat').addClass("active");
      //console.log('flag');
    }

    else{
      $('.'+actSidebar).addClass("active");
    }





    // if(tenant){
    //   console.log(tenant);
    // }







});
