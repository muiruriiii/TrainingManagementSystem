<?php
$conn = new mysqli("localhost","root","","tms");
$sql="SELECT * FROM courses";
$results=$conn->query($sql);
?>

<h2>Course Description</h2>
<div>

    <?php
    while($row=mysqli_fetch_assoc($results)){
    ?>
    <h3><?php echo $row['courseDescription']; ?></h3>
</div>
    <?php
    }
    ?>
