<?php
/*
 * templates liste messages deja lue
 */
?>



    <tr class="msg_dejaLue">
        <th scope="row"><?= $id ?></th>
        <td><a href="<?= $msg->getExpediteur()->getId() ?>"><?= mb_strimwidth($msg->getExpediteur()->getNom(), 0, 10, "...") ?></a></td>

        <td><?=  mb_strimwidth($msg->htmlText(), 0, 10, "...");?></td>
        <td><i><?= $msg->htmlDate() ?></i></td>
        <td>
            <a class="badge badge-warning" href="id=<?= $id ?>">Lire message</a>
            <a class="badge badge-danger" href="id=<?= $id ?>">Suprimer</a>

        </td>
    </tr>




