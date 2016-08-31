
	function do_search(nodeId) {
		url="submit__search__run__"+nodeId+"__window=1&search_string="+encodeURI(document.search.search_string.value);
		search_window=open(url,"search","toolbar=no,status=no,height=350,resizable=yes,menubar=no,scrollbars=yes,width=300");
		return false;
	}

	function submit_updater(dom_id, controller, contr_function, args) {

		new Ajax.Updater(dom_id, 'view_ax.php?submit__'+controller+'__'+contr_function+'__'+args,
        {
          method      : 'post',
          postBody    : 'mimeType=text/html',
          onFailure   : function(resp) {
                           alert('Fehler: ' + resp.responseText);
                        },
          onException : function(resp, exception) {
                           alert('Ausnahme ' + exception);
                        }
        });
	}

	function submit_request(controller, contr_function, args) {

		new Ajax.Request('view_ax.php?submit__'+controller+'__'+contr_function+'__'+args,
        {
          method      : 'post',
          postBody    : 'mimeType=text/html',
          onFailure   : function(resp) {
                           alert('Fehler: ' + resp.responseText);
                        },
          onException : function(resp, exception) {
                           alert('Ausnahme ' + exception);
                        }
        });
	}

	// Gleiche Funtion wie "submit_updater" diese existiert aber auch im admin_red und kann daher auch
	// in der Textobject-Vorschau genutzt werden
	function submit_client_updater(dom_id, controller, contr_function, args) {

		new Ajax.Updater(dom_id, 'view_ax.php?submit__'+controller+'__'+contr_function+'__'+args,
        {
          method      : 'post',
          postBody    : 'mimeType=text/html',
          onFailure   : function(resp) {
                           alert('Fehler: ' + resp.responseText);
                        },
          onException : function(resp, exception) {
                           alert('Ausnahme ' + exception);
                        }
        });
	}
	
	document.observe('dom:loaded', function() {
		$$('li.pixi').invoke('observe','mouseover', function(){ overEffect(this) });
		$$('li.pixi').invoke('observe','mouseout', function(){ outEffect(this) });
		$$('li.pixi_first').invoke('observe','mouseover', function(){ overEffectFirst(this) });
		$$('li.pixi_first').invoke('observe','mouseout', function(){ outEffectFirst(this) });
		$$('li.pixi_last').invoke('observe','mouseover', function(){ overEffectLast(this) });
		$$('li.pixi_last').invoke('observe','mouseout', function(){ outEffectLast(this) });
	});
	
	function overEffect(element) {
		
		anker=element.down();
		
		if (element.identify() != 'selected_l1') {
			
			element.setStyle({
				backgroundPosition: '100% -50px'
			});
			
			anker.setStyle({
				backgroundPosition: '0% -50px'
			});
		}
		
	}
	
	function outEffect(element) {
		
		if (element.identify() != 'selected_l1') {
		
			anker=element.down();
			
			element.setStyle({
				backgroundPosition: 'right top'
			});
			
			anker.setStyle({
				backgroundPosition: 'left top'
			});
		}
		
	}
	
	function overEffectFirst(element) {
		
		if (element.identify() != 'selected_l1') {
			
			anker=element.down();
				
			element.setStyle({
				backgroundPosition: '100% -200px'
			});
			
			anker.setStyle({
				backgroundPosition: '0% -200px'
			});
		}
		
	}
	
	function overEffectLast(element) {
		
		if (element.identify() != 'selected_l1') {
			
			anker=element.down();
				
			element.setStyle({
				backgroundPosition: '100% -350px'
			});
			
			anker.setStyle({
				backgroundPosition: '0% -350px'
			});
		}
		
	}
	
	function outEffectFirst(element) {
		
		if (element.identify() != 'selected_l1') {
		
			anker=element.down();
			
			element.setStyle({
				backgroundPosition: 'right top'
			});
			
			anker.setStyle({
				backgroundPosition: '0% -150px'
			});
		}
		
	}
	
	function outEffectLast(element) {
		
		if (element.identify() != 'selected_l1') {
		
			anker=element.down();
			
			element.setStyle({
				backgroundPosition: '100% -300px'
			});
			
			anker.setStyle({
				backgroundPosition: 'left top'
			});
		}
		
	}
	
	/*  faq */
	document.observe('dom:loaded', function() {
		$$('a.faq-question').invoke('observe','click', function(){ toggleFAQ(this) });
	});
	
	function toggleFAQ(element) {
		answer=element.up().next();
		answer.toggle();
	}
	
	/* CalenderMonthSmallView */

	document.observe('click',function(event, element) {
		if(element=event.findElement('.cal-month-small-navi')) {
			calMonthSmallNavi(element);
		}
		
	});

	function calMonthSmallNavi(element) {
		param=element.readAttribute('rel');
		element.writeAttribute('href', 'javascript:void(0)');
		submit_client_updater('calendar_small', 'calendar', 'show_small', param);
		event.stop();
	}
