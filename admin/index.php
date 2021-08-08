<?php
require 'core/initialize.php';
require '../connect.php';

$user = new wcms\classes\auth\Login;
$user->require_login();

$page_title = $lang['dashboardTitle'];
      $page = 'dashboard';

  // Delete user //
  if(isset($_POST['Delete'])){
      if (!$conn) {
      die("Error: " . mysqli_connect_error());
          } else {
          $id = mysqli_real_escape_string($conn, $_POST["id"]);
          $sql = "DELETE FROM users WHERE `users`.`id` = '$id'";
          if(mysqli_query($conn, $sql)){  
            echo "Користувача видалено успішно!";
          } else{
            echo "Error: " . mysqli_error($conn);
          }
        mysqli_close($conn);     
      }
    }

include('includes/header.php') ?>

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
                        $payment = '<td style="color: orange">Чекаємо на оплату</td>';
                        if($row["payment"]){
                          $payment = '<td style="color: green">Cплачено</td>';
                        }
                        echo "
                        <tr><td>". $counter .". ". $row["f_name"] ." ". $row["l_name"] ."</td>
                        <td>". $row["email"] ."<br>" . $row["phone"] ."</td>
                        <td>" .$row["event_list"] . "</td>
                        <td>" .$row["total"] . "</td>
                        "  .$payment ."
                        <td>" .$row["date_time"] . "</td>
                        <td><button uk-toggle='target: #modal-delete-".$row["id"]."' type='submit' value='Delete'>Видалити</button></td>
                        </tr>;"        
                }
                          
                        // <!-- This is the modal -->
                        // <div id='modal-delete-".$row["id"]."' uk-modal>
                        //     <form style = 'text-align: center' class='uk-modal-dialog uk-modal-body' style='margin-top: 3em' action='' method='POST'>
                        //       <p class='uk-text'>Ви дійсно хочете видалити користувача <em>". $row["f_name"] ." ". $row["l_name"] . "</em>?</p>
                        //       <p style = 'font-size: 0.8em;'>(Після видалення з бази даних інформацію буде неможливо відновити)</p>
                        //       <input type='hidden' name='id' value='".$row['id']."'>
                        //       <button style = 'margin-right: 2em' class='uk-button uk-button-default uk-modal-close'>Мабуть, ні</button>
                        //       <button class='uk-button uk-button-primary' type='submit' value='Delete'>Так</button>
                        //     </form>
                        // </div>
                        
                    $result->free();
                } else{
                    echo "Error: " . $conn->error;
                }
                //$conn->close();
                ?>
</tbody>  
</table>


 <?php include('includes/footer.php') ?>
