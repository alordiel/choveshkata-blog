<?php 
	require 'con-fi-g.php';
	//gets the total amount of the users submited
	$sql_count="SELECT COUNT(name) as total FROM info";
	$res_count1=mysql_fetch_array(mysql_query($sql_count));
	$res_count=$res_count1['total'];
	
	//gets the total amount of e-books
	$sql_sum_eb="SELECT SUM(ebook) as sumeb FROM info";
	$res_sum_eb1=mysql_fetch_array(mysql_query($sql_sum_eb));
	$res_sum_eb=$res_sum_eb1['sumeb'];
	
	//gets the total amount of x-books
	$sql_sum_pb="SELECT SUM(xbook) as sumpb FROM info";
	$res_sum_pb1=mysql_fetch_array(mysql_query($sql_sum_pb));
	$res_sum_pb=$res_sum_pb1['sumpb'];
	
	//gets the amounts of books that were paid
	$sql_sum_paid_e="SELECT SUM(ebook) as epaid FROM info WHERE paid IS NOT NULL";
	$sql_sum_paid_x="SELECT SUM(xbook) as xpaid FROM info WHERE paid IS NOT NULL";
	$res_sum_paid_e=mysql_fetch_array(mysql_query($sql_sum_paid_e));
	$res_sum_paid_x=mysql_fetch_array(mysql_query($sql_sum_paid_x));
	$res_sum_paid_e=$res_sum_paid_e['epaid'];
	$res_sum_paid_x=$res_sum_paid_x['xpaid'];
 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Питър Бийгъл "Песента на ханджията"</title>
	<link rel="stylesheet" href="includes/css/style.css" type="text/css">

	<script type="text/javascript">
	function checkbox (x){
		var q_paper=document.getElementById('q_paper');
		var q_e_book=document.getElementById('q_e_book');
		if (x.id=="paper") {
			if (x.checked == true) {
				q_paper.disabled=false;
				return;
			}
			else{
				q_paper.value="";
				q_paper.disabled=true;
			};
		};
		if (x.id=="e-book") {
			if (x.checked== true) {
				q_e_book.disabled=false;
				return;
			}
			else{
				q_e_book.value="";
				q_e_book.disabled=true;
			};
		};
	}
	function resett(){
		document.getElementById('name').value="";
		document.getElementById('email').value="";
		document.getElementById('message').value="";
		document.getElementById('q_paper').value="";
		document.getElementById('q_e_book').value="";	
		document.getElementById('q_e_book').disabled=true;
		document.getElementById('q_paper').disabled=true;
		var x=document.getElementById('e-book');
		var y=document.getElementById('paper');
		if (x.checked==true){
			x.checked=false;
		}
		if (y.checked==true){
			y.checked=false;
		}
	}
	function validate(){
		var fld_name=document.getElementById('name');
		var fld_mail=document.getElementById('email');
		// var fld_msg=document.getElementById('message');
		var fld_q_pp=document.getElementById('q_paper');
		var fld_q_eb=document.getElementById('q_e_book');	
		var chkbx_eb=document.getElementById('e-book');
		var chkbx_pp=document.getElementById('paper');

		if ( fld_mail.value=="" || fld_name.value=="") {
			alert("Моля, проверете дали полето за име и е-поща са попълнени.");
			return false;
		};
		if (chkbx_pp.checked==true && fld_q_pp.value=="" ) {
			alert("Моля, въведете поне една бройка в полето за хартиена книга или изкючете селекцията.");
			return false;	
		};
		if (chkbx_eb.checked==true && fld_q_eb.value=="" ) {
			alert("Моля, въведете поне една бройка в полето за електронна книга или изкючете селекцията.");
			return false;	
		};
		if (fld_q_eb.value=="" && fld_q_pp.value=="") {
			alert("Моля, изберете поне едно бройка от е-книга или хартиена книга.");
			return false;	
		};
		var pattern=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z0-9_.-])+/;
		if (!pattern.test(fld_mail.value)){
    		alert("Грешено въведена електронна поща. Но все пак е възможно и валидаторът ни да не допуска съществуването на такава поща. В такъв случай се свържете директно с нас - poslednorog at gmail dot com ");
			return false;
    	}
	}
	</script>

