<?php

header('Content-type: application/vnd.ms-excel; encoding="UTF-8"');
header("Content-Disposition: attachment; filename=".$filename);
header("Pragma: no-cache");
header("Expires: 0");

$fields = array(
				'facebook_user_id' => 'ID',
				'first_name' => 'Nombre',
				'last_name' => 'Apellido',
				'email' => 'Email',
				'dni' => 'DNI',
				'user_status' => 'ESTADO'
);
?>
<h3>
<?php echo $title ?>
</h3>
<h4>
<?php 
if($desde == 'null' && $hasta == 'null')
{
    echo 'Todos los resultados';
}else{
    if($desde != 'null' && $hasta != 'null')
    {
        echo 'Resultados filtrados desde '.$desde.' hasta '.$hasta;
    }else{
        if($desde == 'null')
        {
            echo 'Resultados filtrados de inicio hasta '.$hasta;
        }else{
            echo 'Resultados filtrados desde '.$desde.' al final';
        }
    }
}
?>
</h4>
<table border="1" cellspacing="0" cellpadding="0">
	<thead>
            <tr align="center" valign="top" bgcolor="#DDDDDD">
                <th>DATO</th>
                <th>VALOR</th>
            </tr>
	</thead>
	<tbody>
            <tr class="publication_status">
                <td>Cantidad de usuarios &uacute;nicos</td>
                <td><?php echo $ammount_users; ?></td>
            </tr>
            <tr class="publication_status">
                <td>Cantidad de amigos invitados</td>
                <td><?php echo $ammount_invite_friends; ?></td>
            </tr>
            <tr class="publication_status">
                <td>Cantidad de noticias publicadas</td>
                <td><?php echo $ammount_tips; ?></td>
            </tr>
            <tr class="publication_status">
                <td>Cantidad de likes en las noticias</td>
                <td><?php echo $ammount_likes_tips; ?></td>
            </tr>
            <tr class="publication_status">
                <td>Cantidad de unlikes en las noticias</td>
                <td><?php echo $ammount_unlikes_tips; ?></td>
            </tr>
            <tr class="publication_status">
                <td>Cantidad de comentarios en las noticias</td>
                <td><?php echo $ammount_comments_tips; ?></td>
            </tr>
            <tr class="publication_status">
                <td>Cantidad de comentarios borrados en las noticias</td>
                <td><?php echo $ammount_uncomments_tips; ?></td>
            </tr>
            <tr class="publication_status">
                <td>Cantidad de tweets en las noticias</td>
                <td><?php echo $ammount_tweets_tips; ?></td>
            </tr>
            <tr class="publication_status">
                <td>Cantidad de likes en los videos</td>
                <td><?php echo $ammount_likes_video; ?></td>
            </tr>
            <tr class="publication_status">
                <td>Cantidad de unlikes en los videos</td>
                <td><?php echo $ammount_unlikes_video; ?></td>
            </tr>
            <tr class="publication_status">
                <td>Cantidad de comentarios en los videos</td>
                <td><?php echo $ammount_comments_video; ?></td>
            </tr>
            <tr class="publication_status">
                <td>Cantidad de comentarios borrados en los videos</td>
                <td><?php echo $ammount_uncomments_video; ?></td>
            </tr>
            <tr class="publication_status">
                <td>Cantidad de tweets en los videos</td>
                <td><?php echo $ammount_tweets_video; ?></td>
            </tr>
	</tbody>
</table>


