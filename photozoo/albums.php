<?php include('includes/overallheader.php'); ?>                
				
<h1>Albums</h1>

<?php

$albums=get_albums();

if(empty($albums)){
	echo '<p>You don\'t have any albums</p>';
}else{
	foreach($albums as $album){
		echo '<p><a href="view_album.php?album_id=',$album['id'],'">',$album['name'],'</a>(',$album['count'],'images)<br/>
		',$album['description'],'...<br/>
		<a href="edit_album.php?album_id=',$album['id'],'">Edit</a>/<a href="delete_album.php?album_id=',$album['id'],'">Delete</a>
		</p>';
		echo '<br/>';
	}
}
?>
				
				
<?php include('includes/overallfooter.php'); ?>  