</head>
<body>
<div id="main_container">
	<div id="second_container">
		<div id="header_1">
		</div>
		<div id="header_2">
		</div>
		<div id="txt">
			<p>Приятели,</p>
			<p>Помните ли <a href="http://choveshkata.net/blog/?page_id=106">„Последният еднорог“</a> – книгата, поставила началото на <a href="http://choveshkata.net/blog/?page_id=103">„Човешката библиотека“</a>? Нашата библиотечна <a href="http://choveshkata.net/blog/?page_id=13">поредица</a>, която мечтае да събере между кориците си топли текстове, без да се бои от различия в жанрове и теми. Всяка от избраните книги таи силата да ни направи по-чувстващи, по-копнеещи и способни да видим света през очите на другия. Всяка ненатрапчиво ни насърчава да откриваме и сбъдваме онова, за което мечтаем, да бъдем по-волни и безстрашни в самото мечтаене. И когато затворим последната страница, да сме станали по-топли – вътре в нас, към околните хора, към целия свят: да сме станали по-човечни. (Ето как дойде и името на поредицата.)</p>
			<p>Днес, седем години по-късно, екипът на Човешката библиотека ви представя (със затаен дъх :) <a href="http://choveshkata.net/blog/?page_id=4919">превода на „Песента на ханджията“</a> – друг роман на Питър С. Бийгъл. Вероятно най-изящният му… но това ще прецените сами. Оставете се на песента, понесете се по нея...</p>
			<p><em>Три мистични жени, три опасни магьосници, три вълшебни самодиви изплуват от мрака и не вървят пряко към обичайните пътеки от светлина, а се крият в сенките, водени от закони и обещания, които отдавна са престъпили... и все пак горят, <span style="font-weight:bold">горят</span> отвътре да спазят.</em></p>
			<p><em>Шепи от улики към несъществуващи престъпления, нишки на загадки, които не търсят решение, капки идеи, които попиват и покълнват седмици след последните думи. </em></p>
			<p><em>Една магична история, изпълзяла изпод кълба непрогледна мъгла, водена от мелодия отвъд живота, водеща към дълбините на смъртта, и отвъд...</em></p>
			
			<p>... Ако искате да сте По-желали – онези читатели, които вярват с ум и сърце, че тази книга заслужава да влезе в поредица „Човешката библиотека“ – по-желайте книгата във формата по-долу!</p>
			<p>Ако искате да продължим да издаваме преводни книги – помогнете ни!</p>
			<p>„Песента на ханджията“ е готова като <a href="http://choveshkata.net/blog/?p=4917">електронно издание</a>. На хартия ще я издадем само ако се съберат поне 300 предварителни поръчки, от които поне 100 – предплатени.</p>
			<p>Разчитаме на вашата помощ с разгласата. Целта ни е дръзка: поне 700 платени книги. За да има смисъл чутовният труд на преводаческо-редакторската ни кавалкада. Разказваме подробностите в този <a href="http://choveshkata.net/blog/?p=3471">запис.</a></p>
			<p>„Песента“ струва 4 лева в <a href="http://choveshkata.net/blog/?p=4917">електронен вариант</a>. Цената ѝ на хартия вероятно ще е 12 лева (зависи от броя на поръчалите). Може да платите е-изданието или да предплатите хартиеното по някой от <a href="http://choveshkata.net/blog/?page_id=180" target="blank">тези начини</a>.</p>
			<p>Ето и събраните до момента поръчки: </p>
			<ul><li><p>Поръчани е-книги: <?php echo  $res_sum_eb; ?></p></li>
			<li><p>Поръчани х-ниги: <?php echo  $res_sum_pb; ?></p></li>
			<li><p>Платени е-книги: <?php echo $res_sum_paid_e; ?></p></li>
			<li><p>Платени х-ниги: <?php echo $res_sum_paid_x; ?></p></li></ul>
			<p>Ако искате да се включите с друга помощ при разгласата – споделете в <a href="http://www.choveshkata.net/forum/viewtopic.php?f=20&t=608">специалната ни тема във форума</a> или ни пишете през формата долу.</p>
			<p>Ако още се колебаете – <a href="http://choveshkata.net/blog/?page_id=4933">надникнете в книгата</a>.<p>
			
		<div id="forma">
			<form action="save.php" method="post" onsubmit="return validate()">
				<fieldset>
					<!--<label for="name">Name:</label>-->
					<input type="text" id="name" name="fld_name" placeholder="Въведете име и фамилия">
					<!--<label for="email">Email:</label>-->
					<input type="email" id="email" name="fld_mail" placeholder="Въведете e-mail адрес">
					<!--<label for="message">Message:</label>-->
					<textarea id="message" name="fld_msg" placeholder="Искате нещо да ни кажете?" max="2000"></textarea>
					<div class="checkbox">
			        	<input type="checkbox" id="e-book" name="booktype" onclick='checkbox(this)'>
			        	<label for="e-book">е-книга</label>
			        	<input type="number" name="q_ebook" min="1"  disabled id="q_e_book">
			        	<label for="q_ebook">броя</label><br>
			        	<input type="checkbox" id="paper" onclick='checkbox(this)' name="booktype">
			        	<label for="paper">хартиена книга</label>
			        	<input type="number" name="q_pbook" min="1" disabled  id="q_paper">
			        	<label for="q_paperbook">броя</label><br>
			        </div>
					<input type="submit" name="submit" value=""><br>
					<input type="button"  onclick="resett()" value="Изчисти">
				</fieldset>
			</form>
		</div>
		<div id="do_forma"><img style="width: 254px !important;" src="./includes/images/Pesenta_korica-e.jpg">
		<p style="text-align:center;">Художник: Катерина Данаилова</p>
		</div>
		<div class="clearfix">
		</div>
			<!--<div style="margin-left: 130px;"><img style="margin-top: 13px;" src="./includes/images/innkeeperswebfox.jpg"></div>-->
			<p class="italic">... Отяздиха със изгрева на слънцето над тях,<br>бялата като кралица, черната като монах,<br>кафявата запяла, на радост глашатай,<br>а аз ще имам да си търся нов ратай...
			</p>
		</div><!-- end class= "txt"-->
		<div class="clearfix">
		</div>
		<div id="links">
			<div id="links_1colomn">
				<p>Линкове за любопитните:</p><br>
				<a href="https://bg.wikipedia.org/wiki/%D0%9F%D0%B8%D1%82%D1%8A%D1%80_%D0%91%D0%B8%D0%B9%D0%B3%D1%8A%D0%BB" target="blank">&raquo; Повече за Питър Бийгъл</a><br>
				<a href="http://www.peterbeagle.com/index2.shtml" target="blank">» www.peterbeagle.com</a><br>
				<a href="http://www.goodreads.com/book/show/11938.The_Innkeeper_s_Song" target="blank">» The Innkeeper's Song в Goodreads</a><br>
				<a href="http://books.google.bg/books?id=UKoGAAAACAAJ&sitesec=reviews&hl=bg" target="blank">» Рецензии от читатели</a><br>
				<a href="http://annahells.wordpress.com/2013/03/29/%D0%BF%D0%B5%D1%81%D0%B5%D0%BD%D1%82%D0%B0-%D0%BD%D0%B0-%D1%85%D0%B0%D0%BD%D0%B4%D0%B6%D0%B8%D1%8F%D1%82%D0%B0/">» Анна Хелс за Песента</a>
			</div>
			<div id="links_1colomn"></div>
			<div class="clearfix">
			<div>
			<p><em>„Бийгъл озарява със собствена магия такива обикновени неща като призраците, еднорозите и върколаците. Години наред любящи читатели се допитват до него за онези доводи на сърцето, при които разумът немее.“</em> (Урсула Ле Гуин)<p>
			
			</div>
			</div>
		</div><!-- end "links"-->
	</div><!-- end "second_container"-->
	<p class="footer">Чувствайте се свободни да споделяте тази страница!</p>
	<!--h6 class="footer4e"><em>Използвани са илюстрации от <a href="http://kirasanta.deviantart.com/">тук</a> и <a href="http://www.taringa.net/posts/imagenes/1272560/John-Jude-Palencar-Ilustraciones-parte-1.html">тук</a>. Някои права запазени, други не.</em></h6>-->
</div><!-- end "main_container"-->
</body>
</html>
