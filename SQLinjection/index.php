<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<!-- 👇👇👇hint👇👇👇 
    mysql> select * from users;
    +----+-------+-----------------------------+
    | no | id    | pw                          |
    +----+-------+-----------------------------+
    |  1 | fake  | lol                         |
    |  2 | admin | ?                           |
    |  3 | guest | guest                       |
    +----+-------+-----------------------------+
    
    ※admin pw range => 0-9a-zA-Z!_{}

    if(preg_match('/users|_|admin|\.|\(\)/i', $_GET['no'])) echo "No hack !";
    if(preg_match('/\'|or|and|substr|ascii|=|-|like| |0x/i', $_GET['no'])) echo "No hack ㅇㅅaㅇ";

    if(preg_match('/\'/i', $_GET['pw'])) echo "No hack -_-+"; 
    $_GET['pw'] = addslashes($_GET['pw']);

    $query = "SELECT id FROM users WHERE id='guest' AND pw='{$_GET[pw]}' AND no={$_GET[no]}"; 
-->
    <div class="box">
    <h1>Login</h1>
    <?php
        $servername = "localhost";
        $username = "eunha";
        $password = "1234";
        $dbname = "BUBU";
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // 연결 확인
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        if(isset($_GET['no']) && isset($_GET['pw'])){

            if(preg_match('/users|_|admin|\.|\(\)/i', $_GET['no'])) echo "<script>alert('No hack !');location.replace('index.php')</script>";
            if(preg_match('/\'|or|and|substr|ascii|=|-|like| |0x/i', $_GET['no'])) echo "<script>alert('No hack ㅇㅅaㅇ');location.replace('index.php')</script>";

            if(preg_match('/\'/i', $_GET['pw'])) echo "<script>alert('No hack -_-+');location.replace('index.php')</script>";; 
            $_GET['pw'] = addslashes($_GET['pw']); 

            $query = "SELECT id FROM users WHERE id='guest' AND pw='{$_GET['pw']}' AND no={$_GET['no']}";  
            $result = @mysqli_fetch_array(mysqli_query($conn,$query)); 
            if($result['id']) echo "<h2>Hello {$result['id']}</h2>";
        }
    
    ?>
        
        <form method="get">
            <input type="text" value="guest" name="id" readonly><br>    
            <input type="password" name="pw" placeholder="password"><br>
            <input type="hidden" name="no" value="3">
            <button type="submit">login</button>
        </form>
    </div>
</body>
</html>
