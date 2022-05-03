<?php 
session_start(); 
session_destroy(); ?>


<body>
    <div>My awesome quiz</div>
    <form action="/question.php" method="post">
        <button type="submit">start</button>
    </form>
    
</body>
</html>