<?php
require 'core/initialize.php';
require '../connect.php';

$user = new wcms\classes\auth\Login;
$user->require_login();?>

<?php $page_title = $lang['dashboardTitle'];
      $page = 'dashboard';
?>
<?php include('includes/header.php') ?>

<section style="padding: 0">
  <!-- <div class="container"> -->
    <h1 class="ui-title-1" style="font-size: 28px"> <?php echo $lang['dashboard'] ?> </h1>
  <!-- </div> -->
</section>
<!-- <section id="info" style="padding: 30px 0;"></section> -->
<?php
$sql = "SELECT * FROM users";
if($result = $conn->query($sql)){
                    $rowsCount = $result->num_rows;
                    echo "<div class='uk-text-primary'>Всього записів: ". $rowsCount ."</div>";
?>
<table class="uk-table uk-table-striped" style="font-size: 0.9em">
<thead>
  <tr>
    <th>Ім'я та прізвище</th>
    <th>Контакти</th>
    <th>Вибрані івенти</th>
    <th>Сумарна вартість</th>
    <th>Статус оплати</th>
    <th>Час реєстрації</th>
    <th>Видалити</th>
  </tr>
</thead>
<tbody>
<?php
                    $counter = 0;
                        foreach($result as $row){
                        $counter++;
                        echo "
                        <tr><td>". $counter .". ". $row["f_name"] ." ". $row["l_name"] ."</td>
                        <td>". $row["email"] ."<br>" . $row["phone"] ."</td>
                        <td>" .$row["event_list"] . "</td>
                        <td>" .$row["total"] . "</td>
                        <td>"  .$row["payment"] ."</td>
                        <td>" .$row["date_time"] . "</td>
                        <td><button uk-toggle='target: #modal-delete-".$row["id"]."' type='submit' value='Delete'>Видалити</button></td>
                        </tr>

                            <div id='modal-delete-".$row["id"]."' uk-modal>
                            <form class='uk-modal-dialog uk-modal-body' action='delete.php' method='post'>
                                <p class='uk-text-large'>Ви справді хочете видалити користувача <b><i>". $row["f_name"] . "</i></b>?</p>
                                <p class='uk-text-center'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <button class='uk-button uk-button-default uk-modal-close' type='button'>Cancel</button>
                                    <button class='uk-button uk-button-primary' type='submit' value='Delete'>Yes!</button>
                                </p>
                            </form>
                            </div>
                            ";
                    }
                    $result->free();
                } else{
                    echo "Error: " . $conn->error;
                }
                $conn->close();
                ?>
</tbody>  
</table>


 <?php include('includes/footer.php') ?>
