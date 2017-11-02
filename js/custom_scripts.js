window.onload = function() {
	adjustToolbar();
	if(document.querySelector('.mat-toolbar__row--tab-bar') && document.querySelector('.mdcwp-ribbon__card')) {
		document.querySelector('.mdcwp-ribbon__card').style = "margin-top: -3rem;";
	}
	// Don't show the body unless everything is loaded
	document.body.style = "visibility: visible;";
	document.querySelector('.mdcwp-progressbar').style = "display: none;";
}

function adjustToolbar() {
	if(document.querySelector('.mat-toolbar-adjust')) {
		document.querySelector('.mat-toolbar-adjust').style = "padding-top: " + (parseInt(document.querySelector('.mdc-toolbar').clientHeight) + 24) + "px; padding-right: 16px; padding-left: 16px;";
	}
}
	
if (document.querySelectorAll('.mat-toolbar--open-menu')) {
	var menuEl = document.querySelectorAll('.mdc-simple-menu');
	var toggle = document.querySelectorAll('.mat-toolbar--open-menu');
	for (i=0; i<document.querySelectorAll('.mat-toolbar--open-menu').length; i++) {
		(function (_i) {
			toggle[_i].addEventListener('click', function() {
				new mdc.menu.MDCSimpleMenu(menuEl[_i]).open = !new mdc.menu.MDCSimpleMenu(menuEl[_i]).open;
			});
		}(i));
	}
}

if (document.getElementById("menu-icon")) {
	var MDCTemporaryDrawer = mdc.drawer.MDCTemporaryDrawer;
	var drawer = new MDCTemporaryDrawer(document.querySelector('.mdc-temporary-drawer'));
	document.getElementById("menu-icon").addEventListener('click', function() {
		drawer.open = true;
	});
}

if (document.querySelector('.mat-toolbar--open-search') && document.querySelector('.mat-toolbar--exit-search')) {
	var searchIcon = document.querySelector('.mat-toolbar--open-search');
	document.querySelector('.mat-toolbar--open-search').addEventListener('click', function() {
		document.querySelector('.mat-toolbar--search').style = "visibility: visible; overflow: hidden; --mat-toolbar--search-location: " + (document.body.clientWidth - searchIcon.offsetLeft - 20) + "px;";
		document.querySelector('.mat-toolbar--search-container').style = "animation: mat-toolbar--open-search 0.7s forwards; -webkit-transform: translateZ(0);";
		document.querySelector('.mat-toolbar--search-text').focus();
		if(document.querySelector('.mat-toolbar__row--tab-bar')){
			document.querySelector('.mat-toolbar__row--tab-bar').classList.add('mat-margin-animation');
			if(document.querySelector('.mat-toolbar-adjust')){document.querySelector('.mat-toolbar-adjust').classList.add('mat-margin-animation')};
			setTimeout(function() {
				document.querySelector('.mat-toolbar__row--tab-bar').style.cssText += "display: none";
			}, 300);
		}
	});
	document.querySelector('.mat-toolbar--exit-search').addEventListener('click', function() {
		document.querySelector('.mat-toolbar--search-container').style = "animation: mat-toolbar--close-search 0.5s forwards; -webkit-transform: translateZ(0);";
		setTimeout(function() {document.querySelector('.mat-toolbar--search').style = "visibility: hidden; --mat-toolbar--search-location: " + (document.body.clientWidth - searchIcon.offsetLeft - 20) + "px;";}, 500);
		document.querySelector('.mat-toolbar--search-text').value = '';
		if(document.querySelector('.mat-toolbar__row--tab-bar')){
			document.querySelector('.mat-toolbar__row--tab-bar').style = "display: block;";
			setTimeout(function() {
				document.querySelector('.mat-toolbar__row--tab-bar').classList.remove('mat-margin-animation');
				if(document.querySelector('.mat-toolbar-adjust')){document.querySelector('.mat-toolbar-adjust').classList.remove('mat-margin-animation')};
			}, 100);
		}
	});
}

if(document.querySelector('.clear-search-query')) {
	document.querySelector('.clear-search-query').addEventListener('click', function() {
		document.querySelector('.mat-toolbar--search-text').value = '';
		document.querySelector('.mat-toolbar--search-text').focus();
	});
}
