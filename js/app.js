$(function(){

	$("#city").autocomplete({
			source: function( request, response ) {
				$.ajax({
					url: "http://ws.geonames.org/searchJSON",
					dataType: "jsonp",
					data: {
						featureClass: "P",
						style: "full",
						maxRows: 12,
						name_startsWith: request.term
					},
					success: function( data ) {
						response( $.map( data.geonames, function( item ) {
							return {
								label: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
								value: item.name,
								lat: item.lat,
								lng: item.lng
							}
						}));
					}
				});
			},
			minLength: 2,
			select: function( event, ui ) {
				var selected = (ui.item ?ui.item.label :this.value);				
				var latlng = new google.maps.LatLng(ui.item.lat, ui.item.lng);		                   
		                    map.setCenter(latlng);
				    map.setZoom(13);
			},
			open: function() {
				//$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
			},
			close: function() {
				//$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
			}
		});
})