<h2>Member List</h2>
<table border="1">
<tr>
	<th>Name</th>
	<th>Age</th>
	<th>Status</th>
	<th>EDIT</th>
	<th>DELETE</th>
</tr>
<?php
if(count($member)==0){
	?><tr><td colspan="9" align="center">No Documents Found.</td></tr><?php
}
for($i=0; $i<count($member); $i++){
	?><tr>
		<td><?php
			if(array_key_exists('memberName', $member[$i])){
				echo($member[$i]['memberName']);
			}
		?></td>
		<td><?php
			if(array_key_exists('memberAge', $member[$i])){
				echo($member[$i]['memberAge']);
			}
		?></td>
		<td><?php
			if(array_key_exists('memberStatus', $member[$i])){
				echo($member[$i]['memberStatus']);
			}
		?></td>

		<td><?php
			echo(Form::open(['route' => ['home_edit', $member[$i]['_id']], 'method' => 'put']) );
			echo(Form::submit('Edit') );
			echo(Form::close() );
		?></td>

		<td><?php
			echo(Form::open(['route' => ['home_delete', $member[$i]['_id']], 'method' => 'delete']) );
			echo(Form::submit('Delete') );
			echo(Form::close() );
		?></td>

		<!--<td><a href="<?php echo(URL::action('home_edit', array($member[$i]['_id']))); ?>">EDIT</td>-->
		<!--<td><a href="<?php echo(URL::action('home_delete', array($member[$i]['_id']))); ?>">DELETE</td>-->
	</tr><?php
}
?>
</table>
<br>
<?php
echo(Form::open(['route' => ['home_add'], 'method' => 'put']) );
echo(Form::submit('ADD NEW MEMBER') );
echo(Form::close() );
?>
<!--<a href="<?php echo(URL::action('home_add'));?>">ADD NEW MEMBER</a>-->
