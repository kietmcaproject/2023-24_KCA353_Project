<?php
  include('dbcon.php');
  include('header.php');

?>

<div class="hall-container">
  <div class="hall-img">
    <img src="img/partyhall.jpg" alt="">
  </div>
  <div id="book-form">
    <form action="bh.php" method="post">
      <center>
        <table>
          <tr>
            <th width="20%" height="50px">Check Hall Avaibility</th>
            <td rowspan="2"><input type="submit" name="sub" value="Check" required></td>
          </tr>
          <tr>
            <td width="20%" height="50px"><center><input type="date" name="hall"></center></td>
          </tr>
        </table>
      </center>
    </form>
  </div>
</div>

</body>
</html>