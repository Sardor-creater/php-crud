<?php

include_once('config.php');
$user_fun = new Userfunction();

$select = $user_fun->select("contacts");


?>

<ul class="list-group" style="width: 20rem;">
    <li class="list-group-item py-3">
        <p class="card-text">Список контактов</p>
    </li>

    <?php if($select){ foreach($select as $key => $se_data){ ?>
        <li class="list-group-item">
            <?php echo $se_data['name']; ?>
            <button type="button" class="delete btn" data-data-id="<?php echo $se_data['id']; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>

            <span class="small d-block secondary"><?php echo $se_data['phone']; ?></span>
        </li>
    <?php }}else{ echo "<tr><td colspan='7'><h2>Список пуст</h2></td></tr>"; } ?>
</ul>
