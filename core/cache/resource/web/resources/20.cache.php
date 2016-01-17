<?php  return array (
  'resourceClass' => 'modDocument',
  'resource' => 
  array (
    'id' => 20,
    'type' => 'document',
    'contentType' => 'text/html',
    'pagetitle' => 'Informatie aanvragen',
    'longtitle' => 'Informatie aanvragen',
    'description' => '',
    'alias' => 'infoaanvragen',
    'link_attributes' => '',
    'published' => 1,
    'pub_date' => 0,
    'unpub_date' => 0,
    'parent' => 6,
    'isfolder' => 0,
    'introtext' => '',
    'content' => '<h1>Informatie aanvragen</h1>
<p>Wilt u graag draagklompen of souvenirs bestellen of heeft u een vraag over één van onze workshops? Wilt u graag een fietstocht met picknick maken of een demonstratie bijwonen of heeft u gewoon een vraag? U kunt altijd informatie aanvragen via ons contactformulier.</p>
<p>Wij willen u graag van dienst zijn, dus stelt u ons uw vraag en wij zoeken voor u het juiste product of antwoord.</p>',
    'richtext' => 1,
    'template' => 15,
    'menuindex' => 1,
    'searchable' => 1,
    'cacheable' => 1,
    'createdby' => 1,
    'createdon' => 1303936254,
    'editedby' => 1,
    'editedon' => 1452983940,
    'deleted' => 0,
    'deletedon' => 0,
    'deletedby' => 0,
    'publishedon' => 1303936200,
    'publishedby' => 1,
    'menutitle' => 'Informatie aanvragen',
    'donthit' => 0,
    'privateweb' => 0,
    'privatemgr' => 0,
    'content_dispo' => 0,
    'hidemenu' => 0,
    'class_key' => 'modDocument',
    'context_key' => 'web',
    'content_type' => 1,
    'uri' => 'vraag-en-antwoord/infoaanvragen.html',
    'uri_override' => 0,
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'properties' => NULL,
    '_content' => '<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Informatie aanvragen - Het Klompenschuurtje</title>

		<base href="http://local.klompenschuurtje.nl/" />

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png">

        <link rel="stylesheet" href="/assets/css/screen.css">
        <script src="/assets/bower_components/modernizr/modernizr.js"></script>
    </head>
	<body>
		<div class="wrapper">
			<header>
				<nav>
					<div class="center">
						<a href="javascript:;" id="offcanvas-menu">
							<svg class="icon icon-bars"><use xlink:href="/assets/img/symbol-defs.svg#icon-bars"></use></svg>
							<span>Menu</span>
						</a>
						<a href="javascript:;" id="offcanvas-lang">
							<svg class="icon icon-nl"><use xlink:href="/assets/img/symbol-defs.svg#icon-nl"></use></svg>
							<span class="mls">Nederlands</span>
						</a>
                        <ul class="offcanvas main-menu">
	<ul><li>
	<a href="http://local.klompenschuurtje.nl/" class="">Home</a>
</li>
<li>
	<a href="geschiedenis.html" class="">Geschiedenis</a>
</li>
<li>
	<a href="klompen/" class="">Klompen</a>
</li>
<li>
	<a href="workshops.html" class="">Workshops</a>
</li>
<li>
	<a href="demonstraties.html" class="">Demonstraties</a>
</li>
<li>
	<a href="vraag-en-antwoord/" class="last active">Vraag & Antwoord</a>
</li>
</ul>
</ul>

						<ul class="offcanvas lang-menu">
							<li><a href="/nl/" class="active">
								<svg class="icon icon-nl"><use xlink:href="/assets/img/symbol-defs.svg#icon-nl"></use></svg>
								<span class="mls">Nederlands</span>
							</a></li>
							<li><a href="/en/">
								<svg class="icon icon-en"><use xlink:href="/assets/img/symbol-defs.svg#icon-en"></use></svg>
								<span class="mls">English</span>
							</a></li>
							<li><a href="/de/">
								<svg class="icon icon-de"><use xlink:href="/assets/img/symbol-defs.svg#icon-de"></use></svg>
								<span class="mls">Deutsch</span>
							</a></li>
						</ul>
					</div>
				</nav>

				<a href="http://local.klompenschuurtje.nl/" class="center logo"><img src="/assets/img/logo-klompenschuurtje.png" alt="Het Klompenschuurtje"></a>
			</header>
			<main>
<article>
    <h1>Informatie aanvragen</h1>
<p>Wilt u graag draagklompen of souvenirs bestellen of heeft u een vraag over één van onze workshops? Wilt u graag een fietstocht met picknick maken of een demonstratie bijwonen of heeft u gewoon een vraag? U kunt altijd informatie aanvragen via ons contactformulier.</p>
<p>Wij willen u graag van dienst zijn, dus stelt u ons uw vraag en wij zoeken voor u het juiste product of antwoord.</p>
    [[!FormIt?
        &hooks=`email,redirect`
        &emailTpl=`emailContactTpl`
        &emailTo=`info@klompenschuurtje.nl`
        &emailFrom=`[[+email]]`
        &emailFromName=`[[+name]]`
        &emailSubject=`[[+subject]]`
        &redirectTo=`22`
        &validate= `name:required,
                    email:email:required,
                    workemail:blank
    ]]
    <form class="contactForm" id="contactForm" method="post" action="vraag-en-antwoord/infoaanvragen.html">
        <p>
            <label>Naam:</label>
            <input type="text" name="name" id="name" value="[[!+fi.name]]">
            <span class="asterix">*</span>
            [[!+fi.error.name]]
        </p>
        <p>
            <label>E-mail:</label>
            <input type="text" name="email" id="email" value="[[!+fi.email]]">
            <span class="asterix">*</span>
            [[!+fi.error.email]]
        </p>
        <p>
            <label>Telefoonnummer:</label>
            <input type="text" name="phone" id="phone" value="[[!+fi.phone]]">
        </p>
        <p>
            <label>Ik wil informatie over:</label>
            <select name="subject" id="subject">
                <option value="">Maak een keuze</option>
                <option value="Demonstraties">Demonstraties</option>    
                <option value="Workshops">Workshops</option>    
                <option value="Klomptochten">Klomptochten, "Trap terug in de tijd"</option> 
                <optgroup label="Draagklompen">
                    <option value="Handgeschilderde klompen">Handgeschilderde klompen</option>  
                    <option value="Klompen met logo">Klompen met logo</option>  
                    <option value="FUN klompen">FUN klompen</option>    
                    <option value="Geboorte klompen">Geboorte klompen</option>  
                    <option value="Airbrush klompen">Airbrush klompen</option>
                    <option value="Ingebrande klompen">Ingebrande klompen</option>
                </optgroup>
                <option value="Souvenirs">Souvenirs</option>    
                <option value="Relatiegeschenken">Relatiegeschenken</option>    
                <option value="Speelgoed">Speelgoed</option>    
                <option value="Diversen">Diversen</option>  
                <option value="Iets anders, namelijk:">Iets anders, namelijk:</option>  
            </select>
        </p>
        <p>
            <label>Uw bericht:</label><textarea name="message" id="message">[[!+fi.message]]</textarea>
        </p>
        <p>
            <input type="hidden" name="workemail" value="" />
            <label>&nbsp;</label><input type="submit" value="Verzend" class="button big">
        </p>
        <p class="voetnoot">Velden met een asterix (<span class="asterix">*</span>) zijn verplichte velden.</p>
        <input type="hidden" name="workemail" value="">
    </form>
</article>

<aside>
    <nav>
        <ul>
    <ul><li>
	<a href="/vraag-en-antwoord/infoaanvragen.html" class="active">Informatie aanvragen</a>
</li>
<li>
	<a href="/vraag-en-antwoord/welkemaathebik.html" class="">Welke maat heb ik?</a>
</li>
<li>
	<a href="/vraag-en-antwoord/routebeschrijving.html" class="">Routebeschrijving</a>
</li>
<li>
	<a href="/vraag-en-antwoord/vrienden-van-het-klompenschuurtje.html" class="">Vrienden</a>
</li>
</ul>
</ul>
    </nav>
    <div class="share">
	<ul>
		<li><a href="http://twitter.com/home?status=Dit%20is%20een%20mooie%20website%20over%20klompen%3A%20http%3A%2F%2Fwww.klompenschuurtje.nl" target="_blank"><img src="/assets/img/share-twitter.png" alt="Twitter"></a></li>
		<li><a href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Fwww.klompenschuurtje.nl&t=Ik%20heb%20een%20leuke%20site%20over%20klompen%20gevonden!" target="_blank"><img src="/assets/img/share-facebook.png" alt="Facebook"></a></li>
		<li><a href="
https://plus.google.com/share?url=http%3A%2F%2Fwww.klompenschuurtje.nl" target="_blank"><img src="/assets/img/share-googleplus.png" alt="Google+"></a></li>
		<li><a data-pin-do="buttonPin" target="_blank" href="https://www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fklompenschuurtje.nl%2F&media=http%3A%2F%2Fklompenschuurtje.nl%2Fassets%2Fimg%2Flogo-klompenschuurtje.png&description=Het%20Klompenschuurtje%3A%20klompenmakerij%2C%20winkel%20en%20museum%20in%20%C3%A9%C3%A9n."><img src="/assets/img/share-pinterest.png" alt="Pinterest"></a></li>
	</ul>
	<p><img src="/assets/img/brand.png" alt="Klompenschuurtje beeldmerk" class="brand"><span>Deel het Klompenschuurtje</span></p>
</div>
</aside>
			</main>

			<footer>
				<div class="footerContent">				
					<div class="info">				
						<p><strong>Klompenschuurtje, Helmondseweg 3B, 5735 RA Aarle-Rixtel. KvK nummer: 17231776</strong><br>
						Meer informatie bel 06 229 948 80 of e-mail nicole@klompenschuurtje.nl</p>
					</div>
					<div class="webbiker">
						<a href="http://www.webbiker.nl" target="_blank"><img src="/assets/img/logo-webbiker.png" alt="Webbiker"></a>
					</div>
				</div>
			</footer>
		</div>
	</body>
    <script src="/assets/js/app-min.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site\'s ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src=\'https://www.google-analytics.com/analytics.js\';
        r.parentNode.insertBefore(e,r)}(window,document,\'script\',\'ga\'));
        ga(\'create\',\'UA-XXXXX-X\',\'auto\');ga(\'send\',\'pageview\');
    </script>
</html>',
    '_isForward' => false,
  ),
  'contentType' => 
  array (
    'id' => 1,
    'name' => 'HTML',
    'description' => 'HTML content',
    'mime_type' => 'text/html',
    'file_extensions' => '.html',
    'headers' => NULL,
    'binary' => 0,
  ),
  'policyCache' => 
  array (
  ),
  'elementCache' => 
  array (
    '[[*longtitle]]' => 'Informatie aanvragen',
    '[[Wayfinder?
	    &startId=`0`
	    &level=`1`
	    &firstClass=``
	    &lastClass=`last`
	    &rowTpl=`Navigation Main Item`
	    &hereClass=`active`
	]]' => '<ul><li>
	<a href="http://local.klompenschuurtje.nl/" class="">Home</a>
</li>
<li>
	<a href="geschiedenis.html" class="">Geschiedenis</a>
</li>
<li>
	<a href="klompen/" class="">Klompen</a>
</li>
<li>
	<a href="workshops.html" class="">Workshops</a>
</li>
<li>
	<a href="demonstraties.html" class="">Demonstraties</a>
</li>
<li>
	<a href="vraag-en-antwoord/" class="last active">Vraag & Antwoord</a>
</li>
</ul>',
    '[[$Navigation Main? ]]' => '<ul class="offcanvas main-menu">
	<ul><li>
	<a href="http://local.klompenschuurtje.nl/" class="">Home</a>
</li>
<li>
	<a href="geschiedenis.html" class="">Geschiedenis</a>
</li>
<li>
	<a href="klompen/" class="">Klompen</a>
</li>
<li>
	<a href="workshops.html" class="">Workshops</a>
</li>
<li>
	<a href="demonstraties.html" class="">Demonstraties</a>
</li>
<li>
	<a href="vraag-en-antwoord/" class="last active">Vraag & Antwoord</a>
</li>
</ul>
</ul>',
    '[[$Header? ]]' => '<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Informatie aanvragen - Het Klompenschuurtje</title>

		<base href="http://local.klompenschuurtje.nl/" />

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png">

        <link rel="stylesheet" href="/assets/css/screen.css">
        <script src="/assets/bower_components/modernizr/modernizr.js"></script>
    </head>
	<body>
		<div class="wrapper">
			<header>
				<nav>
					<div class="center">
						<a href="javascript:;" id="offcanvas-menu">
							<svg class="icon icon-bars"><use xlink:href="/assets/img/symbol-defs.svg#icon-bars"></use></svg>
							<span>Menu</span>
						</a>
						<a href="javascript:;" id="offcanvas-lang">
							<svg class="icon icon-nl"><use xlink:href="/assets/img/symbol-defs.svg#icon-nl"></use></svg>
							<span class="mls">Nederlands</span>
						</a>
                        <ul class="offcanvas main-menu">
	<ul><li>
	<a href="http://local.klompenschuurtje.nl/" class="">Home</a>
</li>
<li>
	<a href="geschiedenis.html" class="">Geschiedenis</a>
</li>
<li>
	<a href="klompen/" class="">Klompen</a>
</li>
<li>
	<a href="workshops.html" class="">Workshops</a>
</li>
<li>
	<a href="demonstraties.html" class="">Demonstraties</a>
</li>
<li>
	<a href="vraag-en-antwoord/" class="last active">Vraag & Antwoord</a>
</li>
</ul>
</ul>

						<ul class="offcanvas lang-menu">
							<li><a href="/nl/" class="active">
								<svg class="icon icon-nl"><use xlink:href="/assets/img/symbol-defs.svg#icon-nl"></use></svg>
								<span class="mls">Nederlands</span>
							</a></li>
							<li><a href="/en/">
								<svg class="icon icon-en"><use xlink:href="/assets/img/symbol-defs.svg#icon-en"></use></svg>
								<span class="mls">English</span>
							</a></li>
							<li><a href="/de/">
								<svg class="icon icon-de"><use xlink:href="/assets/img/symbol-defs.svg#icon-de"></use></svg>
								<span class="mls">Deutsch</span>
							</a></li>
						</ul>
					</div>
				</nav>

				<a href="http://local.klompenschuurtje.nl/" class="center logo"><img src="/assets/img/logo-klompenschuurtje.png" alt="Het Klompenschuurtje"></a>
			</header>
			<main>',
    '[[*id]]' => 20,
    '[[~20]]' => 'vraag-en-antwoord/infoaanvragen.html',
    '[[Wayfinder?
        &startId=`6`
        &level=`1`
        &firstClass=``
        &lastClass=``
        &rowTpl=`Navigation Sub Item`
        &hereClass=`active`
    ]]' => '<ul><li>
	<a href="/vraag-en-antwoord/infoaanvragen.html" class="active">Informatie aanvragen</a>
</li>
<li>
	<a href="/vraag-en-antwoord/welkemaathebik.html" class="">Welke maat heb ik?</a>
</li>
<li>
	<a href="/vraag-en-antwoord/routebeschrijving.html" class="">Routebeschrijving</a>
</li>
<li>
	<a href="/vraag-en-antwoord/vrienden-van-het-klompenschuurtje.html" class="">Vrienden</a>
</li>
</ul>',
    '[[$Navigation Sub Contact? ]]' => '<ul>
    <ul><li>
	<a href="/vraag-en-antwoord/infoaanvragen.html" class="active">Informatie aanvragen</a>
</li>
<li>
	<a href="/vraag-en-antwoord/welkemaathebik.html" class="">Welke maat heb ik?</a>
</li>
<li>
	<a href="/vraag-en-antwoord/routebeschrijving.html" class="">Routebeschrijving</a>
</li>
<li>
	<a href="/vraag-en-antwoord/vrienden-van-het-klompenschuurtje.html" class="">Vrienden</a>
</li>
</ul>
</ul>',
    '[[$Share? ]]' => '<div class="share">
	<ul>
		<li><a href="http://twitter.com/home?status=Dit%20is%20een%20mooie%20website%20over%20klompen%3A%20http%3A%2F%2Fwww.klompenschuurtje.nl" target="_blank"><img src="/assets/img/share-twitter.png" alt="Twitter"></a></li>
		<li><a href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Fwww.klompenschuurtje.nl&t=Ik%20heb%20een%20leuke%20site%20over%20klompen%20gevonden!" target="_blank"><img src="/assets/img/share-facebook.png" alt="Facebook"></a></li>
		<li><a href="
https://plus.google.com/share?url=http%3A%2F%2Fwww.klompenschuurtje.nl" target="_blank"><img src="/assets/img/share-googleplus.png" alt="Google+"></a></li>
		<li><a data-pin-do="buttonPin" target="_blank" href="https://www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fklompenschuurtje.nl%2F&media=http%3A%2F%2Fklompenschuurtje.nl%2Fassets%2Fimg%2Flogo-klompenschuurtje.png&description=Het%20Klompenschuurtje%3A%20klompenmakerij%2C%20winkel%20en%20museum%20in%20%C3%A9%C3%A9n."><img src="/assets/img/share-pinterest.png" alt="Pinterest"></a></li>
	</ul>
	<p><img src="/assets/img/brand.png" alt="Klompenschuurtje beeldmerk" class="brand"><span>Deel het Klompenschuurtje</span></p>
</div>',
    '[[$Footer? ]]' => '			</main>

			<footer>
				<div class="footerContent">				
					<div class="info">				
						<p><strong>Klompenschuurtje, Helmondseweg 3B, 5735 RA Aarle-Rixtel. KvK nummer: 17231776</strong><br>
						Meer informatie bel 06 229 948 80 of e-mail nicole@klompenschuurtje.nl</p>
					</div>
					<div class="webbiker">
						<a href="http://www.webbiker.nl" target="_blank"><img src="/assets/img/logo-webbiker.png" alt="Webbiker"></a>
					</div>
				</div>
			</footer>
		</div>
	</body>
    <script src="/assets/js/app-min.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site\'s ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src=\'https://www.google-analytics.com/analytics.js\';
        r.parentNode.insertBefore(e,r)}(window,document,\'script\',\'ga\'));
        ga(\'create\',\'UA-XXXXX-X\',\'auto\');ga(\'send\',\'pageview\');
    </script>
</html>',
  ),
  'sourceCache' => 
  array (
    'modChunk' => 
    array (
      'Header' => 
      array (
        'fields' => 
        array (
          'id' => 27,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'Header',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>[[*longtitle]] - [[++site_name]]</title>

		<base href="[[++site_url]]" />

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png">

        <link rel="stylesheet" href="/assets/css/screen.css">
        <script src="/assets/bower_components/modernizr/modernizr.js"></script>
    </head>
	<body>
		<div class="wrapper">
			<header>
				<nav>
					<div class="center">
						<a href="javascript:;" id="offcanvas-menu">
							<svg class="icon icon-bars"><use xlink:href="/assets/img/symbol-defs.svg#icon-bars"></use></svg>
							<span>Menu</span>
						</a>
						<a href="javascript:;" id="offcanvas-lang">
							<svg class="icon icon-nl"><use xlink:href="/assets/img/symbol-defs.svg#icon-nl"></use></svg>
							<span class="mls">Nederlands</span>
						</a>
                        [[$Navigation Main? ]]

						<ul class="offcanvas lang-menu">
							<li><a href="/nl/" class="active">
								<svg class="icon icon-nl"><use xlink:href="/assets/img/symbol-defs.svg#icon-nl"></use></svg>
								<span class="mls">Nederlands</span>
							</a></li>
							<li><a href="/en/">
								<svg class="icon icon-en"><use xlink:href="/assets/img/symbol-defs.svg#icon-en"></use></svg>
								<span class="mls">English</span>
							</a></li>
							<li><a href="/de/">
								<svg class="icon icon-de"><use xlink:href="/assets/img/symbol-defs.svg#icon-de"></use></svg>
								<span class="mls">Deutsch</span>
							</a></li>
						</ul>
					</div>
				</nav>

				<a href="[[++site_url]]" class="center logo"><img src="/assets/img/logo-klompenschuurtje.png" alt="Het Klompenschuurtje"></a>
			</header>
			<main>',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => true,
          'static_file' => 'assets/chunks/header.tpl',
          'content' => '<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>[[*longtitle]] - [[++site_name]]</title>

		<base href="[[++site_url]]" />

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png">

        <link rel="stylesheet" href="/assets/css/screen.css">
        <script src="/assets/bower_components/modernizr/modernizr.js"></script>
    </head>
	<body>
		<div class="wrapper">
			<header>
				<nav>
					<div class="center">
						<a href="javascript:;" id="offcanvas-menu">
							<svg class="icon icon-bars"><use xlink:href="/assets/img/symbol-defs.svg#icon-bars"></use></svg>
							<span>Menu</span>
						</a>
						<a href="javascript:;" id="offcanvas-lang">
							<svg class="icon icon-nl"><use xlink:href="/assets/img/symbol-defs.svg#icon-nl"></use></svg>
							<span class="mls">Nederlands</span>
						</a>
                        [[$Navigation Main? ]]

						<ul class="offcanvas lang-menu">
							<li><a href="/nl/" class="active">
								<svg class="icon icon-nl"><use xlink:href="/assets/img/symbol-defs.svg#icon-nl"></use></svg>
								<span class="mls">Nederlands</span>
							</a></li>
							<li><a href="/en/">
								<svg class="icon icon-en"><use xlink:href="/assets/img/symbol-defs.svg#icon-en"></use></svg>
								<span class="mls">English</span>
							</a></li>
							<li><a href="/de/">
								<svg class="icon icon-de"><use xlink:href="/assets/img/symbol-defs.svg#icon-de"></use></svg>
								<span class="mls">Deutsch</span>
							</a></li>
						</ul>
					</div>
				</nav>

				<a href="[[++site_url]]" class="center logo"><img src="/assets/img/logo-klompenschuurtje.png" alt="Het Klompenschuurtje"></a>
			</header>
			<main>',
        ),
        'policies' => 
        array (
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
      'Navigation Main' => 
      array (
        'fields' => 
        array (
          'id' => 22,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'Navigation Main',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '<ul class="offcanvas main-menu">
	[[Wayfinder?
	    &startId=`0`
	    &level=`1`
	    &firstClass=``
	    &lastClass=`last`
	    &rowTpl=`Navigation Main Item`
	    &hereClass=`active`
	]]
</ul>',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => true,
          'static_file' => 'assets/chunks/navigation-main.tpl',
          'content' => '<ul class="offcanvas main-menu">
	[[Wayfinder?
	    &startId=`0`
	    &level=`1`
	    &firstClass=``
	    &lastClass=`last`
	    &rowTpl=`Navigation Main Item`
	    &hereClass=`active`
	]]
</ul>',
        ),
        'policies' => 
        array (
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
      'Navigation Sub Contact' => 
      array (
        'fields' => 
        array (
          'id' => 35,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'Navigation Sub Contact',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '<ul>
    [[Wayfinder?
        &startId=`6`
        &level=`1`
        &firstClass=``
        &lastClass=``
        &rowTpl=`Navigation Sub Item`
        &hereClass=`active`
    ]]
</ul>',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => true,
          'static_file' => 'assets/chunks/navigation-sub-contact.tpl',
          'content' => '<ul>
    [[Wayfinder?
        &startId=`6`
        &level=`1`
        &firstClass=``
        &lastClass=``
        &rowTpl=`Navigation Sub Item`
        &hereClass=`active`
    ]]
</ul>',
        ),
        'policies' => 
        array (
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
      'Share' => 
      array (
        'fields' => 
        array (
          'id' => 26,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'Share',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '<div class="share">
	<ul>
		<li><a href="http://twitter.com/home?status=Dit%20is%20een%20mooie%20website%20over%20klompen%3A%20http%3A%2F%2Fwww.klompenschuurtje.nl" target="_blank"><img src="/assets/img/share-twitter.png" alt="Twitter"></a></li>
		<li><a href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Fwww.klompenschuurtje.nl&t=Ik%20heb%20een%20leuke%20site%20over%20klompen%20gevonden!" target="_blank"><img src="/assets/img/share-facebook.png" alt="Facebook"></a></li>
		<li><a href="
https://plus.google.com/share?url=http%3A%2F%2Fwww.klompenschuurtje.nl" target="_blank"><img src="/assets/img/share-googleplus.png" alt="Google+"></a></li>
		<li><a data-pin-do="buttonPin" target="_blank" href="https://www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fklompenschuurtje.nl%2F&media=http%3A%2F%2Fklompenschuurtje.nl%2Fassets%2Fimg%2Flogo-klompenschuurtje.png&description=Het%20Klompenschuurtje%3A%20klompenmakerij%2C%20winkel%20en%20museum%20in%20%C3%A9%C3%A9n."><img src="/assets/img/share-pinterest.png" alt="Pinterest"></a></li>
	</ul>
	<p><img src="/assets/img/brand.png" alt="Klompenschuurtje beeldmerk" class="brand"><span>Deel het Klompenschuurtje</span></p>
</div>',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => true,
          'static_file' => 'assets/chunks/share.tpl',
          'content' => '<div class="share">
	<ul>
		<li><a href="http://twitter.com/home?status=Dit%20is%20een%20mooie%20website%20over%20klompen%3A%20http%3A%2F%2Fwww.klompenschuurtje.nl" target="_blank"><img src="/assets/img/share-twitter.png" alt="Twitter"></a></li>
		<li><a href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Fwww.klompenschuurtje.nl&t=Ik%20heb%20een%20leuke%20site%20over%20klompen%20gevonden!" target="_blank"><img src="/assets/img/share-facebook.png" alt="Facebook"></a></li>
		<li><a href="
https://plus.google.com/share?url=http%3A%2F%2Fwww.klompenschuurtje.nl" target="_blank"><img src="/assets/img/share-googleplus.png" alt="Google+"></a></li>
		<li><a data-pin-do="buttonPin" target="_blank" href="https://www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fklompenschuurtje.nl%2F&media=http%3A%2F%2Fklompenschuurtje.nl%2Fassets%2Fimg%2Flogo-klompenschuurtje.png&description=Het%20Klompenschuurtje%3A%20klompenmakerij%2C%20winkel%20en%20museum%20in%20%C3%A9%C3%A9n."><img src="/assets/img/share-pinterest.png" alt="Pinterest"></a></li>
	</ul>
	<p><img src="/assets/img/brand.png" alt="Klompenschuurtje beeldmerk" class="brand"><span>Deel het Klompenschuurtje</span></p>
</div>',
        ),
        'policies' => 
        array (
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
      'Footer' => 
      array (
        'fields' => 
        array (
          'id' => 24,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'Footer',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '			</main>

			<footer>
				<div class="footerContent">				
					<div class="info">				
						<p><strong>Klompenschuurtje, Helmondseweg 3B, 5735 RA Aarle-Rixtel. KvK nummer: 17231776</strong><br>
						Meer informatie bel 06 229 948 80 of e-mail nicole@klompenschuurtje.nl</p>
					</div>
					<div class="webbiker">
						<a href="http://www.webbiker.nl" target="_blank"><img src="/assets/img/logo-webbiker.png" alt="Webbiker"></a>
					</div>
				</div>
			</footer>
		</div>
	</body>
    <script src="/assets/js/app-min.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site\'s ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src=\'https://www.google-analytics.com/analytics.js\';
        r.parentNode.insertBefore(e,r)}(window,document,\'script\',\'ga\'));
        ga(\'create\',\'UA-XXXXX-X\',\'auto\');ga(\'send\',\'pageview\');
    </script>
</html>',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => true,
          'static_file' => 'assets/chunks/footer.tpl',
          'content' => '			</main>

			<footer>
				<div class="footerContent">				
					<div class="info">				
						<p><strong>Klompenschuurtje, Helmondseweg 3B, 5735 RA Aarle-Rixtel. KvK nummer: 17231776</strong><br>
						Meer informatie bel 06 229 948 80 of e-mail nicole@klompenschuurtje.nl</p>
					</div>
					<div class="webbiker">
						<a href="http://www.webbiker.nl" target="_blank"><img src="/assets/img/logo-webbiker.png" alt="Webbiker"></a>
					</div>
				</div>
			</footer>
		</div>
	</body>
    <script src="/assets/js/app-min.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site\'s ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src=\'https://www.google-analytics.com/analytics.js\';
        r.parentNode.insertBefore(e,r)}(window,document,\'script\',\'ga\'));
        ga(\'create\',\'UA-XXXXX-X\',\'auto\');ga(\'send\',\'pageview\');
    </script>
</html>',
        ),
        'policies' => 
        array (
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
    ),
    'modSnippet' => 
    array (
      'Wayfinder' => 
      array (
        'fields' => 
        array (
          'id' => 1,
          'source' => 0,
          'property_preprocess' => false,
          'name' => 'Wayfinder',
          'description' => 'Wayfinder for MODx Revolution 2.0.0-beta-5 and later.',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '/**
 * Wayfinder Snippet to build site navigation menus
 *
 * Totally refactored from original DropMenu nav builder to make it easier to
 * create custom navigation by using chunks as output templates. By using
 * templates, many of the paramaters are no longer needed for flexible output
 * including tables, unordered- or ordered-lists (ULs or OLs), definition lists
 * (DLs) or in any other format you desire.
 *
 * @version 2.1.1-beta5
 * @author Garry Nutting (collabpad.com)
 * @author Kyle Jaebker (muddydogpaws.com)
 * @author Ryan Thrash (modx.com)
 * @author Shaun McCormick (modx.com)
 * @author Jason Coward (modx.com)
 *
 * @example [[Wayfinder? &startId=`0`]]
 *
 * @var modX $modx
 * @var array $scriptProperties
 * 
 * @package wayfinder
 */
$wayfinder_base = $modx->getOption(\'wayfinder.core_path\',$scriptProperties,$modx->getOption(\'core_path\').\'components/wayfinder/\');

/* include a custom config file if specified */
if (isset($scriptProperties[\'config\'])) {
    $scriptProperties[\'config\'] = str_replace(\'../\',\'\',$scriptProperties[\'config\']);
    $scriptProperties[\'config\'] = $wayfinder_base.\'configs/\'.$scriptProperties[\'config\'].\'.config.php\';
} else {
    $scriptProperties[\'config\'] = $wayfinder_base.\'configs/default.config.php\';
}
if (file_exists($scriptProperties[\'config\'])) {
    include $scriptProperties[\'config\'];
}

/* include wayfinder class */
include_once $wayfinder_base.\'wayfinder.class.php\';
if (!$modx->loadClass(\'Wayfinder\',$wayfinder_base,true,true)) {
    return \'error: Wayfinder class not found\';
}
$wf = new Wayfinder($modx,$scriptProperties);

/* get user class definitions
 * TODO: eventually move these into config parameters */
$wf->_css = array(
    \'first\' => isset($firstClass) ? $firstClass : \'\',
    \'last\' => isset($lastClass) ? $lastClass : \'last\',
    \'here\' => isset($hereClass) ? $hereClass : \'active\',
    \'parent\' => isset($parentClass) ? $parentClass : \'\',
    \'row\' => isset($rowClass) ? $rowClass : \'\',
    \'outer\' => isset($outerClass) ? $outerClass : \'\',
    \'inner\' => isset($innerClass) ? $innerClass : \'\',
    \'level\' => isset($levelClass) ? $levelClass: \'\',
    \'self\' => isset($selfClass) ? $selfClass : \'\',
    \'weblink\' => isset($webLinkClass) ? $webLinkClass : \'\'
);

/* get user templates
 * TODO: eventually move these into config parameters */
$wf->_templates = array(
    \'outerTpl\' => isset($outerTpl) ? $outerTpl : \'\',
    \'rowTpl\' => isset($rowTpl) ? $rowTpl : \'\',
    \'parentRowTpl\' => isset($parentRowTpl) ? $parentRowTpl : \'\',
    \'parentRowHereTpl\' => isset($parentRowHereTpl) ? $parentRowHereTpl : \'\',
    \'hereTpl\' => isset($hereTpl) ? $hereTpl : \'\',
    \'innerTpl\' => isset($innerTpl) ? $innerTpl : \'\',
    \'innerRowTpl\' => isset($innerRowTpl) ? $innerRowTpl : \'\',
    \'innerHereTpl\' => isset($innerHereTpl) ? $innerHereTpl : \'\',
    \'activeParentRowTpl\' => isset($activeParentRowTpl) ? $activeParentRowTpl : \'\',
    \'categoryFoldersTpl\' => isset($categoryFoldersTpl) ? $categoryFoldersTpl : \'\',
    \'startItemTpl\' => isset($startItemTpl) ? $startItemTpl : \'\'
);

/* process Wayfinder */
$output = $wf->run();
if ($wf->_config[\'debug\']) {
    $output .= $wf->renderDebugOutput();
}

/* output results */
if ($wf->_config[\'ph\']) {
    $modx->setPlaceholder($wf->_config[\'ph\'],$output);
} else {
    return $output;
}',
          'locked' => false,
          'properties' => 
          array (
            'level' => 
            array (
              'name' => 'level',
              'desc' => 'prop_wayfinder.level_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '0',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Depth (number of levels) to build the menu from. 0 goes through all levels.',
              'area' => '',
              'area_trans' => '',
            ),
            'includeDocs' => 
            array (
              'name' => 'includeDocs',
              'desc' => 'prop_wayfinder.includeDocs_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '0',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Acts as a filter and will limit the output to only the documents specified in this parameter. The startId is still required.',
              'area' => '',
              'area_trans' => '',
            ),
            'excludeDocs' => 
            array (
              'name' => 'excludeDocs',
              'desc' => 'prop_wayfinder.excludeDocs_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '0',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Acts as a filter and will remove the documents specified in this parameter from the output. The startId is still required.',
              'area' => '',
              'area_trans' => '',
            ),
            'contexts' => 
            array (
              'name' => 'contexts',
              'desc' => 'prop_wayfinder.contexts_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Specify the contexts for the Resources that will be loaded in this menu. Useful when used with startId at 0 to show all first-level items. Note: This will increase load times a bit, but if you set cacheResults to 1, that will offset the load time.',
              'area' => '',
              'area_trans' => '',
            ),
            'cacheResults' => 
            array (
              'name' => 'cacheResults',
              'desc' => 'prop_wayfinder.cacheResults_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => true,
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Cache the generated menu to the MODX Resource cache. Setting this to 1 will speed up the loading of your menus.',
              'area' => '',
              'area_trans' => '',
            ),
            'cacheTime' => 
            array (
              'name' => 'cacheTime',
              'desc' => 'prop_wayfinder.cacheTime_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 3600,
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'The number of seconds to store the cached menu, if cacheResults is 1. Set to 0 to store indefinitely until cache is manually cleared.',
              'area' => '',
              'area_trans' => '',
            ),
            'ph' => 
            array (
              'name' => 'ph',
              'desc' => 'prop_wayfinder.ph_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => false,
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'To display send the output of Wayfinder to a placeholder set the ph parameter equal to the name of the desired placeholder. All output including the debugging (if on) will be sent to the placeholder specified.',
              'area' => '',
              'area_trans' => '',
            ),
            'debug' => 
            array (
              'name' => 'debug',
              'desc' => 'prop_wayfinder.debug_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => false,
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'With the debug parameter set to 1, Wayfinder will output information on how each Resource was processed.',
              'area' => '',
              'area_trans' => '',
            ),
            'ignoreHidden' => 
            array (
              'name' => 'ignoreHidden',
              'desc' => 'prop_wayfinder.ignoreHidden_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => false,
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'The ignoreHidden parameter allows Wayfinder to ignore the display in menu flag that can be set for each document. With this parameter set to 1, all Resources will be displayed regardless of the Display in Menu flag.',
              'area' => '',
              'area_trans' => '',
            ),
            'hideSubMenus' => 
            array (
              'name' => 'hideSubMenus',
              'desc' => 'prop_wayfinder.hideSubMenus_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => false,
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'The hideSubMenus parameter will remove all non-active submenus from the Wayfinder output if set to 1. This parameter only works if multiple levels are being displayed.',
              'area' => '',
              'area_trans' => '',
            ),
            'useWeblinkUrl' => 
            array (
              'name' => 'useWeblinkUrl',
              'desc' => 'prop_wayfinder.useWeblinkUrl_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => true,
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => ' If WebLinks are used in the output, Wayfinder will output the link specified in the WebLink instead of the normal MODx link. To use the standard display of WebLinks (like any other Resource) set this to 0.',
              'area' => '',
              'area_trans' => '',
            ),
            'fullLink' => 
            array (
              'name' => 'fullLink',
              'desc' => 'prop_wayfinder.fullLink_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => false,
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'If set to 1, will display the entire, absolute URL in the link. (It is recommended to use scheme instead.)',
              'area' => '',
              'area_trans' => '',
            ),
            'scheme' => 
            array (
              'name' => 'scheme',
              'desc' => 'prop_wayfinder.scheme_desc',
              'type' => 'list',
              'options' => 
              array (
                0 => 
                array (
                  'text' => 'prop_wayfinder.relative',
                  'value' => '',
                  'name' => 'Relative',
                ),
                1 => 
                array (
                  'text' => 'prop_wayfinder.absolute',
                  'value' => 'abs',
                  'name' => 'Absolute',
                ),
                2 => 
                array (
                  'text' => 'prop_wayfinder.full',
                  'value' => 'full',
                  'name' => 'Full',
                ),
              ),
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Determines how URLs are generated for each link. Set to "abs" to show the absolute URL, "full" to show the full URL, and blank to use the relative URL. Defaults to relative.',
              'area' => '',
              'area_trans' => '',
            ),
            'sortOrder' => 
            array (
              'name' => 'sortOrder',
              'desc' => 'prop_wayfinder.sortOrder_desc',
              'type' => 'list',
              'options' => 
              array (
                0 => 
                array (
                  'text' => 'prop_wayfinder.ascending',
                  'value' => 'ASC',
                  'name' => 'Ascending',
                ),
                1 => 
                array (
                  'text' => 'prop_wayfinder.descending',
                  'value' => 'DESC',
                  'name' => 'Descending',
                ),
              ),
              'value' => 'ASC',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Allows the menu to be sorted in either ascending or descending order.',
              'area' => '',
              'area_trans' => '',
            ),
            'sortBy' => 
            array (
              'name' => 'sortBy',
              'desc' => 'prop_wayfinder.sortBy_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 'menuindex',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Sorts the output by any of the Resource fields on a level by level basis. This means that each submenu will be sorted independently of all other submenus at the same level. Random will sort the output differently every time the page is loaded if the snippet is called uncached.',
              'area' => '',
              'area_trans' => '',
            ),
            'limit' => 
            array (
              'name' => 'limit',
              'desc' => 'prop_wayfinder.limit_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '0',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Causes Wayfinder to only process the number of items specified per level.',
              'area' => '',
              'area_trans' => '',
            ),
            'cssTpl' => 
            array (
              'name' => 'cssTpl',
              'desc' => 'prop_wayfinder.cssTpl_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => false,
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'This parameter allows for a chunk containing a link to a style sheet or style information to be inserted into the head section of the generated page.',
              'area' => '',
              'area_trans' => '',
            ),
            'jsTpl' => 
            array (
              'name' => 'jsTpl',
              'desc' => 'prop_wayfinder.jsTpl_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => false,
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'This parameter allows for a chunk containing some Javascript to be inserted into the head section of the generated page.',
              'area' => '',
              'area_trans' => '',
            ),
            'rowIdPrefix' => 
            array (
              'name' => 'rowIdPrefix',
              'desc' => 'prop_wayfinder.rowIdPrefix_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => false,
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'If set, Wayfinder will replace the id placeholder with a unique id consisting of the specified prefix plus the Resource id.',
              'area' => '',
              'area_trans' => '',
            ),
            'textOfLinks' => 
            array (
              'name' => 'textOfLinks',
              'desc' => 'prop_wayfinder.textOfLinks_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 'menutitle',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'This field will be inserted into the linktext placeholder.',
              'area' => '',
              'area_trans' => '',
            ),
            'titleOfLinks' => 
            array (
              'name' => 'titleOfLinks',
              'desc' => 'prop_wayfinder.titleOfLinks_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 'pagetitle',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'This field will be inserted into the linktitle placeholder.',
              'area' => '',
              'area_trans' => '',
            ),
            'displayStart' => 
            array (
              'name' => 'displayStart',
              'desc' => 'prop_wayfinder.displayStart_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => false,
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Show the document as referenced by startId in the menu.',
              'area' => '',
              'area_trans' => '',
            ),
            'firstClass' => 
            array (
              'name' => 'firstClass',
              'desc' => 'prop_wayfinder.firstClass_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 'first',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'CSS class for the first item at a given menu level.',
              'area' => '',
              'area_trans' => '',
            ),
            'lastClass' => 
            array (
              'name' => 'lastClass',
              'desc' => 'prop_wayfinder.lastClass_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 'last',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'CSS class for the last item at a given menu level.',
              'area' => '',
              'area_trans' => '',
            ),
            'hereClass' => 
            array (
              'name' => 'hereClass',
              'desc' => 'prop_wayfinder.hereClass_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 'active',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'CSS class for the items showing where you are, all the way up the chain.',
              'area' => '',
              'area_trans' => '',
            ),
            'parentClass' => 
            array (
              'name' => 'parentClass',
              'desc' => 'prop_wayfinder.parentClass_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'CSS class for menu items that are a container and have children.',
              'area' => '',
              'area_trans' => '',
            ),
            'rowClass' => 
            array (
              'name' => 'rowClass',
              'desc' => 'prop_wayfinder.rowClass_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'CSS class denoting each output row.',
              'area' => '',
              'area_trans' => '',
            ),
            'outerClass' => 
            array (
              'name' => 'outerClass',
              'desc' => 'prop_wayfinder.outerClass_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'CSS class for the outer template.',
              'area' => '',
              'area_trans' => '',
            ),
            'innerClass' => 
            array (
              'name' => 'innerClass',
              'desc' => 'prop_wayfinder.innerClass_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'CSS class for the inner template.',
              'area' => '',
              'area_trans' => '',
            ),
            'levelClass' => 
            array (
              'name' => 'levelClass',
              'desc' => 'prop_wayfinder.levelClass_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'CSS class denoting every output row level. The level number will be added to the specified class (level1, level2, level3 etc if you specified "level").',
              'area' => '',
              'area_trans' => '',
            ),
            'selfClass' => 
            array (
              'name' => 'selfClass',
              'desc' => 'prop_wayfinder.selfClass_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'CSS class for the current item.',
              'area' => '',
              'area_trans' => '',
            ),
            'webLinkClass' => 
            array (
              'name' => 'webLinkClass',
              'desc' => 'prop_wayfinder.webLinkClass_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'CSS class for weblink items.',
              'area' => '',
              'area_trans' => '',
            ),
            'outerTpl' => 
            array (
              'name' => 'outerTpl',
              'desc' => 'prop_wayfinder.outerTpl_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Name of the chunk containing the template for the outer most container; if not included, a string including "<ul>[[+wf.wrapper]]</ul>" is assumed.',
              'area' => '',
              'area_trans' => '',
            ),
            'rowTpl' => 
            array (
              'name' => 'rowTpl',
              'desc' => 'prop_wayfinder.rowTpl_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Name of the chunk containing the template for the regular row items.',
              'area' => '',
              'area_trans' => '',
            ),
            'parentRowTpl' => 
            array (
              'name' => 'parentRowTpl',
              'desc' => 'prop_wayfinder.parentRowTpl_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Name of the chunk containing the template for any Resource that is a container and has children. Remember the [wf.wrapper] placeholder to output the children documents.',
              'area' => '',
              'area_trans' => '',
            ),
            'parentRowHereTpl' => 
            array (
              'name' => 'parentRowHereTpl',
              'desc' => 'prop_wayfinder.parentRowHereTpl_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Name of the chunk containing the template for the current Resource if it is a container and has children. Remember the [wf.wrapper] placeholder to output the children documents.',
              'area' => '',
              'area_trans' => '',
            ),
            'hereTpl' => 
            array (
              'name' => 'hereTpl',
              'desc' => 'prop_wayfinder.hereTpl_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Name of the chunk containing the template for the current Resource.',
              'area' => '',
              'area_trans' => '',
            ),
            'innerTpl' => 
            array (
              'name' => 'innerTpl',
              'desc' => 'prop_wayfinder.innerTpl_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Name of the chunk containing the template for each submenu. If no innerTpl is specified the outerTpl is used in its place.',
              'area' => '',
              'area_trans' => '',
            ),
            'innerRowTpl' => 
            array (
              'name' => 'innerRowTpl',
              'desc' => 'prop_wayfinder.innerRowTpl_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Name of the chunk containing the template for the row items in a subfolder.',
              'area' => '',
              'area_trans' => '',
            ),
            'innerHereTpl' => 
            array (
              'name' => 'innerHereTpl',
              'desc' => 'prop_wayfinder.innerHereTpl_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Name of the chunk containing the template for the current Resource if it is in a subfolder.',
              'area' => '',
              'area_trans' => '',
            ),
            'activeParentRowTpl' => 
            array (
              'name' => 'activeParentRowTpl',
              'desc' => 'prop_wayfinder.activeParentRowTpl_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Name of the chunk containing the template for items that are containers, have children and are currently active in the tree.',
              'area' => '',
              'area_trans' => '',
            ),
            'categoryFoldersTpl' => 
            array (
              'name' => 'categoryFoldersTpl',
              'desc' => 'prop_wayfinder.categoryFoldersTpl_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Name of the chunk containing the template for category folders. Category folders are determined by setting the template to blank or by setting the link attributes field to rel="category".',
              'area' => '',
              'area_trans' => '',
            ),
            'startItemTpl' => 
            array (
              'name' => 'startItemTpl',
              'desc' => 'prop_wayfinder.startItemTpl_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Name of the chunk containing the template for the start item, if enabled via the &displayStart parameter. Note: the default template shows the start item but does not link it. If you do not need a link, a class can be applied to the default template using the parameter &firstClass=`className`.',
              'area' => '',
              'area_trans' => '',
            ),
            'permissions' => 
            array (
              'name' => 'permissions',
              'desc' => 'prop_wayfinder.permissions_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 'list',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Will check for a permission on the Resource. Defaults to "list" - set to blank to skip normal permissions checks.',
              'area' => '',
              'area_trans' => '',
            ),
            'hereId' => 
            array (
              'name' => 'hereId',
              'desc' => 'prop_wayfinder.hereId_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Optional. If set, will change the "here" Resource to this ID. Defaults to the currently active Resource.',
              'area' => '',
              'area_trans' => '',
            ),
            'where' => 
            array (
              'name' => 'where',
              'desc' => 'prop_wayfinder.where_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Optional. A JSON object for where conditions for all items selected in the menu.',
              'area' => '',
              'area_trans' => '',
            ),
            'templates' => 
            array (
              'name' => 'templates',
              'desc' => 'prop_wayfinder.templates_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Optional. A comma-separated list of Template IDs to restrict selected Resources to.',
              'area' => '',
              'area_trans' => '',
            ),
            'previewUnpublished' => 
            array (
              'name' => 'previewUnpublished',
              'desc' => 'prop_wayfinder.previewunpublished_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'wayfinder:properties',
              'desc_trans' => 'Optional. If set to Yes, if you are logged into the mgr and have the view_unpublished permission, it will allow previewing of unpublished resources in your menus in the front-end.',
              'area' => '',
              'area_trans' => '',
            ),
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => '/**
 * Wayfinder Snippet to build site navigation menus
 *
 * Totally refactored from original DropMenu nav builder to make it easier to
 * create custom navigation by using chunks as output templates. By using
 * templates, many of the paramaters are no longer needed for flexible output
 * including tables, unordered- or ordered-lists (ULs or OLs), definition lists
 * (DLs) or in any other format you desire.
 *
 * @version 2.1.1-beta5
 * @author Garry Nutting (collabpad.com)
 * @author Kyle Jaebker (muddydogpaws.com)
 * @author Ryan Thrash (modx.com)
 * @author Shaun McCormick (modx.com)
 * @author Jason Coward (modx.com)
 *
 * @example [[Wayfinder? &startId=`0`]]
 *
 * @var modX $modx
 * @var array $scriptProperties
 * 
 * @package wayfinder
 */
$wayfinder_base = $modx->getOption(\'wayfinder.core_path\',$scriptProperties,$modx->getOption(\'core_path\').\'components/wayfinder/\');

/* include a custom config file if specified */
if (isset($scriptProperties[\'config\'])) {
    $scriptProperties[\'config\'] = str_replace(\'../\',\'\',$scriptProperties[\'config\']);
    $scriptProperties[\'config\'] = $wayfinder_base.\'configs/\'.$scriptProperties[\'config\'].\'.config.php\';
} else {
    $scriptProperties[\'config\'] = $wayfinder_base.\'configs/default.config.php\';
}
if (file_exists($scriptProperties[\'config\'])) {
    include $scriptProperties[\'config\'];
}

/* include wayfinder class */
include_once $wayfinder_base.\'wayfinder.class.php\';
if (!$modx->loadClass(\'Wayfinder\',$wayfinder_base,true,true)) {
    return \'error: Wayfinder class not found\';
}
$wf = new Wayfinder($modx,$scriptProperties);

/* get user class definitions
 * TODO: eventually move these into config parameters */
$wf->_css = array(
    \'first\' => isset($firstClass) ? $firstClass : \'\',
    \'last\' => isset($lastClass) ? $lastClass : \'last\',
    \'here\' => isset($hereClass) ? $hereClass : \'active\',
    \'parent\' => isset($parentClass) ? $parentClass : \'\',
    \'row\' => isset($rowClass) ? $rowClass : \'\',
    \'outer\' => isset($outerClass) ? $outerClass : \'\',
    \'inner\' => isset($innerClass) ? $innerClass : \'\',
    \'level\' => isset($levelClass) ? $levelClass: \'\',
    \'self\' => isset($selfClass) ? $selfClass : \'\',
    \'weblink\' => isset($webLinkClass) ? $webLinkClass : \'\'
);

/* get user templates
 * TODO: eventually move these into config parameters */
$wf->_templates = array(
    \'outerTpl\' => isset($outerTpl) ? $outerTpl : \'\',
    \'rowTpl\' => isset($rowTpl) ? $rowTpl : \'\',
    \'parentRowTpl\' => isset($parentRowTpl) ? $parentRowTpl : \'\',
    \'parentRowHereTpl\' => isset($parentRowHereTpl) ? $parentRowHereTpl : \'\',
    \'hereTpl\' => isset($hereTpl) ? $hereTpl : \'\',
    \'innerTpl\' => isset($innerTpl) ? $innerTpl : \'\',
    \'innerRowTpl\' => isset($innerRowTpl) ? $innerRowTpl : \'\',
    \'innerHereTpl\' => isset($innerHereTpl) ? $innerHereTpl : \'\',
    \'activeParentRowTpl\' => isset($activeParentRowTpl) ? $activeParentRowTpl : \'\',
    \'categoryFoldersTpl\' => isset($categoryFoldersTpl) ? $categoryFoldersTpl : \'\',
    \'startItemTpl\' => isset($startItemTpl) ? $startItemTpl : \'\'
);

/* process Wayfinder */
$output = $wf->run();
if ($wf->_config[\'debug\']) {
    $output .= $wf->renderDebugOutput();
}

/* output results */
if ($wf->_config[\'ph\']) {
    $modx->setPlaceholder($wf->_config[\'ph\'],$output);
} else {
    return $output;
}',
        ),
        'policies' => 
        array (
        ),
        'source' => 
        array (
        ),
      ),
      'FormIt' => 
      array (
        'fields' => 
        array (
          'id' => 5,
          'source' => 0,
          'property_preprocess' => false,
          'name' => 'FormIt',
          'description' => 'A dynamic form processing snippet.',
          'editor_type' => 0,
          'category' => 4,
          'cache_type' => 0,
          'snippet' => '/**
 * FormIt
 *
 * Copyright 2009-2012 by Shaun McCormick <shaun@modx.com>
 *
 * FormIt is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * FormIt is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * FormIt; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package formit
 */
/**
 * FormIt
 *
 * A dynamic form processing Snippet for MODx Revolution.
 *
 * @package formit
 */
require_once $modx->getOption(\'formit.core_path\',null,$modx->getOption(\'core_path\',null,MODX_CORE_PATH).\'components/formit/\').\'model/formit/formit.class.php\';
$fi = new FormIt($modx,$scriptProperties);
$fi->initialize($modx->context->get(\'key\'));
$fi->loadRequest();

$fields = $fi->request->prepare();
return $fi->request->handle($fields);',
          'locked' => false,
          'properties' => 
          array (
            'hooks' => 
            array (
              'name' => 'hooks',
              'desc' => 'prop_formit.hooks_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'What scripts to fire, if any, after the form passes validation. This can be a comma-separated list of hooks, and if the first fails, the proceeding ones will not fire. A hook can also be a Snippet name that will execute that Snippet.',
              'area_trans' => '',
            ),
            'preHooks' => 
            array (
              'name' => 'preHooks',
              'desc' => 'prop_formit.prehooks_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'What scripts to fire, if any, once the form loads. You can pre-set form fields via $scriptProperties[`hook`]->fields[`fieldname`]. This can be a comma-separated list of hooks, and if the first fails, the proceeding ones will not fire. A hook can also be a Snippet name that will execute that Snippet.',
              'area_trans' => '',
            ),
            'submitVar' => 
            array (
              'name' => 'submitVar',
              'desc' => 'prop_formit.submitvar_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If set, will not begin form processing if this POST variable is not passed.',
              'area_trans' => '',
            ),
            'validate' => 
            array (
              'name' => 'validate',
              'desc' => 'prop_formit.validate_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'A comma-separated list of fields to validate, with each field name as name:validator (eg: username:required,email:required). Validators can also be chained, like email:email:required. This property can be specified on multiple lines.',
              'area_trans' => '',
            ),
            'errTpl' => 
            array (
              'name' => 'errTpl',
              'desc' => 'prop_formit.errtpl_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '<span class="error">[[+error]]</span>',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'The wrapper template for error messages.',
              'area_trans' => '',
            ),
            'validationErrorMessage' => 
            array (
              'name' => 'validationErrorMessage',
              'desc' => 'prop_formit.validationerrormessage_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '<p class="error">A form validation error occurred. Please check the values you have entered.</p>',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'A general error message to set to a placeholder if validation fails. Can contain [[+errors]] if you want to display a list of all errors at the top.',
              'area_trans' => '',
            ),
            'validationErrorBulkTpl' => 
            array (
              'name' => 'validationErrorBulkTpl',
              'desc' => 'prop_formit.validationerrorbulktpl_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '<li>[[+error]]</li>',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'HTML tpl that is used for each individual error in the generic validation error message value.',
              'area_trans' => '',
            ),
            'trimValuesBeforeValidation' => 
            array (
              'name' => 'trimValuesBeforeValidation',
              'desc' => 'prop_formit.trimvaluesdeforevalidation_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => true,
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Whether or not to trim spaces from the beginning and end of values before attempting validation. Defaults to true.',
              'area_trans' => '',
            ),
            'customValidators' => 
            array (
              'name' => 'customValidators',
              'desc' => 'prop_formit.customvalidators_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'A comma-separated list of custom validator names (snippets) you plan to use in this form. They must be explicitly stated here, or they will not be run.',
              'area_trans' => '',
            ),
            'clearFieldsOnSuccess' => 
            array (
              'name' => 'clearFieldsOnSuccess',
              'desc' => 'prop_formit.clearfieldsonsuccess_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => true,
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If true, will clear the fields on a successful form submission that does not redirect.',
              'area_trans' => '',
            ),
            'successMessage' => 
            array (
              'name' => 'successMessage',
              'desc' => 'prop_formit.successmessage_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If set, will set this a placeholder with the name of the value of the property &successMessagePlaceholder, which defaults to `fi.successMessage`.',
              'area_trans' => '',
            ),
            'successMessagePlaceholder' => 
            array (
              'name' => 'successMessagePlaceholder',
              'desc' => 'prop_formit.successmessageplaceholder_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 'fi.successMessage',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'The placeholder to set the success message to.',
              'area_trans' => '',
            ),
            'store' => 
            array (
              'name' => 'store',
              'desc' => 'prop_formit.store_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => false,
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If true, will store the data in the cache for retrieval using the FormItRetriever snippet.',
              'area_trans' => '',
            ),
            'placeholderPrefix' => 
            array (
              'name' => 'placeholderPrefix',
              'desc' => 'prop_formit.placeholderprefix_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 'fi.',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'The prefix to use for all placeholders set by FormIt for fields. Defaults to `fi.`',
              'area_trans' => '',
            ),
            'storeTime' => 
            array (
              'name' => 'storeTime',
              'desc' => 'prop_formit.storetime_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 300,
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `store` is set to true, this specifies the number of seconds to store the data from the form submission. Defaults to five minutes.',
              'area_trans' => '',
            ),
            'allowFiles' => 
            array (
              'name' => 'allowFiles',
              'desc' => 'prop_formit.allowfiles_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => true,
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If set to 0, will prevent files from being submitted on the form.',
              'area_trans' => '',
            ),
            'spamEmailFields' => 
            array (
              'name' => 'spamEmailFields',
              'desc' => 'prop_formit.spamemailfields_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 'email',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `spam` is set as a hook, a comma-separated list of fields containing emails to check spam against.',
              'area_trans' => '',
            ),
            'spamCheckIp' => 
            array (
              'name' => 'spamCheckIp',
              'desc' => 'prop_formit.spamcheckip_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => false,
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `spam` is set as a hook, and this is true, will check the IP as well.',
              'area_trans' => '',
            ),
            'recaptchaJs' => 
            array (
              'name' => 'recaptchaJs',
              'desc' => 'prop_formit.recaptchajs_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '{}',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `recaptcha` is set as a hook, this can be a JSON object that will be set to the JS RecaptchaOptions variable, which configures options for reCaptcha.',
              'area_trans' => '',
            ),
            'recaptchaTheme' => 
            array (
              'name' => 'recaptchaTheme',
              'desc' => 'prop_formit.recaptchatheme_desc',
              'type' => 'list',
              'options' => 
              array (
                0 => 
                array (
                  'text' => 'formit.opt_red',
                  'value' => 'red',
                  'name' => 'Red',
                ),
                1 => 
                array (
                  'text' => 'formit.opt_white',
                  'value' => 'white',
                  'name' => 'White',
                ),
                2 => 
                array (
                  'text' => 'formit.opt_clean',
                  'value' => 'clean',
                  'name' => 'Clean',
                ),
                3 => 
                array (
                  'text' => 'formit.opt_blackglass',
                  'value' => 'blackglass',
                  'name' => 'Black Glass',
                ),
              ),
              'value' => 'clean',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `recaptcha` is set as a hook, this will select a theme for the reCaptcha widget.',
              'area_trans' => '',
            ),
            'redirectTo' => 
            array (
              'name' => 'redirectTo',
              'desc' => 'prop_formit.redirectto_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `redirect` is set as a hook, this must specify the Resource ID to redirect to.',
              'area_trans' => '',
            ),
            'redirectParams' => 
            array (
              'name' => 'redirectParams',
              'desc' => 'prop_formit.redirectparams_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'A JSON array of parameters to pass to the redirect hook that will be passed when redirecting.',
              'area_trans' => '',
            ),
            'emailTo' => 
            array (
              'name' => 'emailTo',
              'desc' => 'prop_formit.emailto_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `email` is set as a hook, then this specifies the email(s) to send the email to. Can be a comma-separated list of email addresses.',
              'area_trans' => '',
            ),
            'emailToName' => 
            array (
              'name' => 'emailToName',
              'desc' => 'prop_formit.emailtoname_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Optional. If `email` is set as a hook, then this must be a parallel list of comma-separated names for the email addresses specified in the `emailTo` property.',
              'area_trans' => '',
            ),
            'emailFrom' => 
            array (
              'name' => 'emailFrom',
              'desc' => 'prop_formit.emailfrom_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Optional. If `email` is set as a hook, and this is set, will specify the From: address for the email. If not set, will first look for an `email` form field. If none is found, will default to the `emailsender` system setting.',
              'area_trans' => '',
            ),
            'emailFromName' => 
            array (
              'name' => 'emailFromName',
              'desc' => 'prop_formit.emailfromname_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Optional. If `email` is set as a hook, and this is set, will specify the From: name for the email.',
              'area_trans' => '',
            ),
            'emailReplyTo' => 
            array (
              'name' => 'emailReplyTo',
              'desc' => 'prop_formit.emailreplyto_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Optional. If `email` is set as a hook, and this is set, will specify the Reply-To: address for the email.',
              'area_trans' => '',
            ),
            'emailReplyToName' => 
            array (
              'name' => 'emailReplyToName',
              'desc' => 'prop_formit.emailreplytoname_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Optional. If `email` is set as a hook, and this is set, will specify the Reply-To: name for the email.',
              'area_trans' => '',
            ),
            'emailCC' => 
            array (
              'name' => 'emailCC',
              'desc' => 'prop_formit.emailcc_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `email` is set as a hook, then this specifies the email(s) to send the email to as a CC. Can be a comma-separated list of email addresses.',
              'area_trans' => '',
            ),
            'emailCCName' => 
            array (
              'name' => 'emailCCName',
              'desc' => 'prop_formit.emailccname_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Optional. If `email` is set as a hook, then this must be a parallel list of comma-separated names for the email addresses specified in the `emailCC` property.',
              'area_trans' => '',
            ),
            'emailBCC' => 
            array (
              'name' => 'emailBCC',
              'desc' => 'prop_formit.emailbcc_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `email` is set as a hook, then this specifies the email(s) to send the email to as a BCC. Can be a comma-separated list of email addresses.',
              'area_trans' => '',
            ),
            'emailBCCName' => 
            array (
              'name' => 'emailBCCName',
              'desc' => 'prop_formit.emailbccname_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Optional. If `email` is set as a hook, then this must be a parallel list of comma-separated names for the email addresses specified in the `emailBCC` property.',
              'area_trans' => '',
            ),
            'emailReturnPath' => 
            array (
              'name' => 'emailReturnPath',
              'desc' => 'prop_formit.emailreturnpath_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Optional. If `email` is set as a hook, and this is set, will specify the Return-path: address for the email. If not set, will take the value of `emailFrom` property.',
              'area_trans' => '',
            ),
            'emailSubject' => 
            array (
              'name' => 'emailSubject',
              'desc' => 'prop_formit.emailsubject_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `email` is set as a hook, this is required as a subject line for the email.',
              'area_trans' => '',
            ),
            'emailUseFieldForSubject' => 
            array (
              'name' => 'emailUseFieldForSubject',
              'desc' => 'prop_formit.emailusefieldforsubject_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If the field `subject` is passed into the form, if this is true, it will use the field content for the subject line of the email.',
              'area_trans' => '',
            ),
            'emailHtml' => 
            array (
              'name' => 'emailHtml',
              'desc' => 'prop_formit.emailhtml_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => true,
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Optional. If `email` is set as a hook, this toggles HTML emails or not. Defaults to true.',
              'area_trans' => '',
            ),
            'emailConvertNewlines' => 
            array (
              'name' => 'emailConvertNewlines',
              'desc' => 'prop_formit.emailconvertnewlines_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => false,
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If true and emailHtml is set to 1, will convert newlines to BR tags in the email.',
              'area_trans' => '',
            ),
            'emailMultiWrapper' => 
            array (
              'name' => 'emailMultiWrapper',
              'desc' => 'prop_formit.emailmultiwrapper_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '[[+value]]',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Will wrap each item in a collection of fields sent via checkboxes/multi-selects. Defaults to just the value.',
              'area_trans' => '',
            ),
            'emailMultiSeparator' => 
            array (
              'name' => 'emailMultiSeparator',
              'desc' => 'prop_formit.emailmultiseparator_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'The default separator for collections of items sent through checkboxes/multi-selects. Defaults to a newline.',
              'area_trans' => '',
            ),
            'fiarTpl' => 
            array (
              'name' => 'fiarTpl',
              'desc' => 'prop_fiar.fiartpl_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `FormItAutoResponder` is set as a hook, then this specifies auto-response template to send as the email.',
              'area_trans' => '',
            ),
            'fiarToField' => 
            array (
              'name' => 'fiarToField',
              'desc' => 'prop_fiar.fiartofield_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 'email',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `FormItAutoResponder` is set as a hook, then this specifies which form field shall be used for the To: address in the auto-response email.',
              'area_trans' => '',
            ),
            'fiarSubject' => 
            array (
              'name' => 'fiarSubject',
              'desc' => 'prop_fiar.fiarsubject_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '[[++site_name]] Auto-Responder',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `FormItAutoResponder` is set as a hook, this is required as a subject line for the email.',
              'area_trans' => '',
            ),
            'fiarFrom' => 
            array (
              'name' => 'fiarFrom',
              'desc' => 'prop_fiar.fiarfrom_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Optional. If `FormItAutoResponder` is set as a hook, and this is set, will specify the From: address for the email. If not set, will first look for an `email` form field. If none is found, will default to the `emailsender` system setting.',
              'area_trans' => '',
            ),
            'fiarFromName' => 
            array (
              'name' => 'fiarFromName',
              'desc' => 'prop_fiar.fiarfromname_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Optional. If `FormItAutoResponder` is set as a hook, and this is set, will specify the From: name for the email.',
              'area_trans' => '',
            ),
            'fiarReplyTo' => 
            array (
              'name' => 'fiarReplyTo',
              'desc' => 'prop_fiar.fiarreplyto_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Optional. If `FormItAutoResponder` is set as a hook, and this is set, will specify the Reply-To: address for the email.',
              'area_trans' => '',
            ),
            'fiarReplyToName' => 
            array (
              'name' => 'fiarReplyToName',
              'desc' => 'prop_fiar.fiarreplytoname_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Optional. If `FormItAutoResponder` is set as a hook, and this is set, will specify the Reply-To: name for the email.',
              'area_trans' => '',
            ),
            'fiarCC' => 
            array (
              'name' => 'fiarCC',
              'desc' => 'prop_fiar.fiarcc_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `FormItAutoResponder` is set as a hook, then this specifies the email(s) to send the email to as a CC. Can be a comma-separated list of email addresses.',
              'area_trans' => '',
            ),
            'fiarCCName' => 
            array (
              'name' => 'fiarCCName',
              'desc' => 'prop_fiar.fiarccname_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Optional. If `FormItAutoResponder` is set as a hook, then this must be a parallel list of comma-separated names for the email addresses specified in the `emailCC` property.',
              'area_trans' => '',
            ),
            'fiarBCC' => 
            array (
              'name' => 'fiarBCC',
              'desc' => 'prop_fiar.fiarbcc_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `FormItAutoResponder` is set as a hook, then this specifies the email(s) to send the email to as a BCC. Can be a comma-separated list of email addresses.',
              'area_trans' => '',
            ),
            'fiarBCCName' => 
            array (
              'name' => 'fiarBCCName',
              'desc' => 'prop_fiar.fiarbccname_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => '',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Optional. If `FormItAutoResponder` is set as a hook, then this must be a parallel list of comma-separated names for the email addresses specified in the `emailBCC` property.',
              'area_trans' => '',
            ),
            'fiarHtml' => 
            array (
              'name' => 'fiarHtml',
              'desc' => 'prop_fiar.fiarhtml_desc',
              'type' => 'combo-boolean',
              'options' => '',
              'value' => true,
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'Optional. If `FormItAutoResponder` is set as a hook, this toggles HTML emails or not. Defaults to true.',
              'area_trans' => '',
            ),
            'mathMinRange' => 
            array (
              'name' => 'mathMinRange',
              'desc' => 'prop_math.mathminrange_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 10,
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `math` is set as a hook, the minimum range for each number in the equation.',
              'area_trans' => '',
            ),
            'mathMaxRange' => 
            array (
              'name' => 'mathMaxRange',
              'desc' => 'prop_math.mathmaxrange_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 100,
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `math` is set as a hook, the maximum range for each number in the equation.',
              'area_trans' => '',
            ),
            'mathField' => 
            array (
              'name' => 'mathField',
              'desc' => 'prop_math.mathfield_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 'math',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `math` is set as a hook, the name of the input field for the answer.',
              'area_trans' => '',
            ),
            'mathOp1Field' => 
            array (
              'name' => 'mathOp1Field',
              'desc' => 'prop_math.mathop1field_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 'op1',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `math` is set as a hook, the name of the field for the 1st number in the equation.',
              'area_trans' => '',
            ),
            'mathOp2Field' => 
            array (
              'name' => 'mathOp2Field',
              'desc' => 'prop_math.mathop2field_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 'op2',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `math` is set as a hook, the name of the field for the 2nd number in the equation.',
              'area_trans' => '',
            ),
            'mathOperatorField' => 
            array (
              'name' => 'mathOperatorField',
              'desc' => 'prop_math.mathoperatorfield_desc',
              'type' => 'textfield',
              'options' => '',
              'value' => 'operator',
              'lexicon' => 'formit:properties',
              'area' => '',
              'desc_trans' => 'If `math` is set as a hook, the name of the field for the operator in the equation.',
              'area_trans' => '',
            ),
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => '/**
 * FormIt
 *
 * Copyright 2009-2012 by Shaun McCormick <shaun@modx.com>
 *
 * FormIt is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * FormIt is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * FormIt; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package formit
 */
/**
 * FormIt
 *
 * A dynamic form processing Snippet for MODx Revolution.
 *
 * @package formit
 */
require_once $modx->getOption(\'formit.core_path\',null,$modx->getOption(\'core_path\',null,MODX_CORE_PATH).\'components/formit/\').\'model/formit/formit.class.php\';
$fi = new FormIt($modx,$scriptProperties);
$fi->initialize($modx->context->get(\'key\'));
$fi->loadRequest();

$fields = $fi->request->prepare();
return $fi->request->handle($fields);',
        ),
        'policies' => 
        array (
        ),
        'source' => 
        array (
        ),
      ),
    ),
    'modTemplateVar' => 
    array (
    ),
  ),
);