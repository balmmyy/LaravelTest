<h2><?php if(isset($heading)) echo($heading);?></h2>
<?php

echo(Form::open(array('method' => 'POST')));
$nameValue = null;
$ageValue = null;
$statusValue = null;
if(array_key_exists('nameValue',$form)){
	$nameValue = $form['nameValue'];
}

if(array_key_exists('ageValue',$form)){
	$ageValue = $form['ageValue'];
}

if(array_key_exists('statusValue',$form)){
	$statusValue = $form['statusValue'];
}

?><div><?php
	echo(Form::label('memberName', 'Name   : '));
	echo(Form::text('memberName', $nameValue, null));
?><div><?php
	echo(Form::label('memberAge', 'Age    : '));
	echo(Form::text('memberAge', $ageValue, null));
?><div><?php
	echo(Form::label('memberStatus', 'Status : '));
	echo(Form::text('memberStatus', $statusValue, null));
?><div><?php
	echo(Form::submit('Submit'));
echo(Form::close());
?>
<br><br>
<a href="<?php echo(URL::action('home'));?>">BACK</a>
