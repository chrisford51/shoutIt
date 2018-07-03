<?php include 'database.php'; ?>
<?php 
        //Create Select Query
        $query = "SELECT * FROM shouts ORDER BY id";
        
        //Set the query to a variable named 'shouts' to call it later
        $shouts = mysqli_query($connection, $query);

?>


<!DOCTYPE html>
<html>
    
    <head>
        
        <title>SHOUT IT</title>
        <link rel="stylesheet" href="/projects/shoutit/css/style.css" type="text/css" />
        
    </head>
    
    <body>
        
        <div id="container">
            <header>
                <h1>SHOUT IT! Shoutbox</h1>
            </header>
            <div id="shouts">
                <ul>
                    <!--- loop through rows of query to display 'shouts' into a list item -->
                    <?php while($row = mysqli_fetch_assoc($shouts)) : ?>
                    
                    <li class="shout"><span><?php echo $row['time'] ?> - </span><strong><?php echo $row['user'] ?>: </strong> <?php echo $row['message'] ?> </li>
                    
                    <?php endwhile; ?>
                </ul>
            </div>
            <div id="input">    <!--- THIS MIGHT NEED TO BE UPDATED --->
                <?php if(isset($_GET['error'])) : ?>
                    <div class="error"><?php echo $_GET['error']; ?></div>
                <?php endif; ?>
                <form method="post" action="process.php">
                    <input type="text" name="user" placeholder="Enter Your Name" />
                    <input type="text" name="message" placeholder="Enter a Message" />
                    <br />
                    <input class="shout-btn" type="submit" name="submit" value="Shout It Out" />
                    
                </form>
            </div>
        </div>
        
    </body>
    
</html>