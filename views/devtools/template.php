<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Devtools</title>

	<style type="text/css">

/*
html5doctor.com Reset Stylesheet
v1.6
Last Updated: 2010-08-18
Author: Richard Clark - http://richclarkdesign.com
Twitter: @rich_clark
*/

html, body, div, span, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
abbr, address, cite, code,
del, dfn, em, img, ins, kbd, q, samp,
small, strong, sub, sup, var,
b, i,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, figcaption, figure,
footer, header, hgroup, menu, nav, section, summary,
time, mark, audio, video {
    margin:0;
    padding:0;
    border:0;
    outline:0;
    font-size:100%;
    vertical-align:baseline;
    background:transparent;
}

body {
    line-height:1;
}

article,aside,details,figcaption,figure,
footer,header,hgroup,menu,nav,section {
    display:block;
}

nav ul {
    list-style:none;
}

blockquote, q {
    quotes:none;
}

blockquote:before, blockquote:after,
q:before, q:after {
    content:'';
    content:none;
}

a {
    margin:0;
    padding:0;
    font-size:100%;
    vertical-align:baseline;
    background:transparent;
}

/* change colours to suit your needs */
ins {
    background-color:#ff9;
    color:#000;
    text-decoration:none;
}

/* change colours to suit your needs */
mark {
    background-color:#ff9;
    color:#000;
    font-style:italic;
    font-weight:bold;
}

del {
    text-decoration: line-through;
}

abbr[title], dfn[title] {
    border-bottom:1px dotted inherit;
    cursor:help;
}

table {
    border-collapse:collapse;
    border-spacing:0;
}

/* change border colour to suit your needs */
hr {
    display:block;
    height:1px;
    border:0;
    border-top:1px solid #cccccc;
    margin:1em 0;
    padding:0;
}

input, select {
    vertical-align:middle;
}


/* ================================================= */

body {
	color:#555;
	font:14px/1.5 Helvetica,Arial;
}

p, ul, ol {
	margin:1.5em 0;
}

h1 {
	font-size:2.2em;   /* 14 * 2.2 = 30.8 */
	line-height:0.681;
	margin:0.681em 0;
}

h2 {
	font-size:1.7em;
	line-height:0.882;
	margin:0.882em 0;
}

h3 {
	font-size:1.3em;
	line-height:1.17;
	margin:1.17em 0;
}

h4 {
	margin:1.5em 0;
}

small { font-size:0.8em; }

#wrap { width:960px; margin:0 auto; }

#menu { width:168px; padding:0 20px 0 0; float:left; border-right:2px solid #ddd; }
#menu h2, #menu h3 { text-align:right; }
#menu h2 small { font-size:0.7em }
#menu ul { list-style:none; padding:0; margin:0; text-align:right; }
#menu ul .active { font-weight:bold; }
#menu ul a { color: #555; text-decoration:none; }
#menu ul a:hover { text-decoration:underline; }

#main { float:right; width: 750px; padding-left: 20px; padding-bottom:2em; }

code { font-family: monaco, monospace; }
table { border-collapse: collapse; width: 100%; border:2px solid #ccc; }
    table th,
    table td { padding: 0.4em; text-align: left; vertical-align: top; }
    table th { width: 12em; }
    table tr:nth-child(odd) { background: #eee; }
    table td.pass { color: #191; }
    table td.fail { color: #911; }
table.phpinfo tr:nth-child(1) th { background-color: #555; color: #ccc; text-transform: uppercase;  }
table.phpinfo td { word-break: break-all; word-wrap: break-word; }
table.phpinfo td:nth-child(1) { font-weight: bold; min-width: 150px; white-space: nowrap; }
table.phpinfo tr:nth-child(odd) td:nth-child(odd) { background-color: #ddd; }
table.phpinfo tr:nth-child(even) td:nth-child(odd) { background-color: #eee; }
table.phpinfo table.phpinfo td { white-space: normal; }
#results { padding: 0.8em; color: #fff; font-size: 1.5em; }
#results.pass { background: #191; }
#results.fail { background: #911; }
	</style>

</head>
<body>

	<?php $action = Request::$current->action(); ?>
	<div id="wrap">
		<div id="menu">
			<h2>
                devtools<br />
                <small>by <a href="https://github.com/bluehawk">bluehawk</a></small>
            </h2>
            <h3>
                updates<br />
                <small>by <a href="https://github.com/michal-m">michal-m</a></small>
            </h3>
			<ul>
				<li><?php echo HTML::anchor(Route::get('devtools')->uri(array('action'=>'info')),'Kohana info',array('class'=>($action=='info'?'active':''))) ?></li>
				<li><?php echo HTML::anchor(Route::get('devtools')->uri(array('action'=>'phpinfo')),'PHP info',array('class'=>($action=='phpinfo'?'active':''))) ?></li>
				<li><?php echo HTML::anchor(Route::get('devtools')->uri(array('action'=>'extension')),'Transparent extension',array('class'=>($action=='extension'?'active':''))) ?></li>
				<li><?php echo HTML::anchor(Route::get('devtools')->uri(array('action'=>'routetest')),'Route tester',array('class'=>($action=='routetest'?'active':''))) ?></li>
				<li><?php echo HTML::anchor(Route::get('devtools')->uri(array('action'=>'routes')),'Route dump',array('class'=>($action=='routes'?'active':''))) ?></li>
				<li><?php echo HTML::anchor(Route::get('devtools')->uri(array('action'=>'config')),'Config dump',array('class'=>($action=='config'?'active':''))) ?></li>
				<li><?php echo HTML::anchor(Route::get('devtools')->uri(array('action'=>'message')),'Message dump',array('class'=>($action=='message'?'active':''))) ?></li>
				<li><?php echo HTML::anchor(Route::get('devtools')->uri(array('action'=>'i18n')),'i18n dump',array('class'=>($action=='i18n'?'active':''))) ?></li>
			</ul>
		</div>

		<div id="main">
			<?php echo $content; ?>
		</div>
	</div>
</body>
</html>
