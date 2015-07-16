<?php
/*if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
    if(!headers_sent()) {
        header("Status: 301 Moved Permanently");
        header(sprintf(
            'Location: https://%s%s',
            $_SERVER['HTTP_HOST'],
            $_SERVER['REQUEST_URI']
        ));
        exit();
    }
}
$connect = mysqli_connect("host", "user", "pass", "db"); //Real details go here
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   function filta($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
  $rows = $_POST['row'];
  foreach($rows as $index => $row) {
    $name = $row['name'];
    $email = $row['email'];
    $date = $row['date'];
    $note = $row['note'];

    if(empty($name) && empty($email) && empty($date) && empty($note) && $index == 0) {
      $errorMsg = "<div class=\"bg-danger\" style=\"margin: 5px 15%; padding: 5px;\"><p class=\"text-danger\">Sorry, there was an error because you did not fill in all of the
      required fields. Please try again and make sure all required fields are completed before submitting. Click on the \"x\" next to additional rows to delete them
      if necessary.
      </p></div>";
      break;
    }
    elseif(empty($name) && empty($email) && empty($date) && empty($note)) {
      continue;
    }
    elseif(empty($name) || empty($email) || empty($date)) {
      $errorMsg = "<div class=\"bg-danger\" style=\"margin: 5px 15%; padding: 5px;\"><p class=\"text-danger\">Sorry, there was an error because you did not fill in all of the
      required fields. Please try again and make sure all required fields are completed before submitting. Click on the \"x\" next to additional rows to delete them
      if necessary.
      </p></div>";
      break;
    }
    elseif(!preg_match('/^[a-zA-Z -\']*$/', $name)) {
      $errorMsg = "<div class=\"bg-danger\" style=\"margin: 5px 15%; padding: 5px;\"><p class=\"text-danger\">Sorry, there was an error: names entered
      must only consist of letters, apostrophes, dashes, and spaces. Please try again and make sure all required fields are completed appropriately before submitting.
      </p></div>";
      break;
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errorMsg = "<div class=\"bg-danger\" style=\"margin: 5px 15%; padding: 5px;\"><p class=\"text-danger\">Sorry, there was an error: one or more
      of the emails you entered was invalid. Please try again and make sure all required fields are completed appropriately before submitting.
      </p></div>";
      break;
    }
    //All good so far: filter and insert w/ prepared stmt

   else {
    $name = filta($name);
    $email = filta($email);
    $date = filta($date);
    $note = filta($note);

      $stmt = $connect->stmt_init();
      if($stmt->prepare("INSERT INTO `coolness` (`name`, `email`, `date`, `note`) VALUES (?, ?, ?, ?)")) {
            $stmt->bind_param("ssss", $name, $email, $date, $note);
            $stmt->execute();
            $stmt->close();
      }
      else {
        $errorMsg = "<div class=\"bg-danger\" style=\"margin: 5px 15%; padding: 5px;\"><p class=\"text-danger\">Sorry, there was an error with
        the database. Please tell Nikki if you see this message.
      </p></div>";
      }

   }
  }
  if (empty($errorMsg)) {
    $successMsg = "<div class=\"bg-success\" style=\"margin: 5px 15%; padding: 5px;\"><p class=\"text-success\">
    Form submitted successfully. You will now receive an appropriately timed email reminders for cluster food duty &mdash; no need to check your redbook or
    have your advisor remind you!
      </p></div>";
  }

}
*/
?>


