
<style type="text/css">

html body {
	margin-top: 50px !important;
}

#top_form {
	position: fixed;
	top:0;
	left:0;
	width: 100%;
	
	margin:0;
	
	z-index: 2100000000;
	-moz-user-select: none; 
	-khtml-user-select: none; 
	-webkit-user-select: none; 
	-o-user-select: none; 
	
	border-bottom:1px solid #151515;
	
    background: #b1e4f575;
	
	height:45px;
	line-height:45px;
}

#top_form input[name=url] {
	width: 550px;
	height: 20px;
	padding: 5px;
	font: 13px "Helvetica Neue",Helvetica,Arial,sans-serif;
	border: 0px none;
	background: none repeat scroll 0% 0% #FFF;
	display: inline;
}
</style>

<script>
var url_text_selected = false;

function smart_select(ele){

	ele.onblur = function(){
		url_text_selected = false;
	};
	
	ele.onclick = function(){
		if(url_text_selected == false){
			this.focus();
			this.select();
			url_text_selected = true;
		}
	};
}
</script>
<?php if($url) : ?>
<div id="top_form">

	<div style="width:90%; margin:0 auto;">
		<a href='/search.php'>Home</a>
		<!-- <h6><?php echo $url; ?></h6> -->
		<input type="text" name="url" value="<?php echo $url; ?>" autocomplete="off" disabled id="url">
	</div>
	
</div>
<?php endif; ?>
<script type="text/javascript">
	smart_select(document.getElementsByName("url")[0]);
</script>
