<?php
/*
 * templates liste messages non lus
 *
 */
?>





    <tr class="ajx">
        <th scope="row"><?= $id ?></th>
        <td><a href="<?= $msg->getExpediteur()->getId() ?>"><?= mb_strimwidth($msg->getExpediteur()->getNom(), 0, 10, "...") ?></a></td>

        <td><?=  mb_strimwidth($msg->htmlText(), 0, 10, "...");?></td>
        <td><i><?= $msg->htmlDate() ?></i></td>
        <td>
            <a class="badge badge-warning" href="id=<?= $id ?>">Lire message</a>
            <a class="badge badge-success" href="id=<?= $id ?>">Reponse rapide</a>
        </td>

    </tr>