<!DOCTYPE html>
<!-- By Nikki Kang-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <style>
    body {
    background-color: #eee !important;
    font-family: Lato;
    font-weight: 300;
    font-style: normal;
    font-size: 28px;
    }

    .smaller {
      font-size: 16px;
      margin-left: 15%;
      margin-right: 15%;
    }
    .text-success, .text-danger {
      font-size: 16px;
    }
    h1 {
    color: #880c00;
    font-family: Lato;
    font-weight: 300;
    font-size: 50px;
    }
    form {
      font-size: 16px;
      margin: 20px 2%;
    }
    label {
      font-weight: 400;
    }
    .btn-default {
      color: #880c00;
    }
    .close {
      font-size: 25px;
      font-weight: 900;
    }
    .placeholder
{
  color: #aaa;
}
</style>
    <title>Cluster Snack Sign-up Reminders</title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>


    <div class="container">
        <h1 class="text-center" style="margin-top: 50px;">Cluster Snack Email Reminders</h1>
        <p class="text-center">Now you have no excuse</p>
                <?php echo $successMsg;
        echo $errorMsg;
        ?>
                <p class="text-center smaller">This app will send you an email reminder at 2:30 p.m. the day before you are on for cluster food. The cluster
                dates provided in the form are accurate.</p>
                      <p class="text-center smaller">Your whole cluster can sign up at once together with as many fields as you need, or you can sign up individually.</p>

        <p class="text-center smaller">Please view on a computer! (Works fine on other devices but looks ugly.)</p>

        <div class="alert alert-info smaller text-center" role="alert"><strong>Update July 14 2015:</strong> This app is no longer live! Submitting has been disabled.</div>

              <noscript>
              <div class="row"><div class="bg-danger col-md-6 col-md-offset-3">
                <p class="text-danger">
                  You currently do not have JavaScript enabled. Please enable JavaScript in your browser and then reload the page.
                  Click <a href="http://www.enable-javascript.com/" target="_blank">here</a> to learn how to enable JavaScript.
                </p>
              </div></div>
          </noscript>
        <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <!--Input-->
                        <div class="row">
                        <input id="checkit1" type="hidden" name="row[0][checkit]" value="full">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Name" name="row[0][name]" maxlength="50" value="<?php echo "$name1"; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" placeholder="Email (UHS)" name="row[0][email]" maxlength="255" value="<?php echo "$email1"; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date">Cluster Date (M/D/Y):</label>
                                <select class="form-control" id="date" name="row[0][date]" value="<?php echo "$date1"; ?>">
                                        <option value="0">Will bring snack on...</option>
                                        <option value="2015-01-09">1/9/15</option><option value="2015-01-12">1/12/15</option><option value="2015-01-23">1/23/15</option>
                                        <option value="2015-01-30">1/30/15</option><option value="2015-02-06">2/6/15</option>
                                        <option value="2015-02-13">2/13/15</option><option value="2015-02-27">2/27/15</option>
                                        <option value="2015-03-13">3/13/15</option><option value="2015-03-20">3/20/15</option>
                                        <option value="2015-04-03">4/3/15</option><option value="2015-04-17">4/17/15</option>
                                        <option value="2015-05-01">5/1/15</option><option value="2015-05-08">5/8/15</option>
                                        <option value="2015-05-15">5/15/15</option><option value="2015-05-19">5/19/15</option>
                                </select>
                        </div>
                    </div>
                          <div class="col-md-3">
                            <div class="col-md-10">
                            <div class="form-group">
                                <label for="note">Note (optional):</label>
                                <input type="text" class="form-control" id="note" placeholder="E.g. coffee" name="row[0][note]" maxlength="300" value="<?php echo "$note1"; ?>">
                            </div>
                            </div>
                            <div class="col-md-2">
                            </div>

                        </div>

                        </div>
                        <hr class="hidden-md hidden-lg" />

                        <div id="moreFields">
                          <!-- more fields here -->
                        </div>
          <!--/Input-->

        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="height: 40px; margin-top: 6px; margin-bottom: 15px;">
                <button type="button" class="btn btn-default btn-lg btn-block" id="addField" style="height: 100%; text-align: center;"><strong>+</strong></button>
            </div>
        </div>
          <span class="help-block text-center">Make sure all rows are complete before submitting. Click on the "x" next to additional rows to remove them if necessary.</span>
  <button class="btn btn-lg btn-default center-block disabled">Submit</button> <!--submit disabled-->
        <span class="help-block text-center" style="margin-top: 15px;">This information will be stored in a secure database and removed when no longer needed.</span>
        </form>




    </div> <!-- /container -->
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
        var numberFields = 0;
        $("#addField").click(function(){
          numberFields++;
            var anotherField = "";
            anotherField += "                        <div class=\"row\">";
            anotherField += "                        <input id=\"checkit\" type=\"hidden\" name=\"row[" + numberFields + "][checkit]\" value=\"full\">";
            anotherField += "                        <div class=\"col-md-3\">";
            anotherField += "                            <div class=\"form-group\">";
            anotherField += "                               <input type=\"text\" class=\"form-control\" id=\"name\" placeholder=\"Name\" name=\"row[" +numberFields + "][name]\" maxlength=\"50\">";
            anotherField += "                            <\/div>";
            anotherField += "                        <\/div>";
            anotherField += "                        <div class=\"col-md-3\">";
            anotherField += "                            <div class=\"form-group\">";
            anotherField += "                                <input type=\"text\" class=\"form-control\" id=\"email\" placeholder=\"Email (UHS)\" name=\"row[" + numberFields + "][email]\" maxlength=\"255\">";
            anotherField += "                            <\/div>";
            anotherField += "                        <\/div>";
            anotherField += "                        <div class=\"col-md-3\">";
            anotherField += "                            <div class=\"form-group\">";
            anotherField += "                                <select class=\"form-control\" id=\"date\" name=\"row[" + numberFields + "][date]\">";
            anotherField += "                                        <option value=\"0\">Will bring snack on...<\/option>";
            anotherField += "                                        <option value=\"2015-01-09\">1\/9\/15<\/option><option value=\"2015-01-12\">1/12/15</option><option value=\"2015-01-23\">1\/23\/15<\/option>";
            anotherField += "                                        <option value=\"2015-01-30\">1\/30\/15<\/option><option value=\"2015-02-06\">2\/6\/15<\/option>";
            anotherField += "                                        <option value=\"2015-02-13\">2\/13\/15<\/option><option value=\"2015-02-27\">2\/27\/15<\/option>";
            anotherField += "                                        <option value=\"2015-03-13\">3\/13\/15<\/option><option value=\"2015-03-20\">3\/20\/15<\/option>";
            anotherField += "                                        <option value=\"2015-04-03\">4\/3\/15<\/option><option value=\"2015-04-17\">4\/17\/15<\/option>";
            anotherField += "                                        <option value=\"2015-05-01\">5\/1\/15<\/option><option value=\"2015-05-08\">5\/8\/15<\/option>";
            anotherField += "                                        <option value=\"2015-05-15\">5\/15\/15<\/option><option value=\"2015-05-19\">5\/19\/15<\/option>";
            anotherField += "                                <\/select>";
            anotherField += "                        <\/div>                        ";
            anotherField += "                    <\/div>";
            anotherField += "                          <div class=\"col-md-3\">";
            anotherField += "                            <div class=\"col-md-10\">";
            anotherField += "                            <div class=\"form-group\">";
            anotherField += "                                <input type=\"text\" class=\"form-control\" id=\"note\" placeholder=\"E.g. coffee\" name=\"row["+ numberFields +"][note]\" maxlength=\"300\">";
            anotherField += "                            <\/div>";
            anotherField += "                            <\/div>";
            anotherField += "                            <div class=\"col-md-2\">";
            anotherField += "                           <button type=\"button\" class=\"close\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;<\/span><\/button>";
            anotherField += "                            <\/div>";
            anotherField += "                            ";
            anotherField += "                        <\/div>";
            anotherField += "                         ";
            anotherField += "                        <\/div>";
            anotherField += "                        <hr class=\"hidden-md hidden-lg\" \/>";

          $("#moreFields").append(anotherField);
          })
        $(document).on("click", ".close", function() {
    $(this).parent().parent().parent().remove();
})
        });

        //Placeholder fix
        $("'[placeholder]'").focus(function() {
  var input = $(this);
  if (input.val() == input.attr("'placeholder'")) {
    input.val("''");
    input.removeClass("'placeholder'");
  }
}).blur(function() {
  var input = $(this);
  if (input.val() == "''" || input.val() == input.attr("'placeholder'")) {
    input.addClass("'placeholder'");
    input.val(input.attr("'placeholder'"));
  }
}).blur();
        $("'[placeholder]'").parents("'form'").submit(function() {
  $(this).find("'[placeholder]'").each(function() {
    var input = $(this);
    if (input.val() == input.attr("'placeholder'")) {
      input.val("''");
    }
  })
});


</script>
  </body>
</html>
