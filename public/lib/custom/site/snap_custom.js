$(document).ready(function()
{
	integrateSnapJSToBootstrap();

	var snapper = new Snap({
		element: $('.snap-container')[0],
		dragger: null,
		disable: 'right',
		addBodyClasses: true,
		hyperextensible: true,
		resistance: 0.5,
		flickThreshold: 50,
		transitionSpeed: 0.3,
		easing: 'ease',
		maxPosition: 266,
		minPosition: -266,
		tapToClose: true,
		touchToDrag: false,
		slideIntent: 40,
		minDragDistance: 5
	});
	
	var snapClose = false;

	$('.navbar-header .navbar-toggle').on('click', function()
	{
		if(snapper.state().state=="left")
		{
			snapper.close();
		}
		else
		{
			snapper.open('left');
		}
	});
	
	snapper.on('close', function()
	{
		$('body').append('<div class="snap-noclick"></div>');
		snapClose = true;
	});

	snapper.on('open', function()
	{
		$('body').append('<div class="snap-noclick"></div>');
		snapClose=false;
	});

	$(document).on('snapperClose', function()
	{
		snapper.close();
	});
	
	snapper.on('animated', function()
	{
		$('.snap-noclick').remove();
		if(snapClose==true)
		{
			$(document).trigger('snapperCloseAnimated');
		}
	});
	
	$(window).resize(function()
	{
		if ($(this).width() > 768 )
		{
			if(snapper.state().state=="left" )
			{
				$(".snapjs-left").removeClass('snapjs-left');
				$(".snap-container").css("transform","").css("-webkit-transform","").css("-ms-transform","");;
				$(".snap-container").css('overflow','auto');
			}
		}
	});
	
});

function integrateSnapJSToBootstrap(snapper)
{
	$('body > *').not('.modal').wrapAll('<div class="snap-container"><div class="snap-content"></div></div>');
	
	var classNavBar = $('.navbar').attr("class");
	
	var menu = '<ul>';
	
	$( ".navbar .container .navbar-collapse ul.navbar-nav > li > a" ).each(function()
	{
		if($(this).hasClass('dropdown-toggle'))
		{
			if($(this).next().is('ul'))
			{
				var a = $(this).clone();
				if($(this).parent().hasClass('active'))
				{
					a.attr('class','');
					a.addClass('active');
				}
				else
				{
					a.attr('class','');
				}
				a.addClass('snap-toggle')
				a.attr('id','');
				if(a.attr('data-toggle') == 'dropdown')
				{
					a.removeAttr('data-toggle');
				}
				a.removeAttr('aria-haspopup');
				a.removeAttr('aria-expanded');
				var aHtml = a.wrap("<div />").parent().html();
				menu = menu+'<li>'+aHtml;
				menu = menu+'<ul>';
				$(this).next().children('li').find('a').each(function ()
				{
					var a = $(this).clone();
					if($(this).parent().hasClass('active'))
					{
						a.attr('class','');
						a.addClass('active');
					}
					else
					{
						a.attr('class','');
					}
					a.attr('id','');
					if(a.attr('data-toggle') == 'dropdown')
					{
						a.removeAttr('data-toggle');
					}
					a.removeAttr('aria-haspopup');
					a.removeAttr('aria-expanded');
					var aHtml = a.wrap("<div />").parent().html();
					menu = menu+'<li>'+aHtml+'</li>';
				});
				menu = menu+'</ul></li>';
			}
		}
		else
		{
			var a = $(this).clone();
			if($(this).parent().hasClass('active'))
			{
				a.attr('class','');
				a.addClass('active');
			}
			else
			{
				a.attr('class','');
			}
			a.attr('id','');
			if(a.attr('data-toggle') == 'dropdown')
			{
				a.removeAttr('data-toggle');
			}
			a.removeAttr('aria-haspopup');
			a.removeAttr('aria-expanded');
			var aHtml = a.wrap("<div />").parent().html();
			menu = menu+'<li>'+aHtml+'</li>';
		}
	});
	
	menu = menu+'</ul>';
	
	$('body').append('<div class="snap-drawers"><div class="snap-drawer snap-drawer-left"><div class="'+classNavBar+'"><div class="navbar-header"><div class="navbar-brand">Menu</div></div></div>'+menu+'</div></div>');

	$( ".snap-toggle").next().hide();
	
	$( ".snap-toggle" ).click(function() {
		$(this).next().toggle();
	});

	$('.navbar-header .navbar-toggle').removeAttr('data-toggle');
	$('.navbar-header .navbar-toggle').removeAttr('data-target');

	$( ".snap-drawer ul li a" ).on('click' ,snapModalShow);

}

function snapModalShow()
{
	if($(this).hasClass('snap-toggle') == false && $(this).attr('href').charAt(0) == '#')
	{
		var $btn = $(this);
		$(document).trigger('snapperClose');
		$(document).one('snapperCloseAnimated',function()
		{
			$btn.off('click');
			$btn.click();
			$btn.on('click',snapModalShow);
		});
		return false;
	}
}