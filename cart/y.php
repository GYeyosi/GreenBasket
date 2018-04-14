<?php
     if (isset($_POST['submitForm'])) { 

    print_r($_POST);
     echo('<script>alert("Form Submitted")</script>');

     }

?>
<form action="" name="form1" method="post">
<input type="text" value="" name="A" />
<input type="text" value="" name="B" />
<input type="text" value="" name="C" />
<input type="text" value="" name="D" />
<input type="Submit" value="Submit Form" name="submitForm" />
</form>

<form action="" name="form2" method="post">
<input type="text" value="" name="A" />
<input type="text" value="" name="B" />
<input type="text" value="" name="C" />
<input type="text" value="" name="D" />
<input type="Submit" value="Submit Form" name="submitForm" />
</form>

<form action="" name="form3" method="post">
<input type="text" value="" name="A" />
<input type="text" value="" name="B" />
<input type="text" value="" name="C" />
<input type="text" value="" name="D" />
<input type="Submit" value="Submit Form" name="submitForm" />
</form>